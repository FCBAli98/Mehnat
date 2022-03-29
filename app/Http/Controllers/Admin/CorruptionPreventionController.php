<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CorruptionPreventionRepository;
use App\Http\Requests\SaveCorruptionPreventionRequest;

class CorruptionPreventionController extends Controller
{
    protected $repo;
    public function __construct(CorruptionPreventionRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $data = [
            'model' => $this->repo->getModel(),
            'languages' => $this->repo->getLanguagesArr()
        ];
        return view('admin.corruption-prevention.display', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(SaveCorruptionPreventionRequest $request)
    {
        $result = $this->repo->save($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.corruption-prevention');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
}
