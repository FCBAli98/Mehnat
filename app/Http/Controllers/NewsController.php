<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{

	protected $repo;
    public function __construct(NewsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [];
        return view('news.index', $data);
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
        ];
        return view('news.show', $data);
    }

    public function showMobile($name)
    {
        $model = $this->repo->findByNameArticle($name);
        $data = [
            'model' => $model,
        ];
        return view('news.show-mobile', $data);
    }

    public function categories()
    {
        $data = [
            'categories' => $this->repo->getCategories()
        ];
        return json_encode($data);
    }

    public function list(Request $request)
    {
        $data = $this->repo->getNewsList($request);

        return json_encode($data);
    }

}
