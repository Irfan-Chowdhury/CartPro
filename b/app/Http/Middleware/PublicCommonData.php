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
use App\Traits\ArrayToObjectConvertionTrait;
use App\Traits\Temporary\SettingHomePageSeoTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PublicCommonData
{
    use SettingHomePageSeoTrait, ArrayToObjectConvertionTrait;

    public $headerService;
    public function __construct(HeaderService $headerService)
    {
        $this->headerService = $headerService;
    }

    public function handle(Request $request, Closure $next)
    {
        // DB::enableQueryLog();

        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();
        $setting = app('setting');  // q-3

        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title'); //q-1

        // $setting = Cache::remember('storeFrontSetting', now()->addHours(1), function () {
        //     return app('setting');
        // });



        $changeCurrencyRate = Session::has('currency_rate') ? Session::get('currency_rate') : 1;
        Session::put('currency_rate', $changeCurrencyRate);


        $settingStore =  SettingStore::first(); //q-1


        self::masterSection( $storefrontImages, $changeCurrencyRate, $settingStore);



        self::headerSection($setting, $storefrontImages, $changeCurrencyRate);

        self::footerSection($locale, $setting, $storefrontImages, $settingStore);

        self::adminImage($storefrontImages);

        //Home Page
        // self::homeSection($settings, $changeCurrencyRate, $storefrontImages);
        view()->composer([
            'frontend.pages.home'
        ], function ($view) use (
                $changeCurrencyRate,
        ) {
            $view->with([
                'changeCurrencyRate' => $changeCurrencyRate,
            ]);
        });

        // dd(DB::getQueryLog());

        return $next($request);
    }

    private function adminImage($storefrontImages)
    {
        $faviconLogoPath = file_exists(public_path($storefrontImages['favicon_logo']->image)) ? asset($storefrontImages['favicon_logo']->image) :  'https://dummyimage.com/221.6x221.6/12787d/ffffff&text=CartPro';

        view()->composer([
            'admin.auth.login'
        ], function ($view) use (
                $faviconLogoPath,
        ) {
            $view->with([
                'faviconLogoPath' => $faviconLogoPath,
            ]);
        });
    }

    private function homeSection($settings, $changeCurrencyRate, $storefrontImages)
    {
        $settingHomePageSeo = $this->settingHomePageSeo();

        //Setting Translation
        $storefrontFeature_1_Title = $settings->firstWhere('key', 'storefront_feature_1_title')->translation->value ?? null;
        $storefrontFeature_1_Subtitle = $settings->firstWhere('key', 'storefront_feature_1_subtitle')->translation->value ?? null;
        $storefrontFeature_2_Title = $settings->firstWhere('key', 'storefront_feature_2_title')->translation->value ?? null;
        $storefrontFeature_2_Subtitle = $settings->firstWhere('key', 'storefront_feature_2_subtitle')->translation->value ?? null;
        $storefrontFeature_3_Title = $settings->firstWhere('key', 'storefront_feature_3_title')->translation->value ?? null;
        $storefrontFeature_3_Subtitle = $settings->firstWhere('key', 'storefront_feature_3_subtitle')->translation->value ?? null;
        $storefrontFeature_4_Title = $settings->firstWhere('key', 'storefront_feature_4_title')->translation->value ?? null;
        $storefrontFeature_4_Subtitle = $settings->firstWhere('key', 'storefront_feature_4_subtitle')->translation->value ?? null;


        // Seeting Value
        $oneColumnBannerEnabled = $settings->firstWhere('key', 'storefront_one_column_banner_enabled')->plain_value;
        $oneColumnBannerCallToActionURL = $settings->firstWhere('key', 'storefront_one_column_banner_call_to_action_url')->plain_value ?? null;
        $storefrontOneColumnBannerOpenInNewWindow = $settings->firstWhere('key', 'storefront_one_column_banner_open_in_new_window')->plain_value ?? null;
        $storefrontTopBrandsSectionEnabled = $settings->firstWhere('key', 'storefront_top_brands_section_enabled')->plain_value ?? null;
        $storefrontSectionStatus = $settings->firstWhere('key', 'storefront_section_status')->plain_value ?? null;
        $storefrontFeature_1_Icon = $settings->firstWhere('key', 'storefront_feature_1_icon')->plain_value ?? null;
        $storefrontFeature_2_Icon = $settings->firstWhere('key', 'storefront_feature_2_icon')->plain_value ?? null;
        $storefrontFeature_3_Icon = $settings->firstWhere('key', 'storefront_feature_3_icon')->plain_value ?? null;
        $storefrontFeature_4_Icon = $settings->firstWhere('key', 'storefront_feature_4_icon')->plain_value ?? null;


        // StoreFront
        $oneColumnBannerImage = file_exists(public_path($storefrontImages['one_column_banner_image']->image)) ? asset($storefrontImages['one_column_banner_image']->image) :  'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';

        view()->composer([
            'frontend.pages.home'
        ], function ($view) use (
                        $changeCurrencyRate,
                        $settingHomePageSeo,
                        $oneColumnBannerEnabled,
                        $oneColumnBannerCallToActionURL,
                        $storefrontOneColumnBannerOpenInNewWindow,
                        $oneColumnBannerImage,
                        $storefrontTopBrandsSectionEnabled,
                        $storefrontSectionStatus,
                        $storefrontFeature_1_Icon,
                        $storefrontFeature_1_Title,
                        $storefrontFeature_1_Subtitle,
                        $storefrontFeature_2_Icon,
                        $storefrontFeature_2_Title,
                        $storefrontFeature_2_Subtitle,
                        $storefrontFeature_3_Icon,
                        $storefrontFeature_3_Title,
                        $storefrontFeature_3_Subtitle,
                        $storefrontFeature_4_Icon,
                        $storefrontFeature_4_Title,
                        $storefrontFeature_4_Subtitle,
                    ) {
            $view->with([
                'changeCurrencyRate' => $changeCurrencyRate,
                'settingHomePageSeo' => $settingHomePageSeo,
                'oneColumnBannerEnabled' => $oneColumnBannerEnabled,
                'oneColumnBannerCallToActionURL' => $oneColumnBannerCallToActionURL,
                'storefrontOneColumnBannerOpenInNewWindow' => $storefrontOneColumnBannerOpenInNewWindow,
                'oneColumnBannerImage' => $oneColumnBannerImage,
                'storefrontTopBrandsSectionEnabled' => $storefrontTopBrandsSectionEnabled,
                'storefrontSectionStatus' => $storefrontSectionStatus,
                'storefrontFeature_1_Icon' => $storefrontFeature_1_Icon,
                'storefrontFeature_1_Title' => $storefrontFeature_1_Title,
                'storefrontFeature_1_Subtitle' => $storefrontFeature_1_Subtitle,
                'storefrontFeature_2_Icon' => $storefrontFeature_2_Icon,
                'storefrontFeature_2_Title' => $storefrontFeature_2_Title,
                'storefrontFeature_2_Subtitle' => $storefrontFeature_2_Subtitle,
                'storefrontFeature_3_Icon' => $storefrontFeature_3_Icon,
                'storefrontFeature_3_Title' => $storefrontFeature_3_Title,
                'storefrontFeature_3_Subtitle' => $storefrontFeature_3_Subtitle,
                'storefrontFeature_4_Icon' => $storefrontFeature_4_Icon,
                'storefrontFeature_4_Title' => $storefrontFeature_4_Title,
                'storefrontFeature_4_Subtitle' => $storefrontFeature_4_Subtitle,
            ]);
        });
    }

    private function masterSection($storefrontImages, $changeCurrencyRate, $settingStore)
    {

        $faviconLogoPath = file_exists(public_path($storefrontImages['favicon_logo']->image)) ? asset($storefrontImages['favicon_logo']->image) :  'https://dummyimage.com/221.6x221.6/12787d/ffffff&text=CartPro';

        view()->composer([
            'frontend.layouts.master'
        ], function ($view) use (
                        $faviconLogoPath,
                        $changeCurrencyRate,
                        $settingStore,
                    ) {
            $view->with([
                'faviconLogoPath' => $faviconLogoPath,
                'changeCurrencyRate' => $changeCurrencyRate,
                'settingStore' => $settingStore,
            ]);
        });
    }

    private function headerSection($setting, $storefrontImages, $changeCurrencyRate)
    {
        $socialShareLinks = app('socialShareLinks');
        $languages = Language::orderBy('language_name','ASC')->get()->keyBy('local');
        $currencyCodes = CurrencyRate::select('currency_code')->get();


        // Setting Translation
        $welcomeTitle = $setting->storefront_welcome_text->value;

        // Setting Just Value
        $storefrontThemeColor = $setting->storefront_theme_color->plain_value;
        $storefrontNavbgColor = $setting->storefront_navbar_background_color->plain_value;
        $storefrontMenuTextColor = $setting->storefront_nav_text_color->plain_value;
        $storefrontFacebookLink = $setting->storefront_facebook_link->plain_value;
        $storefrontTwitterLink = $setting->storefront_twitter_link->plain_value;
        $storefrontInstagramLink = $setting->storefront_instagram_link->plain_value;
        $storefrontYoutubeLink = $setting->storefront_youtube_link->plain_value;
        $twoColumnBannerEnabled = $setting->storefront_two_column_banner_enabled->plain_value;
        $threeColumnBannersEnabled = $setting->storefront_three_column_banners_enabled->plain_value;
        $topCategoriesSectionEnabled = $setting->storefront_top_categories_section_enabled->plain_value;
        $threeColumnBannerFullEnabled = $setting->storefront_three_column_full_width_banners_enabled->plain_value;
        $flashSaleAndVerticalProductsSectionEnabled = $setting->storefront_flash_sale_and_vertical_products_section_enabled->plain_value;
        $termsAndConditionPageId = $setting->storefront_terms_and_condition_page->plain_value;
        $footerTagIds = $setting->storefront_footer_tag_id->plain_value;
        $storefrontShopPageEnabled = $setting->storefront_shop_page_enabled->plain_value;
        $storefrontBrandPageEnabled = $setting->storefront_brand_page_enabled->plain_value;



        $cartTotal = implode(explode(',',Cart::total()));
        $cartCount = Cart::count();
        $cartContents = Cart::content();


        $totalWishlist = 0;
        if (Auth::check())
            $totalWishlist = Wishlist::where('user_id', Auth::user()->id)->count();


        //StoreFront
        $topbarLogoPath = file_exists(public_path($storefrontImages['topbar_logo']->image)) ? asset($storefrontImages['topbar_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';
        $headerLogoPath = file_exists(public_path($storefrontImages['header_logo']->image)) ? asset($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';


        // Categories
        // DB::enableQueryLog();
        // $categories = Category::with(['translations','childs.translations'])
        //             ->where('is_active',1)
        //             ->orderBy('is_active','DESC')
        //             ->orderBy('id','ASC')
        //             ->get();

        $categoriesData = Category::with(['translations','childs.translations','products'])
                    ->where('parent_id', null)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','ASC')
                    ->get()
                    ->map(function($category) {
                        return [
                            'id'=> $category->id,
                            'image'=> $category->image,
                            'is_active'=> $category->is_active,
                            'icon'=> $category->icon,
                            'slug'=> $category->slug,
                            'totalProducts' => $category->products->count(),
                            'categoryName'=> $category->translation->category_name,
                            'childs'=> $category->childs->map(function($childCategory) {
                                return [
                                    'id'=> $childCategory->id,
                                    'image'=> $childCategory->image,
                                    'is_active'=> $childCategory->is_active,
                                    'icon'=> $childCategory->icon,
                                    'slug'=> $childCategory->slug,
                                    'totalProducts'=> $childCategory->products->count(),
                                    'childCategoryName'=> $childCategory->childTranslation->category_name,
                                ];
                            }),
                        ];
                    });

        // dd($categoriesData);

        $categories = $this->arrayToObject($categoriesData);

        // dd(DB::getQueryLog());


        view()->composer([
            'frontend.includes.header'
        ], function ($view) use (
                        $topbarLogoPath,
                        $headerLogoPath,
                        $totalWishlist,
                        $storefrontFacebookLink,
                        $storefrontTwitterLink,
                        $storefrontInstagramLink,
                        $storefrontYoutubeLink,
                        $changeCurrencyRate,
                        $welcomeTitle,
                        $currencyCodes,
                        $languages,
                        $storefrontShopPageEnabled,
                        $storefrontBrandPageEnabled,
                        $cartTotal,
                        $cartCount,
                        $cartContents,
                        $categories,
                        $socialShareLinks
                    ) {
            $view->with([
                'topbarLogoPath' => $topbarLogoPath,
                'headerLogoPath' => $headerLogoPath,
                'totalWishlist' => $totalWishlist,
                'storefrontFacebookLink' => $storefrontFacebookLink,
                'storefrontTwitterLink' => $storefrontTwitterLink,
                'storefrontInstagramLink' => $storefrontInstagramLink,
                'storefrontYoutubeLink' => $storefrontYoutubeLink,
                'changeCurrencyRate' => $changeCurrencyRate,
                'welcomeTitle' => $welcomeTitle,
                'currencyCodes' => $currencyCodes,
                'languages' => $languages,
                'storefrontShopPageEnabled' => $storefrontShopPageEnabled,
                'storefrontBrandPageEnabled' => $storefrontBrandPageEnabled,
                'cartTotal' => $cartTotal,
                'cartCount' => $cartCount,
                'cartContents' => $cartContents,
                'categories' => $categories,
                'socialShareLinks' => $socialShareLinks,
            ]);



            // view()->composer([
            //     'frontend.includes.header'
            // ], function ($view) use (
            //                 $socialShareLinks
            //             ) {
            // $view->with([
            //     'socialShareLinks' => $socialShareLinks,
            // ]);

        });
    }

    private function footerSection($locale, $setting, $storefrontImages, $settingStore)
    {
        $footerDescription = FooterDescription::where('locale',$locale)->first();
        $settingNewslatter = SettingNewsletter::first();
        $headerLogoPath = file_exists(public_path($storefrontImages['header_logo']->image)) ? asset($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';

        // Setting Translation
        $storefrontAddress = $setting->storefront_address->value;
        $footerMenuOneTitle = $setting->storefront_footer_menu_title_one->value;
        $footerMenuTitleTwo = $setting->storefront_footer_menu_title_two->value;
        $footerMenuTitleThree = $setting->storefront_footer_menu_title_three->value;
        $storefrontCopyrightText = $setting->storefront_copyright_text->value;

        // Setting Value
        $storefrontFacebookLink = $setting->storefront_facebook_link->plain_value;
        $storefrontTwitterLink = $setting->storefront_twitter_link->plain_value;
        $storefrontInstagramLink = $setting->storefront_instagram_link->plain_value;
        $storefrontYoutubeLink = $setting->storefront_youtube_link->plain_value;
        $footerMenuOneValue = $setting->storefront_footer_menu_one->plain_value;
        $footerMenuTwoValue = $setting->storefront_footer_menu_two->plain_value;
        $footerMenuThreeValue = $setting->storefront_footer_menu_three->plain_value;
        $footerTagIds = json_decode($setting->storefront_footer_tag_id->plain_value);

         //StoreFront
         $paymentMethodImage = file_exists(public_path($storefrontImages['accepted_payment_method_image']->image)) ? asset($storefrontImages['accepted_payment_method_image']->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro';



        $menus = [];
        $footerMenuOne = null;
        $footerMenuTwo = null;
        $footerMenuThree = null;
        foreach ($menus as $key => $value) {
            if ($value->id == $footerMenuOneValue) {
                $footerMenuOne = $menus[$key];
            }
            else if($value->id == $footerMenuTwoValue) {
                $footerMenuTwo = $menus[$key];
            }
            else if($value->id == $footerMenuThreeValue) {
                $footerMenuThree = $menus[$key];
            }
        }


        if ($footerTagIds) {
            $tags =  DB::table('tags')
                ->select([
                    'tags.slug',
                    'tag_translations.tag_name'
                ])
                ->join('tag_translations', function ($join) use ($locale) {
                    $join->on('tags.id', '=', 'tag_translations.tag_id')
                        ->where(function ($query) use ($locale) {
                            $query->where('tag_translations.local', $locale)
                                ->orWhere('tag_translations.local', 'en');
                        });
                })
                ->whereIn('tags.id',$footerTagIds)
                ->where('tags.is_active',1)
                ->orderBy('tags.is_active', 'DESC')
                ->orderBy('tags.id', 'DESC')
                ->get();
        }


        view()->composer([
            'frontend.includes.footer'
        ], function ($view) use (
                        $locale,
                        $footerDescription,
                        $settingNewslatter,
                        $headerLogoPath,
                        $settingStore,
                        $storefrontAddress,
                        $storefrontFacebookLink,
                        $storefrontTwitterLink,
                        $storefrontInstagramLink,
                        $storefrontYoutubeLink,
                        $footerMenuOneTitle,
                        $footerMenuOne,
                        $footerMenuTitleTwo,
                        $footerMenuTwo,
                        $footerMenuTitleThree,
                        $footerMenuThree,
                        $tags,
                        $storefrontCopyrightText,
                        $paymentMethodImage,
                    ) {
            $view->with([
                'locale' => $locale,
                'footerDescription' => $footerDescription,
                'settingNewslatter' => $settingNewslatter,
                'headerLogoPath' => $headerLogoPath,
                'settingStore' => $settingStore,
                'storefrontAddress' => $storefrontAddress,
                'storefrontFacebookLink' => $storefrontFacebookLink,
                'storefrontTwitterLink' => $storefrontTwitterLink,
                'storefrontInstagramLink' => $storefrontInstagramLink,
                'storefrontYoutubeLink' => $storefrontYoutubeLink,
                'footerMenuOneTitle' => $footerMenuOneTitle,
                'footerMenuOne' => $footerMenuOne,
                'footerMenuTitleTwo' => $footerMenuTitleTwo,
                'footerMenuTwo' => $footerMenuTwo,
                'footerMenuTitleThree' => $footerMenuTitleThree,
                'footerMenuThree' => $footerMenuThree,
                'tags' => $tags,
                'storefrontCopyrightText' => $storefrontCopyrightText,
                'paymentMethodImage' => $paymentMethodImage,
            ]);
        });

    }
}







        // $start = microtime(true);
        // // $settings = Setting::with(['settingTranslation','settingTranslationDefaultEnglish'])->get();

        // // $settings = Setting::with(['translations'])->get()->keyBy('key');
        // // $welcomeTitle = $settings['storefront_welcome_text']->translation->value;
        // // app('setting');

        // $elapsed = microtime(true) - $start;
        // dd($elapsed);
