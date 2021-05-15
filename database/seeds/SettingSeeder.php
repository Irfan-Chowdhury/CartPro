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
            //----- Slider Banners ------
            array(
                'id' => 42,
                'key' => 'storefront_slider_banner_1_image',
                'is_translatable' => 0,
            ),
            array(
                'id' => 43,
                'key' => 'storefront_slider_banner_1_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 44,
                'key' => 'storefront_slider_banner_1_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 45,
                'key' => 'storefront_slider_banner_2_image',
                'is_translatable' => 0,
            ),
            array(
                'id' => 46,
                'key' => 'storefront_slider_banner_2_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 47,
                'key' => 'storefront_slider_banner_2_open_in_new_window',
                'is_translatable' => 0,
            ),
            //----- One Column Banner ------
            array(
                'id' => 48,
                'key' => 'storefront_one_column_banner_enabled',
                'is_translatable' => 0,
            ),
            array(
                'id' => 49,
                'key' => 'storefront_one_column_banner_image',
                'is_translatable' => 0,
            ),
            array(
                'id' => 50,
                'key' => 'storefront_one_column_banner_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 51,
                'key' => 'storefront_one_column_banner_open_in_new_window',
                'is_translatable' => 0,
            ),
            //----- Two Column Banner ------
            array(
                'id' => 52,
                'key' => 'storefront_two_column_banner_enabled',
                'is_translatable' => 0,
            ),
            array(
                'id' => 53,
                'key' => 'storefront_two_column_banner_image_1',
                'is_translatable' => 0,
            ),
            array(
                'id' => 54,
                'key' => 'storefront_two_column_banners_1_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 55,
                'key' => 'storefront_two_column_banners_1_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 56,
                'key' => 'storefront_two_column_banner_image_2',
                'is_translatable' => 0,
            ),
            array(
                'id' => 57,
                'key' => 'storefront_two_column_banners_2_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 58,
                'key' => 'storefront_two_column_banners_2_open_in_new_window',
                'is_translatable' => 0,
            ),
            //----- Three Column Banners ------
            array(
                'id' => 59,
                'key' => 'storefront_three_column_banners_enabled',
                'is_translatable' => 0,
            ),
            array(
                'id' => 60,
                'key' => 'storefront_three_column_banners_image_1',
                'is_translatable' => 0,
            ),
            array(
                'id' => 61,
                'key' => 'storefront_three_column_banners_1_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 62,
                'key' => 'storefront_three_column_banners_1_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 63,
                'key' => 'storefront_three_column_banners_image_2',
                'is_translatable' => 0,
            ),
            array(
                'id' => 64,
                'key' => 'storefront_three_column_banners_2_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 65,
                'key' => 'storefront_three_column_banners_2_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 66,
                'key' => 'storefront_three_column_banners_image_3',
                'is_translatable' => 0,
            ),
            array(
                'id' => 67,
                'key' => 'storefront_three_column_banners_3_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 68,
                'key' => 'storefront_three_column_banners_3_open_in_new_window',
                'is_translatable' => 0,
            ),
            //----- Three Column Full Width Banners ------
            array(
                'id' => 69,
                'key' => 'storefront_three_column_full_width_banners_enabled',
                'is_translatable' => 0,
            ),
            array(
                'id' => 70,
                'key' => 'storefront_three_column_full_width_banners_background_image',
                'is_translatable' => 0,
            ),
            array(
                'id' => 71,
                'key' => 'storefront_three_column_full_width_banners_image_1',
                'is_translatable' => 0,
            ),
            array(
                'id' => 72,
                'key' => 'storefront_three_column_full_width_banners_1_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 73,
                'key' => 'storefront_three_column_full_width_banners_1_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 74,
                'key' => 'storefront_three_column_full_width_banners_image_2',
                'is_translatable' => 0,
            ),
            array(
                'id' => 75,
                'key' => 'storefront_three_column_full_width_banners_2_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 76,
                'key' => 'storefront_three_column_full_width_banners_2_open_in_new_window',
                'is_translatable' => 0,
            ),
            array(
                'id' => 77,
                'key' => 'storefront_three_column_full_width_banners_image_3',
                'is_translatable' => 0,
            ),
            array(
                'id' => 78,
                'key' => 'storefront_three_column_full_width_banners_3_call_to_action_url',
                'is_translatable' => 0,
            ),
            array(
                'id' => 79,
                'key' => 'storefront_three_column_full_width_banners_3_open_in_new_window',
                'is_translatable' => 0,
            ),
        );

        Setting::insert($settings);
    }
}
