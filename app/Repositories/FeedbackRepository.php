<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;

class FeedbackRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'form-feedback';
    }

    public function getModel()
    {
		$model = $this->model->where(['type' => $this->model->type])->first();
		if ($model) {
			return $model;
		}
		return $this->model;
    }

	public function save($data)
	{
		$model = $this->getModel();
		$model->lang = $data['lang'];
		$model->anchor = $data['anchor'];
		$model->description = $data['description'];
		$model->additional_field1 = $data['additional_field1'];
		$model->additional_field2 = $data['additional_field2'];
		if ($model->save()) {
			return $model;
		}
		return false;
	}

	public function getLanguagesArr()
	{
		return array_column_ext(\Config::get('laravellocalization.supportedLocales'), 'native',-1);
	}

	public function getSubjects()
	{
		return [
			1=>__('main.Правовая консультация'),
			2=>__('main.Информационный запрос'),
			3=>__('main.Помощь трудовому мигранту'),
		];
	}

}