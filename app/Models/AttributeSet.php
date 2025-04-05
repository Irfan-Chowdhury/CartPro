<?php

namespace App\Models;

use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class AttributeSet extends Model
{
    use TranslationTrait, SoftDeletes;

    protected $fillable = ['is_active','name'];
    protected $dates = ['deleted_at'];

    // Vendora
    public function translations()
    {
        return $this->hasMany(AttributeSetTranslation::class,'attribute_set_id');
    }

    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        $translation = $this->translations->firstWhere('locale', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('locale', 'en');
        }

        return $translation;
    }

    // Vendora End






    //New
    public function attributeSetTranslations()
    {
        $locale = Session::get('currentLocale');
        return $this->hasMany(AttributeSetTranslation::class,'attribute_set_id')
                    ->where('locale',$locale)
                    ->orWhere('locale','en');
    }
    //New
    public function format()
    {
        return [
            'id'=>$this->id,
            'is_active'=>$this->is_active,
            'attribute_set_name'=> $this->translations($this->attributeSetTranslations)->attribute_set_name ?? null
        ];
    }



    // Previous
    public function attributeSetTranslation()
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id')
                    ->where('locale',$locale);
    }

    public function attributeSetTranslationEnglish()
    {
        return $this->hasOne(AttributeSetTranslation::class,'attribute_set_id')
                    ->where('locale','en');
    }

    //For Product
    public function attributes()
    {
    	return $this->hasMany(Attribute::class,'attribute_set_id');
    }
}
