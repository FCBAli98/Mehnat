<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\UploadsRepository;

class DocumentsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'document';
    }

	public function getIndex()
	{
		$model = $this->search([
			'category_id' => 'int',
			'title' => 'like',
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['category','translatesCheck','translates'])->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'document-category'])->with(['translates'])->get();
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
		if (isset($data['file1']) && $data['file1']) {
			$this->model->file1 = UploadsRepository::file($data['file1']);
		}
		if (isset($data['file2']) && $data['file2']) {
			$this->model->file2 = UploadsRepository::file($data['file2']);
		}
		$this->model->date = $data['date'];
		$this->model->url = $data['another_url'];
		$this->model->no = $data['no'];
		$this->model->another_url = $data['another_url'];
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
		$model->category_id = $data['category_id'];
		$model->title = $data['title'];
		if (isset($data['file1']) && $data['file1']) {
			deleteFile($model->file1);
			$model->file1 = UploadsRepository::file($data['file1']);
		}
		if (isset($data['file2']) && $data['file2']) {
			deleteFile($model->file2);
			$model->file2 = UploadsRepository::file($data['file2']);
		}
		$model->date = $data['date'];
		$model->url = $data['another_url'];
		$model->no = $data['no'];
		$model->another_url = $data['another_url'];
		$model->enabled = $data['enabled'];
		if($model->update()){
			return $model;
		}
		return false;
	}


}