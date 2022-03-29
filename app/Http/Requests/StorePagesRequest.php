<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagesRequest extends FormRequest
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
            'title'        => 'required|string|max:255',
            'description'  => 'required|string|max:255',
            'content'      => 'required|string',
            'enabled'      => 'required|integer|max:255',
            'lang'         => 'required|string|max:255',
            'relation_menu_id' => 'nullable|integer',
        ];
    }
}
