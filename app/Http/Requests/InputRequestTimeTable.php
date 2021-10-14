<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'day' => 'required|min:3|max:50',
            'first_lesson' => 'required|min:3|max:50',
            'second_lesson' => 'required|min:3|max:50',
            'third_lesson' => 'required|min:3|max:50'
        ];
    }

    public function attributes()
    {
        return [
            'day' => 'день недели',
            'first_lesson' => 'первое занятие',
            'second_lesson' => 'второе занятие',
            'third_lesson' => 'третье занятие'
        ];
    }

    public function messages()
    {
        return [
            'day.required' => 'Ошибка в поле день недели.',
            'first_lesson.required' => 'Ошибка в поле первое занятие.',
            'second_lesson.required' => 'Ошибка в поле второе занятие.',
            'third_lesson.required' => 'Ошибка в поле третье занятие.'
        ];
    }
}
