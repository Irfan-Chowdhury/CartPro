<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FooterResource;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Models\SettingNewsletter;
use App\Models\SettingStore;
use App\Models\StorefrontImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public function storefrontFooterData()
    {
        $settingNewslatter = SettingNewsletter::first();

        $storefrontImages = self::getStorefrontImages();

        $settingStore =  SettingStore::select('id','store_phone','store_email','store_address_1')->first();

        $settings = self::getSettingData();

        $tags = self::getFooterTags($settings->storefront_footer_tag_id->plain_value);

        
        $footerData = (object) [
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

        return new FooterResource($footerData);
    }

    private function getSettingData()
    {
        $settingsData = Setting::with(['translations'])
                        ->get()
                        ->keyBy('key');

        $settingArrray = SettingResource::collection($settingsData)->collection->keyBy('key')->toArray();
        $settings = json_decode(json_encode($settingArrray), FALSE);

        return $settings;
    }

    private function getFooterTags(string $tagIds)
    {
        $footerTagIds = json_decode($tagIds);

        $tags = [];
        if ($footerTagIds) {
            $tags = DB::table('tags')
                ->select([
                    'tags.id',
                    'tags.slug',
                    'tag_translations.tag_name'
                ])
                ->join('tag_translations', 'tags.id', '=', 'tag_translations.tag_id')
                ->where('tag_translations.local', 'en') // Fetch only 'en' translations
                ->whereIn('tags.id', $footerTagIds)
                ->where('tags.is_active', 1)
                ->orderBy('tags.is_active', 'DESC')
                ->orderBy('tags.id', 'DESC')
                ->get();
        }

        return $tags;
    }

    private function getStorefrontImages()
    {
        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
        $footerLogoPath = file_exists($storefrontImages['header_logo']->image) ? url($storefrontImages['header_logo']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';
        $paymentMethodImage = file_exists($storefrontImages['accepted_payment_method_image']->image) ? url($storefrontImages['accepted_payment_method_image']->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro';

        return [
            'footerLogoPath' => $footerLogoPath,
            'paymentMethodImage' => $paymentMethodImage,
        ];

    }
}
