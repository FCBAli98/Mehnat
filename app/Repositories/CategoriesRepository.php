<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;

class CategoriesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'category';
    }

	public function getIndex()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		$this->model->lang = $data['lang'];
		$this->model->parent_id = $data['parent_id'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		$model->lang = $data['lang'];
        $model->parent_id = $data['parent_id'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	public function findByNameCategory($name)
	{
		$model = Translate::where(['object' => 'category', 'object_type' => $this->model->type, 'object_key' => 'url', 'object_value' => $name])->first();
		if ($model) {
			if($model->languages == \App::getLocale()){
				$model = $this->findById($model->object_id);
				return $model;
			}else{
				$model = $this->findById($model->object_id);
				if ($model->url) {
					if ($model->url == $name) {
						return $model;
					}else{
						return redirect()->route('categories.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}

	public function getItemsByCategoryId($category_id)
	{
		return Article::where(['type' => 'article', 'category_id' => $category_id, 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
	}

    public function getCategoryChildren($category_id)
    {
        return Category::where(['type' => 'category', 'parent_id' => $category_id])->with(['translates'])->orderBy('id', 'asc')->get();
    }

}
