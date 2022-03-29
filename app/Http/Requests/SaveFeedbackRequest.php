<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFeedbackRequest extends FormRequest
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
            'anchor'             => 'required|email|max:255',
            'description'       => 'nullable|string',
            'lang'              => 'required|string|max:255',
            'additional_field1' => 'required|string|max:255',
            'additional_field2' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'anchor.required'  => 'Поля Email обязательно для заполнение',
            'anchor.email'  => 'Поля Email должен быть действительным адресом электронной почты.',
        ];
    }
}
