<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CentralApparatusRepository;

class CentralApparatusController extends Controller
{

	protected $repo;
    public function __construct(CentralApparatusRepository $repo)
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
        return view('central-apparatus.index', $data);
    }

    public function position($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('central-apparatus.position', $data);        
    }

    public function duties($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('central-apparatus.duties', $data);
    }

}
