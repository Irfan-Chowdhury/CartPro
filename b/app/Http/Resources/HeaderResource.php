<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeaderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'headerFacebookLink'  => $this->facebook ?? null,
            'headerTwitterLink'   => $this->twitter ?? null,
            'headerInstagramLink' => $this->instagram ?? null,
            'headerYoutubeLink'   => $this->youtube ?? null,
            'storefrontShopPageEnabled'   => $this->storefrontShopPageEnabled ?? null,
            'storefrontBrandPageEnabled'   => $this->storefrontBrandPageEnabled ?? null,
            'welcomeTitle'   => $this->welcomeTitle ?? null,
            'headerLogoPath'   => $this->headerLogoPath ?? null,
            'categoryMenuList'   => $this->categoryMenuList ?? [],
        ];
    }
}
