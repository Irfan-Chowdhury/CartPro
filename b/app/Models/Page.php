<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Page extends Model
{
    protected $fillable = ['slug','is_active'];
    protected $dates = ['deleted_at'];


    /**
    * ---------------------------
    * vendora Start
    * ---------------------------
    */
    public function translations()
    {
        return $this->hasMany(PageTranslation::class,'page_id');
    }

    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Try to find the translation in the requested locale
        $translation = $this->translations->firstWhere('locale', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('locale', 'en');
        }

        return $translation;
    }


    /**
    * ---------------------------
    * vendora End
    * ---------------------------
    */







    public function pageTranslations()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasMany(PageTranslation::class,'page_id')
                    ->where('locale',$locale)
                    ->orWhere('locale','en');
    }


    public function pageTranslation() //Remove Later
    {
        $locale = Session::get('currentLocale');
    	return $this->hasOne(PageTranslation::class,'page_id')
                    ->where('locale',$locale);
    }

}
