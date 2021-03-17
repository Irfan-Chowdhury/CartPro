<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Wishlist extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_id',
    ];
    public function users()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
    public function products()
    {
    	return $this->belongsTo(Product::class,'product_id');
    }
}
