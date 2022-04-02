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
        'slug', 'parent', 'description','description_position','image','top','is_active','icon','parent_id'
    ];

    public function categoryTranslations()
    {
        $locale = Session::get('currentLocal');
    	return $this->hasMany(CategoryTranslation::class,'category_id')
                ->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('local','ASC')
                ->select('category_id','local','category_name');  //Remove Later
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
    }
    public function child()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function categoryProduct()
    {
        return $this->hasMany(CategoryProduct::class);
    }
}
