<?php 

namespace App\Repositories;

use App\Models\Category;
use App\Models\Article;
use App\Models\Translate;
use App\Repositories\MenuRepository;

class EmployeeCategoriesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'employee-category';
    }

	public function getIndex()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->title = $data['title'];
		$this->model->description = $data['description'];
		$this->model->url = toAscii($data['title']);
		$this->model->lang = $data['lang'];
		$this->model->relation_menu_id = $data['relation_menu_id'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->title = $data['title'];
		$model->description = $data['description'];
		$model->url = toAscii($data['title']);
		$model->lang = $data['lang'];
		$model->relation_menu_id = $data['relation_menu_id'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	public function findByName($name)
	{
		$model = Translate::where(['object' => 'category', 'object_type' => $this->model->type, 'object_key' => 'url', 'languages' => \App::getLocale(), 'object_value' => $name])->first();
		if ($model) {
			$category = $this->findById($model->object_id);
			if ($category) {
				return [
					'category' => $category,
					'employees' => Article::where(['category_id' => $category->id, 'enabled' => 1])->with(['translates', 'childs'])->paginate(20)
				];
			}
		}
		abort(404);
	}

	public function getAllListToNav()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translates'])->get();
	}

}