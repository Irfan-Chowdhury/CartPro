<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'key'            => $this->key,
            'plain_value'    => $this->plain_value?? null,
            'is_translatable'=> $this->is_translatable?? null,
            'locale' => $this->translation->locale ?? null,
            'value'  => $this->translation->value ?? null,
            'storeFrontImage' => [
                'title' => $this->storeFrontImage->title  ?? null,
                'type' => $this->storeFrontImage->type ?? null,
                'image' => $this->storeFrontImage->image ?? null,
            ] ?? null,
        ];
    }
}
