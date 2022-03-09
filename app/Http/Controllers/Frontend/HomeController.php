<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CurrencyRate;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use App\Models\KeywordHit;
use App\Models\Language;
use App\Models\Newsletter AS DBNewslatter;
use App\Models\OrderDetail;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Review;
use App\Models\Setting;
use App\Models\SettingCurrency;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Newsletter;
use App\Traits\CurrencyConrvertion;
use App\Traits\ENVFilePutContent;
use App\Traits\FlashSaleProductsIds;
use Illuminate\Support\Facades\File;
use Harimayco\Menu\Models\Menus;

class HomeController extends Controller
{
    use CurrencyConrvertion,ENVFilePutContent, FlashSaleProductsIds;

    public function index()
    {

        //We change the Logic of Flash Sale Products Later

        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }
        App::setLocale($locale);


        Session::put('disable_newslatter',1);
        $locale = Session::get('currentLocal');

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
        $flash_sale_products_ids = [];
        $vertical_product_1 = [];
        $vertical_product_2 = [];
        $vertical_product_3 = [];


        //Settings
        $settings = Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();

        //Bad Practice but we will change this later.
        $flash_sale_products_ids = $this->getFlashSaleProductIds($settings);

        //CategoryProducts
        $category_products = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish',
                                                'productAttributeValues.attributeTranslation','productAttributeValues.attributeTranslationEnglish',
                                                'productAttributeValues.attrValueTranslation','productAttributeValues.attrValueTranslationEnglish')
                                                ->whereNotIn('product_id',$flash_sale_products_ids) //new line
                                                ->get();

        //Slider
        $sliders = Cache::remember('sliders', 150, function () use ($locale) {
            return Slider::with(['category','sliderTranslation'=> function ($query) use ($locale){
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

        foreach ($settings as $key => $setting)
        {
            //Theme Color
            if ($setting->key=='storefront_theme_color' && $setting->plain_value!=NULL) {
                $storefront_theme_color = $setting->plain_value;
            }

            elseif ($setting->key=='store_front_slider_format' && $setting->plain_value!=NULL) {
                $store_front_slider_format = $setting->plain_value;
            }


            //----- Category-Product Start -----
            elseif ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_1[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            elseif ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_2[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            elseif ($setting->key=='storefront_product_tabs_1_section_tab_3_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $product_tab_one_section_3[] =$category_products[$key2];
                        }
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            elseif ($setting->key=='storefront_product_tabs_1_section_tab_4_category_id' && $setting->plain_value!=NULL) {
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
            elseif ($setting->key=='storefront_flash_sale_title') {
                $storefront_flash_sale_title = $setting->settingTranslation->value ?? $setting->settingTranslationDefaultEnglish->value ?? null;
            }
            elseif ($setting->key=='storefront_flash_sale_active_campaign_flash_id') {
                $active_campaign_flash_id = $setting->plain_value;
            }

            elseif ($setting->key=='storefront_vertical_product_1_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_1[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_1_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
            elseif ($setting->key=='storefront_vertical_product_2_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_2[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_2_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
            elseif ($setting->key=='storefront_vertical_product_3_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    foreach ($category_products as $key2 => $value) {
                        if ($value->category_id==$setting->plain_value) {
                            $vertical_product_3[] =$category_products[$key2];
                        }
                    }
                }
                $storefront_vertical_product_3_title = $settings[($key-2)]->settingTranslation->value ?? $settings[($key-2)]->settingTranslationDefaultEnglish->value;
            }
            //Top Brands
            elseif ($setting->key=='storefront_top_brands_section_enabled' && $setting->plain_value!=NULL) {
                $storefront_top_brands_section_enabled = $setting->plain_value ?? null;
            }
            elseif ($setting->key=='storefront_top_brands' && $setting->plain_value!=NULL) {
                $storefront_top_brands = $setting->plain_value;
            }
        }

        //Change this later.
        if ($active_campaign_flash_id) {
            $flash_sales = FlashSale::with(['flashSaleTranslation','flashSaleProducts.product.productTranslation','flashSaleProducts.product.baseImage',
                                    'flashSaleProducts.product.additionalImage','flashSaleProducts.product.categoryProduct.categoryTranslation',
                                    'flashSaleProducts.product.productAttributeValues'])->where('id',$active_campaign_flash_id)->where('is_active',1)->first();
        }

        $brand_ids = json_decode($storefront_top_brands);

        $brands = Brand::whereIn('id',$brand_ids)
                ->where('is_active',1)
                ->orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get();

        $order_details = OrderDetail::with('product.categoryProduct.category.catTranslation','product.productTranslation','product.baseImage','product.additionalImage','product.productAttributeValues.attributeTranslation','product.productAttributeValues.attrValueTranslation')
                        ->whereNotIn('product_id',$flash_sale_products_ids) //new line
                        ->select('product_id')
                        ->groupBy('product_id')
                        ->selectRaw('SUM(qty) AS qty_of_sold')
                        ->orderBy('qty_of_sold','DESC')
                        ->skip(0)
                        ->take(10)
                        ->get();

        return view('frontend.pages.home',compact('locale','settings','sliders','slider_banners',
                                                'brands','storefront_theme_color','store_front_slider_format','product_tab_one_section_1','product_tab_one_section_2',
                                                'product_tab_one_section_3','product_tab_one_section_4','product_tabs_one_titles',
                                                'storefront_flash_sale_title','flash_sales','storefront_vertical_product_1_title',
                                                'storefront_vertical_product_2_title','storefront_vertical_product_3_title',
                                                'vertical_product_1','vertical_product_2','vertical_product_3','order_details','storefront_top_brands_section_enabled'));
    }


    public function product_details($product_slug, $category_id)
    {
        App::setLocale(Session::get('currentLocal'));
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

        $flash_sale_product =  FlashSaleProduct::where('product_id',$product->id)->first() ?? null;

        $attribute = [];
        foreach ($product->productAttributeValues as $value) {
            $attribute[$value->attribute_id]= $value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null;
        }


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


        //Related Products
        $category_products = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish',
                                'productAttributeValues.attributeTranslation','productAttributeValues.attributeTranslationEnglish',
                                'productAttributeValues.attrValueTranslation','productAttributeValues.attrValueTranslationEnglish')
                            ->where('category_id', $category_id)
                            ->get();


        return view('frontend.pages.product_details',compact('product','category','product_cart_qty','attribute','user_and_product_exists','reviews','category_products','flash_sale_product'));
    }

    public function dataAjaxSearch(Request $request)
    {
        if ($request->ajax()) {

            $base_url = url('/');

            $locale = Session::get('currentLocal');
            $products = ProductTranslation::with(['product:id,slug,price','product.baseImage'=> function($query){
                                return $query->where('type','base');
                            },
                            'product.categoryProduct'])
                            ->where('product_name','LIKE', '%'.$request->search_txt.'%')
                            ->where('local',$locale)
                            ->select('product_id','product_name','local')
                            ->get();

            $html = '';
            foreach ($products as $key => $item) {
                if ($item->product->baseImage!=null) {
                    $image_url = url("public".$item->product->baseImage->image);
                    $html .= '<li><a class="d-flex" href="'.$base_url.'/product/'.$item->product->slug.'/'.$item->product->categoryProduct[0]->category_id.'"><img src="'.$image_url.'" style="height:50px;width:50px"/><div><h6>'.$item->product_name.'</h6><span class="price">'.$item->product->price.'</span></div></a></li>';
                }else {
                    $html .= '<li><a class="d-flex" href="'.$base_url.'/product/'.$item->product->slug.'/'.$item->product->categoryProduct[0]->category_id.'">'.$item->product_name.'<br>'.$item->product->price.'</a></li>';
                }
            }
            return response()->json($html);
        }
    }

    public function newslatterStore(Request $request)
    {
        if ($request->ajax()) {

            if ($request->disable_newslatter==1) {
                Session::put('disable_newslatter',1);
            }

            $newslatter  = new DBNewslatter();
            $newslatter->email = $request->email;
            $newslatter->save();

            // Newsletter::delete($request->email);

            if ( ! Newsletter::isSubscribed($request->email) )
            {
                Newsletter::subscribePending($request->email);
                return response()->json(['type'=>'success','message'=>'Successfully Subscribed']);
            }
            return response()->json(['type'=>'error']);
        }
    }

    protected function getSliderBanner($settings)
    {
        $slider_banners = [];
        $empty_image = 'images/empty.jpg';

        for ($i=0; $i < 3; $i++) {
            foreach ($settings as $item){
                if ($item->key=='storefront_slider_banner_'.($i+1).'_image') {
                    if ($item->storeFrontImage) {
                        $slider_banners[$i]['image'] = $item->storeFrontImage->image;
                    }else {
                        $slider_banners[$i]['image'] = $empty_image;
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

    public function defaultLanguageChange($id)
    {
        $language = Language::find($id);

        Session::put('currentLocal', $language->local);

        App::setLocale($language->local);
        return redirect()->back();
    }

    public function test(Request $request)
    {
        // KeywordHit::updatetOrCreate(
        //     ['keyword' =>  request('searchText')],
        //     ['hit' =>   DB::raw('hit+1')]
        // );

        if ($request->ajax()) {
            $dataCheck = KeywordHit::where('keyword',$request->searchText);
            if ($dataCheck->exists()) {
                $get_data = $dataCheck->first();
                $increment = $get_data->hit+1;
                $get_data->update(['hit'=>$increment]);
            }else {
                $keyword_hit = new KeywordHit();
                $keyword_hit->keyword = $request->searchText;
                $keyword_hit->hit = 1;
                $keyword_hit->save();
            }
            return response()->json('ok');
        }
    }

    public function currencyChange($currency_code)
    {
        // $main_amount = 500;
        // $this->CurrencyConvert($main_amount);
        // $this->CurrencySymbol();

        Session::put('currency_code', $currency_code);

        $currency_symbol = $this->CurrencySymbol();
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_SYMBOL',$currency_symbol);
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_RATE',$this->ChangeCurrencyRate());

        return redirect()->back();
    }
}
