<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;

class HomeRepository {

	public function getMainSlider()
	{
		$mainSlider = Category::where(['anchor' => 'mainSlider'])->first();
		if ($mainSlider) {
			$articleModel = new Article;
			$articleModel->lang = \App::getLocale();
			return $articleModel->where(['category_id' => $mainSlider->id, 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
		}
		return [];
	}

	public function getOnlineServices()
	{
		$categoryModel = new Category;
		$categoryModel->lang = \App::getLocale();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$onlineServices = $categoryModel->where(['anchor' => 'onlineServices'])->with(['translates'])->first();

        if ($onlineServices) {
			$arr = [
				'title' => $onlineServices->title,
				'items' => clearEmptyTranslates($articleModel->where(['parent_id' => $onlineServices->id])->where('enabled', '!=', 0)->with(['translates'])->orderBy('order', 'asc')->get()),
				'childs' => []
			];

			$subCats = $this->getSubCats($onlineServices->id);
			if ($subCats) {
				foreach ($subCats as $subCatId => $subCat) {
					$subCat['items'] = clearEmptyTranslates($articleModel->where(['category_id' => $subCatId])->where('enabled', '!=', 0)->with(['translates'])->orderBy('order', 'asc')->get());
                    $arr['childs'][] = $subCat;

                }
			}
			return $arr;
		}
		return [];
	}

	public function getSubCats($parent_id)
	{
		$arr = [];
		$subCats = Category::where(['parent_id' => $parent_id])->with(['translates'])->get();
        if ($subCats) {
			foreach ($subCats as $subCat) {
				$arr[$subCat->id] = [
					'title' => $subCat->title,
					'items' => []
				];
			}
		}
		return $arr;
	}

	public function getInformationServices()
	{
		$categoryModel = new Category;
		$categoryModel->lang = \App::getLocale();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$informationServices = $categoryModel->where(['anchor' => 'informationServices'])->with(['translates'])->first();
		if ($informationServices) {
			return [
				'title' => $informationServices->title,
				'items' => clearEmptyTranslates($articleModel->where(['category_id' => $informationServices->id])->where('enabled', '!=', 0)->with(['translates'])->orderBy('order', 'asc')->get())
			];
		}
		return [];
	}

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
				'items' => clearEmptyTranslates($articleModel->where(['category_id' => $linksSlider->id])->where(['enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get())
			];
		}
		return [];
	}

	public function getNews()
	{
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$data = $articleModel->where(['articles.type' => 'news'])->where(['articles.enabled' => 1])
		->with(['translates'])
		->join('translates', function($join){
			$join->on('articles.id','=','translates.object_id')
				->where('translates.object','=','article')
				->where('translates.object_key','=','title')
				->where('translates.languages','=',\App::getLocale())
				->where('translates.object_value','!=','');
		})
		->select('articles.*')
		->orderBy('articles.date', 'desc')->orderBy('articles.created_at', 'desc')->limit(6)->get();
		return $data;
	}

	public function search($query)
	{
		$object_types = [
			'news'
		];
		$object_keys = [
			'title',
			'description',
			'content'
		];
		$model = Translate::select(['object_id'])->where(['object' => 'article', 'languages' => \App::getLocale()])->whereIn('object_type', $object_types)->whereIn('object_key', $object_keys)->where('object_value','like','%'.$query.'%')->groupBy(['object_id'])->get();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		return $articleModel->whereIn('id', $model?$model:[])->paginate(20);
	}

	public function getModalPageMenu()
	{
		$arr = [];
		$icons = [
			'forEmployer' => 'icon-employer',
			'forWorker' => 'icon-worker',
			'laborMigrant' => 'icon-worker',
		];
		$ModalPageMenu = Category::whereIn('anchor',['forWorker','forEmployer','laborMigrant'])->get();
		if (count($ModalPageMenu)) {
			foreach ($ModalPageMenu as $menu) {
				if ($menu->title) {
					$arr[$menu->anchor] = [
						'anchor' => $menu->anchor,
						'title' => $menu->title,
						'icon' => $icons[$menu->anchor],
						// 'items' => $this->getMenuItems($menu->id),
						'childs' => $this->getModalPageMenuChilds($menu->id)
					];
				}
			}
		}
		return $arr;
	}

	public function getModalPageMenuChilds($menu_id)
	{
		$arr = [];
		$childs = Category::where(['parent_id'=>$menu_id, 'type' => 'menu'])->get();
		if (count($childs)) {
			foreach ($childs as $child) {
				if ($child->title) {
					$arr[] = [
						'title' => $child->title,
						'items' => $this->getMenuItems($child->id)
					];
				}
			}
		}
		return $arr;
	}

	public function getMenuItems($menu_id)
	{
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		return $articleModel->where(['category_id' => $menu_id, 'enabled' => 1, 'type' => 'menu-item'])->with(['translates'])->orderBy('order', 'asc')->get();
	}

	public function getInfographics()
	{
		$categoryModel = new Category;
		$categoryModel->lang = \App::getLocale();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$infographics = $categoryModel->where(['anchor' => 'infographics'])->with(['translates'])->first();
		if ($infographics) {
			return [
				'title' => $infographics->title,
				'items' => clearEmptyTranslates($articleModel->where(['category_id' => $infographics->id])->where(['enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get())
			];
		}
		return [];
	}

	public function getPartners()
	{
		$categoryModel = new Category;
		$categoryModel->lang = \App::getLocale();
		$articleModel = new Article;
		$articleModel->lang = \App::getLocale();
		$partners = $categoryModel->where(['anchor' => 'partners'])->with(['translates'])->first();
		if ($partners) {
			return [
				'title' => $partners->title,
				'items' => clearEmptyTranslates($articleModel->where(['category_id' => $partners->id])->where(['enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get())
			];
		}
		return [];
	}

//	sherzod's changes

    public function getLeftMenu()
    {
        $arr = [];
        $leftMenu = Category::where(['anchor' => 'leftMenu'])->first();
        if ($leftMenu) {
            $articleModel = new Article;
            $articleModel->lang = \App::getLocale();
            $leftMenuItems = $articleModel->where(['category_id' => $leftMenu->id, 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
            $arr = $this->getTreeMenu($leftMenuItems);
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

    public function getModalPageMenu_optimized()
    {
        $arr = [];
        $icons = [
            'forEmployer' => 'icon-employer',
            'forWorker' => 'icon-worker',
            'laborMigrant' => 'icon-worker',
        ];

        $ModalPageMenu = Category::whereIn('anchor',['forWorker','forEmployer','laborMigrant'])->with(['children', 'children.articles' => function($q){
            $q->where(['enabled' => 1, 'type' => 'menu-item']);
        }, 'children.articles.translates'])->get();
        if (count($ModalPageMenu)) {
            foreach ($ModalPageMenu as $menu) {
                if ($menu->title) {
                    $arr[$menu->anchor] = [
                        'anchor' => $menu->anchor,
                        'title' => $menu->title,
                        'icon' => $icons[$menu->anchor],
                        // 'items' => $this->getMenuItems($menu->id),
                        'childs' => $this->getModalPageMenuChilds_optimized($menu->children)
                    ];
                }
            }
        }
        return $arr;
    }

    public function getModalPageMenuChilds_optimized($children)
    {
        $arr = [];
        if (count($children)) {
            foreach ($children as $child) {
                if ($child->title) {
                    $arr[] = [
                        'title' => $child->title,
                        'items' => $child->articles
                    ];
                }
            }
        }
        return $arr;
    }

    public function getPhotoGallery()
    {
        $categoryModel = new Category;
        $categoryModel->lang = \App::getLocale();
        $articleModel = new Article;
        $articleModel->lang = \App::getLocale();
        $infographics = $categoryModel->where(['anchor' => 'photoGallery'])->with(['translates'])->first();
        if ($infographics) {
            return [
                'title' => $infographics->title,
                'items' => clearEmptyTranslates($articleModel->where(['category_id' => $infographics->id])->where(['enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get())
            ];
        }
        return [];
    }

//    end sherzod's changes
}
