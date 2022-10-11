<?php

namespace App\Repositories\Tax;

use App\Contracts\Tax\TaxTranslationContract;
use App\Models\TaxTranslation;

class TaxTranslationRepository implements TaxTranslationContract
{
    public function store($data){
        return TaxTranslation::create($data);
    }
}
