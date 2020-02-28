<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArticleRequest extends FormRequest
{
    
    public function rules(Request $request)
    {
        if ($request->route()->getName() == 'updateArticle') {
            $rulesArr = [
                'title' => 'required|max:255',
                'desc' => 'required|max:500',
                'content' => 'required|max:6000'
            ];
        } else {
           $rulesArr = [
                'title' => 'required|unique:article,title|max:255',
                'desc' => 'required|max:500',
                'content' => 'required|max:6000'
            ]; 
        }

        return $rulesArr;
    }

    public function messages()
    {
        return [
            'title.required' => 'Укажите заголовок статьи.',
            'title.unique'  => 'Статья с таким заголовком уже сущевствует.',
            'title.max' => 'Заголовок превышает допустимое значение символов.',

            'desc.required' => 'Укажите краткое описание статьи.',
            'desc.max' => 'Описание превышает допустимое значение символов.',

            'content.required' => 'Напишите же статью.',
            'content.max' => 'Статья превышает допустимое значение символов.',
        ];
    }
}
