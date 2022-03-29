<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogsRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'required|string|max:255',
            'content'      => 'required|string',
            'date'         => 'nullable|date',
            'enabled'       => 'required|integer',
            'lang'         => 'required|string|max:255',
            'order'         => 'nullable|integer',
        ];
    }
}
