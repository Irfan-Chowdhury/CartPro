<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StorefrontImage;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $locale = Session::get('currentLocal');


        $languages = Language::orderBy('language_name','ASC')->get();
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
        $setting = Setting::with(['storeFrontImage','settingTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])->get();

        //----- Test

        $categories = Category::with(['categoryTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        },
        'parentCategory'
        ])
        ->where('is_active',1)
        ->orderBy('is_active','DESC')
        ->orderBy('id','DESC')
        ->get();

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
        $slider_banners = $this->getSliderBanner($setting);

        //Menus
        foreach ($setting as $key => $value) {
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

        // return $menu;

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
                                                    'favicon_logo_path','header_logo_path','setting','sliders','slider_banners','menu'));
    }

    protected function getSliderBanner($setting)
    {
        $slider_banners = [];

        for ($i=0; $i < 3; $i++) {
            foreach ($setting as $item){
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
