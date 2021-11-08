<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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


        $category = Category::with('catTranslation','categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish',
                            'categoryProduct.productBaseImage','categoryProduct.additionalImage','child.catTranslation','child.categoryTranslationDefaultEnglish')
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
                        <input type="hidden" name="category_id" value="'.$category->id.'">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="_token" value="'.csrf_token().'">';


            $html .=    '<div class="product-grid-item">
                            <div class="single-product-wrapper">
                                <div class="single-product-item">';
                                if ($item->productBaseImage!=NULL){
                        $html .= '<img src="'.$imageurl.'" alt="...">';
                                }else{
                        $html .= '<img src="'.url('public/images/empty.jpg').'" alt="...">';
                                }

                                if (($item->product->qty==0) || ($item->product->in_stock==0)){
                        $html .=    '<div class="product-promo-text style1">
                                        <span>Stock Out</span>
                                    </div>';
                                }


                        $html .= '<div class="product-overlay">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#'.$item->product->slug.'"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                    </a>
                                    <a href="wishlist.html">
                                        <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
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
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>';
        }
        return response()->json($html);
    }

    public function categoryWiseConditionProducts(Request $request)
    {

        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }
        App::setLocale($locale);

        $category = Category::with('catTranslation','categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish',
                'categoryProduct.productBaseImage','categoryProduct.additionalImage','child.catTranslation','child.categoryTranslationDefaultEnglish')
        ->where('slug',$request->category_slug)
        ->first();


        if ($request->condition=='latest') {
            $products =  DB::table('products')
                ->join('product_translations', function ($join) use ($locale) {
                    $join->on('product_translations.product_id', '=', 'products.id')
                    ->where('product_translations.local', '=', $locale);
                })
                ->join('category_product', function ($join) use ($category) {
                    $join->on('category_product.product_id', '=', 'products.id')
                    ->where('category_product.category_id', '=', $category->id);
                })
                ->join('product_images', function ($join) {
                    $join->on('product_images.product_id', '=', 'products.id')
                    ->where('product_images.type', '=', 'base');
                })
                ->select('category_product.category_id','product_images.image','product_translations.product_name','product_translations.description','products.*')
                ->orderBy('products.id','DESC')
                ->get();
        }elseif ($request->condition=='low_to_high') {
            $products =  DB::table('products')
                ->join('product_translations', function ($join) use ($locale) {
                    $join->on('product_translations.product_id', '=', 'products.id')
                    ->where('product_translations.local', '=', $locale);
                })
                ->join('category_product', function ($join) use ($category) {
                    $join->on('category_product.product_id', '=', 'products.id')
                    ->where('category_product.category_id', '=', $category->id);
                })
                ->join('product_images', function ($join) {
                    $join->on('product_images.product_id', '=', 'products.id')
                    ->where('product_images.type', '=', 'base');
                })
                ->select('category_product.category_id','product_images.image','product_translations.product_name','product_translations.description','products.*')
                ->addSelect(DB::raw('IF(is_special=0, price, special_price ) AS current_price'))
                ->orderBy('current_price','ASC')
                ->get();
        }elseif ($request->condition=='high_to_low') {
            $products =  DB::table('products')
                ->join('product_translations', function ($join) use ($locale) {
                    $join->on('product_translations.product_id', '=', 'products.id')
                    ->where('product_translations.local', '=', $locale);
                })
                ->join('category_product', function ($join) use ($category) {
                    $join->on('category_product.product_id', '=', 'products.id')
                    ->where('category_product.category_id', '=', $category->id);
                })
                ->join('product_images', function ($join) {
                    $join->on('product_images.product_id', '=', 'products.id')
                    ->where('product_images.type', '=', 'base');
                })
                ->select('category_product.category_id','product_images.image','product_translations.product_name','product_translations.description','products.*')
                ->addSelect(DB::raw('IF(is_special=0, price, special_price ) AS current_price'))
                ->orderBy('current_price','DESC')
                ->get();
        }

        $html = $this->shortedProductShow($category,$products);
        return response()->json($html);

        return view('frontend.pages.category_wise_products',compact('category','products'));
    }


    public function categoryWisePriceRangeProducts(Request $request)
    {
        // return response()->json($request->category_slug);

        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }
        App::setLocale($locale);

        $data = explode(" ",$request->amount);
        $data_amount_first = explode("$",$data[0]);
        $data_amount_last = explode("$",$data[2]);

        $min_price =  $data_amount_first[1];
        $max_price =   $data_amount_last[1];

        $locale = Session::get('currentLocal');

        $category = Category::with('catTranslation','categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish',
                            'categoryProduct.productBaseImage','categoryProduct.additionalImage','child.catTranslation','child.categoryTranslationDefaultEnglish')
                    ->where('slug',$request->category_slug)
                    ->first();

        $products =  DB::table('products')
                ->join('product_translations', function ($join) use ($locale) {
                    $join->on('product_translations.product_id', '=', 'products.id')
                    ->where('product_translations.local', '=', $locale);
                })
                ->join('category_product', function ($join) use ($category) {
                    $join->on('category_product.product_id', '=', 'products.id')
                    ->where('category_product.category_id', '=', $category->id);
                })
                ->join('product_images', function ($join) {
                    $join->on('product_images.product_id', '=', 'products.id')
                    ->where('product_images.type', '=', 'base');
                })
                ->select('category_product.category_id','product_images.image','product_translations.product_name','product_translations.description','products.*')
                ->whereBetween('products.price', [$min_price, $max_price])
                ->get();

        $html = $this->shortedProductShow($category,$products);

        return response()->json($html);


        return view('frontend.pages.category_wise_products',compact('category','products'));
    }


    protected function shortedProductShow($category,$products)
    {

        $html = '';
        foreach ($products as $item) {
            $imageurl = url("public/".$item->image);

            $html .= '<form class="addToCart">
                        <input type="hidden" name="product_id" value="'.$item->id.'">
                        <input type="hidden" name="product_slug" value="'.$category->slug.'">
                        <input type="hidden" name="category_id" value="'.$category->id.'">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="_token" value="'.csrf_token().'">';

            $html .=    '<div class="product-grid-item">
                            <div class="single-product-wrapper">
                                <div class="single-product-item">';
                                if ($item->image!=NULL){
                        $html .= '<img src="'.$imageurl.'" alt="...">';
                                }else{
                        $html .= '<img src="'.url('public/images/empty.jpg').'" alt="...">';
                                }

                                if (($item->qty==0) || ($item->in_stock==0)){
                        $html .=    '<div class="product-promo-text style1">
                                        <span>Stock Out</span>
                                    </div>';
                                }


                        $html .= '<div class="product-overlay">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#'.$item->slug.'"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                    </a>
                                    <a href="wishlist.html">
                                        <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-details">
                                <a class="product-name" href="">
                                    '.$item->product_name.'
                                </a>
                                <div class="product-short-description">
                                        '.$item->description.'
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
                                            if ($item->special_price!=NULL && $item->special_price>0 && $item->special_price < $item->price){
                                                $html .= '<span class="promo-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                                $html .= '<span class="old-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                            }else{
                                                $html .= '<span class="price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '').'</span>';
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
                                if ($item->special_price!=NULL && $item->special_price>0 && $item->special_price < $item->price){
                                        $html .= '<span class="promo-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                        $html .= '<span class="old-price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                }else {
                                    $html .= '<span class="price">'.env('DEFAULT_CURRENCY_SYMBOL').' '.number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '').'</span>';
                                }

                                $html .= '</div>
                                <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i>Add to cart</button>
                                <div class="d-flex justify-content-between">
                                    <a href="wishlist.html">
                                        <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span> Wishlist
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>';
        }
        return $html;
    }
}
