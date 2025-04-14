<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
     use Notifiable, SoftDeletes;

    protected $fillable = [
        'slug', 'name', 'image','top','is_active','icon','parent_id'
    ];
    protected $dates = ['deleted_at'];


    // Vendora
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class,'category_id');
    }


    // i) If locale is en and the database has en data: it will display the en data (e.g., "Mango").
    // ii) If locale is bn and the database has bn data: it will display the bn data (e.g., "আম").
    // ii) If locale is bn but the database only has en data: it will fallback to the en data, so it shows "Mango" instead of displaying an empty result.

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

    public function parentCategory()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function getParentTranslationAttribute()
    {
        // Check if there is a parent category
        if (!$this->parentCategory) {
            return null;
        }

        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Attempt to get the translation for the locale, or fallback to English
        $parentTranslation = $this->parentCategory->translations->firstWhere('locale', $locale) ?? $this->parentCategory->translations->firstWhere('locale', 'en');

        return $parentTranslation;
    }

    public function childs()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function getChildTranslationAttribute()
    {
        // Check if there is a parent category
        if (!$this->childs) {
            return null;
        }

        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Attempt to get the translation for the locale, or fallback to English
        $childTranslation = $this->translations->firstWhere('locale', $locale) ?? $this->translations->firstWhere('locale', 'en');

        return $childTranslation;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }







    // deprecated given below -


    public function categoryTranslation()
    {
    	 return $this->hasMany(CategoryTranslation::class,'category_id');  //Remove Later
    }



    public function catTranslation()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasOne(CategoryTranslation::class,'category_id')
                ->where('locale',$locale);
    }

    public function categoryTranslationDefaultEnglish()
    {
    	 return $this->hasOne(CategoryTranslation::class,'category_id')
                        ->where('locale','en');
    }

    // public function products()
    // {
    // 	return $this->hasMany(Product::class,'category_id');
    // }

    public function categoryProduct()
    {
        return $this->hasMany(CategoryProduct::class);
    }
}
