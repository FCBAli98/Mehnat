<?php

namespace App\Http\Controllers;

use App\Attestation;
use App\Region;
use App\City;

use Illuminate\Http\Request;

class AttestationsController extends Controller
{
    public function index(Request $request)
    {   
        $region_id = $request->region_id ?? null;
        $city_id = $request->city_id ?? null;
        $years = $request->years ?? null;
        $company_tin = $request->company_tin ?? null;
        $conclusion_number = $request->conclusion_number ?? null;
        $xxtut = $request->xxtut ?? null;
        $mxbt = $request->mxbt ?? null;
        $attestation_tin = $request->attestation_tin ?? null;

        $regions=Region::orderBy('name_cyrl','asc')->get();
        $cities=City::orderBy('name_cyrl','asc')->get();
        $attestations = Attestation::orderBy('id', 'ASC');
        $get_years = [2015, 2016, 2017, 2018, 2019, 2020];
        if(!is_null($company_tin)) {
            $attesttations = $attestations->where('company_tin', $company_tin);
        }

        if(!is_null($region_id)) {
            $cities = City::where('region_id', $request->region_id)->get();
            $attesttations = $attestations->where('region_id', $region_id);
        }
        
        if(!is_null($city_id) && !is_null($region_id)) {
            $attestations = $attestations->where('city_id', $city_id);
        }

        if(!is_null($conclusion_number)) {
            $attesttations = $attestations->where('conclusion_number', $conclusion_number);
        }

        if(!is_null($years)) {
            $attestations = $attestations->where('conclusion_date', 'like', '%'.$years.'%');
        }

        if(!is_null($xxtut)) {
            $attesttations = $attestations->where('xxtut', $xxtut);
        }

        if(!is_null($mxbt)) {
            $attesttations = $attestations->where('mxbt', $mxbt);
        }

        if(!is_null($attestation_tin)) {
            $attesttations = $attestations->where('attestation_tin', $attestation_tin);
        }

         $attestations = $attestations->paginate(10)->appends(request()->query());
       
        return view('attestations.index', ['attestations'=>$attestations, 'cities'=>$cities, 'regions'=>$regions, 'get_years' => $get_years]);

    }

    
}
 