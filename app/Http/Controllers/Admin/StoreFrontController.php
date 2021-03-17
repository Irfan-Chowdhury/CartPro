<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Slider;
use App\Models\StorefrontGeneral;
use App\Models\StorefrontMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreFrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $colors = $this->color();

        $menus = Menu::where('is_active',1)->get();
        $storefrontMenu = StorefrontMenu::first();
        $slider = Slider::where('is_active',1)->get();
        $pages = Page::where('status',1)->get();
        $general_slider = StorefrontGeneral::first();

        // return view('admin.pages.storefront.index',compact('menus','storefrontMenu','slider','pages','general_slider'));
        return view('admin.pages.storefront.index',compact('menus','storefrontMenu','slider','pages','general_slider','colors'));
    }

    public function generalStore(Request $request)
    {
        DB::table('storefront_generals')
        ->updateOrInsert(
            ['id' => 1], //condition
            [
                'welcome_text'         => htmlspecialchars($request->welcome_text), 
                'theme_color'          => $request->theme_color,
                'mail_theme_color'     => $request->mail_theme_color,
                'slider_id'            => $request->slider_id,
                'terms_condition'      => $request->terms_condition,
                'privacy_policy_page'  => $request->privacy_policy_page,
                'address'              => htmlspecialchars($request->address),
            ]
        );

        return redirect()->back();
    }

    public function menuStore(Request $request)
    {
        DB::table('storefront_menus')
        ->updateOrInsert(
            ['id' => 1], //condition
            [
                'navbar_text'           => htmlspecialchars($request->navbar_text), 
                'primary_menu_id'       => $request->primary_menu_id,
                'category_menu_id'      => $request->category_menu_id,
                'footer_menu_title_one' => htmlspecialchars($request->footer_menu_title_one),
                'footer_menu_one_id'    => $request->footer_menu_one_id,
                'footer_menu_title_two' => htmlspecialchars($request->footer_menu_title_two),
                'footer_menu_two_id'    => $request->footer_menu_two_id,
            ]
        );

        return redirect()->back();
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

