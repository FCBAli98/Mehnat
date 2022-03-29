<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ServicesRepository;

class ServicesController extends Controller
{

	protected $repo;
    public function __construct(ServicesRepository $repo)
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
    	];
        return view('services.show', $data);
    }
}
