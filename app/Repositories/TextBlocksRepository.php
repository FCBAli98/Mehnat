<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;

class TextBlocksRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'text-block';
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
		$this->model->content = $data['content'];
		$this->model->anchor = $data['anchor'];
		$this->model->enabled = $data['enabled'];
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
		$model->content = $data['content'];
		$model->enabled = $data['enabled'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	public static function getTextBlockByAnchor($anchor)
	{
		return Article::where(['anchor' => $anchor, 'type' => 'text-block', 'enabled' => 1])->with(['translates'])->first();
	}

}