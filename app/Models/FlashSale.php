<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{

    public function flashSaleTranslations()
    {
    	return $this->hasMany(FlashSaleTranslations::class,'flash_sale_id');
    }

    public function flashSaleProducts()
    {
    	return $this->hasMany(FlashSaleProduct::class,'flash_sale_id');
    }
}
