<?php

namespace App\Http\Controllers\Admin;

use App\Dictionary;
use App\Http\Controllers\Controller;
use App\Http\Requests\DictionaryRequest;
use App\Repositories\PagesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DictionaryController extends Controller
{

    protected $repo;
    public function __construct(PagesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = Dictionary::query();
        if($request->lang){
            $lang = $request->lang;
        } else{
            $lang = 'uz';
        }
        $models = $models->where('lang', $lang);
        if(isset($request->search)){
            switch ($request->search['enabled']){
                case 1:
                    $models = $models->where('status', 1);
                    break;
                case 3:
                    $models = $models->where('status', 0);
                    break;
                default:
                    break;
            }
        }
        $models = $models->orderBy('id', 'desc')->paginate(15);
        $data = [
            'models' => $models,
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.dictionary.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Dictionary;
        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr()
        ];
        return view('admin.dictionary.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DictionaryRequest $request)
    {
        $params = $request->validated();
        Dictionary::create($params);
        return redirect()->route('admin.dictionary.index');
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
            'model' => Dictionary::find($id),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.dictionary.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Dictionary::find($id);
        $data = [
            'model' => $model,
            'languages' => $this->repo->getLanguagesArr(),
        ];
        return view('admin.dictionary.edit', $data);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DictionaryRequest $request, $id)
    {
        $params = $request->validated();
        $model = Dictionary::find($id);
        $model->update($params);
        return redirect()->route('admin.dictionary.show', ['id'=>$model->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Dictionary::find($id)->delete();
        return redirect()->route('admin.dictionary.index');
    }
}
