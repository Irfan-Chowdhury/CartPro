<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SettingTranslation;
use App\Models\Slider;
use App\Models\StorefrontGeneral;
use App\Models\StorefrontMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StoreFrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $locale = Session::get('currentLocal');
        // $locale = 'bn';
        $colors = $this->color();

        // $menus = Menu::where('is_active',1)->get();
        // $storefrontMenu = StorefrontMenu::first();
        // $slider = Slider::where('is_active',1)->get();
        // $pages = Page::where('is_active',1)->get();
        // $general_slider = StorefrontGeneral::first();


        $setting = Setting::with(['settingTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])->get();

        // return $setting;

        $pages = Page::with(['pageTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        //change local
        $products = Product::with(['productTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $menus = Menu::with(['menuTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
                ->orWhere('locale','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        // return $pages;


        // $settingTranslation = SettingTranslation::where('locale',$locale)->orWhere('locale','en')->get();
        // return $setting[0]->settingTranslations;
        //return $setting[1]->plain_value;

        return view('admin.pages.storefront.index',compact('locale','colors','setting','pages','products','menus'));
    }

    public function generalStore(Request $request)
    {
        $locale = Session::get('currentLocal');

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key === 'storefront_welcome_text' || $key === 'storefront_address') {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>$value]);
                }
            }
            //return response()->json($data);

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function menuStore(Request $request)
    {
        //return response()->json($request->all());
        $locale = Session::get('currentLocal');

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key === 'storefront_navbar_text' || $key ==='storefront_footer_menu_title_one' || $key ==='storefront_footer_menu_title_two') {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>$value]);
                }
            }
            //return response()->json($data);

            return response()->json(['success'=>'Data Saved Successfully']);
        }

        // DB::table('storefront_menus')
        // ->updateOrInsert(
        //     ['id' => 1], //condition
        //     [
        //         'navbar_text'           => htmlspecialchars($request->navbar_text),
        //         'primary_menu_id'       => $request->primary_menu_id,
        //         'category_menu_id'      => $request->category_menu_id,
        //         'footer_menu_title_one' => htmlspecialchars($request->footer_menu_title_one),
        //         'footer_menu_one_id'    => $request->footer_menu_one_id,
        //         'footer_menu_title_two' => htmlspecialchars($request->footer_menu_title_two),
        //         'footer_menu_two_id'    => $request->footer_menu_two_id,
        //     ]
        // );
        // return redirect()->back();
    }


    protected function color()
    {
        $colors = array(
            [
                'color_name' => 'Blue'
            ],
            [
                'color_name' => 'Black'
            ],
            [
                'color_name' => 'Red'
            ],
            [
                'color_name' => 'Yellow'
            ],
            [
                'color_name' => 'Green'
            ],
            [
                'color_name' => 'Orange'
            ],
            [
                'color_name' => 'Pink'
            ],
        );

        return $colors;
    }
}

