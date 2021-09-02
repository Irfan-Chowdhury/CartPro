<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'country',
        'zip',
        'rate',
        'based_on',
        'is_active',
    ];

    public function taxTranslation()
    {
    	return $this->hasMany(TaxTranslation::class,'tax_id');
    }
}
