<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;

class ArticlesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'article';
    }

	public function getIndex()
	{
		$model = $this->search([
			'title' => 'like',
			'category_id' => 'int',
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['category','translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'category'])->with(['translates'])->get();
		if ($categories) {
			foreach ($categories as $category) {
				$arr[$category->id] = $category->title;
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->category_id = $data['category_id'];
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			$this->model->image = ImagesRepository::upload($data['image']);
		}
		$this->model->description = $data['description'];
		$this->model->content = $data['content'];
		$this->model->date = $data['date'];
		$this->model->enabled = $data['enabled'];
		$this->model->order = $data['order'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->lang = $data['lang'];
		$model->category_id = $data['category_id'];
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			deleteImage($model->image);
			$model->image = ImagesRepository::upload($data['image']);
		}
		$model->description = $data['description'];
		$model->content = $data['content'];
		$model->date = $data['date'];
		$model->enabled = $data['enabled'];
		$model->order = $data['order'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	public function findByNameArticle($name)
	{
		$model = Translate::where(['object' => 'article', 'object_type' => $this->model->type, 'object_key' => 'url', 'object_value' => $name])->first();
		if ($model) {
			if($model->languages == \App::getLocale()){
				$model = $this->findById($model->object_id);
				if ($model->enabled) {
					return $model;
				}
			}else{
				$model = $this->findById($model->object_id);
				if ($model->url && $model->enabled) {
					if ($model->url == $name) {
						return $model;
					}else{
						return redirect()->route('articles.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}

	public function getItemsByCategoryId($category_id)
	{
		return $this->model->where(['type' => $this->model->type, 'category_id' => $category_id, 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
	}

//	sherzod's changes
    public function getLatestArticle()
    {
        return $this->model->where(['type' => $this->model->type, 'category_id' => 39, 'enabled' => 1])->with(['translates', 'category'])->latest('id')->first();
    }
//  end sherzod's changes

}
