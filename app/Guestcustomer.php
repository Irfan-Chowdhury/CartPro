<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guestcustomer extends Model
{
    
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone','email','shipping_address','ip_adddress',
    ];
}
