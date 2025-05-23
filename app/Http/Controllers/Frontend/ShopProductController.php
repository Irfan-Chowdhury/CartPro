<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use App\Traits\ArrayToObjectConvertionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Traits\ProductPromoBadgeTextTrait;
use Illuminate\Support\Facades\Cache;

class ShopProductController extends Controller
{
    use ProductPromoBadgeTextTrait, ArrayToObjectConvertionTrait;



    public function index()
    {
        // $locale = Session::get('currentLocale');

        $categories = self::getCategrories();

        $attributes = Attribute::select('id','slug','name')
                    ->with('attributeValues:id,attribute_id,name')
                    ->where('is_active',1)
                    ->get();

        $productsData = Product::with([
            // 'translations',
            'categories:id,slug,name',
            'baseImage',
            'additionalImage',
            'brand',
            'attributes' => function ($q) {
                $q->select('id', 'name')
                    ->with(['attributeValues:id,attribute_id,name']);
            }
        ])
        ->where('is_active', 1)
        ->where('deleted_at', null)
        ->whereHas('categories')
        ->get()
        ->filter(function($product) {
            return $product->categories->isNotEmpty();
        })
        ->sortBy(function ($product) {
            return optional($product->categories->first())->id;
        })
        ->values() // reindex after sort
        ->map(function($product){
            return [
                'id' => $product->id,
                'name' => $product->name,
                'categoryId' => optional($product->categories->first())->id,
                'categoryName' => optional($product->categories->first())->name,
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
                // 'brand' => (object) optional($product->brand)->only(['id', 'slug', 'name']),
                'brandName' => $product->brand->name ?? null,
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
                    return [
                        'attributeId' => $attribute->id,
                        'name' => $attribute->name,
                        'attributeValues' => $attribute->attributeValues->map(function($value) {
                            return [
                                'attributeValueId' => $value->id,
                                'name' => $value->name,
                            ];
                        }),
                    ];
                })
            ];
        });


        $totalProducts = $productsData->count();

        $products = $this->arrayToObject($productsData);


        return view('frontend.pages.shop_products',compact(
            'categories',
            'attributes',
            'totalProducts',
            'products'
        ));
















        $products = DB::table('products')
                    ->join('product_translations', function ($join) use ($locale) {
                        $join->on('product_translations.product_id', '=', 'products.id')
                        ->where('product_translations.local', '=', $locale);
                    })
                    ->leftJoin('brand_translations', function ($join) use ($locale) {
                        $join->on('brand_translations.brand_id', '=', 'products.brand_id')
                        ->where('brand_translations.local', '=', $locale);
                    })
                    ->leftJoin('product_images', function ($join) {
                        $join->on('product_images.product_id', '=', 'products.id')
                        ->where('product_images.type', '=', 'base');
                    })
                    ->select('products.*','product_images.image','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                    ->where('products.is_active',1)
                    ->where('products.deleted_at',null)
                    ->orderBy('products.id','ASC')
                    ->get();

        $product_images = ProductImage::select('product_id','image','type')->get();

        $category_product = CategoryProduct::get();

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

        return view('frontend.pages.shop_products',compact(
            'categories',
            'attributes',
            'products',
            'product_images',
            'category_ids',
            'product_attr_val'
        ));
    }

    private function getCategrories()
    {
        $categoriesData = Category::with('translations')
                    ->where('is_active',1)
                    ->where('parent_id',NULL)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','ASC')
                    ->get()
                    ->map(function($category){
                        return [
                            'id'  => $category->id,
                            'name'=> $category->translation->category_name,
                            'slug' => $category->slug,
                        ];
                    });

        return $this->arrayToObject($categoriesData);
    }

    public function limitShopProductShow(Request $request)
    {

        $locale = Session::get('currentLocale');

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
                ->select('products.*','product_images.image','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                ->where('is_active',1)
                ->orderBy('products.id','ASC')
                ->where('products.deleted_at',null)
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


        $html = $html = $this->productsShow($category_ids, $products);
        return response()->json($html);
    }

    public function shopProductsShowSortby(Request $request)
    {
        if(!Session::get('currentLocale')){
            Session::put('currentLocale', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocale');
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
                            ->select('products.*','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->where('products.deleted_at',null)
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
                            ->select('products.*','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->where('products.deleted_at',null)
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
                            ->select('products.*','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
                            ->where('is_active',1)
                            ->addSelect(DB::raw('IF(is_special=0, price, special_price ) AS current_price'))
                            ->orderBy('current_price','DESC')
                            ->where('products.deleted_at',null)
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

        $html = $this->productsShow($category_ids, $products);
        return response()->json($html);
    }

    public function shopProductsSidebarFilter(Request $request)
    {
        $locale = Session::get('currentLocale');

        //Price Related
        $CHANGE_CURRENCY_RATE = (env('USER_CHANGE_CURRENCY_RATE')!= NULL) ? env('USER_CHANGE_CURRENCY_RATE'): 1;
        $data = explode(" ",$request->amount);
        $data_amount_first = explode("$",$data[1]);
        $data_amount_last = explode("$",$data[4]);
        $min_price =  $data_amount_first[0]/$CHANGE_CURRENCY_RATE;
        $max_price =  $data_amount_last[0]/$CHANGE_CURRENCY_RATE;

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
            ->select('products.*','product_images.image_medium','product_images.type','product_translations.product_name','product_translations.short_description','brand_translations.brand_name')
            ->where('is_active',1)
            ->where('products.deleted_at',null)
            ->whereBetween('products.price', [$min_price, $max_price])
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


        //Attribute Related
        $value_ids = array();
        if ($request->attribute_value_ids) {
            $value_ids = explode(",",$request->attribute_value_ids);

            $products = $products->toArray();

            $product_attribute_value =  DB::table('product_attribute_value')
                                        ->select('product_id','attribute_value_id')
                                        ->get()
                                        ->groupBy('product_id')
                                        ->toArray();

            for ($key=0; $key < count($products); $key++) {
                if (array_key_exists($products[$key]->id,$product_attribute_value)){
                    if(count($value_ids)>1) {
                        foreach ($value_ids as $val_id) {
                            $find_match = 0;
                            foreach ($product_attribute_value[$products[$key]->id] as $p_a_v) {
                                if ($p_a_v->attribute_value_id == $val_id) {
                                    $find_match = 1;
                                    break;
                                }
                                else {
                                    $find_match = 0;
                                }
                            }
                            if($find_match == 0) {
                                array_splice($products, $key, 1);
                                $key--;
                                break;
                            }
                        }
                    }
                    else {
                        $find_match = 0;
                        foreach ($product_attribute_value[$products[$key]->id] as $p_a_v) {
                            if ($p_a_v->attribute_value_id == $value_ids[0]) {
                                $find_match = 1;
                                break;
                            }
                        }
                        if($find_match == 0) {
                            array_splice($products, $key, 1);
                            $key--;
                        }
                    }
                }
                else{
                    array_splice($products, $key, 1);
                    $key--;
                }
            }
        }

        $html = $this->productsShow($category_ids, $products);
        return response()->json($html);

    }


    protected function productsShow($category_ids,$products)
    {
        $CHANGE_CURRENCY_SYMBOL = env('USER_CHANGE_CURRENCY_SYMBOL');
        if ($CHANGE_CURRENCY_SYMBOL==NULL) {
            $CHANGE_CURRENCY_SYMBOL = NULL;
        }
        $CURRENCY_SYMBOL = $CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL');

        $html = '';

        foreach ($products as $item) {
            $imageurl = url("public/".$item->image_medium);

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

                        // Product Promo Badge Text
                        $html .= $this->productPromoBadgeText($item->manage_stock, $item->qty, $item->in_stock, date('Y-m-d'), $item->new_to);

                        $html .= '<div class="product-overlay">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#id_'.$item->id.'"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>';
                                    if(Auth::check()){
                                        $html .=  '<a><span class="ti-heart add_to_wishlist" data-product_id="'.$item->id.'" data-product_slug="'.$item->slug.'" data-category_id="'.$category_ids[$item->id]->category_id.'" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }else{
                                        $html .=  '<a><span class="ti-heart forbidden_wishlist" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>';
                                    }

                            $html .='</div>
                            </div>
                            <div class="product-details">
                                <a class="product-name" href="'.url('product/'.$item->slug.'/'. $category_ids[$item->id]->category_id).'">
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
                                    $html .=  '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled tooltip"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>';
                                }else {
                                    $html .=  '<button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>';
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
