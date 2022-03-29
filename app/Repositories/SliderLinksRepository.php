<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;

class SliderLinksRepository {

	public function getLinksSlider()
	{
		$categoryModel = new Category;
		$categoryModel->lang = \App::getLocale();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$linksSlider = $categoryModel->where(['anchor' => 'linksSlider'])->with(['translates'])->first();
		if ($linksSlider) {
			return [
				'title' => $linksSlider->title,
				'items' => $articleModel->where(['category_id' => $linksSlider->id])->where(['enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get()
			];
		}
		return [];
	}

}