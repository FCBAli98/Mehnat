<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;

class ArticlesController extends Controller
{

	protected $repo;
    public function __construct(ArticlesRepository $repo)
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
        $model = $this->repo->findByNameArticle($name);
        $data = [
            'model' => $model,
            'items' => $this->repo->getItemsByCategoryId($model->category_id),
        ];
        return view('articles.show', $data);
    }

}
