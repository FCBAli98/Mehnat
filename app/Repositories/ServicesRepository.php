<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;

class ServicesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'service';
    }

	public function getIndex()
	{
		$model = $this->search([
			'category_id' => 'int',
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['category','translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'services-category'])->with(['translates'])->get();
		if ($categories) {
			foreach ($categories as $category) {
				$arr[$category->id] = $category->title;
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getCategoriesTree()
	{
		$all = Category::where(['type' => 'services-category', 'parent_id' => null])->with(['translates'])->orderBy('id', 'desc')->get();
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
		$childs = Category::where(['type' => 'services-category', 'parent_id' => $parent_id])->with(['translates'])->orderBy('id', 'desc')->get();
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

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->category_id = $data['category_id'];
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		$this->model->another_url = $data['another_url'];
		if (isset($data['icon']) && $data['icon']) {
			$this->model->image = ImagesRepository::uploadIcon($data['icon']);
		}
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
		$model->category_id = $data['category_id'];
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		if (isset($data['icon']) && $data['icon']) {
			deleteIcon($model->image);
			$model->image = ImagesRepository::uploadIcon($data['icon']);
		}
		$model->description = $data['description'];
		$model->content = $data['content'];
		$model->another_url = $data['another_url'];
		$model->enabled = $data['enabled'];
		$model->order = $data['order'];
		if($model->update()){
			return $model;
		}
		return false;
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
						return redirect()->route('services.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}

}