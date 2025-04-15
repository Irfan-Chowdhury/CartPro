<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use App\Traits\TranslationTrait;

class Brand extends Model
{
    use Notifiable, TranslationTrait;

    protected $fillable = [
        'slug','name','brand_logo', 'is_active',
    ];

    // public $with = ['brandTranslations'];


    // Vendora
    public function translations()
    {
        return $this->hasMany(BrandTranslation::class,'brand_id');
    }

    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Try to find the translation in the requested locale
        $translation = $this->translations->firstWhere('local', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('local', 'en');
        }

        return $translation;
    }





    // public function format()
    // {
    //     return [
    //         'id'=>$this->id,
    //         'slug'=>$this->slug,
    //         'is_active'=>$this->is_active,
    //         'brand_logo'=>$this->brand_logo ?? null,
    //         // 'brand_name'=>$this->brandTranslation->brand_name ?? $this->brandTranslationEnglish->brand_name ?? null,
    //         'brand_name'=>$this->translations($this->brandTranslations)->brand_name,
    //     ];
    // }

    public function products()
    {
    	return $this->hasMany(Product::class,'brand_id');
    }

    public function brandTranslation() //Remove Later
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(BrandTranslation::class,'brand_id')
                    ->where('local',$locale);
    }

    public function brandTranslationEnglish() //Remove Later
    {
        return $this->hasOne(BrandTranslation::class,'brand_id')
                    ->where('local','en');
    }

    //New For Repository
    public function brandTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(BrandTranslation::class,'brand_id')
                    ->where('local',$locale)
                    ->orWhere('local','en');
    }
}
