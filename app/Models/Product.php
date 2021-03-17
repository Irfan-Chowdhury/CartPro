<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id',
        'tax_class_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'new_from',
        'new_to',
    ];


    public function productTranslation()
    {
    	return $this->hasMany(ProductTranslation::class,'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class)
    //                 ->withPivot('name');
    // }
}
