<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Setting;
use App\Models\StorefrontImage;
use Share;

class HeaderService
{
    public function getHeaderDataForWeb()
    {
        return $socialShareLinks = self::getSocialShareLinks();

        // dd($socialShareLinks->facebook);

        $headerData = [
            'newsletterSettings'  => $settingNewslatter->newsletter,
            'storefrontImages'  => [
                'footerLogoPath' => $storefrontImages['footerLogoPath'],
                'paymentMethodImage' => $storefrontImages['paymentMethodImage'],
            ],
            'storeSettings'  => $settingStore,
            'tags'      => $tags,
            'settings' => [
                'socialMediaLinks' => [
                    'facebook'  => $settings->storefront_facebook_link->plain_value,
                    'twitter'   => $settings->storefront_twitter_link->plain_value,
                    'instagram' => $settings->storefront_instagram_link->plain_value,
                    'youtube'   => $settings->storefront_youtube_link->plain_value,
                ],
                'footerMenus' => [
                    'firstMenuTitle' => $settings->storefront_footer_menu_title_one->value,
                    'secondMenuTitle' => $settings->storefront_footer_menu_title_two->value,
                    'thirdMenuTitle' => $settings->storefront_footer_menu_title_three->value
                ],
                'copyrightText'   => html_entity_decode($settings->storefront_copyright_text->value),
            ]
        ];










        $settings = self::getSettings();

        //Header Logo
        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
        $headerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';


        // Category Menus List
        $categoryMenuList = self::getCategoryMenuList();


        // Fianl Response
        $headerData = [
            'facebook'  => $settings->storefront_facebook_link->plain_value ?? null,
            'twitter'   => $settings->storefront_twitter_link->plain_value ?? null,
            'instagram' => $settings->storefront_instagram_link->plain_value ?? null,
            'youtube'   => $settings->storefront_youtube_link->plain_value ?? null,
            'storefrontShopPageEnabled' => $settings->storefront_shop_page_enabled->plain_value,
            'storefrontBrandPageEnabled'=> $settings->storefront_brand_page_enabled->plain_value,
            'welcomeTitle' => $settings->storefront_welcome_text->value ?? null,
            'headerLogoPath' => $headerLogoPath,
            'categoryMenuList' => $categoryMenuList,
        ];

        return self::arrayToObject($headerData);
    }

    public function getHeaderDataForApi()
    {
        $settings = self::getSettings();

        //Header Logo
        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
        $headerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';


        // Category Menus List
        $categoryMenuList = self::getCategoryMenuList();


        // Fianl Response
        $headerData = [
            'facebook'  => $settings->storefront_facebook_link->plain_value ?? null,
            'twitter'   => $settings->storefront_twitter_link->plain_value ?? null,
            'instagram' => $settings->storefront_instagram_link->plain_value ?? null,
            'youtube'   => $settings->storefront_youtube_link->plain_value ?? null,
            'storefrontShopPageEnabled' => $settings->storefront_shop_page_enabled->plain_value,
            'storefrontBrandPageEnabled'=> $settings->storefront_brand_page_enabled->plain_value,
            'welcomeTitle' => $settings->storefront_welcome_text->value ?? null,
            'headerLogoPath' => $headerLogoPath,
            'categoryMenuList' => $categoryMenuList,
        ];

        return self::arrayToObject($headerData);
    }

    // private function getHeaderLogo()
    // {
    //     $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
    //     $headerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';

    //     return $headerLogoPath;
    // }

    private function getSettings()
    {
        $setting = Setting::with(['translations','storeFrontImage'])
                ->get()
                ->keyBy('key')
                ->map(function($setting){
                    return [
                        'id'             => $setting->id,
                        'key'            => $setting->key,
                        'plain_value'    => $setting->plain_value,
                        'is_translatable'=> $setting->is_translatable,
                        'locale' => $setting->translation->locale ?? null,
                        'value'  => $setting->translation->value ?? null,
                    ];
                });

        return self::arrayToObject($setting);
    }


    private function getSocialShareLinks()
    {
        $socialShareLinks =  Share::page(url()->current(),
            'Social Share'
            )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit()
            ->getRawLinks();

        return self::arrayToObject($socialShareLinks);
    }


    public function getCategoryMenuList()
    {
        $categories = Category::with(['translations','parentCategory','child'])
            ->where('is_active',1)
            ->orderBy('is_active','DESC')
            ->orderBy('id','ASC')
            ->get();

        $categoryProductCount = [];
        foreach ($categories as $category) {
            $product_count = 0;
            if ($category->categoryProduct) {
                foreach ($category->categoryProduct as $item) {
                    if ($item->product) {
                        $product_count++;
                    }
                }
            }
            $categoryProductCount[$category->id] = $product_count;
        }


        $categoryMenuList = [];
        $subCategoryMenus = [];
        foreach ($categories->where('parent_id',NULL) as $key => $category) {
            if ($category->child->isNotEmpty()) {
                foreach ($category->child as $key2 => $item) {
                    $subCategoryMenus[$key2]['id'] = $item->id;
                    $subCategoryMenus[$key2]['slug'] = $item->slug;
                    $subCategoryMenus[$key2]['categoryName'] = $item->translation->category_name;
                    $subCategoryMenus[$key2]['icon'] = $item->icon;
                    $subCategoryMenus[$key2]['totalProducts'] = $categoryProductCount[$item->id];
                }
                $categoryMenuList[$key]['id'] = $category->id;
                $categoryMenuList[$key]['slug'] = $category->slug;
                $categoryMenuList[$key]['categoryName'] = $category->translation->category_name;
                $categoryMenuList[$key]['icon'] = $category->icon;
                $categoryMenuList[$key]['totalProducts'] = $categoryProductCount[$category->id];
                $categoryMenuList[$key]['subCategoryMenus'] = $subCategoryMenus;
            }
            else {
                $categoryMenuList[$key]['id'] = $category->id;
                $categoryMenuList[$key]['slug'] = $category->slug ?? null;
                $categoryMenuList[$key]['categoryName'] = $category->translation->category_name ?? null;
                $categoryMenuList[$key]['icon'] = $category->icon ?? null;
                $categoryMenuList[$key]['totalProducts'] = $categoryProductCount[$category->id];
                $categoryMenuList[$key]['subCategoryMenus'] = [];
            }
        }

        return self::arrayToObject($categoryMenuList);
    }

    private function arrayToObject($array)
    {
        return json_decode(json_encode($array), false);
    }
}
