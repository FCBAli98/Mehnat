<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Translate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Request $request)
    {
        $input = $request->all();
        $article = new Article();
        $article->lang = $input['lang'];
        $article->type = 'page';

        $model = Translate::where('object', 'article')
                    ->where('object_type', $article->type)
                    ->where('object_key', 'url')
                    ->where('languages', $input['lang'])
                    ->where('object_value', $input['slug'])
                ->first();

        $pages = Translate::where('object', 'article')
            ->where('object_type', $article->type)
            ->where('object_id', $model->object_id)
            ->where('languages', $input['lang'])
            ->get();

        foreach ($pages as $page) {
            $key[] = $page->object_key;
            $val[] = $page->object_value;
        }

        return array_combine($key, $val);

    }


}