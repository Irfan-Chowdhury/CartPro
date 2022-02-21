<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TagProductController extends Controller
{
    public function tagWiseProducts($slug)
    {
        $locale = Session::get('currentLocal');

        $tag = $this->tagInfo($locale, $slug);
        if (!$tag) {
            $locale = 'en';
            $tag = $this->tagInfo($locale, $slug);
        }

        $product_images = ProductImage::select('product_id','image','type')->get();
        $product_tag_ids =  DB::table('product_tag')->where('tag_id',$tag->id)->pluck('product_id');
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
            ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description')
            ->whereIn('products.id',$product_tag_ids)
            ->get();

        $category_ids = [];
        foreach ($products as $item) {
            foreach ($category_product as $key => $value) {
                if ($item->id==$value->product_id) {
                    $category_ids[$item->id] = $category_product[$key];
                    break;
                }
            }
        }

        $product_attr_val = Product::with('productAttributeValues')
                            ->orderBy('id','DESC')
                            ->get();

        return view('frontend.pages.tag_wise_product',compact('products','tag','category_ids','product_images','product_attr_val'));
    }

    protected function tagInfo($locale,$slug){
        return DB::table('tags')
                ->join('tag_translations', function ($join) use ($locale) {
                    $join->on('tag_translations.tag_id', '=', 'tags.id')
                    ->where('tag_translations.local', '=', $locale);
                })
                ->where('tags.slug',$slug)
                ->select('tags.id','tag_translations.tag_name')
                ->first();
    }
}
