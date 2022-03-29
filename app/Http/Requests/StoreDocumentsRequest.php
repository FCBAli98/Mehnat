<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentsRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title'       => 'required|string',
            // 'url'         => 'required|string|max:255',
            'file1'       => 'nullable|file|max:2048',
            'file2'       => 'nullable|file|mimes:pdf|max:2048',
            'another_url' => 'required|string|max:255',
            'no'          => 'nullable|string|max:255',
            'date'        => 'required|date',
            'enabled'     => 'required|integer|max:255',
            'lang'        => 'required|string|max:255',
        ];
    }
}
