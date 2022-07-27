<?php

namespace App\Repositories\Slider;

use App\Contracts\Slider\SliderContract;
use App\Models\Slider;
use App\Traits\TranslationTrait;

class SliderRepository implements SliderContract
{
    use TranslationTrait;

    public function getAllSlider()
    {
        return Slider::with('sliderTranslations')
                ->orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get()
                ->map(function($slider){
                    return [
                        'id'             =>$slider->id,
                        'slider_slug'    =>$slider->slider_slug,
                        'type'           =>$slider->type,
                        'category_id'    =>$slider->category_id,
                        'url'            =>$slider->url,
                        'slider_image'   =>$slider->slider_image,
                        'slider_image_full_width'=>$slider->slider_image_full_width,
                        'slider_image_secondary'=>$slider->slider_image_secondary,
                        'target'         =>$slider->target,
                        'text_alignment' =>$slider->text_alignment,
                        'text_color'     =>$slider->text_color,
                        'is_active'      =>$slider->is_active,
                        'slider_title'   => $this->translations($slider->sliderTranslations)->slider_title ?? null,
                        'slider_subtitle'=> $this->translations($slider->sliderTranslations)->slider_subtitle ?? null,
                        'locale'         => $this->translations($slider->sliderTranslations)->locale ?? null,
                    ];
                });
    }
}
