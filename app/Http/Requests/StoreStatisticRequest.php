<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatisticRequest extends FormRequest
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
            'name_uz'     => 'required|string|max:255',
            'name_ru'     => 'required|string|max:255',
            'name_en'     => 'required|string|max:255',
            'name_cyrl'     => 'required|string|max:255',
            'parent_id'     => 'nullable|integer',
        ];
    }
}
