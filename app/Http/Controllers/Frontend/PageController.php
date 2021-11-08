<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\StorefrontImage;
use App\Models\Wishlist;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function pageShow($page_slug)
    {
        if(!Session::get('currentLocal')){
            Session::put('currentLocal', 'en');
            $locale = 'en';
        }else {
            $locale = Session::get('currentLocal');
        }
        App::setLocale($locale);

        $page =  Page::with('pageTranslation')->where('slug',$page_slug)->first();

        return view('frontend.pages.page',compact('page'));
    }

    public function aboutUs()
    {
        $page =  Page::with('pageTranslation')->where('slug','about-us')->first();

        return view('frontend.pages.page',compact('page'));
    }

    public function termAndCondition()
    {
        $page =  Page::with('pageTranslation')->where('slug','terms_and_conditions')->first();
        // return $page;

        return view('frontend.pages.page',compact('page'));
    }

    public function faq()
    {
        $page =  Page::with('pageTranslation')->where('slug','faq')->first();

        return view('frontend.pages.page',compact('page'));
    }





    // public function common()
    // {
    //     $languages = Language::orderBy('language_name','ASC')->get();
    //     $currency_codes = CurrencyRate::select('currency_code')->get();
    //     $storefront_images = StorefrontImage::select('id','title','type','image')->get();
    //     $empty_image = 'public/images/empty.jpg';
    //     $favicon_logo_path = $empty_image;
    //     $header_logo_path  = $empty_image;
    //     foreach ($storefront_images as $key => $item) {
    //         if ($item->title=='favicon_logo'){
    //             $favicon_logo_path = 'public'.$item->image;
    //         }
    //         elseif ($item->title=='header_logo') {
    //             $header_logo_path  = 'public'.$item->image;
    //         }
    //     }
    //     $settings = Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();  //target
    //     $categories = Category::with(['catTranslation','parentCategory','categoryTranslationDefaultEnglish','child']) //target
    //                 ->where('parent_id',NULL)
    //                 ->where('is_active',1)
    //                 ->orderBy('is_active','DESC')
    //                 ->orderBy('id','DESC')
    //                 ->get();

    //     $menus = Menus::with('items')
    //             ->where('is_active',1)
    //             ->get();

    //     $menu = null;
    //     $footer_menu_one_title = null;
    //     $footer_menu_title_two = null;
    //     $footer_menu_one = null;
    //     $footer_menu_two = null;
    //     $storefront_address = null;

    //     foreach ($settings as $key => $item) {
    //         if ($item->key=='storefront_primary_menu' && $item->plain_value!=NULL) {
    //             foreach ($menus as $key2 => $value) {
    //                 if ($value->id==$item->plain_value) {
    //                     $menu = $menus[$key2];
    //                 }
    //             }
    //         }

    //         if ($item->key=='storefront_footer_menu_title_one' && $item->plain_value==NULL) {
    //             $footer_menu_one_title = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value ?? null;
    //         }
    //         if ($item->key=='storefront_footer_menu_one' && $item->plain_value!=NULL) {
    //             foreach ($menus as $key2 => $value) {
    //                 if ($value->id==$item->plain_value) {
    //                     $footer_menu_one = $menus[$key2];
    //                 }
    //             }
    //         }

    //         if ($item->key=='storefront_footer_menu_title_two' && $item->plain_value==NULL) {
    //             $footer_menu_title_two = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
    //         }
    //         if ($item->key=='storefront_footer_menu_two' && $item->plain_value!=NULL) {
    //             foreach ($menus as $key2 => $value) {
    //                 if ($value->id==$item->plain_value) {
    //                     $footer_menu_two = $menus[$key2];
    //                 }
    //             }
    //         }

    //         if ($item->key=='storefront_address' && $item->plain_value==NULL) {
    //             $storefront_address = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
    //         }
    //     }

    //     $cart_count = Cart::count();
    //     $cart_subtotal = Cart::subtotal();
    //     $cart_total = Cart::total();
    //     $cart_contents = Cart::content();
    //     $setting_newslatter = SettingNewsletter::first();
    //     //Setting Store
    //     $setting_store =  SettingStore::first();
    //     $total_wishlist = Wishlist::count();

    //     if(!Session::get('currentLocal')){
    //         Session::put('currentLocal', 'en');
    //     }

    //     compact('languages','currency_codes','storefront_images','empty_image','favicon_logo_path',
    //     'header_logo_path','settings','categories','menus','menu','footer_menu_one','footer_menu_two',
    //   'footer_menu_one_title','footer_menu_title_two','storefront_address','cart_count','cart_subtotal',
    //  'cart_total','cart_contents','setting_newslatter','setting_store','total_wishlist');
    // }
}
