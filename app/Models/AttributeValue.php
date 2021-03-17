<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'position'
    ];

    public function attributeValueTranslation()
    {
    	return $this->hasMany(AttributeValueTranslation::class,'attribute_value_id');
    }
}
