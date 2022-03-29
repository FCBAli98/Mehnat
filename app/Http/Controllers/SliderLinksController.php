<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SliderLinksRepository;

class SliderLinksController extends Controller
{

	protected $repo;
    public function __construct(SliderLinksRepository $repo)
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
            'linksSlider' => $this->repo->getLinksSlider(),
    	];
        return view('slider-links', $data);
    }
}
