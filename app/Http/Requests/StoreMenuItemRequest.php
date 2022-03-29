<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuItemRequest extends FormRequest
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
            'parent_id'        => 'nullable|integer',
            'url'        => 'required|string|max:255',
            'enabled'       => 'required|integer',
            'order'       => 'nullable|integer',
            'lang'         => 'required|string|max:255',
        ];
    }
}
