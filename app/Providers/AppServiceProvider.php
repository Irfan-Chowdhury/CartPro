<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\StorefrontImage;
use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Harimayco\Menu\Models\Menus;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }
        App::setLocale($locale);


        $languages = Language::orderBy('language_name','ASC')->get()->keyBy('local');
        $currency_codes = CurrencyRate::select('currency_code')->get();
        $storefront_images = StorefrontImage::select('title','type','image')->get();
        $empty_image = 'public/images/empty.jpg';
        $favicon_logo_path = $empty_image;
        $header_logo_path  = $empty_image;
        foreach ($storefront_images as $key => $item) {
            if ($item->title=='favicon_logo'){
                $favicon_logo_path = 'public'.$item->image;
            }
            elseif ($item->title=='header_logo') {
                $header_logo_path  = 'public'.$item->image;
            }
        }
        //Appereance-->Storefront --> Setting
        $settings = Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();
        $categories = Category::with(['catTranslation','parentCategory','categoryTranslationDefaultEnglish','child'])
                        ->where('parent_id',NULL)
                        ->where('is_active',1)
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','DESC')
                        ->get();

        $menus = Menus::with('items')
                ->where('is_active',1)
                ->get();

        $storefront_theme_color = "#0071df";
        $menu = null;
        $footer_menu_one = null;
        $footer_menu_two = null;
        $footer_menu_one_title = null;
        $footer_menu_title_two = null;
        $storefront_address = null;
        $storefront_facebook_link = null;
        $storefront_twitter_link = null;
        $storefront_instagram_link = null;
        $storefront_youtube_link = null;

        foreach ($settings as $key => $item) {
            if ($item->key=='storefront_theme_color' && $item->plain_value!=NULL) {
                $storefront_theme_color = $item->plain_value;
            }

            if ($item->key=='storefront_primary_menu' && $item->plain_value!=NULL) {
                foreach ($menus as $key2 => $value) {
                    if ($value->id==$item->plain_value) {
                        $menu = $menus[$key2];
                    }
                }
            }

            if ($item->key=='storefront_footer_menu_title_one' && $item->plain_value==NULL) {
                $footer_menu_one_title = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value ?? null;
            }

            if ($item->key=='storefront_footer_menu_one' && $item->plain_value!=NULL) {
                foreach ($menus as $key2 => $value) {
                    if ($value->id==$item->plain_value) {
                        $footer_menu_one = $menus[$key2];
                    }
                }
            }
            if ($item->key=='storefront_footer_menu_title_two' && $item->plain_value==NULL) {
                $footer_menu_title_two = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
            }
            if ($item->key=='storefront_footer_menu_two' && $item->plain_value!=NULL) {
                foreach ($menus as $key2 => $value) {
                    if ($value->id==$item->plain_value) {
                        $footer_menu_two = $menus[$key2];
                    }
                }
            }
            if ($item->key=='storefront_address' && $item->plain_value==NULL) {
                $storefront_address = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
            }

            if ($item->key=='storefront_facebook_link' && $item->plain_value!=NULL) {
                $storefront_facebook_link = $item->plain_value;
            }

            if ($item->key=='storefront_twitter_link' && $item->plain_value!=NULL) {
                $storefront_twitter_link = $item->plain_value;
            }

            if ($item->key=='storefront_instagram_link' && $item->plain_value!=NULL) {
                $storefront_instagram_link = $item->plain_value;
            }

            if ($item->key=='storefront_youtube_link' && $item->plain_value!=NULL) {
                $storefront_youtube_link = $item->plain_value;
            }
        }


        //Cart
        $cart_count = Cart::count();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        $cart_contents = Cart::content();

        //Newslatter
        $setting_newslatter = SettingNewsletter::first();

        $setting_store =  SettingStore::first();
        if (Auth::check()) {
            $total_wishlist = Wishlist::where('user_id',Auth::user()->id)->count();
        }else {
            $total_wishlist = 0;
        }

        View::share(['languages'=>$languages,
                    'currency_codes'=>$currency_codes,
                    'storefront_images'=>$storefront_images,
                    'favicon_logo_path'=>$favicon_logo_path,
                    'header_logo_path'=>$header_logo_path,
                    'settings' => $settings,
                    'categories'=>$categories,
                    'storefront_theme_color'=>$storefront_theme_color,
                    'menus'=>$menus,
                    'menu'=>$menu,
                    'footer_menu_one'=>$footer_menu_one,
                    'footer_menu_two'=>$footer_menu_two,
                    'footer_menu_one_title'=>$footer_menu_one_title,
                    'footer_menu_title_two'=>$footer_menu_title_two,
                    'storefront_address'=>$storefront_address,
                    'cart_count'=>$cart_count,
                    'cart_subtotal'=>$cart_subtotal,
                    'cart_total'=>$cart_total,
                    'cart_contents'=>$cart_contents,
                    'setting_newslatter'=>$setting_newslatter,
                    'total_wishlist'=>$total_wishlist,
                    'locale'=>$locale,
                    'setting_store' => $setting_store,
                    'storefront_facebook_link'=> $storefront_facebook_link,
                    'storefront_twitter_link'=>$storefront_twitter_link,
                    'storefront_instagram_link'=>$storefront_instagram_link,
                    'storefront_youtube_link'=>$storefront_youtube_link,
            ]);
    }
}
