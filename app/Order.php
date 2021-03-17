<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'payment_id','user_id','customer_id','name','email','phone','ship_address','ship_city','ship_state','ship_postal_code','item','total_qty','total_price','coupon_id','coupon_discount'
    ];
}
