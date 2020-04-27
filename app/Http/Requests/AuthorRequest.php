<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'info' => 'required|max:3000',
            'avatar' => 'file|max:20000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите ваше имя.',
            'name.max' => 'Имя превышает допустимое значение символов.',

            'info.required' => 'Напишите что-нибудь о себе.',
            'info.max' => 'Описание превышает допустимое значение символов.',

            'avatar.size' => 'Объем картинки превышает 20мб',
            'avatar.file' => 'При загрузке файла произошла ошибка'
        ];
    }
}
