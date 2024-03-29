<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'products' => 'required|array',
            'address' => 'required|string',
            'id_user' => 'required|exists:users,id',
            'type_shipping' => 'required|numeric|min:0|max:1',
            'total_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
        ]; // TODO: Change the autogenerated stub
    }
}
