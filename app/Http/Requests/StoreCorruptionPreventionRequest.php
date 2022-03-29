<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorruptionPreventionRequest extends FormRequest
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
            'user_type' => 'required|integer',
            'fio'     => 'required|string|max:255',
            'address'   => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'content' => 'required|string',
        ];
    }
}
