<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ABKMRequest extends FormRequest
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
            'person_id' => 'required',
            'passport_series' => 'required|max:2|min:2',
            'passport_number' => 'required|max:7|min:7',
            'birth_date' => 'required',
            'phone_number' => 'required',
            'fio' => 'required',
            'region_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'lives_here' => 'nullable',
            'temp_region_id' => 'required_if:lives_here_value,0',
            'temp_district_id' => 'required_if:lives_here_value,0',
            'temp_address' => 'required_if:lives_here_value,0',
            'profession_type' => 'required',
            'profession' => 'required_if:profession_type,1',
            'profession_description' => 'required',
            'certificate_number' => 'required',
            'certificate_given_date' => 'required',
            'certificate_file' => 'required|file|max:5120|mimes:jpeg,jpg,png,doc,docx,pdf',
        ];
    }
}
