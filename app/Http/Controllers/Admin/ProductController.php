<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductTranslation;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    |
    |
    */

    public function index()
    {
        $local = Session::get('currentLocal');


        $products = Product::with(['baseImage','productTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->orderBy('id','DESC')
        ->get();

        //return $products;

        if (request()->ajax())
        {
            return datatables()->of($products)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('image', function ($row)
            {   
                if (($row->baseImage==null) || ($row->baseImage->type!='base')) {
                    return '<img src="'.url("public/images/products/empty.jpg").'" alt="" height="50px" width="50px">';
                }elseif ($row->baseImage->type=='base') {
                    $url = url("public/".$row->baseImage->image); 
                    return  '<img src="'. $url .'" height="50px" width="50px"/>';
                }      
            })
            ->addColumn('product_name', function ($row) use ($local)
            {   
                if ($row->productTranslation->count()>0){
                    foreach ($row->productTranslation as $key => $value){
                        if ($key<1){
                            if ($value->local==$local){
                                return $value->product_name;
                            }elseif($value->local=='en'){
                                return $value->product_name;
                            }
                        }
                    }
                }else {
                    return "NULL";
                }
            })
            ->addColumn('price', function ($row)
            {   
                if ($row->special_price) {
                    return  '<span>'.$row->special_price.'</span></br><span class="text-danger"><del>'.$row->price.'</del></span>';
                }else {
                    return '$ '.$row->price;
                }
                
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";
                $actionBtn .= '<a href="'.route('admin.products.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                                &nbsp; ';
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                }
                            
                return $actionBtn;
            })
            ->rawColumns(['image','action','price'])
            ->make(true);
        }


        return view('admin.pages.product.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Product Create
    |--------------------------------------------------------------------------
    |
    |
    */

    public function create()
    {
        // $data = Attribute::get()->groupBy('attribute_set_id');
        // $data = Attribute::distinct()->get('attribute_set_id');
        // return $data;


        $local = Session::get('currentLocal');

        $brands = Brand::with(['brandTranslation'=> function ($query) use ($local){
                $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();
        
        $categories = Category::with(['categoryTranslation'=> function ($query) use ($local){
                $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $tags = Tag::with(['tagTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC'); 
        }])->get();
        
        $attributes = Attribute::with(['attributeTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        // return $attributes;

        return view('admin.pages.product.create',compact('local','brands','categories','tags','attributes'));



        //-------------- <optgroup label="Name"> <option>Asteroids</option> </optgroup> --------------

        // $data = Attribute::distinct()->get('attribute_set_id');

        // $attributes = Attribute::with(['attributeTranslation'=> function ($query) use ($local){
        //     $query->where('local',$local)
        //     ->orWhere('local','en')
        //     ->orderBy('id','DESC');
        // }])
        // ->where('is_active',1)
        // ->get()
        // ->groupBy('attribute_set_id');

        // return $attributes;
        // return $attributes[5];
        // return $attributes[5][0];
        // return $attributes[5][0]->slug;
        // return $attributes[5][0]->attributeTranslation[0]->attribute_name;


        // $data = [];
        // $data[0] = $attributes[5];
        // $data[1] = $attributes[7];

        // return $data;
        // return $data[0][0];
        // return $data[0][0]->slug;
        // return $data[0][0]->attributeTranslation;
        // return $data[0][0]->attributeTranslation[0]->attribute_name;

        //-------------- <optgroup label="Name"> <option>Asteroids</option> </optgroup> --------------
        
        // https://thdoan.github.io/bootstrap-select/examples.html
        // return view('admin.pages.product.create',compact('local','brands','categories','tags','attributes','data'));
    }

    public function make_slug($string) 
    {
        if (Session::get('currentLocal')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
    }

    /*
    |--------------------------------------------------------------------------
    | Product Store
    |--------------------------------------------------------------------------
    |
    |
    */

    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(),[ 
            'product_name'=> 'required|unique:product_translations',
            'description' => 'required',
            'price'       => 'required',
            'base_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            //'multiple_images'=> 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'multiple_images'=> 'nullable|unique:product_translations',
        ]);

        if ($validator->fails()){

            session()->flash('type','danger');
            session()->flash('message','Something Wrong');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $local = Session::get('currentLocal');

        $product                = new Product();
        $product->brand_id      = $request->brand_id;
        $product->tax_class_id  = $request->tax_class_id;
        $product->brand_id      = $request->brand_id;
        $product->slug          = $this->make_slug($request->product_name);
        $product->price         = $request->price;
        $product->special_price = $request->special_price;
        $product->special_price_type = $request->special_price_type;
        $product->special_price_start= date("Y-m-d",strtotime($request->special_price_start));
        $product->special_price_end  = date("Y-m-d",strtotime($request->special_price_end));
        $product->selling_price = $request->special_price;
        $product->sku           = $request->sku;
        $product->manage_stock  = $request->manage_stock;
        $product->qty           = $request->qty;
        $product->in_stock      = $request->in_stock;
        $product->new_from      = date("Y-m-d",strtotime($request->new_from));
        $product->new_to        = date("Y-m-d",strtotime($request->new_to));

        if ($request->is_active==1) {
            $product->is_active = 1;
        }else {
            $product->is_active = 0;
        }
        $product->save();

        //----------------- Product Translation --------------

        $productTranslation = new ProductTranslation();
        $productTranslation->product_id  = $product->id;
        $productTranslation->local        = Session::get('currentLocal');
        $productTranslation->product_name = $request->product_name;
        $productTranslation->description  = $request->description;
        $productTranslation->short_description  = $request->short_description;
        $productTranslation->save();

        //----------------- Product Translation --------------


        //----------------- Base Image --------------
        if (!empty($request->base_image)){
            $productImage = [];
            $productImage['product_id'] = $product->id; 
            $productImage['image']      = $this->imageStore($request->base_image); 
            $productImage['type']       = 'base'; 
            ProductImage::insert($productImage);
        }
        //-----------------/ Base Image --------------


        //----------------- Multiple Image ---------------
        if (!empty($request->additional_images)) {       
            $additionalImagesArray = $request->additional_images;
            foreach($additionalImagesArray as $key => $image){
                $data = [];
                $data['product_id'] = $product->id;
                $data['image'] =  $this->imageStore($image);
                $data['type']  = 'additional';
                ProductImage::insert($data);
            }
        }
        //-----------------/ Multiple Image --------------



        
        //----------------- Category-Product --------------
        if (!empty($request->category_id)) {       
            $categoryArrayIds = $request->category_id;
            $product->categories()->sync($categoryArrayIds);
        }
        //-----------------Category-Product----------------------


        //-----------------Product-Tag--------------
        if (!empty($request->tag_id)) {
            $tagArrayIds = $request->tag_id;
            $product->tags()->sync($tagArrayIds);
        }
        //-----------------Product-Tag--------------
        
        
        //-----------------Product-Attribute--------------

        session()->flash('type','success');
        session()->flash('message','Data Saved Successfully.');
        
        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | Product Edit
    |--------------------------------------------------------------------------
    |
    |
    */

    public function edit($id)
    {
        $local = Session::get('currentLocal');

        // $product = Product::with(['productTranslation'=> function ($query) use ($local){
        //     $query->where('local',$local)
        //     ->first();
        // },'brandTranslation'=> function ($query) use ($local){
        //     $query->where('local',$local)
        //     ->first();
        // }])
        // ->where('id',$id)
        // ->first();
        // return $product->brandTranslation->brand_name;
        //return $product->productTranslation[0]->product_name;

        $product = Product::with(['productTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->first();
        },'categories','tags','baseImage',
        'additionalImage'=> function ($query){
            $query->where('type','additional')
                ->get();
        }])
        ->where('id',$id)
        ->first();

        // return $product->additionalImage;

        

        $brands = Brand::with(['brandTranslation'=> function ($query) use ($local){
                $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();
        
        $categories = Category::with(['categoryTranslation'=> function ($query) use ($local){
                $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $tags = Tag::with(['tagTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC'); 
        }])->get();
        
        $attributes = Attribute::with(['attributeTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        // return view('admin.pages.product.edit',compact('local','brands','categories','tags','attributes'));
        return view('admin.pages.product.edit',compact('local','brands','categories','tags','attributes','product'));
    }

    /*
    |--------------------------------------------------------------------------
    | Product Active
    |--------------------------------------------------------------------------
    |
    |
    */

    public function active(Request $request)
    {
        if ($request->ajax()) 
        {
            $product = Product::find($request->product_id);
            $product->is_active = 1;
            $product->save();

            return response()->json(['success' => 'Data Active Successfully']);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Product Inactive
    |--------------------------------------------------------------------------
    |
    |
    */

    public function inactive(Request $request)
    {
        if ($request->ajax()) 
        {
            $product = Product::find($request->product_id);
            $product->is_active = 0;
            $product->save();

            return response()->json(['success' => 'Data Inactive Successfully']);
        }
    }

    protected function imageStore($image)
    {
        $directory  ='/images/products/';
        $imageName  = time().'.'.$image->getClientOriginalExtension();
        $imageUrl   = $directory.$imageName;
        $upload_path= public_path().$imageUrl;
        Image::make($image)->resize(1900,633)->save($upload_path);

        return $imageUrl;
    }
}

//------------Insert Data by product_tag manually---------------
// $data = [];
// foreach($tagArrayIds as $key => $item){
//     $data[] = [
//         'product_id'  => $product->id,
//         'tag_id' => $tagArrayIds[$key],
//     ];
// }
// ProductTag::insert($data);
