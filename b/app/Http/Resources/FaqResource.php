<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'faqTypeId' => $this->id,
            'typeName' => $this->translation->type_name,
            'locale' => $this->translation->locale ?? null,
            'faqs' => $this->faqs->map(function($faq){
                return [
                    'faqId' => $faq->id,
                    'locale' => $faq->translation->locale ?? null,
                    'title' => $faq->translation->title,
                    'description' => $faq->translation->description,
                ];
            })
        ];
    }
}


// $faqTypesArr = FaqType::with(['translations','faqs'=> function($q){
//     $q->where('is_active',1);
// }])
// ->where('is_active',1)
// ->get();



// ->map(function($faqType){
//     return [
//         'faqTypeId' => $faqType->id,
//         'typeName' => $faqType->translation->type_name,
//         'locale' => $faqType->translation->locale ?? null,
//         'faqs' => $faqType->faqs->map(function($faq){
//             return [
//                 'faqId' => $faq->id,
//                 'locale' => $faq->translation->locale ?? null,
//                 'title' => $faq->translation->title,
//                 'description' => $faq->translation->description,
//             ];
//         })
//     ];
// });
