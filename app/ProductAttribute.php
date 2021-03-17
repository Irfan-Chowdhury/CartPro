<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'sku', 'image', 'size', 'color', 'qty', 'price', 'product_id'
    ];

    public function product() 
    {
    	return $this->belongsTo(Product::class);
    }
}
