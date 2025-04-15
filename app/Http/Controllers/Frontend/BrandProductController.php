<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ArrayToObjectConvertionTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandProductController extends Controller
{
    use ArrayToObjectConvertionTrait;

    public function brands()
    {
        $brandData = Brand::with('translations')
                ->where('is_active',1)
                ->orderBy('id','DESC')
                ->get()
                ->map(function($brand) {
                    return [
                        'id'=>$brand->id,
                        'slug'=>$brand->slug,
                        'is_active'=>$brand->is_active,
                        'logo'=> isset($brand->brand_logo) && file_exists(public_path($brand->brand_logo)) ? asset($brand->brand_logo) : 'https://dummyimage.com/50x50/000000/0f6954.png&text=Brand',
                        'name'=> $brand->translation->brand_name,
                    ];
                });

        $brands = $this->arrayToObject($brandData);

        return view('frontend.pages.brand',compact('brands'));
    }

    public function brandWiseProducts($slug)
    {

        $locale = Session::get('currentLocale');

        // DB::enableQueryLog();
        $brandData = Brand::with([
                    'translations',
                    'products' => function ($query) {
                        $query->where('is_active', 1)
                                ->whereHas('categories')
                                ->with([
                                    'translations',
                                    'baseImage',
                                    'additionalImage',
                                    'categories:id,slug,name',
                                    'attributes' => function ($q) {
                                        $q->select('id', 'name')
                                        ->with(['attributeValues:id,attribute_id,name']);
                                    }
                                ]);
                    },

                ])
                ->where('slug',$slug)
                ->where('is_active',1)
                ->first();


        $brandWiseProducts =  (object) [
            'id' => $brandData->id,
            'slug' => $brandData->slug,
            'name' => $brandData->translation->brand_name,
            'image' => isset($brandData->brand_logo) && file_exists(public_path($brandData->brand_logo)) ? asset($brandData->brand_logo) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
            'isActive'  => $brandData->is_active,
            'products' => $brandData->products->map(function($product){
                return (object) [
                    'id' => $product->id,
                    'name' => $product->translation->product_name,
                    'shortDescription' => $product->short_description,
                    'slug' => $product->slug,
                    'sku' => $product->sku,
                    'price' => $product->price,
                    'manageStock' => $product->manage_stock,
                    'qty' => $product->qty,
                    'inStock' => $product->in_stock,
                    'newTo' => $product->new_to,
                    'avgRating' => $product->avg_rating,
                    'specialPrice' => $product->special_price,
                    'isActive' => $product->is_active,
                    'image' => isset($product->baseImage->image) && file_exists(public_path($product->baseImage->image)) ? asset($product->baseImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                    'mediumImage' => isset($product->baseImage->image_medium) && file_exists(public_path($product->baseImage->image_medium)) ? asset($product->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                    'additionalImage' => $product->additionalImage->map(function($item) {
                        return [
                            'image' => isset($item->image) && file_exists(public_path($item->image)) ? asset($item->image) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                            'mediumImage' => isset($item->image_medium) && file_exists(public_path($item->image_medium)) ? asset($item->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                            'smallImage' => isset($item->image_small) && file_exists(public_path($item->image_small)) ? asset($item->image_small) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                        ];
                    }),
                    'attributes' => $product->attributes->map(function($attribute) {
                        return (object) [
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'values' => $attribute->attributeValues->map(function($value) {
                                return (object) [
                                    'id' => $value->id,
                                    'name' => $value->name,
                                ];
                            }),
                        ];
                    }),
                    'category' => $product->categories->first() ? (object) [
                        'id' => $product->categories->first()->id,
                        'slug' => $product->categories->first()->slug,
                        'name' => $product->categories->first()->name,
                    ] : null,
                ];
            })
        ];

        $brand = $this->arrayToObject($brandWiseProducts);

        // return $brand->products[0]->category->id;

        // return count($brand->products);

        // dd(DB::getQueryLog());

        return view('frontend.pages.brand_wise_product',compact('brand'));





        $brand = $this->brandInfo($locale, $slug);
        if (!$brand) {
            $locale = 'en';
            $brand = $this->brandInfo($locale, $slug);
        }

        $product_images = ProductImage::select('product_id','image','type')->get();

        $category_product =  CategoryProduct::get();

        $products = DB::table('products')
                    ->join('product_translations', function ($join) use ($locale) {
                        $join->on('product_translations.product_id', '=', 'products.id')
                        ->where('product_translations.local', '=', $locale);
                    })
                    ->join('product_images', function ($join) {
                        $join->on('product_images.product_id', '=', 'products.id')
                        ->where('product_images.type', '=', 'base');
                    })
                    ->select('products.*','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description')
                    ->where('brand_id',$brand->id)
                    ->where('products.deleted_at',null)
                    ->orderBy('products.id','DESC')
                    ->get();

        $category_ids = [];
        foreach ($products as $key => $item) {
            foreach ($category_product as $key => $value) {
                if ($item->id==$value->product_id) {
                    $category_ids[$item->id] = $category_product[$key];
                    break;
                }
            }
        }

        $product_attr_val = Product::with('productAttributeValues')
                    ->where('brand_id',$brand->id)
                    ->orderBy('id','DESC')
                    ->get();

        // dd(DB::getQueryLog());


        return view('frontend.pages.brand_wise_product',compact('brand','products','product_images','category_ids','product_attr_val'));
    }

    protected function brandInfo($locale,$slug){
        return DB::table('brands')
                ->join('brand_translations', function ($join) use ($locale) {
                    $join->on('brand_translations.brand_id', '=', 'brands.id')
                    ->where('brand_translations.local', '=', $locale);
                })
                ->where('slug',$slug)
                ->select('brands.id','brand_translations.brand_name')
                ->first();
    }
}
