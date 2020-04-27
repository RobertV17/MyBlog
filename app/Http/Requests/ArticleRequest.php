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
                'content' => 'required|max:6000',
                'previewImg' => 'nullable|file|max:20000'
            ];
        } else {
           $rulesArr = [
                'title' => 'required|unique:article,title|max:255',
                'desc' => 'required|max:500',
                'content' => 'required|max:6000',
                'previewImg' => 'file|required|max:20000'
            ];
        }

        return $rulesArr;
    }

    public function messages()
    {
        return [
            'title.required' => 'Укажите заголовок статьи.',
            'title.unique'  => 'Статья с таким заголовком уже существует.',
            'title.max' => 'Заголовок превышает допустимое значение символов.',

            'desc.required' => 'Укажите краткое описание статьи.',
            'desc.max' => 'Описание превышает допустимое значение символов.',

            'content.required' => 'Напишите же статью.',
            'content.max' => 'Статья превышает допустимое значение символов.',

            'previewImg.required' => 'Укажите изображение статьи (превью).',
            'previewImg.size' => 'Объем изображение статьи превышает 20мб',
            'previewImg.file' => 'При загрузке файла произошла ошибка'
        ];
    }
}
