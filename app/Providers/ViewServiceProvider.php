<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Share;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('socialShareLinks', function () {
            return self::getSocialShareLinks();
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


    private function arrayToObject($array)
    {
        return json_decode(json_encode($array), false);
    }
}
