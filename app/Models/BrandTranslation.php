<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{

    protected $fillable = [
        'brand_id', 'local','brand_name',
    ];

    public function brand() //still not use
    {
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }
}
