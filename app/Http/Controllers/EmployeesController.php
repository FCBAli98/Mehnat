<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmployeesRepository;

class EmployeesController extends Controller
{

	protected $repo;
    public function __construct(EmployeesRepository $repo)
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
        return view('employees.index', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($name)
    {
        $model = $this->repo->findByNameArticle($name);
        $data = [
            'model' => $model,
            'histories' => $this->repo->getHistories($model->id, $model->lang)
        ];
        return view('employees.show', $data);
    }

    public function functions($name)
    {
        $model = $this->repo->findByNameArticle($name);
        $data = [
            'model' => $model,
        ];
        return view('employees.functions', $data);
    }

}
