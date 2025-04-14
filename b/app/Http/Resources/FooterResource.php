<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'settingNewslatter'  => $this->settingNewslatter ?? false,
            'storefrontImages'  => $this->storefrontImages ?? null,
            'storeSettings'  => $this->storeSettings ?? null,
            'tags'   => $this->tags ?? [],
            'settings'   => $this->settings ?? null
        ];
    }
}
