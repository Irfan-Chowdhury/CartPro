<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function categoryWiseProducts($slug)
    {
        // $limit = 2;
        // $category =  Category::with(['categoryProduct'=>function($query) use ($limit) {
        //     $query->limit($limit);
        // },'categoryProduct.categoryTranslation','categoryProduct.categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish','categoryProduct.productBaseImage','categoryProduct.additionalImage'])
        // ->where('slug',$slug)
        // ->first();

        // $data = [];
        // foreach ($category->categoryProduct as $item) {
        //     $data[]= $item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name;
        // }
        // return $data;


        $category = Category::with('categoryProduct.categoryTranslation','categoryProduct.categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish','categoryProduct.productBaseImage','categoryProduct.additionalImage')
                        ->where('slug',$slug)
                        ->first();
        return view('frontend.pages.category_wise_products',compact('category'));
    }

    public function limitCategoryProductShow(Request $request)
    {
        $limit = $request->limit_data;

        $category =  Category::with(['categoryProduct'=>function($query) use ($limit) {
                    $query->limit($limit);
                },'categoryProduct.categoryTranslation','categoryProduct.categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish','categoryProduct.productBaseImage','categoryProduct.additionalImage'])
                ->where('slug',$request->category_slug)
                ->first();

        $html = '';

        foreach ($category->categoryProduct as $item) {
            $imageurl = url("public/".$item->productBaseImage->image);


            $html .= '<form class="addToCart">
                        <input type="hidden" name="product_id" value="'.$item->product_id.'">
                        <input type="hidden" name="product_slug" value="'.$item->product->slug.'">
                        <input type="hidden" name="category_id" value="'.$category->id ?? null.'">
                        <input type="hidden" name="qty" value="1">';

            $html .=    '<div class="product-grid-item">
                            <div class="single-product-wrapper">
                                <div class="single-product-item">';
                                if ($item->productBaseImage!=NULL){
                        $html .= '<img src="'.$imageurl.'" alt="...">';
                                }else{
                        $html .= '<img src="'.url('public/images/empty.jpg').'" alt="...">';
                                }
                        $html .= '<div class="product-promo-text style1">
                                    <span>Sold</span>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#'.$item->product->slug.'"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                    </a>
                                    <a href="wishlist.html">
                                        <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                    </a>
                                    <a href="compare.html">
                                        <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-details">
                                <a class="product-name" href="">
                                    '.$item->productTranslation->product_name.'
                                </a>
                                <div class="product-short-description">
                                        '.$item->productTranslation->description.'
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="rating-summary">
                                            <div class="rating-result" title="60%">
                                                <ul class="product-rating">
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star"></i></li>
                                                    <li><i class="ion-android-star-half"></i></li>
                                                    <li><i class="ion-android-star-half"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-price">';
                                            if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price < $item->product->price){
                                                $html .= '<span class="promo-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                                $html .= '<span class="old-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                            }else{
                                                $html .= '<span class="price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                            }
                                    $html .='</div>
                                    </div>
                                    <div>
                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-options">
                                <div class="product-price mt-2">';
                                if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price < $item->product->price){
                                        $html .= '<span class="promo-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                        $html .= '<span class="old-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                }else {
                                    $html .= '<span class="price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                }

                                $html .= '</div>
                                <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i>Add to cart</button>
                                <div class="d-flex justify-content-between">
                                    <a href="wishlist.html">
                                        <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span> Wishlist
                                    </a>
                                    <a href="compare.html">
                                        <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                        Comapre
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>';
        }
        return response()->json($html);
    }
}
