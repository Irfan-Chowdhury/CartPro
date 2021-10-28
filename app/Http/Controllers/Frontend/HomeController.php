<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CurrencyRate;
use App\Models\FlashSale;
use App\Models\Language;
use App\Models\Newsletter AS DBNewslatter;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductTranslation;
use App\Models\Review;
use App\Models\Setting;
use App\Models\SettingGeneral;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\Slider;
use App\Models\StorefrontImage;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Cart;
// use Gloudemans\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Newsletter;

class HomeController extends Controller
{
    public function index()
    {
        // return Cart::content();

        $locale = Session::get('currentLocal');
        $settings = Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();


        $top_categories = Category::with(['catTranslation','parentCategory','categoryTranslationDefaultEnglish','child'])
            ->where('top',1)
            ->where('is_active',1)
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC')
            ->get();



        //Storefront Theme Color
        $storefront_theme_color = "#0071df";

        //Store Front Slider Format
        $store_front_slider_format = 'full_width';

        //Product_Tab_One
        $product_tabs_one_titles = [];
        $product_tab_one_section_1 = [];
        $product_tab_one_section_2 = [];
        $product_tab_one_section_3 = [];
        $product_tab_one_section_4 = [];

        //Flash Sale And Vertical
        $storefront_flash_sale_title = null;
        $active_campaign_flash_id = null;
        $flash_sales = [];
        $storefront_vertical_product_1_title = null;
        $storefront_vertical_product_2_title = null;
        $storefront_vertical_product_3_title = null;
        $vertical_product_1 = [];
        $vertical_product_2 = [];
        $vertical_product_3 = [];

        $category_products = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish',
                                                'productAttributeValues.attributeTranslation','productAttributeValues.attributeTranslationEnglish',
                                                'productAttributeValues.attrValueTranslation','productAttributeValues.attrValueTranslationEnglish')
                                            ->get();

        //Slider
        $sliders = Cache::remember('sliders', 150, function () use ($locale) {
            return Slider::with(['sliderTranslation'=> function ($query) use ($locale){
                $query->where('locale',$locale)
                ->orWhere('locale','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC')
            ->get();
        });

        //Slider Banner
        $slider_banners = $this->getSliderBanner($settings);
        // $slider_banners = [];
        // $i = 0;
        // $slider_banner_loop = 'start';

        foreach ($settings as $key => $setting)
        {
            //Theme Color
            if ($setting->key=='storefront_theme_color' && $setting->plain_value!=NULL) {
                $storefront_theme_color = $setting->plain_value;
            }

            if ($setting->key=='store_front_slider_format' && $setting->plain_value!=NULL) {
                $store_front_slider_format = $setting->plain_value;
            }

            //Slider_Banner Start
                // if ($setting->key=='storefront_slider_banner_'.($i+1).'_image') {
                //     if ($setting->storeFrontImage) {
                //         $slider_banners[$i]['image'] = $setting->storeFrontImage->image;
                //     }
                // }
                // elseif ($setting->key=='storefront_slider_banner_'.($i+1).'_title') {
                //     $slider_banners[$i]['title'] = $setting->settingTranslations[0]->value;
                // }
                // elseif ($setting->key=='storefront_slider_banner_'.($i+1).'_call_to_action_url') {
                //     $slider_banners[$i]['action_url'] = $setting->plain_value;
                // }
                // elseif ($setting->key=='storefront_slider_banner_'.($i+1).'_open_in_new_window') {
                //     $slider_banners[$i]['new_window'] = $setting->plain_value;
                // }
            //Slider_Banner End


            //----- Category-Product Start -----
            if ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_1[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_2[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_3_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_3[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_4_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_4[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }


            //Flash sale and vertical product
            if ($setting->key=='storefront_flash_sale_title') {
                $storefront_flash_sale_title = $setting->settingTranslation->value ?? $setting->settingTranslationDefaultEnglish->value ?? null;
            }
            if ($setting->key=='storefront_flash_sale_active_campaign_flash_id') {
                $active_campaign_flash_id = $setting->plain_value;
            }

            if ($setting->key=='storefront_vertical_product_1_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_1[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_1_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
            if ($setting->key=='storefront_vertical_product_2_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_2[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_2_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
            if ($setting->key=='storefront_vertical_product_3_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_3[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_3_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
        }


        if ($active_campaign_flash_id) {
            $flash_sales = FlashSale::with('flashSaleTranslation','flashSaleProducts.product.productTranslation','flashSaleProducts.product.baseImage',
                                    'flashSaleProducts.product.additionalImage','flashSaleProducts.product.categoryProduct.categoryTranslation',
                                    'flashSaleProducts.product.productAttributeValues')->where('id',$active_campaign_flash_id)->where('is_active',1)->first();
        }


        $brands = Cache::remember('brands', 150, function () {
            return Brand::where('is_active',1)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','DESC')
                    ->get();
        });

        $order_details = OrderDetail::with('product.categoryProduct.category.catTranslation','product.productTranslation','product.baseImage','product.additionalImage','product.productAttributeValues.attributeTranslation','product.productAttributeValues.attrValueTranslation')
                        ->select('product_id')
                        ->groupBy('product_id')
                        ->selectRaw('SUM(qty) AS qty_of_sold')
                        ->orderBy('qty_of_sold','DESC')
                        ->skip(0)
                        ->take(10)
                        ->get();
        // return $order_details ;

        return view('frontend.pages.home',compact('locale','settings','sliders','slider_banners','top_categories',
                                                'brands','storefront_theme_color','store_front_slider_format','product_tab_one_section_1','product_tab_one_section_2',
                                                'product_tab_one_section_3','product_tab_one_section_4','product_tabs_one_titles',
                                                'storefront_flash_sale_title','flash_sales','storefront_vertical_product_1_title',
                                                'storefront_vertical_product_2_title','storefront_vertical_product_3_title',
                                                'vertical_product_1','vertical_product_2','vertical_product_3','order_details'));
    }


    public function product_details($product_slug, $category_id)
    {
        $product = Product::with(['productTranslation','productTranslationEnglish','categories','productCategoryTranslation','tags','brand','brandTranslation','brandTranslationEnglish',
                    'baseImage'=> function ($query){
                        $query->where('type','base')
                            ->first();
                    },
                    'additionalImage'=> function ($query){
                        $query->where('type','additional')
                            ->get();
                    },'productAttributeValues.attributeTranslation','productAttributeValues.attributeTranslationEnglish',
                    'productAttributeValues.attrValueTranslation','productAttributeValues.attrValueTranslationEnglish',
                    ])
                    ->where('slug',$product_slug)
                    ->first();

        // return $product->avg_rating;

        $attribute = [];
        foreach ($product->productAttributeValues as $value) {
            $attribute[$value->attribute_id]= $value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null;
        }

        // $attribute_names = array_unique($attribute);
        // return $attribute_names;

        $category = Category::with('catTranslation','categoryTranslationDefaultEnglish')->find($category_id);

        $cart = Cart::content()->where('id',$product->id)->where('options.category_id',$category_id ?? null)->first();
        if ($cart) {
            $product_cart_qty = $cart->qty;
        }else {
            $product_cart_qty = null;
        }

        //Review Part
        if (Auth::check()) {
            $user_and_product_exists = DB::table('orders')
            ->join('order_details','order_details.order_id','orders.id')
            ->where('orders.user_id',Auth::user()->id)
            ->where('order_details.product_id',$product->id)
            ->exists();
        }else {
            $user_and_product_exists = null;
        }

        $reviews = DB::table('reviews')
            ->join('users','users.id','reviews.user_id')
            ->where('product_id',$product->id)
            ->select('users.id AS userId','users.first_name','users.last_name','users.image','reviews.comment','reviews.rating','reviews.created_at')
            ->get();
        if (empty($reviews)) {
            $reviews =[];
        }

        return view('frontend.pages.product_details',compact('product','category','product_cart_qty','attribute','user_and_product_exists','reviews'));
    }

    public function dataAjaxSearch(Request $request)
    {
        if ($request->ajax()) {
            $locale = Session::get('currentLocal');
            // $products   = DB::table('products')
            //             ->join('product_translations','product_translations.product_id','products.id')
            //             ->innerjoin('product_images','product_images.product_id','products.id')
            //             // ->where('product_translations.product_name','LIKE', "%samsung%")
            //             ->where('product_translations.product_name','LIKE', "{$request->search_txt}%")
            //             ->select('products.id AS product_id','products.slug','product_translations.product_name')
            //             ->get();

            $products = ProductTranslation::with(['product:id,slug','product.baseImage'=> function($query){
                                return $query->where('type','base');
                            },
                            'product.categoryProduct'])
                            ->where('product_name','LIKE', $request->search_txt.'%')
                            ->where('local',$locale)
                            ->select('product_id','product_name','local')
                            ->get();

            $html = '';
            foreach ($products as $key => $item) {
                if ($item->product->baseImage!=null) {
                    $image_url = url("public".$item->product->baseImage->image);
                    $html .= '<tr><td><a href="product/'.$item->product->slug.'/'.$item->product->categoryProduct[0]->category_id.'"><img src="'.$image_url.'" style="height:35px;width:35px"/>&nbsp'.$item->product_name.'</a></td></tr>';
                }else {
                    $html .= '<tr><td><a href="product/'.$item->product->slug.'/'.$item->product->categoryProduct[0]->category_id.'">'.$item->product_name.'</a></td></tr>';
                }
            }
            return response()->json($html);
        }
    }

    public function newslatterStore(Request $request)
    {
        if ($request->ajax()) {
            // $validator = Validator::make($request->all(),[
            //     'email' => 'required|email|unique:newslatters,email|max:55',
            // ]);

            // if ($validator->fails()){
            //     return response()->json(['type'=>'error','errors' => $validator->errors()]);
            // }

            $newslatter  = new DBNewslatter();
            $newslatter->email = $request->email;
            $newslatter->save();

            // Newsletter::delete($request->email);

            if ( ! Newsletter::isSubscribed($request->email) )
            {
                Newsletter::subscribePending($request->email);
                // return redirect('newsletter')->with('success', 'Thanks For Subscribe');
                return response()->json(['type'=>'success','message'=>'Successfully Subscribed']);
            }
            return response()->json(['type'=>'error']);
        }
    }

    protected function getSliderBanner($settings)
    {
        $slider_banners = [];

        for ($i=0; $i < 3; $i++) {
            foreach ($settings as $item){
                if ($item->key=='storefront_slider_banner_'.($i+1).'_image') {
                    if ($item->storeFrontImage) {
                        $slider_banners[$i]['image'] = $item->storeFrontImage->image;
                    }
                }
                elseif ($item->key=='storefront_slider_banner_'.($i+1).'_title') {
                    $slider_banners[$i]['title'] = $item->settingTranslations[0]->value;
                }
                elseif ($item->key=='storefront_slider_banner_'.($i+1).'_call_to_action_url') {
                    $slider_banners[$i]['action_url'] = $item->plain_value;
                }
                elseif ($item->key=='storefront_slider_banner_'.($i+1).'_open_in_new_window') {
                    $slider_banners[$i]['new_window'] = $item->plain_value;
                }
            }
        }

        return $slider_banners;
    }

    public function reviewStore(Request $request)
    {
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->status = 'pending';
        $review->save();


        $product_review = Review::where('product_id',$request->product_id)
                        ->where('status','approved')
                        ->select(DB::raw('count(*) as product_count, sum(rating) as product_rating'))
                        ->first();
        $product_avg_rating = $product_review->product_rating / $product_review->product_count;
        $product_avg_rating = number_format((float)$product_avg_rating, 2, '.', '');

        $product = Product::find($request->product_id);
        $product->avg_rating = $product_avg_rating;
        $product->update();

        return redirect()->back();
    }
}












       // foreach ($settings as $key => $setting)
        // {
        //     if ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
        //         return 'ok';
        //         if ($settings[$key-1]->plain_value=='category_products') {

        //             // return $settings[$key-1]->plain_value;
        //             // $product_tab_one_section_1 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //             // ->where('category_id',$setting->plain_value)->get();

        //             $product_tab_one_section_1 = Cache::remember('category_product', 150, function () use ($setting) {
        //                 return CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                 ->where('category_id',$setting->plain_value)->get();
        //             });

        //             if (empty($product_tab_one_section_1)) { //if category_products matched but the category_id doesn't exists in category_product table
        //                 $product_tab_one_section_1 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_2 = Cache::remember('category_product', 150, function () use ($setting) {
        //                 return CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                         ->where('category_id',$setting->plain_value)->get();
        //             });
        //             if (empty($product_tab_one_section_2)){
        //                 $product_tab_one_section_2 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_3_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_3 = Cache::remember('category_product', 150, function () use ($setting) {
        //                 return CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                                         ->where('category_id',$setting->plain_value)->get();
        //             });
        //             if (empty($product_tab_one_section_3)) {
        //                 $product_tab_one_section_3 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_4_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_4 =  Cache::remember('category_product', 150, function () use ($setting) {
        //                 return CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                         ->where('category_id',$setting->plain_value)->get();
        //             });
        //             if (empty($product_tab_one_section_4)) {
        //                 $product_tab_one_section_4 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }
