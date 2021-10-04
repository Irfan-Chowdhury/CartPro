<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductTranslation;
use App\Models\SettingGeneral;
use App\Models\Tag;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Traits\ActiveInactiveTrait;
use App\Traits\SlugTrait;
use Image;
use Str;
use App\Traits\FormatNumberTrait;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    use ActiveInactiveTrait, SlugTrait, FormatNumberTrait;

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    |
    |
    */

    public function index()
    {
        if (auth()->user()->can('product-view'))
        {
            $local = Session::get('currentLocal');
            App::setLocale($local);


            // $products = Product::with(['baseImage','productTranslation'=> function ($query) use ($local){
            //     $query->where('local',$local)
            //     ->orWhere('local','en')
            //     ->orderBy('id','DESC');
            // }])
            // ->orderBy('is_active','DESC')
            // ->orderBy('id','DESC')
            // ->get();

            $products = Product::with('baseImage','productTranslation','productTranslationEnglish')
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','DESC')
                        ->get();


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
                ->addColumn('product_name', function ($row)
                {
                    return $row->productTranslation->product_name ?? $row->productTranslationEnglish->product_name ?? null;
                })
                ->addColumn('price', function ($row)
                {
                    if ($row->special_price > 0) {
                        return  '<span>'.number_format((float)$row->special_price, env('FORMAT_NUMBER'), '.', '').'</span></br><span class="text-danger"><del>'.number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '').'</del></span>';
                    }else {
                        return '$'.number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '');
                    }
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    if (auth()->user()->can('product-edit'))
                    {
                        $actionBtn .= '<a href="'.route('admin.products.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                        &nbsp; ';
                    }
                    if (auth()->user()->can('product-action'))
                    {
                        if ($row->is_active==1) {
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                        }

                    }
                    return $actionBtn;
                })
                ->rawColumns(['image','action','price'])
                ->make(true);
            }
            return view('admin.pages.product.index');
        }
        return abort('403', __('You are not authorized'));

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
        $local = Session::get('currentLocal');
        App::setLocale($local);

        $brands = Brand::with(['brandTranslation','brandTranslationEnglish'])
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

        $attributeSets = AttributeSet::with('attributeSetTranslation','attributeSetTranslationEnglish','attributes.attributeTranslation',
                                    'attributes.attributeTranslationEnglish','attributes.attributeValues.attributeValueTranslation')
                                    ->where('is_active',1)
                                    ->orderBy('is_active','DESC')
                                    ->orderBy('id','DESC')
                                    ->get();

        // return $attributeSets[1]->attributes[0]->attributeTranslation->attribute_name;

        //No Need
        $attributes = Attribute::with('attributeTranslation','attributeTranslationEnglish')
                    ->where('is_active',1)
                    ->get();

        $taxes = Tax::with('taxTranslation','taxTranslationDefaultEnglish')
                ->where('is_active',1)
                ->orderBy('is_active','DESC')
                ->orderBy('id','ASC')
                ->get();

        return view('admin.pages.product.create',compact('local','brands','categories','tags','attributeSets','attributes','taxes'));
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

        // $validator = Validator::make($request->all(),[
        //     'product_name'=> 'required|unique:product_translations',
        //     'description' => 'required',
        //     'price'       => 'required',
        //     'sku'       => 'unique:products',
        //     'base_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        //     //'multiple_images'=> 'image|max:10240|mimes:jpeg,png,jpg,gif',
        //     // 'multiple_images'=> 'nullable|unique:product_translations',
        // ]);

        // if ($validator->fails()){
        //     session()->flash('type','danger');
        //     session()->flash('message','Something Wrong');
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $local = Session::get('currentLocal');

        if (auth()->user()->can('product-store'))
        {
            $product                = new Product();
            $product->brand_id      = $request->brand_id;
            $product->tax_id        = $request->tax_id;
            $product->slug          = $this->slug($request->product_name);
            $product->price         = number_format((float)$request->price, env('FORMAT_NUMBER'), '.', '');

            $product->special_price = number_format((float)$request->special_price, env('FORMAT_NUMBER'), '.', '');
            $product->special_price_type = $request->special_price_type;
            $product->special_price_start= date("Y-m-d",strtotime($request->special_price_start));
            $product->special_price_end  = date("Y-m-d",strtotime($request->special_price_end));
            $product->selling_price = number_format((float)$request->special_price, env('FORMAT_NUMBER'), '.', '');
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

            //----------------- Base Image --------------
            if (!empty($request->base_image)){
                $productImage = [];
                $productImage['product_id'] = $product->id;
                $productImage['image']      = $this->imageStore($request->base_image, $type='product');
                $productImage['type']       = 'base';
                ProductImage::insert($productImage);
            }

            //----------------- Multiple Image ---------------
            if (!empty($request->additional_images)) {
                $additionalImagesArray = $request->additional_images;
                foreach($additionalImagesArray as $key => $image){
                    $data = [];
                    $data['product_id'] = $product->id;
                    $data['image'] =  $this->imageStore($image,$type='product');
                    $data['type']  = 'additional';
                    ProductImage::insert($data);
                }
            }

            //----------------- Category-Product --------------
            if (!empty($request->category_id)) {
                $categoryArrayIds = $request->category_id;
                $product->categories()->sync($categoryArrayIds);
            }


            //-----------------Product-Tag--------------
            if (!empty($request->tag_id)) {
                $tagArrayIds = $request->tag_id;
                $product->tags()->sync($tagArrayIds);
            }


            //-----------------Product-Attribute--------------

            if (!empty($request->attribute_id)) {
                $attributeArrayIds =  $request->attribute_id;//Array
                $attributeValueIds = $request->attribute_value_id; //Array
                for ($i=0; $i <count($attributeArrayIds) ; $i++) {
                    $product->attributes()->attach([$attributeArrayIds[$i]=>['attribute_value_id'=>$attributeValueIds[$i]]]);
                }
            }

            session()->flash('type','success');
            session()->flash('message','Data Saved Successfully.');

            return redirect()->back();
        }
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
        App::setLocale($local);

        // $products = Product::with('baseImage','productTranslation','productTranslationEnglish')
        // ->orderBy('is_active','DESC')
        // ->orderBy('id','DESC')
        // ->get();

        $product = Product::with(['productTranslation','productTranslationEnglish','categories','tags','brand','brandTranslation','brandTranslationEnglish',
                    'baseImage'=> function ($query){
                        $query->where('type','base')
                            ->first();
                    },
                    'additionalImage'=> function ($query){
                        $query->where('type','additional')
                            ->get();
                    },
                    ])
                    ->where('id',$id)
                    ->first();

        // return $product;

        $brands = Brand::with(['brandTranslation','brandTranslationEnglish'])
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

        $attributes = Attribute::with('attributeTranslation','attributeTranslationEnglish')
                        ->where('is_active',1)
                        ->get();

        $taxes = Tax::with('taxTranslation','taxTranslationDefaultEnglish')
                ->where('is_active',1)
                ->orderBy('is_active','DESC')
                ->orderBy('id','ASC')
                ->get();

        $format_number = $this->totalFormatNumber();

        return view('admin.pages.product.edit',compact('local','brands','categories','tags','attributes','product','format_number','taxes'));
    }


    /*
    |--------------------------------------------------------------------------
    | Product Update
    |--------------------------------------------------------------------------
    |
    |
    */

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'product_name'=> 'required|unique:product_translations,product_name,'.$request->product_translation_id,
            'description' => 'required',
            'price'       => 'required',
            'base_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            //'multiple_images'=> 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'sku'=> 'nullable|unique:products,sku,'.$id,
        ]);

        if ($validator->fails()){

            session()->flash('type','danger');
            session()->flash('message','Something Wrong');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (auth()->user()->can('product-edit'))
        {
            $local = Session::get('currentLocal');

            $product                = Product::find($id);
            $product->brand_id      = $request->brand_id;
            $product->tax_id        = $request->tax_id;
            $product->brand_id      = $request->brand_id;
            $product->slug          = $this->slug($request->product_name);

            $product->price         = $this->formatNumber($request->price); //1st option
            $product->special_price = number_format((float)$request->special_price, env('FORMAT_NUMBER'), '.', ''); //2nd option

            $product->special_price_type = $request->special_price_type;
            $product->special_price_start= date("Y-m-d",strtotime($request->special_price_start));
            $product->special_price_end  = date("Y-m-d",strtotime($request->special_price_end));

            $product->selling_price = number_format((float)$request->special_price, env('FORMAT_NUMBER'), '.', '');

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
            $product->update();

            //---Product Update---
            DB::table('product_translations')
            ->updateOrInsert(
                [
                    'product_id'  => $id,
                    'local'       => $local,
                ],
                [
                    'product_name'      => $request->product_name,
                    'description'       => $request->description,
                    'short_description' => $request->short_description,
                ]
            );


             //-- Base Image ----------
             if (!empty($request->base_image)){
                $productImage = ProductImage::where('product_id',$id)->where('type','base')->first();
                if ($productImage) {
                    if (File::exists(public_path().$productImage->image)) {
                        File::delete(public_path().$productImage->image);
                    }
                    $productImage->image  = $this->imageStore($request->base_image,$type='product');
                    $productImage->update();
                }else {
                    $productImage = new ProductImage();
                    $productImage->product_id = $id;
                    $productImage->image = $this->imageStore($request->base_image,$type='product');
                    $productImage->type  = 'base';
                    $productImage->save();
                }

            }


            //----------------- Multiple Image ---------------
            if (!empty($request->additional_images)) {
                $data = ProductImage::where('product_id',$id)->where('type','additional')->get();
                foreach ($data as $key => $value) {

                    if (File::exists(public_path().$value->image)) {
                        File::delete(public_path().$value->image);
                        $data[$key]->delete();
                    }

                }
                $additionalImagesArray = $request->additional_images;
                foreach($additionalImagesArray as $key => $image){
                    $productImage = new ProductImage();
                    $productImage->product_id = $id;
                    $productImage->image = $this->imageStore($image,$type='product');
                    $productImage->type  = 'additional';
                    $productImage->save();
                }
            }


            //----------------- Category-Product --------------
            if (!empty($request->category_id)) {
                $categoryArrayIds = $request->category_id;
                $product->categories()->sync($categoryArrayIds);
            }

            //-----------------Product-Tag--------------
            if (!empty($request->tag_id)) {
                $tagArrayIds = $request->tag_id;
                $product->tags()->sync($tagArrayIds);
            }

            session()->flash('type','success');
            session()->flash('message','Data Updated Successfully.');

            return redirect()->back();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Product Active-Inactive
    |--------------------------------------------------------------------------
    |
    |
    */

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(Product::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(Product::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, Product::whereIn('id',$request->idsArray));
        }
    }

    protected function imageStore($image, $type)
    {
        $directory  ='/images/products/';
        // $img   = Str::random(10). '.' .$image->getClientOriginalExtension();
        $img   = Str::random(10). '.' .'webp';
        $location = public_path($directory.$img);
        if ($type=='product') {
            Image::make($image)->encode('webp', 60)->resize(720,660)->save($location);
        }else {
            Image::make($image)->encode('webp', 60)->resize(300,300)->save($location);
        }
        $imageUrl = $directory.$img;

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
