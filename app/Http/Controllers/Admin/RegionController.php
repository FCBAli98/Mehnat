<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegionRequest;
use App\Repositories\RegionsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RegionController extends Controller
{
    protected $repo;
    protected $hcKeys;
    public function __construct(RegionsRepository $repo)
    {
        $this->repo = $repo;

        $this->hcKeys = [
            'uz-qr' => 'Qoraqalpog‘iston',
            'uz-an' => 'Andijon',
            'uz-bu' => 'Buxoro',
            'uz-ji' => 'Jizzax',
            'uz-qa' => 'Qashqadaryo',
            'uz-nw' => 'Navoiy',
            'uz-sa' => 'Samarqand',
            'uz-ng' => 'Namangan',
            'uz-si' => 'Sirdaryo',
            'uz-su' => 'Surxondaryo',
            'uz-ta' => 'Toshkent',
            'uz-fa' => 'Farg‘ona',
            'uz-kh' => 'Xorazm',
            'uz-tk' => 'Toshkent sh.',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = [
            'models' => $this->repo->getIndex()->appends(Input::except('page')),
            'languages' => $this->repo->getLocaleListForLangParam(),
            'menuTree' => $this->repo->getCategoriesTree()
        ];
        return view('admin.regions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $model = $this->repo->getModel();
        $model->date = date('Y-m-d');
        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
            'hcKeys' => $this->hcKeys
        ];
        return view('admin.regions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRegionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRegionRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.regions.show', ['id' => $result->id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $data = [
            'model' => $this->repo->findById($id),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.regions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $model = $this->repo->findById($id);


        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
            'hcKeys' => $this->hcKeys
        ];
        return view('admin.regions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRegionRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRegionRequest $request, $id)
    {
        $result = $this->repo->update($id, $request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.regions.show', ['id' => $id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, $id)
    {
        $result = $this->repo->delete($id);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.regions.index');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyTranslate(Request $request, $id)
    {
        $result = $this->repo->deleteTranslate($id);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('admin.regions.index');
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
        return redirect()->route('admin.regions.index');
    }
}
