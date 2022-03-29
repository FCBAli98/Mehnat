<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'category_id'  => 'required|integer',
            'title'        => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'required|string|max:255',
            'content'      => 'required|string',
            'date'         => 'required|date',
            'enabled'       => 'required|integer|max:255',
            'lang'         => 'required|string|max:255',
        ];
    }
}
