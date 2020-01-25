<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|unique:category,title|max:100'
        ];
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
