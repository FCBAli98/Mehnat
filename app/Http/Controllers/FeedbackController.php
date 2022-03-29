<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{

	protected $repo;
    public function __construct(FeedbackRepository $repo)
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
            'subjects' => $this->repo->getSubjects(),
            'model' => $model
    	];
        return view('feedback.display', $data);
    }

    public function submit(StoreFeedbackRequest $request)
    {
        $model = $this->repo->getModel();
        $data = $request->validated();
        $data['subject'] = $this->repo->getSubjects()[$data['subject']];
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
        return redirect()->route('feedback');
    }

    public function sendMail($email, $data)
    {
        try {
            return Mail::to($email)->send(new Feedback($data));       
        } catch (\Exception $e) {
            throw new SendMailException($e->getMessage());
        }

    }

}
