<?php

namespace App\Repositories;

use App\Models\Article;

class RegionsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'regions';
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

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->title = $data['title'];
		$this->model->hc_key = $data['hc_key'];
		$this->model->legal_entity_count = $data['legal_entity_count'];
		$this->model->male_count = $data['male_count'];
		$this->model->female_count = $data['female_count'];
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
        $model->hc_key = $data['hc_key'];
        $model->legal_entity_count = $data['legal_entity_count'];
        $model->male_count = $data['male_count'];
        $model->female_count = $data['female_count'];
		if($model->update()){
			return $model;
		}
		return false;
	}

}
