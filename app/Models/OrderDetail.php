<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class OrderDetail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * Vendora Start
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function orderProductTranslations()
    // {
    //     return $this->hasMany(ProductTranslation::class,'product_id','product_id');
    // }

    // public function getOrderProductTranslationAttribute()
    // {
    //     $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

    //     $translation = $this->orderProductTranslations->firstWhere('local', $locale);

    //     if (!$translation) {
    //         $translation = $this->orderProductTranslations->firstWhere('local', 'en');
    //     }

    //     return $translation;
    // }

    public function baseImage()
    {
        return $this->hasOne(ProductImage::class,'product_id','product_id')
                    ->where('type','base');
    }

    public function additionalImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }

    public function productAttributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class,'product_id','product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    /**
     * Vendora End
    */



    //Old Formation






    public function productTranslation()
    {
    	$locale = Session::get('currentLocale');
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                ->where('local',$locale);
    }

    //Admin Dashboard
    public function orderProductTranslation()
    {
    	$locale = Session::get('currentLocale');
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                ->where('local',$locale);
    }

    //Admin Dashboard
    public function orderProductTranslationEnglish()
    {
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                        ->where('local','en');
    }



}

