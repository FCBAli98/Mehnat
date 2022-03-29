<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FeedbackRepository;
use App\Http\Requests\SaveFeedbackRequest;

class FeedbackController extends Controller
{
    protected $repo;
    public function __construct(FeedbackRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $data = [
            'model' => $this->repo->getModel(),
            'languages' => $this->repo->getLanguagesArr()
        ];
        return view('admin.feedback.display', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(SaveFeedbackRequest $request)
    {
        $result = $this->repo->save($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.feedback');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
}
