<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SubordinateOrganizationsRepository;
use App\Http\Requests\StoreSubordinateOrganizationsRequest;
use Illuminate\Support\Facades\Input;

class SubordinateOrganizationsController extends Controller
{
    protected $repo;
    public function __construct(SubordinateOrganizationsRepository $repo)
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
            'languages' => $this->repo->getLocaleListForLangParam(),
            'menuTree' => $this->repo->getCategoriesTree(),
            'selected_menu_id' => $this->repo->getSelectedMenuId(),
        ];
        return view('admin.subordinate-organizations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->repo->getModel();
        $model->date = date('Y-m-d');
        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
        ];
        return view('admin.subordinate-organizations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubordinateOrganizationsRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.subordinate-organizations.show', ['id' => $result->id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'model' => $this->repo->findById($id),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.subordinate-organizations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->repo->findById($id);
        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
        ];
        return view('admin.subordinate-organizations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubordinateOrganizationsRequest $request, $id)
    {
        $result = $this->repo->update($id, $request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.subordinate-organizations.show', ['id' => $id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $result = $this->repo->delete($id);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.subordinate-organizations.index');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTranslate(Request $request, $id)
    {
        $result = $this->repo->deleteTranslate($id);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.subordinate-organizations.index');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
    
    public function select_menu(Request $request)
    {
        $request = $request->all();
        if (isset($request['select_menu'])) {
            $this->repo->submitSelectMenu($request['select_menu']);
        }
        return redirect()->route('admin.subordinate-organizations.index');
    }

}