<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicesRequest extends FormRequest
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
            'icon'        => 'nullable|file|mimes:svg|max:2048',
            'description'  => 'nullable|string|max:255',
            'content'      => 'required_if:another_url,""|nullable|string',
            'enabled'       => 'required|integer|max:255',
            'another_url'  => 'nullable|string|max:255',
            'order'  => 'nullable|integer',
            'lang'         => 'required|string|max:255',
        ];
    }
}
