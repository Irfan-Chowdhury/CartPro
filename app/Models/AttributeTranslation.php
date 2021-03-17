<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    protected $fillable = [
        'attribute_id', 
        'local',
        'attribute_name'
    ];
}
