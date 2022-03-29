<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;

class HeaderRepository {

	public function getHeaderMenu()
	{
		$arr = [];
		$headerMenu = Category::where(['anchor' => 'headerMenu'])->first();
		if ($headerMenu) {
			$articleModel = new Article;
			$articleModel->lang = \App::getLocale();
			$headerMenuItems = $articleModel->where(['category_id' => $headerMenu->id, 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
			$arr = $this->getTreeMenu($headerMenuItems);
		}
		return $arr;
	}

	public function getTreeMenu($data, $parent_id = 0)
	{
		$arr = [];
		if (count($data) > 0) {
			foreach ($data as $item) {
				if ($item->parent_id == $parent_id) {
					$arr[] = [
						'title' => $item->title,
						'url' => $item->url,
						'items' => $this->getTreeMenu($data, $item->id)
					];
				}
			}
		}
		return $arr;
	}

	public function getLogo()
	{
		$arr = [
			'oz' => asset('/images/logo-oz.svg'),
			'uz' => asset('/images/logo-uz.svg'),
			'ru' => asset('/images/logo.svg'),
			'en' => asset('/images/logo-en.svg'),
		];
		return $arr[\App::getLocale()];
	}

}