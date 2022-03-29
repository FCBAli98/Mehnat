<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Models\Relation;
use App\Repositories\ImagesRepository;
use App\Repositories\EmployeeHistoryRepository;

class EmployeesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'employee';
    }

	public function getIndex()
	{
		$model = $this->search([
			'position' => 'like',
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getIndexForFront()
	{
		return $this->model->where(['type' => $this->model->type,'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'employee-category'])->with(['translates'])->get();
		if ($categories) {
			foreach ($categories as $category) {
				$arr[$category->id] = $category->title;
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getHistories($employee_id, $lang)
	{
		$repo = new EmployeeHistoryRepository();
		$models = $repo->getIndex($employee_id, $lang);
		$arr = [];
		if (count($models) > 0) {
			foreach ($models as $model) {
				if ($model->title || $model->content) {
					$arr[] = [
						'id' => $model->id,
						'title' => $model->title,
						'content' => $model->content,
					];
				}
			}
		}
		return $arr;
	}

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->phone = $data['phone'];
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			$this->model->image = ImagesRepository::upload($data['image']);
		}
		$this->model->position = $data['position'];
		$this->model->reception_days = $data['reception_days'];
		$this->model->description = $data['description'];
		$this->model->content = $data['content'];
		$this->model->enabled = $data['enabled'];
		$this->model->order = $data['order'];
		if ($this->model->save()) {
			$this->saveHistories($data['histories'], $this->model->id, $this->model->lang);
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->lang = $data['lang'];
		$model->phone = $data['phone'];
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			deleteImage($model->image);
			$model->image = ImagesRepository::upload($data['image']);
		}
		$model->position = $data['position'];
		$model->reception_days = $data['reception_days'];
		$model->description = $data['description'];
		$model->content = $data['content'];
		$model->enabled = $data['enabled'];
		$model->order = $data['order'];
		if($model->update()){
			if (isset($data['deleted_histories'])) {
				$this->deleteHistories($data['deleted_histories']);
			}
			$this->saveHistories($data['histories'], $model->id, $model->lang);
			return $model;
		}
		return false;
	}

	public function saveHistories($histories, $employee_id, $lang)
	{
		if (count($histories) > 0) {
			foreach ($histories as $history) {
				if ((isset($history['content']) && $history['content']) || (isset($history['title']) && $history['title']) || isset($history['id'])) {
					if (isset($history['id'])) {
						$this->updateHistory($history, $history['id'], $lang);
					}else{
						$this->createHistory($history, $employee_id , $lang);
					}
				}
			}
		}
	}

	public function createHistory($history, $employee_id, $lang)
	{
		$repo = new EmployeeHistoryRepository();
		$repo->create($history, $employee_id, $lang);
	}

	public function updateHistory($history, $id, $lang)
	{
		$repo = new EmployeeHistoryRepository();
		$repo->update($id, $history, $lang);
	}

	public function deleteHistories($data)
	{
		$repo = new EmployeeHistoryRepository();
		$repo->delete($data);
	}

	public function getCategories()
	{
		$arr = [];
		$categories = Category::where(['type' => 'employee-category'])->with(['translates'])->get();
		if ($categories) {
			foreach ($categories as $category) {
				if ($category->title) {
					$arr[] = [
						'id' => $category->id,
						'title' => $category->title,
						'url' => $category->url,
					];
				}
			}
		}
		return $arr;
	}

	public function getNewsList($request)
	{
		$request = $request->all();
		if (isset($request['url'])&&$request['url']) {
	        return $this->findArticlesByCategoryName($request['url']);
		}
	}

	public function findArticlesByCategoryName($name)
	{
		$arr = [];
		$model = Translate::where(['object' => 'category', 'object_type' => 'employee-category', 'object_key' => 'url', 'languages' => \App::getLocale(), 'object_value' => $name])->first();
		if ($model) {
			$news = Article::where(['type' => $this->model->type, 'category_id' => $model->object_id])->with(['translates'])->orderBy('id', 'desc')->paginate(7);
			if (count($news)) {
				foreach ($news as $newsItem) {
					if ($newsItem->url) {
						$arr[] = [
							'id' => $newsItem->id,
							'title' => $newsItem->title,
							'description' => $newsItem->description,
							'date' => $newsItem->date,
							'url' => route('news.show',['name' => $newsItem->url]),
							'image' => getMedium($newsItem->image),
						];
					}
				}
			}
		}
		return [
			'news' => $arr,
			'lastPage' => $news->lastPage()
		];
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
						return redirect()->route('employees.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}

	public function getFrontMenu()
	{
		$menu_id = $this->getSelectedMenuId();
		if ($menu_id) {
			return $this->getRelationMenu($menu_id);
		}
		return [];
	}

	public function getSelectedMenuId()
	{
		$relation = Relation::where(['local_object' => 'employees', 'local_id' => 1, 'foreign_object' => 'category', 'relation_type' => 'menu'])->first();
		if ($relation) {
			return $relation->foreign_id;
		}
		return null;
	}

	public function submitSelectMenu($menu_id)
	{
		$relation = Relation::where(['local_object' => 'employees', 'local_id' => 1, 'foreign_object' => 'category', 'relation_type' => 'menu'])->first();
		if (!$relation) {
			$relation = new Relation;
			$relation->local_object = 'employees';
			$relation->local_id = 1;
			$relation->foreign_object = 'category';
			$relation->relation_type = 'menu';
		}
		$relation->foreign_id = $menu_id;
		$relation->save();
	}

}