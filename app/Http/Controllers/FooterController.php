<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FooterRepository;

class FooterController extends Controller
{

	protected $repo;
    public function __construct(FooterRepository $repo)
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
    		'footerTable' => $this->repo->getFooterTable(),
    		'footerText' => $this->repo->getFooterText(),
    	];
        return view('footer', $data);
    }
}
