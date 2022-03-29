<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TerritorialDivisionsRepository;

class TerritorialDivisionsController extends Controller
{

	protected $repo;
    public function __construct(TerritorialDivisionsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $models = $this->repo->getIndexForFront();
        $data = [
            'models' => $models,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('territorial-divisions.index', $data);
    }

    public function position($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('territorial-divisions.position', $data);        
    }

    public function structure($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('territorial-divisions.duties', $data);
    }

}
