<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CurrencyRate;
use App\Models\Language;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StorefrontImage;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $locale = Session::get('currentLocal');
        $languages = Language::orderBy('language_name','ASC')->get();

        //Test

        // $locale = 'xyz';
        // $language = Language::where('local', $locale)->first() ?? Language::where('local', 'en')->first() ?? null;
        // return $language;
        //Test


        $currency_codes = CurrencyRate::select('currency_code')->get();
        $storefront_images = StorefrontImage::select('title','type','image')->get();

        $empty_image = 'public/images/empty.jpg';

        //Logo
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


        // //Product_Tab_One
        $product_tabs_one_titles = [];
        foreach ($settings as $key => $setting) {
            if ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
                $product_tab_one_section_1 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                        ->where('category_id',$setting->plain_value)->get();

                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }
            if ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
                $product_tab_one_section_1 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                        ->where('category_id',$setting->plain_value)->get();

                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }
        }
        // return $product_tabs_one_titles;
        // return  $product_tab_one_section_1[0]->product->brand->brandTranslation;


        //------Test --------

        // ================== Test Category =================================

        // foreach($categories as $category){
        //     if ($category->child->isNotEmpty()){
        //         //  return $category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null;
        //         // return $category->child;
        //         foreach ($category->child as $item){
        //             return $item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null;
        //         }
        //     }else {
        //         return $category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null;
        //     }
        // }
        // ================== Test Category End==============================

        //Slider
        $sliders = Slider::with(['sliderTranslation'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->orderBy('is_active','DESC')
        ->orderBy('id','DESC')
        ->get();

        //Slider Banner
        $slider_banners = $this->getSliderBanner($settings);

        //Menus
        foreach ($settings as $key => $value) {
            if ($value->key=='storefront_primary_menu' && $value->plain_value!=NULL) {
                $menu = Menus::with('items')
                ->where('is_active',1)
                ->where('id',$value->plain_value)
                ->first();
                break;
            }
            else {
                $menu = [];
            }
        }

        $brands = Brand::where('is_active',1)
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','DESC')
                        ->get();

        // $products = Product::with('categories')
        //                 ->orderBy('is_active','DESC')
        //                 ->orderBy('id','DESC')
        //                 ->get();

        $products = DB::table('products')
                    ->join('category_product','category_product.product_id','products.id')
                    ->join('product_translations','product_translations.product_id','products.id')
                    ->where('product_translations.local',$locale)
                    // ->orWhere('product_translations.local','en')
                    ->join('product_images','product_images.product_id','products.id')
                    ->join('categories','category_product.category_id','categories.id')
                    ->join('category_translations','category_translations.category_id','categories.id')
                    ->where('category_translations.local',$locale)
                    // ->orWhere('category_translations.local','en')
                    ->orderBy('products.is_active','DESC')
                    ->orderBy('products.id','DESC')
                    ->select('products.id AS productId', 'products.slug AS productSlug', 'product_translations.product_name','product_images.image AS productImage','products.price','products.special_price','category_translations.category_name')
                    ->get();

        // return $products;

        // return $products[1]->categories;




        // ================== Test ==============================
        //return $menus->menuTranslations;

        //$data = [];
        //$data2 = [];
        // foreach ($menus->menuTranslations as $key => $menuTranslation) {
        //     ////done
        //     // if ($key<1){
        //     //     if ($menuTranslation->locale==$locale){
        //     //         return $menuTranslation->menu_name;
        //     //     }else {
        //     //         return $menuTranslation->menu_name;
        //     //     }
        //     // }
        // }
        // if ($menus->items) {

        // }
        // foreach ($menu->items as $menu_item) {
        //     $data[] =  $menu_item->link.' - '.$menu_item->label;
        //     if($menu_item->child->isNotEmpty()){
        //         // return $menu_item->child;
        //         foreach( $menu_item['child'] as $child ){
        //             if ($child->child) {
        //                 return $child->child;
        //             }
        //             $data2[] = $child['link'].' - '.$child['label'];
        //         }
        //     }else {
        //         return 'Not Execute';
        //     }
        // }
        // // return  $data.' = '.$data2;
        // return  $data;


        // ================== Test ==============================



        return view('frontend.layouts.master',compact('categories','locale','languages','currency_codes','storefront_images',
                                                    'favicon_logo_path','header_logo_path','settings','sliders','slider_banners','menu',
                                                'brands','product_tab_one_section_1','product_tabs_one_titles'));
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
}
