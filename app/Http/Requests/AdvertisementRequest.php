<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvertisementRequest extends FormRequest
{
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }
    public function messages()
    {
        return [
            'title.required' => 'Заголовок повинен бути заповнений.',
            'title.min'  => 'Заголовк повинен містити не менше 2 символів.',
            'title.max' => 'Заголовок повинен містити не більше ніж 150 символів.',
            'description.required' => 'Опис повинен бути заповнений.',
            'description.min' => 'Опис повинен містити не менше 2 символів.',
            'description.max' => 'Опис повинен містити не більше ніж 150 символів.',
            'condition.required'=>'Стан повинен бути вказаний.',
            'price.required' => 'Вартість повинна бути вказана',
            'price.numeric' => 'Вартість повинна бути вказаною у цифровому форматі (валюта - гривня)',
            'images.array' => 'Можна додати не більше 3 фото.',
            'images.between' => 'Можна додати не більше 3 фото.',
            'images.*'=>'Фотографії товару повинні бути картинками!',
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:150',
            'description' => 'required|min:2|max:1000',
            'condition' => "required",
            'price' => 'required|numeric',
            'images.*' => 'image',
            'images' => 'array|between:0,3',
        ];
    }
}
