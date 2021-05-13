<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=SettingSeeder

        DB::table('settings')->delete();

        $settings = array(
            //---- General ----
            array(
                'id' => 1,
                'key' => 'storefront_welcome_text',
                'is_translatable' => 1,
            ),
            array(
                'id' => 2,
                'key' => 'storefront_theme_color',
                'is_translatable' => 0,
            ),
            array(
                'id' => 3,
                'key' => 'storefront_mail_theme_color',
                'is_translatable' => 0,
            ),
            array(
                'id' => 4,
                'key' => 'storefront_slider',
                'is_translatable' => 0,
            ),
            array(
                'id' => 5,
                'key' => 'storefront_terms_and_condition_page',
                'is_translatable' => 0,
            ),
            array(
                'id' => 6,
                'key' => 'storefront_privacy_policy_page',
                'is_translatable' => 0,
            ),
            array(
                'id' => 7,
                'key' => 'storefront_address',
                'is_translatable' => 1,
            ),
            //---- Menus ----
            array(
                'id' => 8,
                'key' => 'storefront_navbar_text',
                'is_translatable' => 1,
            ),
            array(
                'id' => 9,
                'key' => 'storefront_primary_menu',
                'is_translatable' => 0,
            ),
            array(
                'id' => 10,
                'key' => 'storefront_category_menu',
                'is_translatable' => 0,
            ),
            array(
                'id' => 11,
                'key' => 'storefront_footer_menu_title_one',
                'is_translatable' => 1,
            ),
            array(
                'id' => 12,
                'key' => 'storefront_footer_menu_one',
                'is_translatable' => 0,
            ),
            array(
                'id' => 13,
                'key' => 'storefront_footer_menu_title_two',
                'is_translatable' => 1,
            ),
            array(
                'id' => 14,
                'key' => 'storefront_footer_menu_two',
                'is_translatable' => 0,
            ),
            //---- Social Links ----
            array(
                'id' => 15,
                'key' => 'storefront_facebook_link',
                'is_translatable' => 0,
            ),
            array(
                'id' => 16,
                'key' => 'storefront_twitter_link',
                'is_translatable' => 0,
            ),
            array(
                'id' => 17,
                'key' => 'storefront_instagram_link',
                'is_translatable' => 0,
            ),
            array(
                'id' => 18,
                'key' => 'storefront_youtube_link',
                'is_translatable' => 0,
            ),

            //---- Features ----
            array(
                'id' => 19,
                'key' => 'storefront_section_status',
                'is_translatable' => 0,
            ),
            array(
                'id' => 20,
                'key' => 'storefront_feature_1_title',
                'is_translatable' => 1,
            ),
            array(
                'id' => 21,
                'key' => 'storefront_feature_1_subtitle',
                'is_translatable' => 1,
            ),
            array(
                'id' => 22,
                'key' => 'storefront_feature_1_icon',
                'is_translatable' => 0,
            ),
            array(
                'id' => 23,
                'key' => 'storefront_feature_2_title',
                'is_translatable' => 1,
            ),
            array(
                'id' => 24,
                'key' => 'storefront_feature_2_subtitle',
                'is_translatable' => 1,
            ),
            array(
                'id' => 25,
                'key' => 'storefront_feature_2_icon',
                'is_translatable' => 0,
            ),
            array(
                'id' => 26,
                'key' => 'storefront_feature_3_title',
                'is_translatable' => 1,
            ),
            array(
                'id' => 27,
                'key' => 'storefront_feature_3_subtitle',
                'is_translatable' => 1,
            ),
            array(
                'id' => 28,
                'key' => 'storefront_feature_3_icon',
                'is_translatable' => 0,
            ),
            array(
                'id' => 29,
                'key' => 'storefront_feature_4_title',
                'is_translatable' => 1,
            ),
            array(
                'id' => 30,
                'key' => 'storefront_feature_4_subtitle',
                'is_translatable' => 1,
            ),
            array(
                'id' => 31,
                'key' => 'storefront_feature_4_icon',
                'is_translatable' => 0,
            ),
            array(
                'id' => 32,
                'key' => 'storefront_feature_5_title',
                'is_translatable' => 1,
            ),
            array(
                'id' => 33,
                'key' => 'storefront_feature_5_subtitle',
                'is_translatable' => 1,
            ),
            array(
                'id' => 34,
                'key' => 'storefront_feature_5_icon',
                'is_translatable' => 0,
            ),
            //----- Footer ------
            array(
                'id' => 35,
                'key' => 'storefront_footer_tag_id',
                'is_translatable' => 0,
            ),
            array(
                'id' => 36,
                'key' => 'storefront_copyright_text',
                'is_translatable' => 1,
            ),
            array(
                'id' => 37,
                'key' => 'storefront_payment_method_image',
                'is_translatable' => 0,
            ),
            //----- Newletter ------
            array(
                'id' => 38,
                'key' => 'storefront_newsletter_image',
                'is_translatable' => 0,
            ),
            //----- Product Page Banner ------
            array(
                'id' => 39,
                'key' => 'storefront_product_page_image',
                'is_translatable' => 0,
            ),
            array(
                'id' => 40,
                'key' => 'storefront_call_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 41,
                'key' => 'storefront_open_new_window',
                'is_translatable' => 0,
            ),
        );

        Setting::insert($settings);
    }
}
