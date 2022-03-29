<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Models\Relation;
use App\Repositories\ImagesRepository;
use App\Repositories\EmployeeHistoryRepository;

class CentralApparatusRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'central-apparatus';
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
			return $model;
		}
		return false;
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
		$relation = Relation::where(['local_object' => $this->model->type, 'local_id' => 1, 'foreign_object' => 'category', 'relation_type' => 'menu'])->first();
		if ($relation) {
			return $relation->foreign_id;
		}
		return null;
	}

	public function submitSelectMenu($menu_id)
	{
		$relation = Relation::where(['local_object' => $this->model->type, 'local_id' => 1, 'foreign_object' => 'category', 'relation_type' => 'menu'])->first();
		if (!$relation) {
			$relation = new Relation;
			$relation->local_object = $this->model->type;
			$relation->local_id = 1;
			$relation->foreign_object = 'category';
			$relation->relation_type = 'menu';
		}
		$relation->foreign_id = $menu_id;
		$relation->save();
	}

}