<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'slug', 
        'is_active'
    ];

    public function tagTranslation()
    {
    	return $this->hasMany(TagTranslation::class,'tag_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
