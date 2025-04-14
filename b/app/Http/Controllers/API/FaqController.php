<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq(FaqService $faqService)
    {
        $faqTypesArr = $faqService->getFaqData();

        return FaqResource::collection($faqTypesArr);
    }
}
