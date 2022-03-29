<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\MigrantStoreRequest;
use App\Migrant;
use App\Region;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MigrantController extends Controller
{
    public function create() {
        $regions = Region::pluck('name_uz', 'id');
        return view('migrant.create', ['regions' => $regions]);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('region_id', $request->region_id)->pluck('name_uz', 'id');

        return json_encode($cities);
    }

    public function store(MigrantStoreRequest $request)
    {
        $message = 'Успешно сохранено';
        $error = '';

        Migrant::updateOrCreate([
            'passport_series' => $request->get('passport_series'),
            'passport_number' => $request->get('passport_number')
        ], [
            "FIO" => $request->get('FIO'),
            "birth_date" => date('d.m.Y', strtotime($request->get('birth_date'))),
            "phone" => $request->get('phone'),
            "region_id" => $request->get('region_id'),
            "city_id" => $request->get('city_id'),
            "address" => $request->get('address'),
            "live_here" => $request->get('live_here'),
            "temp_region_id" => $request->get('temp_region_id'),
            "temp_city_id" => $request->get('temp_city_id'),
            "temp_address" => $request->get('temp_address'),
            "description" => $request->get('description')
        ]);

        return back()->with('success', $message);
    }


}
