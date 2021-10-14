<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequestTask1 extends FormRequest
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
          'position' => 'required|min:3|max:20',
          'name' => 'required|min:1|max:50'
        ];
    }

    public function attributes()
    {
        return [
          'position' => 'предмет',
          'name' => 'ФИО'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Ошибка в поле ФИО.',
          'position.required' => 'Ошибка в поле кабинет.',
        ];
    }
}
