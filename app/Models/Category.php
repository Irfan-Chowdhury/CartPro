<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Category extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'parent', 'description','description_position','image','featured','is_active',
    ];

    public function categoryTranslation()
    {
    	return $this->hasMany(CategoryTranslation::class,'category_id');
    }

    public function products()
    {
    	return $this->hasMany(Product::class,'category_id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    
}
