<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = [
        'category_id', 'local','category_name',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
