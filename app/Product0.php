<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Product extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku','image','slug','product_name', 'category_id', 'collection_id', 'brand_id', 'short_description', 'description', 'qty', 'tags','price','has_attribute','status', 'meta_title', 'meta_description'
    ];
    public function brands()
    {
    	return $this->belongsTo(Brand::class,'brand_id');
    }
    public function categories()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }
    
}
