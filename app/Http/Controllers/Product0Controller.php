<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductAttribute;
use App\Category;
use App\Collection;
use App\Brand;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use File;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $Category = Category::all();
        $Brand = Brand::all();
        // return view('admin.allProduct',compact('Product'));
        if (request()->ajax())
            {
                return datatables()->of(Product::with('brands','categories')->oldest()->get())
                    ->setRowId(function ($product)
                    {
                        return $product->id;
                    })
                    ->addColumn('brand_id', function ($row)
                    {
                        $button = $row->brands->brand_name ?? ' ';

                        return $button;
                    })->addColumn('category_id', function ($row)
                    {
                        $button = $row->categories->category_name;

                        return $button;
                    })
                    ->addColumn('action', function ($data)
                    {
                        $button = '';
                       
                        $button = '<a href="'.\Request::url().'/edit/'.$data->id.'" id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        
                         $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                         $button .= '&nbsp;&nbsp;';
                         if ($data->status == 0) {
                                $button .= '<button type="button"  name="active" id="' . $data->id . '" status="1" class="btn btn-success btn-sm status"><i class="dripicons-thumbs-up"></i></button>';
                            }else{
                                $button .= '<button type="button"  name="inactive" id="' . $data->id . '" status="0" class=" btn btn-danger btn-sm status"><i class="dripicons-thumbs-down"></i></button>';
                            }   
                         
                        

                        return $button;
                    })
                    ->
                    rawColumns(['action', 'product_name'])
                    ->make(true);
            }
            return view('admin.pages.allProduct',compact('Category','Brand'));
    }

    public function create()
    {
        $categories = Category::where('is_active',1)->get();
        $brands = Brand::where('status',1)->get();
        $collections = Collection::where('status',1)->get();
        return view('admin.pages.product-create', compact('categories', 'brands', 'collections'));
    }

    public function productVariantImages($id,$sku, $size, $color,$price,$qty,$product)
    {   
        //$product = htmlspecialchars($product);
        return view('admin.pages.upload-variant-images', compact('id','product','sku', 'size', 'color','price','qty'));
    }

    public function productVariantImagesUpload(Request $request)
    {
        $product = [
            'sku'              => htmlspecialchars($request->input('sku')),
            'product_name'     => htmlspecialchars($request->input('product_name')),
            'size'             => htmlspecialchars($request->input('size')),
            'color'            => htmlspecialchars($request->input('color')),
            'qty'              => htmlspecialchars($request->input('qty')),
            'price'            => htmlspecialchars($request->input('price')),
            'product_id'       => $request->input('product_id'),
        ];

        $insert_attribute = ProductAttribute::firstOrCreate(['sku'=>$product['sku']],$product);

        $path = public_path('images/products/'.$product['sku'].'/large/');

        $file = glob($path . '*');

        $countFile = 0;

        if ($file != false)
        {
            $countFile = count($file);
        }

        if(isset($request->file)) {
            $files = $request->file;
            
            $path = public_path('images/products/'.$product['sku']);
            $path_sm = public_path('images/products/'.$product['sku'].'/small');
            $path_md = public_path('images/products/'.$product['sku'].'/medium');
            $path_lg = public_path('images/products/'.$product['sku'].'/large');
            $path_xl = public_path('images/products/'.$product['sku'].'/xl');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
                File::makeDirectory($path_xl, 0777, true, true);
                File::makeDirectory($path_lg, 0777, true, true);
                File::makeDirectory($path_md, 0777, true, true);
                File::makeDirectory($path_sm, 0777, true, true);
            }
            $image_names = [];

            foreach ($files as $key => $file) {
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $fileName = Str::slug($product['product_name'], '-') .$countFile. '.' . $ext;
                $file->move('public/images/products/'.$product['sku'], $fileName);

                $img_xl = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(850, 1200)->save('public/images/products/'.$product['sku'].'/xl/'. $fileName, 90);
                $img_lg = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(500, 700)->save('public/images/products/'.$product['sku'].'/large/'. $fileName, 90);
                $img_md = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(290, 400)->save('public/images/products/'.$product['sku'].'/medium/'. $fileName, 100);
                $img_sm = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(70, 90)->save('public/images/products/'.$product['sku'].'/small/'. $fileName, 60);

                $image_names[] = $fileName;

                $insert_attribute['image'] = implode(",", $image_names);

                $insert_attribute->save();

                $countFile = ($countFile+1);
            }

        }
    }
    
    public function store(Request $request)
    {
        $product = [
            'sku'              => htmlspecialchars($request->input('sku')),
            'product_name'     => htmlspecialchars($request->input('product_name')),
            'slug'             => Str::slug($request->input('product_name'), '-'),
            'category_id'      => $request->input('category_id'),
            'brand_id'         => $request->input('brand_id'),
            'collection_id'    => implode(",", $request->input('collection_id')),
            'short_description'=> htmlspecialchars($request->input('short_description')),
            'qty'              => htmlspecialchars($request->input('qty')),
            'tags'             => htmlspecialchars($request->input('tags')),
            'price'            => htmlspecialchars($request->input('price')),
            'meta_title'       => htmlspecialchars($request->input('meta_title')),
            'meta_description' => htmlspecialchars($request->input('meta_description')),
            'status'           => 1,
        ];

        if($request->input('variant_color')) {
            $product['has_attribute'] = 1;
        }

        $product_create = Product::create($product);

        $variant_size = $request->input('variant_size');
        $variant_color = $request->input('variant_color');
        $variant_sku = $request->input('variant_sku');
        $variant_qty = $request->input('variant_qty');
        $variant_price = $request->input('variant_price');

        $qty = 0;

        foreach($variant_color as $key=>$color) {

            $data = [
                'size'       => $variant_size[$key],
                'color'      => $variant_color[$key],
                'sku'        => $variant_sku[$key],
                'qty'        => $variant_qty[$key],
                'price'      => $variant_price[$key],
                'product_id' => $product_create->id
            ];

            ProductAttribute::firstOrCreate(['sku'=>$variant_sku[$key]],$data);

            $qty = ($qty + $data['qty']);

        }

        if(isset($request->file)) {
            $files = $request->file;

            $path = public_path('images/products/'.$product['sku']);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
                File::makeDirectory($path.'/xl', 0777, true, true);
                File::makeDirectory($path.'/large', 0777, true, true);
                File::makeDirectory($path.'/medium', 0777, true, true);
                File::makeDirectory($path.'/small', 0777, true, true);
            }
            $image_names = [];

            foreach ($files as $key => $file) {
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $fileName = Str::slug($product['product_name'], '-') .$key. '.' . $ext;
                $file->move('public/images/products/'.$product['sku'], $fileName);

                $img_xl = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(850, 1200)->save('public/images/products/'.$product['sku'].'/xl/'. $fileName, 90);
                $img_lg = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(500, 700)->save('public/images/products/'.$product['sku'].'/large/'. $fileName, 90);
                $img_md = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(290, 400)->save('public/images/products/'.$product['sku'].'/medium/'. $fileName, 100);
                $img_sm = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(70, 90)->save('public/images/products/'.$product['sku'].'/small/'. $fileName, 60);

                $image_names[] = $fileName;
            }

            $product_create['image'] = implode(",", $image_names);

        }

        $product_data['qty'] = $qty;

        $product_data->save();
        
        return redirect()->back();     
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $attributes = ProductAttribute::where('product_id', $id)->get();

        $categories = Category::where('is_active',1)->get();
        $brands = Brand::where('status',1)->get();
        $collections = Collection::where('status',1)->get();

        return view('admin.pages.product-update', compact('products', 'attributes', 'categories', 'brands', 'collections'));
    }

   
    public function update(Request $request)
    {
        $id = $request->input('id');
        $product = [
            'product_name'     => htmlspecialchars($request->input('product_name')),
            'slug'             => Str::slug($request->input('product_name'), '-'),
            'category_id'      => $request->input('category_id'),
            'brand_id'         => $request->input('brand_id'),
            'price'            => $request->input('price'),
            'collection_id'    => implode(",", $request->input('collection_id')),
            'short_description'=> htmlspecialchars($request->input('short_description')),
            'description'      => htmlspecialchars($request->input('description')),
            'tags'             => htmlspecialchars($request->input('tags')),
            'meta_title'       => htmlspecialchars($request->input('meta_title')),
            'meta_description' => htmlspecialchars($request->input('meta_description')),
            'sku'              => $request->input('sku'),
        ];

        if($request->input('variant_color')) {
            $product['has_attribute'] = 1;
        }

        $product_data = Product::find($id);
        $product_update = $product_data->update($product);
            
        $variant_size = $request->input('variant_size');
        $variant_color = $request->input('variant_color');
        $variant_sku = $request->input('variant_sku');
        $variant_qty = $request->input('variant_qty');
        $variant_price = $request->input('variant_price');

        $qty = 0;

        foreach($variant_color as $key=>$color) {

            $data = [
                'size'       => $variant_size[$key],
                'color'      => $variant_color[$key],
                'sku'        => $variant_sku[$key],
                'qty'        => $variant_qty[$key],
                'price'      => $variant_price[$key],
                'product_id' => $id
            ];

            ProductAttribute::updateOrCreate(['sku'=>$variant_sku[$key]],$data);

            $qty = ($qty + $data['qty']);

        }

        if(isset($request->file)) {
            $files = $request->file;

            $path = public_path('images/products/'.$product['sku']);
            $path_sm = public_path('images/products/'.$product['sku'].'/small');
            $path_md = public_path('images/products/'.$product['sku'].'/medium');
            $path_lg = public_path('images/products/'.$product['sku'].'/large');
            $path_xl = public_path('images/products/'.$product['sku'].'/xl');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
                File::makeDirectory($path_xl, 0777, true, true);
                File::makeDirectory($path_lg, 0777, true, true);
                File::makeDirectory($path_md, 0777, true, true);
                File::makeDirectory($path_sm, 0777, true, true);
            }
            $image_names = [];

            foreach ($files as $key=>$file) {
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $fileName = Str::slug($product['product_name'], '-') .$key. '.' . $ext;
                $file->move('public/images/products/'.$product['sku'], $fileName);

                $img_xl = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(850, 1200)->save('public/images/products/'.$product['sku'].'/xl/'. $fileName, 90);
                $img_lg = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(500, 700)->save('public/images/products/'.$product['sku'].'/large/'. $fileName, 90);
                $img_md = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(290, 400)->save('public/images/products/'.$product['sku'].'/medium/'. $fileName, 100);
                $img_sm = Image::make('public/images/products/'.$product['sku'].'/'. $fileName)->orientate()->fit(38, 50)->save('public/images/products/'.$product['sku'].'/small/'. $fileName, 60);

                $image_names[] = $fileName;
            }

            $product_data['image'] = implode(",", $image_names);

            $product_data->save();

        }

        $product_data['qty'] = $qty;

        $product_data->save();
        
        return redirect()->back();  
    }

    public function productImages(Request $request)
    {
        $target_dir =  $request->input('sku');

        $target_dir = str_replace('/', '\\',  public_path('images/products/'.$target_dir.'/'));

        //return $target_dir;

        $file_list = array();

        $dir = $target_dir;

        if (is_dir($dir)){
         
            if ($dh = opendir($dir)){

                // Read files
                while (($file = readdir($dh)) !== false){

                    if($file != '' && $file != '.' && $file != '..'){

                        // File path
                        $file_path = $target_dir.$file;
         
                        // Check its not folder
                        if(!is_dir($file_path)){
                            
                            $size = filesize($file_path);

                            $file_list[] = array('name'=>$file,'size'=>$size,'path'=>$file_path);
              
                        }
                    }
         
                }
                closedir($dh);
            }
        }

        return json_encode($file_list);
    }

    public function destroy($id)
    {
        Product::whereId($id)->delete();

        return response()->json(['success' => __('Data is successfully deleted')]);

    }
    function delete_by_selection(Request $request)
    {

            $Product_id = $request['ProductListIdArray'];
            // return $Product_id;
            $products = Product::whereIn('id', $Product_id);
            if ($products->delete())
            {
                return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
            } else
            {
                return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
            }
        

       
    }

    public function status($id,$status)
    {
        Product::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
    }
   
}
