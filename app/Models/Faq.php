<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_type_id',
        'is_active',
    ];
    // protected $dates = ['deleted_at'];


    // vendora
    public function translations()
    {
        return $this->hasMany(FaqTranslation::class,'faq_id');
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







    public function faqTranslation()
    {
        $locale = Session::get('currentLocale');
        return $this->hasOne(FaqTranslation::class,'faq_id')
                    ->where('locale',$locale);
    }

    public function faqTranslationEnglish()
    {
        $locale = 'en';
        return $this->hasOne(FaqTranslation::class,'faq_id')
                    ->where('locale',$locale);
    }

    public function faqType()
    {
        $locale = Session::get('currentLocale');
        return $this->belongsTo(FaqTypeTranslation::class,'faq_type_id')
                ->where('locale',$locale);
    }
}
