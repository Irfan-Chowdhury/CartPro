<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSaleProduct extends Model
{
    protected $fillable = ['flash_sale_id','product_id','end_date','price','qty','position'];
}
