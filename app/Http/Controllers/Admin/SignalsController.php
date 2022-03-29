<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SignalsRepository;
use Illuminate\Support\Facades\Input;

class SignalsController extends Controller
{
    protected $repo;
    public function __construct(SignalsRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'models' => $this->repo->getIndex()->appends(Input::except('page')),
        ];
        return view('admin.signals.index', $data);
    }
    
}
