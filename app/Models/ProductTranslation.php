<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = [
        'product_id',
        'local',
        'product_name',
        'description',
        'short_description',
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id','id');
    }
}
