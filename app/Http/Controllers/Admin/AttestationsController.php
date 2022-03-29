<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attestation;
use App\Region;
use App\City;
use Validator;


class AttestationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
       
        return view('admin.attestations.index', ['attestations'=>$attestations, 'cities'=>$cities, 'regions'=>$regions, 'get_years' => $get_years]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region=Region::orderBy('name_cyrl','asc')->get();
        $city=City::orderBy('name_cyrl','asc')->get();
        return view('admin.attestations.create', ['city'=>$city,'region'=>$region]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'conclusion_number' => 'required',
            'conclusion_date' => 'required',
            'company_name' => 'required',
            'company_tin' => 'required|numeric',
            'xxtut' => 'required',
            'mxbt' => 'required',
            'region_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'company_id' => 'required',
            'positions_count' => 'required|numeric',
            'number' => 'required|numeric',
            'attestation_company' => 'required',
            'attestation_address' => 'required',
            'attestation_tin' => 'required|numeric',
            'certification_number' => 'required',
            'expired_at' => 'required',
            'payed_amount' => 'required|numeric'
        ];
        $messages = [
            'region_id.required' => 'Ҳудуд танланмаган',
            'city_id.required' => 'Туман (шаҳар) танланмаган',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }   
        $attestations = Attestation::create($request->all());

        return redirect()->route('admin.attestations.index', $attestations)->with('status','Успешно сохранено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attestation = Attestation::find($id);
        return view('admin.attestations.show', ['attestation'=>$attestation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region=Region::orderBy('name_cyrl','asc')->get();
        $city=City::orderBy('name_cyrl','asc')->get();
        $attestation = Attestation::find($id);
        return view('admin.attestations.edit',['attestation'=>$attestation, 'city'=>$city,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attestations = Attestation::where('id', $id)->first();

        $rules = [
            'conclusion_number' => 'required',
            'conclusion_date' => 'required',
            'company_name' => 'required',
            'company_tin' => 'required|numeric',
            'xxtut' => 'required',
            'mxbt' => 'required',
            'region_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'company_id' => 'required',
            'positions_count' => 'required|numeric',
            'number' => 'required|numeric',
            'attestation_company' => 'required',
            'attestation_address' => 'required',
            'attestation_tin' => 'required|numeric',
            'certification_number' => 'required',
            'expired_at' => 'required',
            'payed_amount' => 'required|numeric'
        ];
        $messages = [
            'region_id.required' => 'Ҳудуд танланмаган',
            'city_id.required' => 'Туман (шаҳар) танланмаган',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }   

        $attestations->update($request->all());
        return redirect()->route('admin.attestations.index', $attestations)->with('status','Успешно сохранено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attestations = Attestation::find($id);
        $attestations->delete();

        return redirect()->route('admin.attestations.index');
    }
}
