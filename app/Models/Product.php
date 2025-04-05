<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use PowerJoins, SoftDeletes;

    protected $fillable = [
        'brand_id',
        'tax_class_id',
        'slug',
        'name',
        'description',
        'short_description',
        'meta_title',
        'meta_description',
        'price',
        'weight',
        'weight_base_calculation',
        'special_price',
        'is_special',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'new_from',
        'new_to',
        'avg_rating'
    ];

    protected $dates = ['deleted_at'];

    // Vendora
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class,'product_id');
    }

    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Try to find the translation in the requested locale
        $translation = $this->translations->firstWhere('local', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('local', 'en');
        }

        return $translation;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product','product_id','category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    // Vendora End





    // New
    public function productTranslations(){
        $locale = Session::get('currentLocale');
    	return $this->hasMany(ProductTranslation::class,'product_id')
                    ->where('local',$locale)
                    ->orWhere('local','en');
    }

    public function productTranslation(){  // Remove Later
    	$locale = Session::get('currentLocale');
    	return $this->hasOne(ProductTranslation::class,'product_id')
                ->where('local',$locale);
    }

    public function productTranslationEnglish(){ // Remove Later
    	return $this->hasOne(ProductTranslation::class,'product_id')
                        ->where('local','en');
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }

    public function productCategoryTranslation()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasOne(CategoryTranslation::class,'category_id')
                ->where('locale',$locale);
    }

    public function productCategoryTranslationEnglish()
    {
    	 return $this->hasOne(CategoryTranslation::class,'category_id')
                        ->where('local','en');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function baseImage()
    {
        return $this->hasOne(ProductImage::class,'product_id')
                    ->where('type','base');
    }

    public function additionalImage()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }


    // public function attributes()
    // {
    //     return $this->belongsToMany(Attribute::class,'product_attribute_value')
    //                 ->withPivot('attribute_value_id');
    // }

    public function brandTranslation()
    {
        $locale = Session::get('currentLocale');
    	return $this->hasOne(BrandTranslation::class,'brand_id','brand_id')
                ->where('local',$locale);
    }

    public function brandTranslationEnglish()
    {
    	return $this->hasOne(BrandTranslation::class,'brand_id','brand_id')
                ->where('local','en');
    }

    public function productAttributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    //For Home Page
    public function categoryProduct()
    {
        return $this->hasMany(CategoryProduct::class);
    }


    // Product
    public function attributeTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(AttributeTranslation::class,'attribute_id')
                    ->where('locale',$locale)
                    ->orWhere('locale','en');
    }
}
