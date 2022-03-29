<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProfessionalStandardsRepository;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class ProfessionalStandardsController extends Controller
{
    protected $repo;
    public function __construct(ProfessionalStandardsRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'models' => $this->repo->getIndex()->appends(Input::except('page')),
        ];
        return view('admin.professional-standarts.index', $data);
    }

    public function fileUpload(Request $request, $id)
    {
        $this->repo->fileUpload($request->all(), $id);
        return back();
    }

    public function deleteFile(Request $request, $id)
    {
        $input = $this->validate($request, [
            'file_index' => 'required|numeric',
        ]);
        $this->repo->deleteFile($id, $input['file_index']);
        return back();
    }

}
