<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $model = new Article();
        $model->lang = $input['lang'];
        $model->type = 'news';

        $models = $model->where(['type' => $model->type])
            ->with('translates')
            ->orderBy('date', 'desc')
            ->paginate(10);

        $arr = [];
        foreach($models as $item) {
            if(count($item['translates']) > 0){
                foreach($item['translates'] as $news) {
                    if($news->object_key!='content') {
                        $keys[] = $news->object_key;
                        $vals[] = $news->object_value;
                    }
                }
                $arr[] = [
                    'type' => $item['type'],
                    'category_id' => $item['category_id'],
                    'order' => $item['order'],
                    'date' => $item['date'],
                    'body' => array_combine($keys, $vals)
                ];
            }
        }
        return $arr;

    }

    public function show(Request $request)
    {
        $input = $request->all();
        $model = new Article();
        $model->lang = $input['lang'];
        $model->type = 'news';

        $article = $model->where(['type' => $model->type])
            ->with('translates')
            ->orderBy('date', 'desc')
            ->first();
        $arr = [];

        foreach($article->translates as $news) {
            $keys[] = $news->object_key;
            $vals[] = $news->object_value;
        }
        $arr[] = [
            'date' => $article->date,
            'body' => array_combine($keys, $vals)
        ];

        return $arr;

    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


}