<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderItemRequest extends FormRequest
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
            'enabled'       => 'required|integer',
            'image'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'         => 'nullable|string|max:255',
            'url'         => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'lang'         => 'required|string|max:255',
        ];
    }
}
