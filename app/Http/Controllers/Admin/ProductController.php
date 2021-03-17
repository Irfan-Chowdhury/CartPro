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

    public function index()
    {
        $local = Session::get('currentLocal');

        $products = Product::with(['productTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->orderBy('id','DESC')
        ->get();

        if (request()->ajax())
        {
            return datatables()->of($products)
            ->setRowId(function ($row){
                return $row->id;
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
            // ->rawColumns(['action'])
            ->make(true);
        }


        return view('admin.pages.product.index');
    }

    public function create()
    {
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

        // return $attributes->AttributeValueTranslation->count();


        //-------------- Test ----------
        // $attribute_sets = DB::table('attribute_sets')
        //                 ->join('attribute_set_translations','attribute_set_translations.attribute_set_id','attribute_sets.id')
        //                 ->join('attributes','attributes.attribute_set_id','attribute_sets.id')
        //                 ->join('attribute_translations','attribute_translations.attribute_id','attributes.id')
        //                 ->where('attribute_set_translations.local',$local)
        //                 ->where('attribute_translations.local',$local)
        //                 ->select('attribute_sets.id AS attribute_set_id','attribute_set_translations.attribute_set_name','attributes.id AS attribute_id','attribute_translations.attribute_name')
        //                 ->get();

        // return $attribute_sets;


         // $attributeSets = AttributeSet::with(['attributeSetTranslation'=> function ($query) use ($local){
        //     $query->where('local',$local)
        //     ->orWhere('local','en')
        //     ->orderBy('id','DESC'); 
        // },
        // 'attributes','attributeTranslation'
        
        // ])
        // ->orderBy('id','DESC')
        // ->get();

        // return $attributeSets;
        // return $attributeSets[3]->attributes[1]->slug;
        //-------------- Test ----------


        return view('admin.pages.product.create',compact('local','brands','categories','tags','attributes'));
    }

    public function make_slug($string) 
    {
        if (Session::get('currentLocal')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(),[ 
            'product_name'=> 'required',
            'description' => 'required',
            'price'       => 'required',
            'base_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'multiple_images'=> 'image|max:10240|mimes:jpeg,png,jpg,gif',
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
        if (!empty($request->multiple_images)) {       
            $multipleImagesArray = $request->multiple_images;
            foreach($multipleImagesArray as $key => $image){
                $data = [];
                $data['product_id'] = $product->id;
                $data['image'] =  $this->imageStore($image);
                $data['type']  = 'multiple';
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
