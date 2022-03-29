<?php 

namespace App\Repositories;

use App\Models\Category;

class ServicesCategoriesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'services-category';
    }

	public function getIndex()
	{
		$model = $this->search([
			'parent_id' => 'int',
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getTree($id = null)
	{
		if ($id) {
			$all = $this->model->where(['type' => $this->model->type])->where('id','!=',$id)->where(function($query) use ($id){
				$query->where('parent_id','!=',$id)
				->orWhere('parent_id','=',null);
			})->with(['translates'])->orderBy('id', 'desc')->get();
		}else{
			$all = $this->model->where(['type' => $this->model->type, 'parent_id' => null])->with(['translates'])->orderBy('id', 'desc')->get();
		}
		$arr = [];
		if ($all) {
			foreach ($all as $item) {
				$arr[$item->id] = $item->title;
				$childs = $this->getItemChildsByIdServices($item->id, 0, $id);
				if ($childs) {
					$arr = $arr+$childs;
				}
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getItemChildsByIdServices($parent_id, $level, $id)
	{
		$level += 1;
		if ($id) {
			$childs = $this->model->where(['type' => $this->model->type, 'parent_id' => $parent_id])->where('id','!=',$id)->with(['translates'])->orderBy('id', 'desc')->get();
		}else{
			$childs = $this->model->where(['type' => $this->model->type, 'parent_id' => $parent_id])->with(['translates'])->orderBy('id', 'desc')->get();
		}
		$arr = [];
		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$arr[$child->id] = str_repeat(' - ',$level).$child->title;
				$subChilds = $this->getItemChildsByIdServices($child->id, $level, $id);
				if ($subChilds) {
					$arr = $arr+$subChilds;
				}
			}
		}
		return $arr;
	}

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->title = $data['title'];
		$this->model->parent_id = $data['parent_id'];
		$this->model->url = toAscii($data['title']);
		$this->model->anchor = $data['anchor'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->lang = $data['lang'];
		$model->parent_id = $data['parent_id'];
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		if($model->update()){
			return $model;
		}
		return false;
	}

}