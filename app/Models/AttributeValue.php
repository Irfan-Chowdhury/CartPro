<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'name',
        'position'
    ];


    // Vendora
    public function translations()
    {
        return $this->hasMany(AttributeValueTranslation::class,'attribute_value_id');
    }

    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        $translation = $this->translations->firstWhere('local', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('local', 'en');
        }

        return $translation;
    }


    // Vendora End

    public function attributeValueTranslation() // Remove later
    {
    	return $this->hasMany(AttributeValueTranslation::class,'attribute_value_id');
    }


    public function attrValueTranslation()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasone(AttributeValueTranslation::class,'attribute_value_id')
                    ->where('local',$locale);
    }

    public function attrValueTranslationEnglish()
    {
    	return $this->hasone(AttributeValueTranslation::class,'attribute_value_id')
                    ->where('local','en');
    }
}
