<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'author' => 'required|max:50',
            'email' => 'required|email|max:100',
            'comment' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Укажите ваше имя.',
            'author.max' => 'Имя превышает допустимое количество символов.',
            'email.required' => 'Укажите ваш email.',
            'email.email' => 'Некорректный email адресс.',
            'email.max' => 'Email превышает допустимое количество символов.',
            'comment.required' => 'Укажите ваш комментарий :)',
            'comment.max' => 'Комментарий превышает допустимое количество символов.',
        ];
    }
}
