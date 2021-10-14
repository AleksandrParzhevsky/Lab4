<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequestLesson extends FormRequest
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
            'lesson' => 'required|min:3|max:50',
            'classRoom' => 'required|min:3|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'lesson' => 'наименование',
            'classRoom' => 'кабинет',
        ];
    }

    public function messages()
    {
        return [
            'lesson.required' => 'Ошибка в поле наименования.',
            'classRoom.required' => 'Ошибка в поле кабинет',
        ];
    }
}
