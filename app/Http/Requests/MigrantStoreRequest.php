<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MigrantStoreRequest extends FormRequest
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
            "passport_series" => "required|max:2",
            "passport_number" => "required|max:7",
            "FIO" => "required",
            "birth_date" => "required",
            "phone" => "required",
            "region_id" => "required",
            "city_id" => "required",
            "address" => "required",
            "temp_region_id" => "nullable",
            "temp_city_id" => "nullable",
            "temp_address" => "nullable",
            "description" => "required",
        ];
    }
}
