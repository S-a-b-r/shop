<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|string',
            'gender'=>'required|integer',
            'surname'=>'nullable|string|max:30',
            'patronymic'=>'nullable|string|max:30',
            'age'=>'nullable|integer|min:1|max:150',
            'address'=>'nullable|string|max:200',
        ];
    }

//    public function messages()
//    {
//        return [
//            'name'=>'Ошибка в заполнении имени',
//            'email'=>'Ошибка в заполнении email',
//            'password'=>'Ошибка в заполнении пароля',
//            'gender'=>'Ошибка в заполнении пола',
//            'surname'=>'Ошибка в заполнении фамилии',
//            'patronymic'=>'Ошибка в заполнении отчества',
//            'age'=>'Ошибка в заполнении возраста',
//            'address'=>'Ошибка в заполнении адреса',
//        ];
//    }
}
