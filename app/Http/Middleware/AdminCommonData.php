<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\FooterDescription;
use App\Models\Language;
use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\StorefrontImage;
use App\Models\Tag;
use App\Models\Wishlist;
use App\Services\HeaderService;
use App\Traits\Temporary\SettingHomePageSeoTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AdminCommonData
{

    public function handle(Request $request, Closure $next)
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');

        $orders = Order::get();

        $storeSetting = SettingStore::first();
        $adminLogo = isset($storeSetting->admin_logo) && file_exists(public_path($storeSetting->admin_logo)) ? asset($storeSetting->admin_logo) :  'https://dummyimage.com/221.6x221.6/12787d/ffffff&text=AdminLogo';
        // dd($adminLogo);




        self::adminLogo($storefrontImages);

        self::headerSection($orders, $adminLogo);
        self::sidebarSection($adminLogo);


        return $next($request);
    }

    private function adminLogo($storefrontImages)
    {
        $faviconLogoPath = file_exists(public_path($storefrontImages['favicon_logo']->image)) ? asset($storefrontImages['favicon_logo']->image) :  'https://dummyimage.com/221.6x221.6/12787d/ffffff&text=CartPro';

        view()->composer([
            'admin.main',
            'admin.auth.login'
        ], function ($view) use (
                $faviconLogoPath,
        ) {
            $view->with([
                'faviconLogoPath' => $faviconLogoPath,
            ]);
        });
    }

    private function headerSection(object $orders, string $adminLogo)
    {
        view()->composer([
            'admin.includes.header',
        ], function ($view) use (
                $orders,
                $adminLogo
        ) {
            $view->with([
                'orders' => $orders,
                'adminLogo' => $adminLogo,
            ]);
        });
    }

    private function sidebarSection(string $adminLogo)
    {
        view()->composer([
            'admin.includes.sidebar',
        ], function ($view) use (
                $adminLogo
        ) {
            $view->with([
                'adminLogo' => $adminLogo
            ]);
        });
    }
}
