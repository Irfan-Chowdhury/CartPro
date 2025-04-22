<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailsResource;
use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productDetails(string $slug, ProductService $productService)
    {
        $productDetailsData = $productService->getProductBySlug($slug);

        return new ProductDetailsResource($productDetailsData);
    }
}





        // return $product->categories->first();


        // $attribute = [];
        // foreach ($product->productAttributeValues as $value) {
        //     $attribute[$value->attribute_id]= $value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null;
        // }

        // $category = Category::with('catTranslation','categoryTranslationDefaultEnglish')->find($category_id);

        // $cart = Cart::content()->where('id',$product->id)->where('options.category_id',$category_id ?? null)->first();
        // if ($cart) {
        //     $product_cart_qty = $cart->qty;
        // }else {
        //     $product_cart_qty = null;
        // }

        // //Review Part
        // if (Auth::check()) {
        //     $user_and_product_exists = DB::table('orders')
        //                 ->join('order_details','order_details.order_id','orders.id')
        //                 ->where('orders.user_id',Auth::user()->id)
        //                 ->where('order_details.product_id',$product->id)
        //                 ->exists();
        // }else {
        //     $user_and_product_exists = null;
        // }

        // $reviews = DB::table('reviews')
        //             ->join('users','users.id','reviews.user_id')
        //             ->where('product_id',$product->id)
        //             ->where('status','approved')
        //             ->select('users.id AS userId','users.first_name','users.last_name','users.image','reviews.comment','reviews.rating','reviews.status','reviews.created_at')
        //             ->where('reviews.deleted_at',null)
        //             ->get();

        // if (empty($reviews)) {
        //     $reviews =[];
        // }


        // //Related Products
        // $category_products =  CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish',
        //                 'productAttributeValues.attributeTranslation','productAttributeValues.attributeTranslationEnglish',
        //                 'productAttributeValues.attrValueTranslation','productAttributeValues.attrValueTranslationEnglish')
        //             ->where('category_id', $category_id)
        //             ->get();



















        // $categories = Category::with('translations:id,category_id,locale,category_name')->select('id','slug','name')->get();
        // foreach ($categories as $key => $value) {
        //     $value->update(['name' => $value->translation->category_name]);
        // }
        // return $categories;

        // $products = Product::with('translations:id,product_name,description,short_description,meta_title,meta_description')->select('id','slug','name')->get();
        // $products = Product::with('translations')->get();
        // foreach ($products as $value) {
        //     $value->update([
        //         'name' => $value->translation->product_name,
        //         'description' => $value->translation->description,
        //         'short_description' => $value->translation->short_description,
        //         'meta_title' => $value->translation->meta_title,
        //         'meta_description' => $value->translation->meta_description,
        //     ]);
        // }
        // return $products;



        // Category::with('translations')
        //     ->get()
        //     ->each(function ($category) {
        //         $category->update(['name' => $category->translation->category_name]);
        // });
