<?php

namespace App\Http\Controllers;

use App\Anceta;
use App\City;
use App\Region;
use Illuminate\Http\Request;

class AncetaController extends Controller
{
    public function create() {
        $regions = Region::pluck('name_uz', 'id');
        return view('anceta.create', ['regions' => $regions]);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('region_id', $request->region_id)->pluck('name_uz', 'id');

        return json_encode($cities);
    }

    public function store(Request $request)
    {
        $message = 'Успешно сохранено';
        Anceta::create([
            "FIO" => $request->get('FIO'),
            "passport" => $request->get('passport_series').$request->get('passport_number'),
            "birth_date" => date('Y-m-d', strtotime($request->get('birth_date'))),
            "phone" => $request->get('phone'),
            "edu_center" => $request->get('edu_center'),
            "speciality" => $request->get('speciality'),
            "first" => $request->get('first'),
            "second" => $request->get('second'),
            "third" => $request->get('third'),
            "fourth" => $request->get('fourth'),
            "fifth" => $request->get('fifth'),
            "sixth" => $request->get('sixth'),
            "seventh" => $request->get('seventh'),
            "eighth" => $request->get('eighth'),
            "ninth" => $request->get('ninth'),
            "tenth" => $request->get('tenth'),
            "eleventh" => $request->get('eleventh'),
            "region_id" => $request->get('region_id'),
            "street" => $request->get('street'),
            "city_id" => $request->get('city_id'),
            "date" => $request->get('date')
        ]);

        return back()->with('success', $message);
    }
}
