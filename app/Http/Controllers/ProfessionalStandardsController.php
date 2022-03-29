<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfessionalStandard;
use App\ProfessionalStandardUz;
use Validator;
use Lang;
use DB;

class ProfessionalStandardsController extends Controller
{
    public function index(Request $request) 
    {

        $locale = Lang::getLocale();
        $condition = [];
        $professionalstandads = [];
        $professionalstandads = ProfessionalStandard::where($condition);
        $ps_query = DB::table('professional_standarts');  
        // $ministries = config('ministries');
        // $activities = config('activities');        
        // $types = config('types');

        if($locale == 'uz' || $locale == 'oz') {
            $professionalstandads = ProfessionalStandardUz::where($condition);      
            $ps_query = DB::table('professional_standarts_uz');       
        }

        if ($request->has('regionActivite')) {
            $regionActivite = $this->mb_ucfirst($request->regionActivite);
            $professionalstandads->where('regionActivite', 'like', '%'.$regionActivite.'%');
        } 

        if ($request->has('standarbyRregion')) {
            $standarbyRregion = $this->mb_ucfirst($request->standarbyRregion);
            $professionalstandads->where('standarbyRregion', 'like', '%'.$standarbyRregion.'%');
        } 

        if ($request->has('view_pro_avtivite')) {
            $view_pro_avtivite = $this->mb_ucfirst($request->view_pro_avtivite);
            $professionalstandads->where('view_pro_avtivite', 'like', '%'.$view_pro_avtivite.'%');   
        } 

        if ($request->has('latter_toMisistry')) {
            $latter_toMisistry = $this->mb_ucfirst($request->latter_toMisistry);
            $professionalstandads->where('latter_toMisistry', 'like', '%'.$latter_toMisistry.'%');  
            
        }

        if ($request->has('registrationNumber')) {
            $registrationNumber = $this->mb_ucfirst($request->registrationNumber);
            $professionalstandads->where('registrationNumber', 'like', '%'.$registrationNumber.'%'); 
        } 

        if ($request->has('responseOrganization')) {
            $responseOrganization = $this->mb_ucfirst($request->responseOrganization);
            $professionalstandads->where('responseOrganization', 'like', '%'.$responseOrganization.'%');
        } 

        if ($request->has('datainAction')) {
            $datainAction = $this->mb_ucfirst($request->datainAction);
            $professionalstandads->where('datainAction', 'like', '%'.$datainAction.'%');
        }

        $professionalstandads = $professionalstandads->orderBy('id', 'ASC')->paginate(20)->appends(request()->query());

        //  if(count($request->all()) > 0) {
        //     $professionalstandads = $professionalstandads->paginate($professionalstandads->count());
        // } else {
        //     $professionalstandads = $professionalstandads->paginate(50);
        // }
        $activities = $ps_query->select('regionActivite')->groupBy('regionActivite')->pluck('regionActivite')->toArray();
        $ministries = $ps_query->select('responseOrganization')->groupBy('responseOrganization')->pluck('responseOrganization')->toArray();
        $types = $ps_query->select('view_pro_avtivite')->groupBy('view_pro_avtivite')->pluck('view_pro_avtivite')->toArray();

        return view('professional-standarts.index', compact('professionalstandads', 'ministries', 'activities', 'types'));

    }

    public function show($id)
    {
        $link = null;
        $name = null;
        $locale = Lang::getLocale();

        $professionalstandad = ProfessionalStandard::find($id);

        if($locale == 'uz' || $locale == 'oz') {
            $professionalstandad = ProfessionalStandardUz::find($id);
        }

        if(!is_null($professionalstandad->file)) {
             $link = asset("/uploads/standarts/$professionalstandad->file");
             $arr = explode(".", $professionalstandad->file);
             $name = $arr[1];
        }


        return view('professional-standarts.show', compact('professionalstandad', 'link', 'name'));
    }

    public function uploadFile($id, Request $request)
    {
        $rules = [
            'file' => 'required|mimes:doc,docx',
        ];

        $messages = [
            'file.required' => 'Файл киритилмаган',
            'file.mimes' => 'Файл doc, docx турида бўлиши керак',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        
        $locale = Lang::getLocale();
        
        $professionalstandad = ProfessionalStandard::find($id);

        if($locale == 'uz' || $locale == 'oz') {
            $professionalstandad = ProfessionalStandardUz::find($id);
        }

        $file = $request->file;
        $fileName = time().'-'.str_random(10).'.'.$file->getClientOriginalName();
        $savedFile = $file->move('./uploads/standarts/', $fileName);

        $professionalstandad->update([
            'file' => $fileName
        ]);

        return back()->with('status','Успешно сохранено');
    } 

    public function mb_ucfirst($text) {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

}
