<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{
    public function rules(Request $request)
    {
        if ($request->route()->getName() == 'updateCategory') {
            $rulesArr = [
                'title' => 'required|max:100'
            ];
        } else {
            $rulesArr = [
                'title' => 'required|unique:category,title|max:100'
            ];
        }
        
        return $rulesArr;
    }

    public function messages()
    {
        return [
            'title.required' => 'Укажите заголовок категории.',
            'title.unique'  => 'Категория с таким заголовком уже сущевствует.',
            'title.max' => 'Заголовок превышает допустимое значение символов.'
        ];
    }
}
