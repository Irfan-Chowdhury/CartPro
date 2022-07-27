<?php
namespace App\Traits\Temporary;

use App\Models\SettingHomePageSeo;
use App\Traits\TranslationTrait;

trait SettingHomePageSeoTrait
{
    use TranslationTrait;

    public function settingHomePageSeo()
    {
        $setting_home_page_seo = [];
        $data_home_page  = SettingHomePageSeo::with('settingHomePageSeoTranslations')->get()
                                ->map(function($item){
                                    return [
                                        'id'          => $item->id,
                                        'meta_url'         => $item->meta_url,
                                        'meta_type'        => $item->meta_type,
                                        'meta_image'       => $item->meta_image,
                                        'locale'      => $this->translations($item->settingHomePageSeoTranslations)->locale,
                                        'meta_site_name'   => $this->translations($item->settingHomePageSeoTranslations)->meta_site_name,
                                        'meta_title'       => $this->translations($item->settingHomePageSeoTranslations)->meta_title,
                                        'meta_description' => $this->translations($item->settingHomePageSeoTranslations)->meta_description,
                                    ];
                                });
        if($data_home_page){
            $setting_home_page_seo = json_decode(json_encode($data_home_page[0]), FALSE);
        }

        return  $setting_home_page_seo;
    }

}
