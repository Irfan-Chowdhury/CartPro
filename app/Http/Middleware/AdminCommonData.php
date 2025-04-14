<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\FooterDescription;
use App\Models\Language;
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

        // $setting = app('setting');

        // $setting = Cache::remember('storeFrontSetting', now()->addHours(1), function () {
        //     return app('setting');
        // });


        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');

        // $changeCurrencyRate = Session::has('currency_rate') ? Session::get('currency_rate') : 1;
        // Session::put('currency_rate', $changeCurrencyRate);


        // $settingStore =  SettingStore::first();

        self::adminImage($storefrontImages);


        return $next($request);
    }

    private function adminImage($storefrontImages)
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
}
