<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'Home data retrieved successfully',
            'data' => [
                'sliders' => $this->sliders ?? [],
                'sliderBanners' => $this->sliderBanners ?? [],
                'settings' => $this->settings ?? [],
                'storefrontImages' => $this->storefrontImages ?? [],
                'homeFooterDescription' => $this->homeFooterDescription ?? null,
                'trendProducts' => $this->trendProducts ?? [],
                'changeCurrencyRate' => $this->changeCurrencyRate ?? null,
                'productDetailsTab' => $this->productDetailsTab ?? [],
            ]
        ];
    }
}
