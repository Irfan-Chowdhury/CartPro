<?php

namespace App\Providers;

use App\Models\CurrencyRate;
use App\Models\Language;
use App\Models\Order;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SettingAboutUs;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\StorefrontImage;
use App\Models\Tag;
use App\Models\Wishlist;
use App\Traits\CurrencyConrvertion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Harimayco\Menu\Models\Menus;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Share;
use App\Traits\Temporary\SettingHomePageSeoTrait;
use Illuminate\Notifications\Notification;

class AppServiceProvider extends ServiceProvider
{
    use SettingHomePageSeoTrait, CurrencyConrvertion;

    public function register()
    {
        // Register settings as a singleton
        // $this->app->singleton('settings', function () {
        //     return Setting::with(['translations','storeFrontImage'])->get();
        // });
    }

    public function boot()
    {
        // $default_language = Language::where('default', '=', 1)->first();
        // if(Session::get('currentLocale')){
        //     $currentLocale = Session::get('currentLocale');
        //     Session::put('currentLocale', $currentLocale);
        // }else {
        //     $currentLocale = $default_language->local ?? 'en';
        //     Session::put('currentLocale', $currentLocale);
        // }

        $locale = null; //Session::get('currentLocale');
        $languages = []; //Language::orderBy('language_name','ASC')->get()->keyBy('local');
        $currency_codes = []; //CurrencyRate::select('currency_code')->get();


        // $storefront_images = Cache::remember('storefront_images', 300, function (){
        //     return  StorefrontImage::select('title','type','image')->get();
        // });
        // $storefront_images = StorefrontImage::select('title','type','image')->get();

        $empty_image = 'images/empty.jpg';
        $favicon_logo_path = $empty_image;
        $header_logo_path  = $empty_image;
        $header_db_logo_path  = $empty_image;
        $mail_logo_path    = $empty_image;
        $mail_db_logo_path  = $empty_image;
        $topbar_logo_path  = 'images/top_images.gif';

        $one_column_banner_image  = $empty_image;

        $two_column_banner_image_1  = $empty_image;
        $two_column_banner_image_2  = $empty_image;

        $three_column_banners_image_1  = $empty_image;
        $three_column_banners_image_2  = $empty_image;
        $three_column_banners_image_3  = $empty_image;

        $three_column_full_width_banners_image_1  = $empty_image;
        $three_column_full_width_banners_image_2  = $empty_image;
        $three_column_full_width_banners_image_3  = $empty_image;

        $payment_method_image = $empty_image;

        // foreach ($storefront_images as $key => $item) {

            // elseif ($item->title=='mail_logo') {
            //     if (!file_exists($item->image)) {
            //         $mail_logo_path = 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro';
            //     }else{
            //         $mail_logo_path   = url($item->image);
            //         $mail_db_logo_path = $item->image;
            //     }
            // }
            // //one_column_banner_image
            // elseif ($item->title=='one_column_banner_image') {
            //     if (!file_exists($item->image)) {
            //         $one_column_banner_image = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $one_column_banner_image = url($item->image);
            //     }
            // }

            // //two_column_banner_image
            // elseif ($item->title=='two_column_banner_image_1') {
            //     if (!file_exists($item->image)) {
            //         $two_column_banner_image_1 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $two_column_banner_image_1 = url($item->image);
            //     }
            // }
            // elseif ($item->title=='two_column_banner_image_2') {
            //     if (!file_exists($item->image)) {
            //         $two_column_banner_image_2 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $two_column_banner_image_2 = url($item->image);
            //     }
            // }
            // //three_column_banner_image
            // elseif ($item->title=='three_column_banners_image_1') {
            //     if (!file_exists($item->image)) {
            //         $three_column_banners_image_1 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_banners_image_1 = url($item->image);
            //     }
            // }
            // elseif ($item->title=='three_column_banners_image_2') {
            //     if (!file_exists($item->image)) {
            //         $three_column_banners_image_2 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_banners_image_2 = url($item->image);
            //     }
            // }
            // elseif ($item->title=='three_column_banners_image_3') {
            //     if (!file_exists($item->image)) {
            //         $three_column_banners_image_3 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_banners_image_3 = url($item->image);
            //     }
            // }

            //three_column_banner_image_full
            // elseif ($item->title=='three_column_full_width_banners_image_1') {
            //     if (!file_exists($item->image)) {
            //         $three_column_full_width_banners_image_1 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_full_width_banners_image_1 = url($item->image);
            //     }
            // }
            // elseif ($item->title=='three_column_full_width_banners_image_2') {
            //     if (!file_exists($item->image)) {
            //         $three_column_full_width_banners_image_2 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_full_width_banners_image_2 = url($item->image);
            //     }
            // }
            // elseif ($item->title=='three_column_full_width_banners_image_3') {
            //     if (!file_exists($item->image)) {
            //         $three_column_full_width_banners_image_3 = 'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';
            //     }else{
            //         $three_column_full_width_banners_image_3 = url($item->image);
            //     }
            // }
        // }

        //Appereance-->Storefront --> Setting
        // $settings = Setting::with(['settingTranslation','settingTranslationDefaultEnglish'])->get();

        // $menus = Menus::with('items')
        //         ->where('is_active',1)
        //         ->get();

        // dd($menus);

        $menus = [];
        $storefront_theme_color = "#0071df";
        $storefront_navbg_color = null;
        $storefront_menu_text_color = null;
        $menu = null;
        $footer_menu_one = null;
        $footer_menu_two = null;
        $footer_menu_three = null;
        $footer_menu_one_title = null;
        $footer_menu_title_two = null;
        $footer_menu_title_three = null;
        $storefront_address = null;
        $storefront_facebook_link = null;
        $storefront_twitter_link = null;
        $storefront_instagram_link = null;
        $storefront_youtube_link = null;
        $storefront_copyright_text = null;
        $two_column_banner_enabled = null;
        $three_column_banner_enabled = null;
        $three_column_banner_full_enabled = null;
        $flash_sale_and_vertical_products_section_enabled = null;
        $top_categories_section_enabled = null;
        $terms_and_condition_page_id = null;
        $terms_and_condition_page_slug = null;
        // $storefront_shop_page_enabled = null;
        // $storefront_brand_page_enabled = null;

        $settings  = [];

        foreach ($settings as $key => $item) {
            if ($item->key=='storefront_theme_color' && $item->plain_value!=NULL) {
                $storefront_theme_color = $item->plain_value;
            }
            else if ($item->key=='storefront_navbar_background_color' && $item->plain_value!=NULL) {
                $storefront_navbg_color = $item->plain_value;
            }
            else if ($item->key=='storefront_nav_text_color' && $item->plain_value!=NULL) {
                $storefront_menu_text_color = $item->plain_value;
            }
            elseif ($item->key=='storefront_primary_menu' && $item->plain_value!=NULL) {
                foreach ($menus as $key2 => $value) {
                    if ($value->id==$item->plain_value) {
                        $menu = $menus[$key2];
                    }
                }
            }

            //One Column Enable
            elseif ($item->key=='storefront_one_column_banner_enabled' && $item->plain_value!=NULL) {
                $one_column_banner_enabled = $item->plain_value;
            }
            //Two Column Enable
            elseif ($item->key=='storefront_two_column_banner_enabled' && $item->plain_value!=NULL) {
                $two_column_banner_enabled = $item->plain_value;
            }
            //Three Column Enable
            elseif ($item->key=='storefront_three_column_banners_enabled' && $item->plain_value!=NULL) {
                $three_column_banner_enabled = $item->plain_value;
            }

            //Three Column Full Enable
            elseif ($item->key=='storefront_three_column_full_width_banners_enabled' && $item->plain_value!=NULL) {
                $three_column_banner_full_enabled = $item->plain_value;
            }

            //Flash Sale and Verticle Products end
            elseif ($item->key=='storefront_flash_sale_and_vertical_products_section_enabled' && $item->plain_value!=NULL) {
                $flash_sale_and_vertical_products_section_enabled = $item->plain_value;
            }

            //Top Categories
            elseif ($item->key=='storefront_top_categories_section_enabled' && $item->plain_value!=NULL) {
                $top_categories_section_enabled = $item->plain_value;
            }

            //Tems and condition for checkout page
            elseif ($item->key=='storefront_terms_and_condition_page' && $item->plain_value!=NULL) {
                $terms_and_condition_page_id = $item->plain_value;
            }

            // Footer Tags
            elseif ($item->key=='storefront_footer_tag_id' && $item->plain_value!=NULL) {
                $footer_tag_ids = json_decode($item->plain_value);
            }
        }

        $tags = [];
        // if ($footer_tag_ids) {
        //     $tags = Cache::remember('tags', 300, function () use ($footer_tag_ids) {
        //         return Tag::with('tagTranslations','tagTranslationEnglish')
        //                 ->whereIn('id',$footer_tag_ids)
        //                 ->where('is_active',1)
        //                 ->orderBy('is_active','DESC')
        //                 ->orderBy('id','DESC')
        //                 ->get();
        //     });
        // }

        if ($terms_and_condition_page_id!=null) {
            $terms_and_condition_page_slug = Page::find($terms_and_condition_page_id)->slug;
        }

        //Cart
        $cart_count = Cart::count();
        $cart_subtotal = implode(explode(',',Cart::subtotal()));
        $cart_total = null; //implode(explode(',',Cart::total()));
        $cart_contents = []; //Cart::content();

        //Newslatter
        $setting_newslatter = null; //SettingNewsletter::first();
        $setting_store =  null; //SettingStore::first();

        $total_wishlist = null;
        // if (Auth::check()) {
        //     $total_wishlist = Wishlist::where('user_id',Auth::user()->id)->count();
        // }else {
        //     $total_wishlist = 0;
        // }

        // $orders = Order::get();

        // ============= CURRENCY PART ===========
        // if (!Session::has('currency_code') && !Session::has('currency_symbol') && !Session::has('currency_rate')) {
        //     $DEFAULT_CURRENCY_CODE = env('DEFAULT_CURRENCY_CODE') ?? 'USD';
        //     $CHANGE_CURRENCY_SYMBOL= env('DEFAULT_CURRENCY_SYMBOL') ?? '$';
        //     $CHANGE_CURRENCY_RATE  = env('DEFAULT_CURRENCY_RATE') ?? '1.0';

        //     Session::put('currency_code', $DEFAULT_CURRENCY_CODE);
        // }
        // $DEFAULT_CURRENCY_CODE  = Session::get('currency_code');
        // $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
        // $CHANGE_CURRENCY_RATE   = Session::get('currency_rate');


        // $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
        // $CHANGE_CURRENCY_RATE   = Session::get('currency_rate');


        // Before
        // $CHANGE_CURRENCY_SYMBOL = env('USER_CHANGE_CURRENCY_SYMBOL');
        // if ($CHANGE_CURRENCY_SYMBOL==NULL) {
        //     $CHANGE_CURRENCY_SYMBOL = NULL;
        // }
        // $CHANGE_CURRENCY_RATE = env('USER_CHANGE_CURRENCY_RATE');

        // ============= CURRENCY PART ===========

        //Update it this process in every where in home
        $settings_new = Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish','page'])->get()->keyBy('key');
        $socialShare = Share::page(url()->current(),
                'Social Share'
            )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit()
            ->getRawLinks();


        //Home Page Seo
        $setting_home_page_seo = []; //$this->settingHomePageSeo();


        // ======= This Settings is Updated

        // View::share(['languages'=>$languages,
        //             'currency_codes'=>$currency_codes,
        //             // 'storefront_images'=>$storefront_images,
        //             'favicon_logo_path'=>$favicon_logo_path,
        //             'header_logo_path'=>$header_logo_path,
        //             'header_db_logo_path'=>$header_db_logo_path,
        //             'mail_logo_path'=>$mail_logo_path,
        //             'mail_db_logo_path'=>$mail_db_logo_path,
        //             // 'settings' => $settings,
        //             'storefront_theme_color'=>$storefront_theme_color,
        //             'storefront_navbg_color'=>$storefront_navbg_color,
        //             'storefront_menu_text_color'=>$storefront_menu_text_color,
        //             'menus'=>$menus,
        //             'menu'=>$menu,
        //             'footer_menu_one'=>$footer_menu_one,
        //             'footer_menu_two'=>$footer_menu_two,
        //             'footer_menu_three'=>$footer_menu_three,
        //             'footer_menu_one_title'=>$footer_menu_one_title,
        //             'footer_menu_title_two'=>$footer_menu_title_two,
        //             'footer_menu_title_three'=>$footer_menu_title_three,
        //             'storefront_address'=>$storefront_address,
        //             'cart_count'=>$cart_count,
        //             'cart_subtotal'=>$cart_subtotal,
        //             'cart_total'=>$cart_total,
        //             'cart_contents'=>$cart_contents,
        //             'setting_newslatter'=>$setting_newslatter,
        //             'total_wishlist'=>$total_wishlist,
        //             'locale'=>$locale,
        //             'setting_store' => $setting_store,
        //             'storefront_facebook_link'=> $storefront_facebook_link,
        //             'storefront_twitter_link'=>$storefront_twitter_link,
        //             'storefront_instagram_link'=>$storefront_instagram_link,
        //             'storefront_youtube_link'=>$storefront_youtube_link,
        //             'payment_method_image'=>$payment_method_image,
        //             'storefront_copyright_text'=>$storefront_copyright_text,
        //             'orders'=>$orders,
        //             'topbar_logo_path'=> null, //$topbar_logo_path,
        //             // 'one_column_banner_enabled'=>$one_column_banner_enabled,
        //             'one_column_banner_image'=>$one_column_banner_image,
        //             'two_column_banner_enabled'=>$two_column_banner_enabled,
        //             'two_column_banner_image_1'=>$two_column_banner_image_1,
        //             'two_column_banner_image_2'=>$two_column_banner_image_2,
        //             'three_column_banner_enabled'=>$three_column_banner_enabled,
        //             'three_column_banners_image_1'=>$three_column_banners_image_1,
        //             'three_column_banners_image_2'=>$three_column_banners_image_2,
        //             'three_column_banners_image_3'=>$three_column_banners_image_3,
        //             'three_column_banner_full_enabled'=>$three_column_banner_full_enabled,
        //             'three_column_full_width_banners_image_1'=>$three_column_full_width_banners_image_1,
        //             'three_column_full_width_banners_image_2'=>$three_column_full_width_banners_image_2,
        //             'three_column_full_width_banners_image_3'=>$three_column_full_width_banners_image_3,
        //             // 'CHANGE_CURRENCY_SYMBOL'=> $CHANGE_CURRENCY_SYMBOL,
        //             // 'CHANGE_CURRENCY_RATE'=> $CHANGE_CURRENCY_RATE,
        //             'settings_new'=> $settings_new,
        //             'socialShare'=> $socialShare,
        //             'flash_sale_and_vertical_products_section_enabled'=> $flash_sale_and_vertical_products_section_enabled,
        //             'top_categories_section_enabled'=> $top_categories_section_enabled,
        //             'terms_and_condition_page_slug'=> $terms_and_condition_page_slug,
        //             'tags'=> $tags,
        //             // 'storefront_shop_page_enabled'=> $storefront_shop_page_enabled,
        //             // 'storefront_brand_page_enabled'=> $storefront_brand_page_enabled,
        //             'setting_home_page_seo'=> $setting_home_page_seo,

        //             // New Storefront Settings
        //             // 'storeFrontSettings'=> $storeFrontSettings,
        //     ]);

            $this->app->bind(\App\Payment\IPayPalPayment::class,\App\Payment\PaypalPayment::class);
            $this->app->bind(\App\Payment\IStripePayment::class,\App\Payment\StripePayment::class);
            $this->app->bind(\App\ViewModels\IPaymentModel::class,\App\ViewModels\PaymentModel::class);
    }
}
