<?php

namespace App\Http\Controllers;

use App\Models\Translate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
//        $search =Translate::where('object_value', 'like', '%'.$request->search.'%')->where('object_key', 'description')->get();
        $search = Translate::where(['object' => 'article', 'object_key' => 'title'])
            ->where('object_value', 'like', '%'.$request->search.'%')
            ->whereIn('object_type', ['news', 'article', 'service'])
            ->whereHas('article', function (Builder $query){
                $query->where('enabled', 1);
            })
            ->with('article')
            ->orderBy('id', 'desc')
            ->get();

        return view('search-results', ['search' => $search]);
    }
}
