<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'Product data retrieved successfully',
            'productDetails' => $this->productDetails ?? null,
            'reviews' => $this->reviews ?? [],
            'generalSettings' => $this->generalSettings ?? null,
            'socialShareLinks' => $this->socialShareLinks ?? null,
            'categoryWiseProducts' => $this->categoryWiseProducts ?? null,
        ];
    }
}
