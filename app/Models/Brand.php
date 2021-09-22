<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class Brand extends Model
{
    use Notifiable;

    protected $fillable = [
        'slug', 'is_active',
    ];

    public function products()
    {
    	return $this->hasMany(Product::class,'brand_id');
    }

    // public function brandTranslation()
    // {
    // 	return $this->hasMany(BrandTranslation::class,'brand_id');
    // 	// return $this->hasOne(BrandTranslation::class,'brand_id');
    // }

    public function brandTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(BrandTranslation::class,'brand_id')
                    ->where('local',$locale);
    }

    public function brandTranslationEnglish()
    {
        return $this->hasOne(BrandTranslation::class,'brand_id')
                    ->where('local','en');
    }
}
