<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class OrderDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productTranslation()
    {
    	$locale = Session::get('currentLocal');
    	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
                ->where('local',$locale);
    }

    public function baseImage()
    {
        return $this->hasOne(ProductImage::class,'product_id','product_id')
                    ->where('type','base');
    }

    // public function productTranslationEnglish()
    // {
    // 	return $this->hasOne(ProductTranslation::class,'product_id','product_id')
    //                     ->where('local','en');
    // }
}

