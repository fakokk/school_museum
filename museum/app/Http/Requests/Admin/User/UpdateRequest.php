<?php

namespace App\Http\Requests\Admin\User;

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
     * @return array
     */
    public function rules()
    {
        return [
            // 
            'username' => 'required|string',
            //добавить возможность перерегистрировать аккаунт на другую почту
            // 'email' => 'required|string|unique:users, . $this->user_id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Это поле должно иметь строковый тип',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Это поле должно иметь строковый тип',
            'email.email' => 'Это поле должно соответствовать формату адреса электронной почты',
            'name.unique' => 'Пользователь с таким e-mail уже существует',
        ];
    }
}
