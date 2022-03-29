<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository;

class CategoriesController extends Controller
{

	protected $repo;
    public function __construct(CategoriesRepository $repo)
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
        $model = $this->repo->findByNameCategory($name);
        $data = [
            'model' => $model,
            'items' => $this->repo->getItemsByCategoryId($model->id),
            'children' => $this->repo->getCategoryChildren($model->id)
        ];
        return view('categories.show', $data);
    }

}
