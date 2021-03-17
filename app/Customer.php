<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Customer extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'user_id', 'phone', 'email','shipping_address','billing_address','customer_ip','password',
    ];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
