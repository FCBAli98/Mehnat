<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HeaderRepository;

class HeaderController extends Controller
{

	protected $repo;
    public function __construct(HeaderRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function display()
    {
    	$data = [
    		'headerMenu' => $this->repo->getHeaderMenu(),
            'logo' => $this->repo->getLogo()
    	];
        return view('header', $data);
    }
}
