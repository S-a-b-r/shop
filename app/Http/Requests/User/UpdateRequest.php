<?php

namespace App\Http\Requests\User;

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
            'name'=>'required|string|max:30',
            'gender'=>'required|integer',
            'surname'=>'nullable|string|max:30',
            'patronymic'=>'nullable|string|max:30',
            'age'=>'nullable|numeric|min:18|max:150',
            'address'=>'nullable|string',
        ];
    }
}
