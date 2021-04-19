<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'slug', 'coupon_code', 'value', 'discount_type', 'free_shipping', 'minimum_spend', 'maximum_spend', 'usage_limit_per_coupon',
        'usage_limit_per_customer', 'used', 'is_active', 'start_date', 'end_date',
    ];

    public function couponTranslations()
    {
    	return $this->hasMany(CouponTranslation::class,'coupon_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'coupon_products');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'coupon_categories');
    }
}
