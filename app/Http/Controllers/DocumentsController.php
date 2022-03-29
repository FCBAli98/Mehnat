<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DocumentCategoriesRepository;

class DocumentsController extends Controller
{

	protected $repo;
    public function __construct(DocumentCategoriesRepository $repo)
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
        $nav = $this->repo->getAllListToNav();
    	$data = [
            'model' => $model['category'],
            'documents' => $model['documents'],
            'nav' => $nav,
    	];
        return view('documents.show', $data);
    }
    
    
    public function showMobile($name)
    {
        $model = $this->repo->findByName($name);
        $nav = $this->repo->getAllListToNav();
        $data = [
            'model' => $model['category'],
            'documents' => $model['documents'],
            'nav' => $nav,
        ];
        return view('documents.show-mobile', $data);
    }
}
