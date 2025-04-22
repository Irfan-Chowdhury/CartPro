<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_name' => 'required|unique:category_translations,category_name,NULL,id,deleted_at,NULL',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
