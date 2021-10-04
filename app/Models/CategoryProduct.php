<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function categoryTranslation()
    {
    	$locale = Session::get('currentLocal');
    	return $this->hasOne(CategoryTranslation::class,'category_id','category_id')
                ->where('local',$locale);
    }

    public function categoryTranslationDefaultEnglish()
    {
    	return $this->hasOne(CategoryTranslation::class,'category_id','category_id')
                        ->where('local','en');
    }


    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function productTranslation()
    {
    	$locale = Session::get('currentLocal');
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                ->where('local',$locale);
    }

    public function productTranslationDefaultEnglish()
    {
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                        ->where('local','en');
    }

    public function productBaseImage()
    {
        return $this->hasOne(ProductImage::class,'product_id','product_id');
    }

    public function additionalImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }



    // public function brandTranslation()
    // {
    //     $locale = Session::get('currentLocal');
    //     return $this->hasOne(BrandTranslation::class,'brand_id')
    //                 ->where('local',$locale);
    // }

    // public function brandTranslationDefaultEnglish()
    // {
    // 	return $this->hasOne(BrandTranslation::class,'brand_id','brand_id')
    //                     ->where('local','en');
    // }
}
