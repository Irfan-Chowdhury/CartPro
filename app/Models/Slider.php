<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_slug',
        'type',
        'category_id',
        'url',
        'slider_image',
        'target',
        'is_active',
    ];

    public function sliderTranslation()
    {
    	return $this->hasMany(SliderTranslation::class,'slider_id');
    }
}
