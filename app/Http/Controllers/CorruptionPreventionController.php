<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CorruptionPreventionRepository;
use App\Mail\CorruptionPrevention;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreCorruptionPreventionRequest;

class CorruptionPreventionController extends Controller
{

	protected $repo;
    public function __construct(CorruptionPreventionRepository $repo)
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
        $model = $this->repo->getModel();
        if (!$model->anchor) {
            abort(404);
        }
    	$data = [
            'types' => $this->repo->getUserTypes(),
            'model' => $model
    	];
        return view('corruption-prevention.display', $data);
    }

    public function submit(StoreCorruptionPreventionRequest $request)
    {
        $model = $this->repo->getModel();
        $data = $request->validated();
        $data['user_type'] = $this->repo->getUserTypes()[$data['user_type']];
        $this->sendMail($model->anchor, $data);
        if (count(Mail::failures()) > 0) {
            if ($model->additional_field2) {
                $request->session()->flash('error', $model->additional_field2);
            }
        }else{
            if ($model->additional_field1) {
                $request->session()->flash('success', $model->additional_field1);
            }
        }
        return redirect()->route('corruption-prevention');
    }

    public function sendMail($email, $data)
    {
        try {
            return Mail::to($email)->send(new CorruptionPrevention($data));       
        } catch (\Exception $e) {
            throw new SendMailException($e->getMessage());
        }

    }

}
