<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'preview_image' => 'required|file',
            'price' => 'required|numeric',
            'abv' => 'required|numeric',
            'ibu' => 'required|numeric',
            'quantity' => 'required|numeric',
            'is_published' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
            'brewery_id' => 'nullable|exists:breweries,id',
            'tags' => 'nullable|array',
            'product_images' => 'nullable|array'
        ];
    }
}
