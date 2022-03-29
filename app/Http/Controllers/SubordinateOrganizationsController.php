<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubordinateOrganizationsRepository;

class SubordinateOrganizationsController extends Controller
{

	protected $repo;
    public function __construct(SubordinateOrganizationsRepository $repo)
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
        return view('subordinate-organizations.index', $data);
    }

    public function position($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('subordinate-organizations.position', $data);        
    }

    public function structure($id)
    {
        $model = $this->repo->findByIdFront($id);
        $data = [
            'model' => $model,
            'menu' => $this->repo->getFrontMenu(),
        ];
        return view('subordinate-organizations.duties', $data);
    }

}
