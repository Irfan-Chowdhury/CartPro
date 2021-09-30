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
// use Cart;
// use Gloudemans\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $locale = Session::get('currentLocal');

        // $languages = Language::orderBy('language_name','ASC')->get();

        // $currency_codes = CurrencyRate::select('currency_code')->get();
        // $storefront_images = StorefrontImage::select('title','type','image')->get();

        // $empty_image = 'public/images/empty.jpg';

        // //Logo
        // $favicon_logo_path = $empty_image;
        // $header_logo_path  = $empty_image;
        // foreach ($storefront_images as $key => $item) {
        //     if ($item->title=='favicon_logo'){
        //         $favicon_logo_path = 'public'.$item->image;
        //     }
        //     elseif ($item->title=='header_logo') {
        //        $header_logo_path  = 'public'.$item->image;
        //     }
        // }

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
        $product_tab_one_section_1 = [];
        $product_tab_one_section_2 = [];
        $product_tab_one_section_3 = [];
        $product_tab_one_section_4 = [];

        foreach ($settings as $key => $setting)
        {
            if ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    $product_tab_one_section_1 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                                                                ->where('category_id',$setting->plain_value)->get();
                    if (empty($product_tab_one_section_1)) { //if category_products matched but the category_id doesn't exists in category_product table
                        $product_tab_one_section_1 = [];
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    $product_tab_one_section_2 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                                                                ->where('category_id',$setting->plain_value)->get();
                        if (empty($product_tab_one_section_2)){
                            $product_tab_one_section_2 = [];
                        }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_3_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    $product_tab_one_section_3 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                                                                ->where('category_id',$setting->plain_value)->get();
                        if (empty($product_tab_one_section_3)) {
                            $product_tab_one_section_3 = [];
                        }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }

            if ($setting->key=='storefront_product_tabs_1_section_tab_4_category_id' && $setting->plain_value!=NULL) {
                if ($settings[$key-1]->plain_value=='category_products') {
                    $product_tab_one_section_4 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
                                                                ->where('category_id',$setting->plain_value)->get();
                    if (empty($product_tab_one_section_4)) {
                        $product_tab_one_section_4 = [];
                    }
                }
                $product_tabs_one_titles[] = $settings[($key-2)]->key;
            }
        }

        //------Test --------

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


        $brands = Brand::where('is_active',1)
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','DESC')
                        ->get();

        return view('frontend.pages.home',compact('locale','settings','sliders','slider_banners','categories',
                                                'brands','product_tab_one_section_1','product_tab_one_section_2','product_tab_one_section_3','product_tab_one_section_4','product_tabs_one_titles'));
    }


    public function product_details($product_slug, $category_id)
    {
        // return Cart::content();
        // return Cart::destroy();

        // // $data = [];
        // foreach ($carts as $key => $value) {
        //     $data = $value->options->image;
        // }
        // return $data;

        $product = Product::with(['productTranslation','productTranslationEnglish','categories','productCategoryTranslation','tags','brand','brandTranslation','brandTranslationEnglish',
                    'baseImage'=> function ($query){
                        $query->where('type','base')
                            ->first();
                    },
                    'additionalImage'=> function ($query){
                        $query->where('type','additional')
                            ->get();
                    },
                    ])
                    ->where('slug',$product_slug)
                    ->first();

        $category = Category::with('catTranslation','categoryTranslationDefaultEnglish')->find($category_id);

        return view('frontend.pages.product_details',compact('product','category'));
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
