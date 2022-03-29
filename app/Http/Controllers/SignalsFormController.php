<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SignalsFormRepository;
use App\Http\Requests\StoreSignalsRequest;

class SignalsFormController extends Controller
{

	protected $repo;
    public function __construct(SignalsFormRepository $repo)
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
    	];
        return view('form-signals.display', $data);
    }

    public function submit(StoreSignalsRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result) {
            $request->session()->flash('success', "Ваше сообщение принято. Спасибо.");
        }else{
            $request->session()->flash('error', "Не удалось отправить Ваше сообщение. Пожалуйста, попробуйте еще раз.");
        }
        return redirect()->route('signals');
    }

}
