<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    
    public function attributeSetTranslation()
    {
    	return $this->hasMany(AttributeSetTranslation::class,'attribute_set_id');
    }

    //For Product
    public function attributes()
    {
    	return $this->hasMany(Attribute::class,'attribute_set_id');
    }

    //Special
    public function attributeTranslation()
    {
    	return $this->hasMany(AttributeTranslation::class,'attribute_set_id');
    }

}
