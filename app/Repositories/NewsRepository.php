<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Translate;
use App\Repositories\ImagesRepository;

class NewsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Article();
		$this->model->lang = \App::getLocale();
		$this->model->type = 'news';
    }

	public function getIndex()
	{
		$model = $this->search([
			'category_id' => 'int',
			'enabled' => 'int'
		]);
		return $model->where(['type' => $this->model->type])->with(['category','translatesCheck','translates'])->orderBy('date', 'desc')->paginate($this->limit);
	}

	public function getCategoriesArr()
	{
		$arr = [];
		$categories = Category::where(['type' => 'newsgroups'])->with(['translates'])->get();
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
		$this->model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			$this->model->image = ImagesRepository::upload($data['image']);
		}
		$this->model->description = $data['description'];
		$this->model->content = $data['content'];
		$this->model->date = $data['date'];
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
		$model->url = toAscii($data['title']);
		if (isset($data['image']) && $data['image']) {
			deleteImage($model->image);
			$model->image = ImagesRepository::upload($data['image']);
		}
		$model->description = $data['description'];
		$model->content = $data['content'];
		$model->date = $data['date'];
		$model->enabled = $data['enabled'];
		if($model->update()){
			return $model;
		}
		return false;
	}


	public function getCategories()
	{
		$arr = [];
		$categories = Category::where(['type' => 'newsgroups'])->with(['translates'])->get();
		if ($categories) {
			foreach ($categories as $category) {
				if ($category->title) {
					$arr[] = [
						'id' => $category->id,
						'title' => $category->title,
						'url' => $category->url,
					];
				}
			}
		}
		return $arr;
	}

	public function getNewsList($request)
	{
		$request = $request->all();
		if (isset($request['url'])&&$request['url']) {
	        return $this->findArticlesByCategoryName($request['url']);
		}
	}

	public function findArticlesByCategoryName($name)
	{
		$arr = [];
		$model = Translate::where(['object' => 'category', 'object_type' => 'newsgroups', 'object_key' => 'url', 'languages' => \App::getLocale(), 'object_value' => $name])->first();
		if ($model) {
			$news = Article::where(['type' => $this->model->type, 'category_id' => $model->object_id])
			->with(['translates'])
			->join('translates', function($join){
				$join->on('articles.id','=','translates.object_id')
					->where('translates.object','=','article')
					->where('translates.object_key','=','title')
					->where('translates.languages','=',\App::getLocale())
					->where('translates.object_value','!=','');
			})
			->select('articles.*')
			->orderBy('date', 'desc')->paginate(7);
			if (count($news)) {
				foreach ($news as $newsItem) {
					if ($newsItem->url) {
						$date = new \DateTime($newsItem->date);
						$arr[] = [
							'id' => $newsItem->id,
							'title' => $newsItem->title,
							'description' => $newsItem->description,
							'date' => '<i class="icon-dec-1"></i><span><b>'.$date->format('d').'</b>.'.$date->format('m.Y').'</span>',
							'url' => route('news.show',['name' => $newsItem->url]),
							'image' => getMedium($newsItem->image),
						];
					}
				}
			}
		}
		return [
			'news' => $arr,
			'lastPage' => $news->lastPage()
		];
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
						return redirect()->route('news.show', ['name' => $model->url])->send();
					}
				}
			}
		}
		return redirect()->route('home')->send();
	}

//	sherzod's changes
    public function getLastTerritorialNews()
    {
        $name = 'territorialnye-novosti';

        switch (\App::getLocale())
        {
            case 'oz':
                $name = 'hududlardan-xabarlar';
                break;
            case 'uz':
                $name = 'hududlardan-habarlar';
                break;
            case 'en':
            case 'ru':
                $name = 'territorialnye-novosti';
                break;
        }

        $arr = [];
        $model = Translate::where(['object' => 'category', 'object_type' => 'newsgroups', 'object_key' => 'url', 'languages' => \App::getLocale(), 'object_value' => $name])->first();
        if ($model) {
            $news = Article::where(['type' => $this->model->type, 'category_id' => $model->object_id])
                ->with(['translates'])
                ->join('translates', function($join){
                    $join->on('articles.id','=','translates.object_id')
                        ->where('translates.object','=','article')
                        ->where('translates.object_key','=','title')
                        ->where('translates.languages','=',\App::getLocale())
                        ->where('translates.object_value','!=','');
                })
                ->select('articles.*')
                ->latest()->first();

            if ($news) {
                if ($news->url) {
                    $date = new \DateTime($news->date);
                    $arr[] = [
                        'id' => $news->id,
                        'title' => $news->title,
                        'description' => $news->description,
                        'date' => '<i class="icon-dec-1"></i><span><b>'.$date->format('d').'</b>.'.$date->format('m.Y').'</span>',
                        'url' => route('news.show',['name' => $news->url]),
                        'image' => getMedium($news->image),
                    ];
                }
            }
        }

        return $arr;
    }
//    end sherzod's changes

}
