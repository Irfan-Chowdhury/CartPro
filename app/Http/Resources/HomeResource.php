<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'sliders' => $this->sliders ?? null,
            'sliderBanners' => $this->sliderBanners ?? null,
            'settings' => $this->settings ?? null,
            'storefrontImages' => $this->storefrontImages ?? null,
            'homeFooterDescription' => $this->homeFooterDescription ?? null,
            'orderDetailProducts' => $this->orderDetailProducts ?? null,
            'changeCurrencyRate' => $this->changeCurrencyRate ?? null,
        ];
    }
}
