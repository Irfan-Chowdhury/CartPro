<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'parent', 'description','description_position','image','top','is_active','icon'
    ];

    public function categoryTranslation()
    {
    	 return $this->hasMany(CategoryTranslation::class,'category_id');
    }

    public function catTranslation()
    {
        $locale = Session::get('currentLocal');
    	return $this->hasOne(CategoryTranslation::class,'category_id')
                ->where('local',$locale);
    }

    public function categoryTranslationDefaultEnglish()
    {
    	 return $this->hasOne(CategoryTranslation::class,'category_id')
                        ->where('local','en');
    }

    public function products()
    {
    	return $this->hasMany(Product::class,'category_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class,'parent_id');

        // return $this->hasOne(CategoryTranslation::class,'category_id','parent_id');
                        // ->where('local','en');
        // return $this->belongsTo(CategoryTranslation::class,'parent_id')
        // ->where('local','en');
    }
    public function child()
    {
        return $this->hasMany(self::class,'parent_id');
    }


    //For Category Wise Product
    // public function product()
    // {
    //     return $this->belongsTo('App\Models\Product');
    // }

    public function categoryProduct()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    //Limited Product Show
    // public function categoryProductLimit()
    // {
    //     return $this->hasMany(CategoryProduct::class);
    // }


    // public function categoryProductTranslation()
    // {
    //     $locale = Session::get('currentLocal');
    //     return $this->hasOne(ProductTranslation::class,'product_id','product_id')
    //             ->where('local',$locale);
    // }
}
