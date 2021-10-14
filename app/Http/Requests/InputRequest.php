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
            'worker_name' => 'required|min:3|max:50',
            'worker_surname' => 'required|min:3|max:30',
            'worker_patronymic' => 'required|min:3|max:50',
            'worker_num_l'=> 'required|min:1|max:10',
            'worker_num_s'=> 'required|min:1|max:10'
        ];
    }

    public function attributes()
    {
        return [
            'worker_name' => 'имя',
            'worker_surname' => 'фамилия',
            'worker_patronymic' => 'отчество',
            'worker_num_l'=> 'количество пар',
            'worker_num_s'=> 'количество студентов'
        ];
    }

    public function messages()
    {
        return [
            'worker_name.required' => 'Ошибка в поле имя.',
            'worker_surname.required' => 'Ошибка в поле фамилия',
            'worker_patronymic.required' => 'Ошибка в поле отчество',
            'worker_num_l.required'=> 'Ошибка в поле количество пар',
            'worker_num_s.required'=> 'Ошибка в поле количество студентов'
        ];
    }
}
