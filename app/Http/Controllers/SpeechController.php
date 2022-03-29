<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SpeechRepository;

class SpeechController extends Controller
{

	protected $repo;
    public function __construct(SpeechRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function speech(Request $request)
    {
    	$data = [
            'audio' => $this->repo->getAudio($request['text'], $request['lang']),
    	];
        return json_encode($data);
    }

}
