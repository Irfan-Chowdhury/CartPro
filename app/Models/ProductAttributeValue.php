<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ProductAttributeValue extends Model
{

    protected $table = 'product_attribute_value';

    protected $fillable = ['product_id','attribute_id','attribute_value_id'];


    // Vendora

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    // public function attributeValue()
    // {
    // 	return $this->belongsTo(AttributeValue::class);
    // }

    // Vendora



    //Used HomeController for product-details;
    public function attributeTranslation()
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(AttributeTranslation::class,'attribute_id','attribute_id')
                    ->where('locale',$locale);
    }
    public function attributeTranslationEnglish()
    {
        return $this->hasOne(AttributeTranslation::class,'attribute_id','attribute_id')
                    ->where('locale','en');
    }



    //Frontend/HomeController index()
    public function attrValueTranslation()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasone(AttributeValueTranslation::class,'attribute_value_id','attribute_value_id')
                    ->where('local',$locale);
    }
    public function attrValueTranslationEnglish()
    {
    	return $this->hasone(AttributeValueTranslation::class,'attribute_value_id','attribute_value_id')
                    ->where('local','en');
    }


    //For ProductController index()
    public function attributeValueTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(AttributeValueTranslation::class,'attribute_value_id','attribute_value_id')
                ->where('local',$locale)
                ->orWhere('local','en');
    }
}
