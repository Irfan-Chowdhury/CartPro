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
use App\Traits\Temporary\SettingHomePageSeoTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PublicCommonData
{
    use SettingHomePageSeoTrait;

    public function handle(Request $request, Closure $next)
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // $settings = Setting::with(['translations'])->get();

        $settings = App::make('settings');

        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');

        $changeCurrencyRate = Session::has('currency_rate') ? Session::get('currency_rate') : 1;
        Session::put('currency_rate', $changeCurrencyRate);


        $settingStore =  SettingStore::first();


        self::masterSection($settings, $storefrontImages, $changeCurrencyRate, $settingStore);

        self::headerSection($settings, $storefrontImages, $changeCurrencyRate);

        self::footerSection($locale, $settings, $storefrontImages, $settingStore);

        //Pages
        self::homeSection($settings, $changeCurrencyRate, $storefrontImages);

        return $next($request);
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
        $oneColumnBannerImage = file_exists($storefrontImages['one_column_banner_image']->image) ? url($storefrontImages['one_column_banner_image']->image) :  'https://dummyimage.com/1200x270/12787d/ffffff&text=CartPro';

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

    private function masterSection($settings, $storefrontImages, $changeCurrencyRate, $settingStore)
    {

        $faviconLogoPath = file_exists($storefrontImages['favicon_logo']->image) ? url($storefrontImages['favicon_logo']->image) :  'https://dummyimage.com/221.6x221.6/12787d/ffffff&text=CartPro';

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

    private function headerSection($settings, $storefrontImages, $changeCurrencyRate)
    {
        // $start = microtime(true);
        // $settings = Setting::with(['settingTranslation','settingTranslationDefaultEnglish'])->get();
        $languages = Language::orderBy('language_name','ASC')->get()->keyBy('local');
        $currencyCodes = CurrencyRate::select('currency_code')->get();

        // $settings = Setting::with(['translations'])->get()->keyBy('key');
        // $welcomeTitle = $settings['storefront_welcome_text']->translation->value;

        // $elapsed = microtime(true) - $start;
        // dd($elapsed);


        // Setting Translation
        $welcomeTitle = $settings->firstWhere('key', 'storefront_welcome_text')->translation->value;
        // Setting Just Value
        $storefrontThemeColor = $settings->firstWhere('key', 'storefront_theme_color')->plain_value;
        $storefrontNavbgColor = $settings->firstWhere('key', 'storefront_navbar_background_color')->plain_value;
        $storefrontMenuTextColor = $settings->firstWhere('key', 'storefront_nav_text_color')->plain_value;
        $storefrontFacebookLink = $settings->firstWhere('key', 'storefront_facebook_link')->plain_value;
        $storefrontTwitterLink = $settings->firstWhere('key', 'storefront_twitter_link')->plain_value;
        $storefrontInstagramLink = $settings->firstWhere('key', 'storefront_instagram_link')->plain_value;
        $storefrontYoutubeLink = $settings->firstWhere('key', 'storefront_youtube_link')->plain_value;
        $twoColumnBannerEnabled = $settings->firstWhere('key', 'storefront_two_column_banner_enabled')->plain_value;
        $threeColumnBannersEnabled = $settings->firstWhere('key', 'storefront_three_column_banners_enabled')->plain_value;
        $topCategoriesSectionEnabled = $settings->firstWhere('key', 'storefront_top_categories_section_enabled')->plain_value;
        $threeColumnBannerFullEnabled = $settings->firstWhere('key', 'storefront_three_column_full_width_banners_enabled')->plain_value;
        $flashSaleAndVerticalProductsSectionEnabled = $settings->firstWhere('key', 'storefront_flash_sale_and_vertical_products_section_enabled')->plain_value;
        $termsAndConditionPageId = $settings->firstWhere('key', 'storefront_terms_and_condition_page')->plain_value;
        $footerTagIds = $settings->firstWhere('key', 'storefront_footer_tag_id')->plain_value;
        $storefrontShopPageEnabled = $settings->firstWhere('key', 'storefront_shop_page_enabled')->plain_value;
        $storefrontBrandPageEnabled = $settings->firstWhere('key', 'storefront_brand_page_enabled')->plain_value;


        //Categries




        $cartTotal = implode(explode(',',Cart::total()));
        $cartCount = Cart::count();
        $cartContents = Cart::content();


        $totalWishlist = 0;
        if (Auth::check())
            $totalWishlist = Wishlist::where('user_id', Auth::user()->id)->count();


        //StoreFront
        $topbarLogoPath = file_exists($storefrontImages['topbar_logo']->image) ? url($storefrontImages['topbar_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';
        $headerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';


        // Categories
        // $categories = Category::with(['catTranslation','parentCategory.catTranslation','categoryTranslationDefaultEnglish','child.catTranslation'])
        $categories = Category::with(['translations','parentCategory','child'])
                    ->where('is_active',1)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','ASC')
                    ->get();


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
                        $categories
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
                'categories' => $categories
            ]);
        });
    }

    private function footerSection($locale, $settings, $storefrontImages, $settingStore)
    {
        $footerDescription = FooterDescription::where('locale',$locale)->first();
        $settingNewslatter = SettingNewsletter::first();
        $headerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';

        // Setting Translation
        $storefrontAddress = $settings->firstWhere('key', 'storefront_address')->translation->value;
        $footerMenuOneTitle = $settings->firstWhere('key', 'storefront_footer_menu_title_one')->translation->value;
        $footerMenuTitleTwo = $settings->firstWhere('key', 'storefront_footer_menu_title_two')->translation->value;
        $footerMenuTitleThree = $settings->firstWhere('key', 'storefront_footer_menu_title_three')->translation->value;
        $storefrontCopyrightText = $settings->firstWhere('key', 'storefront_copyright_text')->translation->value;

        // Setting Value
        $storefrontFacebookLink = $settings->firstWhere('key', 'storefront_facebook_link')->plain_value;
        $storefrontTwitterLink = $settings->firstWhere('key', 'storefront_twitter_link')->plain_value;
        $storefrontInstagramLink = $settings->firstWhere('key', 'storefront_instagram_link')->plain_value;
        $storefrontYoutubeLink = $settings->firstWhere('key', 'storefront_youtube_link')->plain_value;
        $footerMenuOneValue = $settings->firstWhere('key', 'storefront_footer_menu_one')->plain_value;
        $footerMenuTwoValue = $settings->firstWhere('key', 'storefront_footer_menu_two')->plain_value;
        $footerMenuThreeValue = $settings->firstWhere('key', 'storefront_footer_menu_three')->plain_value;
        $footerTagIds = json_decode($settings->firstWhere('key', 'storefront_footer_tag_id')->plain_value);

         //StoreFront
         $paymentMethodImage = file_exists($storefrontImages['accepted_payment_method_image']->image) ? url($storefrontImages['accepted_payment_method_image']->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro';



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
