<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'brand_name', 'brand_logo', 'status',
    // ];
    protected $fillable = [
        'slug', 'is_active',
    ];

    public function products()
    {
    	return $this->hasMany(Product::class,'brand_id');
    }

    public function brandTranslation()
    {
    	return $this->hasMany(BrandTranslation::class,'brand_id');
    	// return $this->hasOne(BrandTranslation::class,'brand_id');
    }
}
