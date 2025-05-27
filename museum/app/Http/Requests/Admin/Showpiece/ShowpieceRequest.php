<?php

namespace App\Http\Requests\Admin\Showpiece;

use Illuminate\Foundation\Http\FormRequest;

class ShowpieceRequest extends FormRequest
{
    public function rules()
    {
        return [
            // все поля required - обязательно должны быть заполнены
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'tag_ids' => 'nullable|array', // Validate tag IDs as an array
            'tag_ids.*' => 'exists:tags,id', // Ensure each tag ID exists in the tags table
            'photos.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,jfif'

        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Это поле необходимо для заполнения',
            // 'name.string' => 'Это поле должно иметь строковый тип',
            // 'email.required' => 'Это поле необходимо для заполнения',
            // 'email.string' => 'Это поле должно иметь строковый тип',
            // 'email.email' => 'Это поле должно соответствовать формату адреса электронной почты',
            // 'name.unique' => 'Пользователь с таким e-mail уже существует',
            // 'password.required' => 'Это поле необходимо для заполнения',
            // 'password.string' => 'Это поле должно быть строкой'
        ];
    }
}
