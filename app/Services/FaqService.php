<?php

namespace App\Services;

use App\Models\FaqType;

class FaqService
{
    public function getFaqData()
    {
        return FaqType::with(['translations','faqs'=> function($q){
            $q->where('is_active',1);
        }])
        ->where('is_active',1)
        ->get();
    }
}
