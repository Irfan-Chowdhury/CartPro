<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProducts extends Model
{
    protected $fillable = [
    	'order_id','sku','name','size','color','qty','unit_price','total_price'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class,'order_id');
    }
}

