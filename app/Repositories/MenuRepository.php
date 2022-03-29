<?php 

namespace App\Repositories;

use App\Models\Category;

class MenuRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'menu';
    }

	public function getIndex()
	{
		$model = $this->search([
			'title' => 'like',
			'parent_id' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getBlockeds()
	{
		return [
			'headerMenu',
			'forWorker',
			'forEmployer'
		];
	}

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->title = $data['title'];
		$this->model->anchor = $data['anchor'];
		$this->model->parent_id = $data['parent_id'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->lang = $data['lang'];
		$model->title = $data['title'];
		$model->parent_id = $data['parent_id'];
		if($model->update()){
			return $model;
		}
		return false;
	}

}