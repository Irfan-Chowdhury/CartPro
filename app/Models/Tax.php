<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Tax extends Model
{
    protected $fillable = [
        'country',
        'zip',
        'rate',
        'based_on',
        'is_active',
    ];

    // public function taxTranslation()
    // {
    // 	return $this->hasMany(TaxTranslation::class,'tax_id');
    // }

    public function taxTranslation()
    {
        $locale = Session::get('currentLocal');
    	return $this->hasOne(TaxTranslation::class,'tax_id')
                ->where('locale',$locale);
    }

    public function taxTranslationDefaultEnglish()
    {
    	 return $this->hasOne(TaxTranslation::class,'tax_id')
                        ->where('locale','en');
    }
}
