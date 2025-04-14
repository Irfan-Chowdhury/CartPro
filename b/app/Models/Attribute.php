<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Attribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'attribute_set_id',
        'category_id',
        'is_filterable',
        'is_active'
    ];
    protected $dates = ['deleted_at'];

    // Vendora
    public function translations()
    {
        return $this->hasMany(AttributeTranslation::class,'attribute_id');
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

    public function attributeSet()
    {
        return $this->belongsTo(AttributeSet::class); //db: attribute_category
    }

    //For AttibuteController || Product Details
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }

    // End Vendora









    //New For AttributeRepository
    public function attributeTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(AttributeTranslation::class,'attribute_id')
                    ->where('locale',$locale)
                    ->orWhere('locale','en');
    }

    //New For AttributeRepository
    public function attributeSetTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(AttributeSetTranslation::class,'attribute_set_id','attribute_set_id')
                    ->where('locale',$locale)
                    ->orWhere('locale','en');
    }


    //Attribute
    public function attributeTranslation() //Remove Later
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(AttributeTranslation::class,'attribute_id')
                    ->where('locale',$locale);
    }

    public function attributeTranslationEnglish() //Remove Later
    {
        return $this->hasOne(AttributeTranslation::class,'attribute_id')
                    ->where('locale','en');
    }

    //Attribute Set
    public function attributeSetTranslation() //Remove Later
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id','attribute_set_id')
                    ->where('locale',$locale);
    }

    public function attributeSetTranslationEnglish() //Remove Later
    {
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id','attribute_set_id')
                    ->where('locale','en');
    }

    public function attributeValue()
    {
    	return $this->hasOne(AttributeValue::class,'attribute_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class); //db: attribute_category
    }


}
