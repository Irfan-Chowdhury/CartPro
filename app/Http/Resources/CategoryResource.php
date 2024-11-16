<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'icon' => $this->icon,
            'image' => $this->image,
            'slug' => $this->slug,
            'top' => $this->top,
            'is_active'=> $this->is_active,
            'category_translation_id'=> $this->translation->id,
            'category_name'=> $this->translation->category_name,
            'locale'=> $this->translation->locale,
        ];
    }
}
