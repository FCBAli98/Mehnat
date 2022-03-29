<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\ImagesRepository;

class MenuItemsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'menu-item';
    }

	public function getIndex()
	{
		$model = $this->search([
			'title' => 'like',
			'parent_id' => 'int',
			'category_id' => 'int',
			'url' => 'like'
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('order', 'asc')->paginate($this->limit);
	}

	public function getTree()
	{
		$all = $this->model->where(['type' => $this->model->type, 'parent_id' => 0])->with(['translates'])->orderBy('order', 'asc')->get();
		$arr = [];
		if ($all) {
			foreach ($all as $item) {
				$arr[$item->id] = $item->title;
				$childs = $this->getItemChildsById($item->id, 0);
				if ($childs) {
					$arr = $arr+$childs;
				}
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getItemChildsById($parent_id, $level)
	{
		$level += 1;
		$childs = $this->model->where(['type' => $this->model->type, 'parent_id' => $parent_id])->with(['translates'])->orderBy('order', 'asc')->get();
		$arr = [];
		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$arr[$child->id] = str_repeat(' - ',$level).$child->title;
				$subChilds = $this->getItemChildsById($child->id, $level);
				if ($subChilds) {
					$arr = $arr+$subChilds;
				}
			}
		}
		return $arr;
	}

	public function getCategoriesArr()
	{
		$all = Category::where(['type' => 'menu', 'parent_id' => null])->with(['translates'])->get();
		$arr = [];
		if ($all) {
			foreach ($all as $item) {
				$arr[$item->id] = $item->title;
				$childs = $this->getCategoryItemChildsById($item->id, 0);
				if ($childs) {
					$arr = $arr+$childs;
				}
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getCategoryItemChildsById($parent_id, $level)
	{
		$level += 1;
		$childs = Category::where(['type' => 'menu', 'parent_id' => $parent_id])->with(['translates'])->get();
		$arr = [];
		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$arr[$child->id] = str_repeat(' - ',$level).$child->title;
				$subChilds = $this->getCategoryItemChildsById($child->id, $level);
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
		$this->model->category_id = $data['category_id'];
		$this->model->title = $data['title'];
		$this->model->url = $data['url'];
		$this->model->enabled = $data['enabled'];
		$this->model->parent_id = $data['parent_id']?$data['parent_id']:0;
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
		$model->url = $data['url'];
		$model->enabled = $data['enabled'];
		$model->parent_id = $data['parent_id']?$data['parent_id']:0;
		$model->order = $data['order'];
		if($model->update()){
			return $model;
		}
		return false;
	}

}