<?php 

namespace App\Repositories;

use App\Models\Category;
use App\Models\Article;
use App\Models\Translate;
use App\Repositories\DocumentsRepository;

class DocumentCategoriesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Category();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'document-category';
    }

	public function getIndex()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->title = $data['title'];
		$this->model->url = toAscii($data['title']);
		$this->model->lang = $data['lang'];
		if ($this->model->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		$model->title = $data['title'];
		$model->url = toAscii($data['title']);
		$model->lang = $data['lang'];
		if($model->update()){
			return $model;
		}
		return false;
	}

	// public function findByName($name)
	// {
	// 	$model = Translate::where(['object' => 'category', 'object_type' => $this->model->type, 'object_key' => 'url', 'languages' => \App::getLocale(), 'object_value' => $name])->first();
	// 	if ($model) {
	// 		$category = $this->findById($model->object_id);
	// 		if ($category) {
	// 			$documentsRepo = new DocumentsRepository();
	// 			$articleModel = $documentsRepo->search([
	// 				'no' => 'like',
	// 				'title' => 'like',
	// 				'date' => 'date'
	// 			]);
	// 			return [
	// 				'category' => $category,
	// 				'documents' => $articleModel->where(['category_id' => $category->id, 'enabled' => 1])->with(['translates'])->orderBy('date', 'desc')->paginate(20)
	// 			];
	// 		}
	// 	}
	// 	abort(404);
	// }



	public function findByName($name)
	{
		$model = Translate::where(['object' => 'category', 'object_type' => $this->model->type, 'object_key' => 'url', 'object_value' => $name])->first();
		if ($model) {
			if($model->languages == \App::getLocale()){
				$model = $this->findById($model->object_id);
				if ($model) {
					$documentsRepo = new DocumentsRepository();
					$articleModel = $documentsRepo->search([
						'no' => 'like',
						'title' => 'like',
						'date' => 'date'
					]);
					return [
						'category' => $model,
						'documents' => $articleModel->where(['category_id' => $model->id, 'enabled' => 1])->with(['translates'])->orderBy('date', 'desc')->paginate(20)
					];
				}
			}else{
				$model = $this->findById($model->object_id);
				if ($model->url) {
					if ($model->url == $name) {
						$documentsRepo = new DocumentsRepository();
						$articleModel = $documentsRepo->search([
							'no' => 'like',
							'title' => 'like',
							'date' => 'date'
						]);
						return [
							'category' => $model,
							'documents' => $articleModel->where(['category_id' => $model->id, 'enabled' => 1])->with(['translates'])->orderBy('date', 'desc')->paginate(20)
						];
					}else{
						return redirect()->route('documents.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		abort(404);
	}



	public function getAllListToNav()
	{
		return $this->model->where(['type' => $this->model->type])->with(['translates'])->get();
	}

}