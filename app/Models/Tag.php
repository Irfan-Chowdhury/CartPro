<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'is_active'
    ];

    protected $dates = ['deleted_at'];


    public function translations()
    {
        return $this->hasMany(TagTranslation::class,'tag_id');
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







    public function tagTranslation()  //Remove Later
    {
    	return $this->hasMany(TagTranslation::class,'tag_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }



    //Use tagTranslations and tagTranslationEnglish used in Category Wise Products
    public function tagTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(TagTranslation::class,'tag_id')
                    ->where('local',$locale);
    }

    public function tagTranslationEnglish()
    {
        return $this->hasOne(TagTranslation::class,'tag_id')
                    ->where('local','en');
    }
}
