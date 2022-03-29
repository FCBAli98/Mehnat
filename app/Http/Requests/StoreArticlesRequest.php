<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticlesRequest extends FormRequest
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
            'description'  => 'required|string|max:255',
            'content'      => 'required|string',
            'date'         => 'nullable|date',
            'enabled'       => 'required|integer',
            'lang'         => 'required|string|max:255',
            'order'         => 'nullable|integer',
        ];
    }
}
