<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\ABKMRequest;
use App\Region;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ABKMController extends Controller
{
    public function create() {
        $regions = Region::pluck('name_uz', 'id');
        return view('abkm.create', ['regions' => $regions]);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('region_id', $request->region_id)->pluck('name_uz', 'id');

        return json_encode($cities);
    }

    public function store(ABKMRequest $request)
    {
        $file = null;
        $file_name = null;

        if ($request->file('certificate_file'))
        {
            $file_name = $request->file('certificate_file')->getClientOriginalName();
            $file_type = $request->file('certificate_file')->getClientMimeType();
            $file = base64_encode(file_get_contents($request->file('certificate_file')));
            $file ='data:'.$file_type.';base64, '.$file;
        }

        $data = [
            "person_id" => $request->get('person_id'),
            "passport" => $request->get('passport_series').$request->get('passport_number'),
            "fullname" => $request->get('fio'),
            "birth_date" => date('d.m.Y', strtotime($request->get('birth_date'))),
            "phone" => $request->get('phone_number'),
            "region_id" => $request->get('region_id'),
            "city_id" => $request->get('district_id'),
            "living_place" => $request->get('address'),
            "t_region_id" => $request->get('temp_region_id'),
            "t_city_id" => $request->get('temp_district_id'),
            "t_living_place" => $request->get('temp_address'),
            "soato" => City::find($request->get('district_id'))->soato,
            "business_type" => $request->get('profession_type'),
            "activity_type" => $request->get('profession'),
            "certificate_number" => $request->get('certificate_number'),
            "given_date" => date('d.m.Y', strtotime($request->get('certificate_given_date'))),
            "fileData" => $file,
            "fileName" => $file_name,
            "comment" => $request->get('profession_description')
        ];

        $message = 'Успешно сохранено';
        $error = '';

        $client = new Client();

        try {
            $response = $client->post('https://abkm.mehnat.uz/api/subsidy-applications', ['json' => $data]);

            $response_body = $response->getBody()->getContents();

            $response_body_collection = json_decode($response_body);

            if (!$response_body_collection->success)
            {
                $message = 'возникла ошибка';
                $error = json_decode($response_body)['error'];
            }

        }catch (\Exception $exception)
        {
            if ($exception->getCode() == 422)
            {
                $message = 'Проверку не прошла';
            }
        }

        return back()->with('success', $message);
    }

    public function isDisabledPerson($pin) {
        $url = 'https://resource1.mehnat.uz/services';

        $params = [
            "version" => "1.0",
            "id" => 7436,
            "method" => "ips.person.invalid.new",
            "params" => [
                "pin" => '43108870170016'
            ]
        ];
        $client = new Client(['verify' => false]);
        try {
            $response = $client->post($url, [
                'json' => $params
            ]);
            if ($response->getStatusCode() == 200) {
                $result = json_decode((string) $response->getBody(), true);
                if ($result) {
                    $d = $result['result']['history'][count($result['result']['history'])-1];

                    return [
                        'referenceNumber' => $d['referenceNumber'],
                        'referenceSeries' => $d['referenceSeries']
                    ];
                }else{
                    return [];
                }
            }

            return [];
        }catch (\Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
