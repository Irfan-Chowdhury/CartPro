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
        );

        Setting::insert($settings);
    }
}
