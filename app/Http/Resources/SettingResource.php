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
            'plain_value'    => $this->plain_value,
            'is_translatable'=> $this->is_translatable,
            'locale' => $this->translation->locale ?? null,
            'value'  => $this->translation->value ?? null,
        ];
    }
}
