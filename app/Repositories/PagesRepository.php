<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;
use App\Repositories\MenuRepository;

class PagesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'page';
    }

	public function getIndex()
	{
		$model = $this->search([
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->lang = $data['lang'];
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		$this->model->description = $data['description'];
		$this->model->content = $data['content'];
		$this->model->enabled = $data['enabled'];
		$this->model->relation_menu_id = $data['relation_menu_id'];
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
		$model->url = toAscii($data['title']);
		$model->description = $data['description'];
		$model->content = $data['content'];
		$model->enabled = $data['enabled'];
		$model->relation_menu_id = $data['relation_menu_id'];
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
						return redirect()->route('pages.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}
}