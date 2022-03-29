<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $model = new Article();
        $model->lang = $input['lang'];
        $model->type = 'employee';

        $models = $model->where(['type' => $model->type])
            ->with('translates')
            ->orderBy('date', 'desc')
            ->get();

        $arr = [];
        foreach($models as $item) {
            foreach($item->translates as $news) {
                $keys[] = $news->object_key;
                $vals[] = $news->object_value;
            }
            $arr[] = [
                'type' => $item->type,
                'category_id' => $item->category_id,
                'order' => $item->order,
                'date' => $item->date,
                'body' => array_combine($keys, $vals)
            ];
        }

        return $arr;
    }

}