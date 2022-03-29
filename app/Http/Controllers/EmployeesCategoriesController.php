<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmployeeCategoriesRepository;

class EmployeesCategoriesController extends Controller
{

	protected $repo;
    public function __construct(EmployeeCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($name)
    {
        $model = $this->repo->findByName($name);
        $menu = $this->repo->getRelationMenu($model['category']->relation_menu_id);
    	$data = [
            'model' => $model['category'],
            'employees' => $model['employees'],
            'menu' => $menu,
    	];
        return view('employees-categories.show', $data);
    }
}
