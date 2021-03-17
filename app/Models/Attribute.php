<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'slug', 
        'attribute_set_id',
        'category_id',
        'is_filterable',
        'is_active'
    ];

    public function attributeTranslation()
    {
    	return $this->hasMany(AttributeTranslation::class,'attribute_id');
    }

    public function attributeSetTranslation()
    {
    	return $this->hasMany('App\Models\AttributeSetTranslation','attribute_set_id','attribute_set_id');
    }

    public function attributeValue()
    {
    	return $this->hasOne(AttributeValue::class,'attribute_id');
    }
    
    //For AttibuteController 
    public function attributeValues()
    {
    	return $this->hasMany(AttributeValue::class,'attribute_id');
    }

    //For Produc
    // public function attributeValueTranslation()
    // {
    // 	return $this->hasMany(AttributeValueTranslation::class,'attribute_id');
    // } 
}
