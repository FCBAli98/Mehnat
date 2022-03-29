<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
            'title'              => 'required|string|max:255',
            'hc_key'             => 'required|string|max:10',
            'legal_entity_count' => 'nullable|integer',
            'male_count'         => 'nullable|integer',
            'female_count'       => 'nullable|integer',
            'lang'               => 'required|string|max:255'
        ];
    }
}
