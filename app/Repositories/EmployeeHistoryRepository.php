<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;

class EmployeeHistoryRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'employee-history';
    }

	public function getIndex($parent_id, $lang)
	{
		$model = new Article();
		$model->lang = $lang;
		$model->type = 'employee-history';
		return $model->where(['type' => $this->model->type, 'parent_id' => $parent_id])->with(['translates'])->orderBy('order', 'asc')->get();
	}

	public function create($data, $parent_id, $lang)
	{
		$this->model->lang = $lang;
		$this->model->title = $data['title'];
		$this->model->parent_id = $parent_id;
		$this->model->content = $data['content'];
		$this->model->enabled = 1;
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data, $lang)
	{
		$model = $this->findById($id);
		$model->lang = $lang;
		$model->title = $data['title'];
		$model->content = $data['content'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	public function delete($data)
	{
		if (count($data) > 0) {
			return Article::where(['type' => $this->model->type])->whereIn('id', $data)->delete();
		}
		return false;
	}

}