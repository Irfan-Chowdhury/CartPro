<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class FaqType extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active'
    ];


    // vendora
    public function translations()
    {
        return $this->hasMany(FaqTypeTranslation::class,'faq_type_id');
    }

    // vendora
    public function getTranslationAttribute()
    {
        $locale = Session::has('currentLocale') ? Session::get('currentLocale') : app()->getLocale();

        // Try to find the translation in the requested locale
        $translation = $this->translations->firstWhere('locale', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('locale', 'en');
        }

        return $translation;
    }






    public function faqTypeTranslation()
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(FaqTypeTranslation::class,'faq_type_id')
                    ->where('locale',$locale);
    }

    public function faqTypeTranslationEnglish()
    {
        $locale = 'en';
        return $this->hasOne(FaqTypeTranslation::class,'faq_type_id')
                    ->where('locale',$locale);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class,'faq_type_id');
    }
}
