<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    protected $fillable = [
        'image', 'name', 'status',
    ];
    public function products()
    {
    	return $this->hasMany(Product::class,'collection_id');
    }
}
