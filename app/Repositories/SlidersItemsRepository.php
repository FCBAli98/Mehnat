<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\ImagesRepository;

class SlidersItemsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'slider-item';
    }

	public function getIndex()
	{
		$model = $this->search([
			'category_id' => 'int',
			'enabled' => 'int',
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('order', 'asc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'slider'])->with(['translates'])->get();
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
		$this->model->url = $data['url'];
		if (isset($data['image']) && $data['image']) {
			$this->model->image = ImagesRepository::upload($data['image']);
		}
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
		$model->url = $data['url'];
		if (isset($data['image']) && $data['image']) {
			deleteImage($model->image);
			$model->image = ImagesRepository::upload($data['image']);
		}
		$model->enabled = $data['enabled'];
		$model->order = $data['order'];
		if($model->update()){
			return $model;
		}
		return false;
	}

}