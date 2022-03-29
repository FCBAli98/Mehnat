<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $arr = [];
        $headerMenu = Category::where(['anchor' => 'headerMenu'])->first();
        $translates = Translate::whereIn('object_id', [14, 132])
                ->where('object_key', 'title')
                ->where('object_type', 'menu-item')
                ->where('languages', 'oz')
            ->get();
        foreach ($translates as $parent) {
            if ($headerMenu) {
                $articleModel = new Article;
                $articleModel->lang = $input['lang'];
                $headerMenuItems = $articleModel
                    ->where('category_id', $headerMenu->id)
                    ->where('enabled', 1)
                    ->with('translates')
                    ->orderBy('order', 'asc')->get();

                $arr[] = ['title' => $parent->object_value, 'items' => $this->getTreeMenu($headerMenuItems, $parent->object_id)];

//                $arr[] = $this->getTreeMenu($headerMenuItems, $parent['id']);
            }
        }
        return $arr;
    }

    public function getTreeMenu($data, $parent_id)
    {
        $arr = [];
        if (count($data) > 0 ) {
            foreach ($data as $item) {
                if ($item->parent_id == $parent_id) {
                    $arr[] = [
                        'title' => $item->title,
                        'url' => $item->url,
                        'items' => $this->getTreeMenu($data, $item->id)
                    ];
                }
            }
        }
        return $arr;
    }
}