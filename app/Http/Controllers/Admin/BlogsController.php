<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\BlogsRepository;
use App\Http\Requests\StoreBlogsRequest;

use Illuminate\Support\Facades\Input;

class BlogsController extends Controller
{
    protected $repo;

    public function __construct(BlogsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'models' => $this->repo->getIndex()->appends(Input::except('page')),
            'categories' => $this->repo->getCategoriesArr(),
            'languages' => $this->repo->getLocaleListForLangParam(),
        ];

        return view('admin.blogs.index', $data);
    }

    public function create()
    {
        $model = $this->repo->getModel();

        $model->date = date('Y-m-d');

        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
            'categories' => $this->repo->getCategoriesArr(),
        ];

        return view('admin.blogs.create', $data);
    }

    public function store(StoreBlogsRequest $request)
    {
        $result = $this->repo->create($request->validated());

        if ($result) {
            $request->session()->flash('success', 'Success');

            return redirect()->route('admin.blogs.show', ['id' => $result->id]);
        } else {
            $request->session()->flash('error', 'Error');

            return back();
        }
    }

    public function show($id)
    {
        $data = [
            'model' => $this->repo->findById($id),
            'languages' => $this->repo->getLocaleListForLangParam(),
        ];

        return view('admin.blogs.show', $data);
    }

    public function edit($id)
    {
        $model = $this->repo->findById($id);

        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
            'categories' => $this->repo->getCategoriesArr(),
        ];

        return view('admin.blogs.edit', $data);
    }

    public function update(StoreBlogsRequest $request, $id)
    {
        $result = $this->repo->update($id, $request->validated());

        if ($result) {
            $request->session()->flash('success', 'Success');

            return redirect()->route('admin.blogs.show', ['id' => $id]);
        }else{
            $request->session()->flash('error', 'Error');

            return back();
        }
    }

    public function destroy(Request $request, $id)
    {
        $result = $this->repo->delete($id);

        if ($result) {
            $request->session()->flash('success', 'Success');

            return redirect()->route('admin.blogs.index');
        } else {
            $request->session()->flash('error', 'Error');

            return back();
        }
    }

    public function destroyTranslate(Request $request, $id)
    {
        $result = $this->repo->deleteTranslate($id);

        if ($result) {
            $request->session()->flash('success', 'Success');

            return redirect()->route('admin.blogs.index');
        } else {
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
}
