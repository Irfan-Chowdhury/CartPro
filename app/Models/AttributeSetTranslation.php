<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSetTranslation extends Model
{
    protected $fillable = ['attribute_set_id','local','attribute_set_name'];
}
