<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCentralApparatusRequest extends FormRequest
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
            'title'          => 'required|string|max:255',
            'phone'          => 'nullable|string|max:255',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'    => 'nullable|string',
            'content'        => 'nullable|string',
            'position'       => 'required|string|max:255',
            'reception_days' => 'required|string|max:255',
            'enabled'        => 'required|integer|max:255',
            'lang'           => 'required|string|max:255',
            'order'           => 'nullable|integer',
        ];
    }
}
