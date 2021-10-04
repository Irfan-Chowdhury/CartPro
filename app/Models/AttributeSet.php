<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class AttributeSet extends Model
{

    public function attributeSetTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id')
                    ->where('locale',$locale);
    }

    public function attributeSetTranslationEnglish()
    {
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id')
                    ->where('locale','en');
    }

    //For Product
    public function attributes()
    {
    	return $this->hasMany(Attribute::class,'attribute_set_id');
    }

    //Special
    // public function attributeTranslation()
    // {
    // 	return $this->hasMany(AttributeTranslation::class,'attribute_set_id');
    // }
}
