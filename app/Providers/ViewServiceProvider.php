<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Share;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('socialShareLinks', function () {
            return self::getSocialShareLinks();
        });


        $this->app->singleton('setting', function () {
            return self::getSettings();
        });
    }

    public function boot()
    {
        // $socialShareLinks = app('socialShareLinks');
        // dd($socialShareLinks);
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

    private function getSettings()
    {
        $settings = Setting::with(['translations','storeFrontImage'])->get()->keyBy('key')
                    ->map(function($setting){
                        return [
                            'id'             => $setting->id,
                            'key'            => $setting->key,
                            'plain_value'    => $setting->plain_value ?? null,
                            'is_translatable'=> (boolean) $setting->is_translatable,
                            'locale' => $setting->translation->locale ?? null,
                            'value'  => $setting->translation->value ?? null,
                            'image'  => isset($setting->storeFrontImage->image) && file_exists(public_path($setting->storeFrontImage->image)) ? asset($setting->storeFrontImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=Image',
                        ];
                    });

        return self::arrayToObject($settings);
    }


    private function arrayToObject($array)
    {
        return json_decode(json_encode($array), false);
    }
}
