<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SlidersItemsRepository;
use App\Http\Requests\StoreSliderItemRequest;
use App\Http\Requests\UpdateSliderItemRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class SliderItemsController extends Controller
{
    protected $repo;
    public function __construct(SlidersItemsRepository $repo)
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
            'categories' => $this->repo->getCategoriesArr(),
        ];
        return view('admin.slider-items.index', $data);
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
            'categories' => $this->repo->getCategoriesArr(),
        ];
        return view('admin.slider-items.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderItemRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.slider-items.show', ['id' => $result->id]);
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
        return view('admin.slider-items.show', $data);
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
            'categories' => $this->repo->getCategoriesArr(),
        ];
        return view('admin.slider-items.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderItemRequest $request, $id)
    {
        $result = $this->repo->update($id, $request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.slider-items.show', ['id' => $id]);
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
            return redirect()->route('admin.slider-items.index');
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
            return redirect()->route('admin.slider-items.index');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
    
}
