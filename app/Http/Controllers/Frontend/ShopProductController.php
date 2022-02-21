<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopProductController extends Controller
{
    public function index()
    {
        $locale = Session::get('currentLocal');
        App::setLocale(Session::get('currentLocal'));

        $products = DB::table('products')
                    ->join('product_translations', function ($join) use ($locale) {
                        $join->on('product_translations.product_id', '=', 'products.id')
                        ->where('product_translations.local', '=', $locale);
                    })
                    ->leftJoin('brand_translations', function ($join) use ($locale) {
                        $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                        ->where('brand_translations.local', '=', $locale);
                    })
                    ->join('product_images', function ($join) {
                        $join->on('product_images.product_id', '=', 'products.id')
                        ->where('product_images.type', '=', 'base');
                    })
                    ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                    ->where('is_active',1)
                    ->orderBy('products.id','ASC')
                    ->get();

        $product_images = ProductImage::select('product_id','image','type')->get();

        $category_product =  CategoryProduct::get();
        $category_ids = [];
        foreach ($products as $key => $item) {
            foreach ($category_product as $key => $value) {
                if ($item->id==$value->product_id) {
                    $category_ids[$item->id] = $category_product[$key];
                    break;
                }
            }
        }

        $product_attr_val = Product::with('productAttributeValues','brandTranslation')
                    ->orderBy('id','DESC')
                    ->get();

        return view('frontend.pages.shop_products',compact('products','product_images','category_ids','product_attr_val'));
    }

    public function limitShopProductShow(Request $request)
    {

        $locale = Session::get('currentLocal');

        $products = DB::table('products')
                ->join('product_translations', function ($join) use ($locale) {
                    $join->on('product_translations.product_id', '=', 'products.id')
                    ->where('product_translations.local', '=', $locale);
                })
                ->leftJoin('brand_translations', function ($join) use ($locale) {
                    $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                    ->where('brand_translations.local', '=', $locale);
                })
                ->join('product_images', function ($join) {
                    $join->on('product_images.product_id', '=', 'products.id')
                    ->where('product_images.type', '=', 'base');
                })
                ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                ->where('is_active',1)
                ->orderBy('products.id','ASC')
                ->limit($request->limit_data)
                ->get();

        $category_product =  CategoryProduct::get();
        $category_ids = [];
        foreach ($products as $key => $item) {
            foreach ($category_product as $key => $value) {
                if ($item->id==$value->product_id) {
                    $category_ids[$item->id] = $category_product[$key];
                    break;
                }
            }
        }


        $html = $html = $this->productsShowSortby($category_ids, $products);
        return response()->json($html);
    }

    public function shopProductsShowSortby(Request $request)
    {
        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }


        if ($request->condition=='latest') {
            $products =  DB::table('products')
                            ->join('product_translations', function ($join) use ($locale) {
                                $join->on('product_translations.product_id', '=', 'products.id')
                                ->where('product_translations.local', '=', $locale);
                            })
                            ->leftJoin('brand_translations', function ($join) use ($locale) {
                                $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                                ->where('brand_translations.local', '=', $locale);
                            })
                            ->join('product_images', function ($join) {
                                $join->on('product_images.product_id', '=', 'products.id')
                                ->where('product_images.type', '=', 'base');
                            })
                            ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->orderBy('products.id','DESC')
                            ->get();
        }elseif ($request->condition=='low_to_high') {
            $products =  DB::table('products')
                            ->join('product_translations', function ($join) use ($locale) {
                                $join->on('product_translations.product_id', '=', 'products.id')
                                ->where('product_translations.local', '=', $locale);
                            })
                            ->leftJoin('brand_translations', function ($join) use ($locale) {
                                $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                                ->where('brand_translations.local', '=', $locale);
                            })
                            ->join('product_images', function ($join) {
                                $join->on('product_images.product_id', '=', 'products.id')
                                ->where('product_images.type', '=', 'base');
                            })
                            ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->addSelect(DB::raw('IF(is_special=0, price, special_price ) AS current_price'))
                            ->orderBy('current_price','ASC')
                            ->get();
        }elseif ($request->condition=='high_to_low') {
            $products =  DB::table('products')
                            ->join('product_translations', function ($join) use ($locale) {
                                $join->on('product_translations.product_id', '=', 'products.id')
                                ->where('product_translations.local', '=', $locale);
                            })
                            ->leftJoin('brand_translations', function ($join) use ($locale) {
                                $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                                ->where('brand_translations.local', '=', $locale);
                            })
                            ->join('product_images', function ($join) {
                                $join->on('product_images.product_id', '=', 'products.id')
                                ->where('product_images.type', '=', 'base');
                            })
                            ->select('products.*','product_images.image','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->addSelect(DB::raw('IF(is_special=0, price, special_price ) AS current_price'))
                            ->orderBy('current_price','DESC')
                            ->get();
        }

        $category_product =  CategoryProduct::get();
        $category_ids = [];
        foreach ($products as $key => $item) {
            foreach ($category_product as $key => $value) {
                if ($item->id==$value->product_id) {
                    $category_ids[$item->id] = $category_product[$key];
                    break;
                }
            }
        }

        $html = $this->productsShowSortby($category_ids, $products);
        return response()->json($html);
    }


    protected function productsShowSortby($category_ids,$products)
    {
        $CHANGE_CURRENCY_SYMBOL = env('USER_CHANGE_CURRENCY_SYMBOL');
        if ($CHANGE_CURRENCY_SYMBOL==NULL) {
            $CHANGE_CURRENCY_SYMBOL = NULL;
        }
        $CURRENCY_SYMBOL = $CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL');

        $html = '';

        foreach ($products as $item) {
            $imageurl = url("public/".$item->image);

            $html .= '<form class="addToCart">
                        <input type="hidden" name="product_id" value="'.$item->id.'">
                        <input type="hidden" name="product_slug" value="'.$item->slug.'">
                        <input type="hidden" name="category_id" value="'.$category_ids[$item->id]->category_id.'">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="_token" value="'.csrf_token().'">';


            $html .=    '<div class="product-grid-item">
                            <div class="single-product-wrapper">
                                <div class="single-product-item">';
                                if ($item->type=='base'){
                        $html .= '<img src="'.$imageurl.'" alt="...">';
                                }else{
                        $html .= '<img src="'.url('public/images/empty.jpg').'" alt="...">';
                                }

                                if (($item->manage_stock==1 && $item->qty==0) || ($item->in_stock==0)){
                        $html .=    '<div class="product-promo-text style1">
                                        <span>Stock Out</span>
                                    </div>';
                                }


                        $html .= '<div class="product-overlay">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#'.$item->slug.'"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>';
                                    if(Auth::check()){
                                        $html .=  '<a><span class="ti-heart add_to_wishlist" data-product_id="'.$item->id.'" data-product_slug="'.$item->slug.'" data-category_id="'.$category_ids[$item->id]->category_id.'" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }else{
                                        $html .=  '<a><span class="ti-heart forbidden_wishlist" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }

                            $html .='</div>
                            </div>
                            <div class="product-details">
                                <a class="product-name" href="">
                                    '.$item->product_name.'
                                </a>
                                <div class="product-short-description">
                                        '.$item->short_description.'
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="rating-summary">
                                            <div class="rating-result" title="60%">
                                                <ul class="product-rating">';
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<= round($item->avg_rating)){
                                                            $html .= '<li><i class="las la-star"></i></li>';
                                                        }else {
                                                            $html .= '<li><i class="lar la-star"></i></li>';
                                                        }
                                                    }
                                                $html .= '</ul>
                                            </div>
                                        </div>
                                        <div class="product-price">';
                                            if ($item->special_price!=NULL && $item->special_price>0 && $item->special_price < $item->price){
                                                $html .= '<span class="promo-price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->special_price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                                $html .= '<span class="old-price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                            }else{
                                                $html .= '<span class="price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                            }
                                    $html .='</div>
                                    </div>';
                                    if (($item->manage_stock==1 && $item->qty==0) || ($item->in_stock==0)){
                                        $html .=  '<button class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Stock Out"><i class="las la-cart-plus"></i></button>';
                                    }else {
                                        $html .=  '<button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>';
                                    }
                                $html .= '</div>
                            </div>
                            <div class="product-options">
                                <div class="product-price mt-2">';
                                if ($item->special_price!=NULL && $item->special_price>0 && $item->special_price < $item->price){
                                        $html .= '<span class="promo-price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->special_price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                        $html .= '<span class="old-price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                }else {
                                    $html .= '<span class="price">'.$CURRENCY_SYMBOL.' '.number_format((float)$item->price * env('USER_CHANGE_CURRENCY_RATE'), env('FORMAT_NUMBER'), '.', '').'</span>';
                                }

                                $html .= '</div>';
                                if (($item->manage_stock==1 && $item->qty==0) || ($item->in_stock==0)){
                                    $html .='<button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i>Add to cart</button>';
                                }else{
                                    $html .='<button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title=Out of Stock"><i class="las la-cart-plus"></i></button>';
                                }
                                $html .='<div class="d-flex justify-content-between">';
                                    if(Auth::check()){
                                        $html .=  '<a><span class="ti-heart add_to_wishlist"  data-product_id="'.$item->id.'" data-product_slug="'.$item->slug.'" data-category_id="'.$category_ids[$item->id]->category_id.'" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }else{
                                        $html .=  '<a><span class="ti-heart forbidden_wishlist" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }
                                $html .= '</div>
                            </div>
                            </div>
                        </div>
                    </form>';
        }
        return $html;
    }
}
