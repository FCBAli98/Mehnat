<?php

namespace App\Http\Controllers;

use App\Repositories\BlogsRepository;

class BlogsController extends Controller
{
	protected $repo;

    public function __construct(BlogsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [];
        return view('blogs.index', $data);
    }

    public function show($name)
    {
        $model = $this->repo->findByNameBlog($name);

        $data = [
            'model' => $model,
            'items' => $this->repo->getItemsByCategoryId($model->category_id),
        ];

        return view('blogs.show', $data);
    }

    public function list()
    {
        $data = $this->repo->getBlogsList();
        return json_encode($data);
    }

}
