<?php 

namespace App\Repositories;

use App\Models\Category;

class SlidersRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'slider';
    }

	public function getIndex()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->title = $data['title'];
		$this->model->lang = $data['lang'];
		$this->model->anchor = $data['anchor'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->title = $data['title'];
		$model->lang = $data['lang'];
		if($model->update()){
			return $model;
		}
		return false;
	}

}