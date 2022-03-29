<?php

namespace App\Repositories;

use App\Statistic;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StatisticRepository extends \App\Repositories\BaseRepository{

    private $lang;

	public function __construct()
    {
		$this->model = new Statistic();
		$this->lang = \App::getLocale();
    }

	public function getIndex()
	{
        $searchRequestParams = app('request')->input('search');

        $model = $this->model;
        if(isset($searchRequestParams['name'])) {
            $model = $this->model->where([['name_uz', 'ilike', $searchRequestParams['name'].'%'],
                ['name_cyrl', 'ilike', $searchRequestParams['name'].'%'], ['name_ru', 'ilike', $searchRequestParams['name'].'%']]);
        }

        if(isset($searchRequestParams['parent_id'])) {
            $model = $this->model->where('parent_id', $searchRequestParams['parent_id']);
        }

        return $model->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function create($data)
	{
		$this->model->name_uz = $data['name_uz'];
		$this->model->name_ru = $data['name_ru'];
		$this->model->name_en = $data['name_en'];
		$this->model->name_cyrl = $data['name_cyrl'];
		$this->model->parent_id = $data['parent_id'];
		$this->model->slug = str_slug($data['name_cyrl'].'_'.$data['parent_id']);

		if (!Statistic::where('slug', $this->model->slug)->first()) {
            if ($this->model->save()) {
                return $this->model;
            }
        }
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
        $model->name_uz = $data['name_uz'];
        $model->name_ru = $data['name_ru'];
        $model->name_en = $data['name_en'];
        $model->name_cyrl = $data['name_cyrl'];
        $model->parent_id = $data['parent_id'];
        $model->slug = str_slug($data['name_cyrl'].'_'.$data['parent_id']);
        if (!Statistic::where([['slug', $this->model->slug], ['id', '!=', $id]])->first()) {
            if($model->update()){
                return $model;
            }
        }
		return false;
	}

    public function getStatisticsTree()
    {
        $all = Statistic::whereNull('parent_id')->get();
        $arr = [];
        if ($all) {
            foreach ($all as $item) {
                $arr[$item->id] = $item->name_cyrl;
                $childs = $this->getStatisticsItemChildsById($item->id, 0);
                if ($childs) {
                    $arr = $arr+$childs;
                }
            }
        }
        return ['' => 'Выберите']+$arr;
    }

    public function getStatisticsItemChildsById($parent_id, $level)
    {
        $level += 1;
        $childs = Statistic::where(['parent_id' => $parent_id])->get();
        $arr = [];
        if (count($childs) > 0) {
            foreach ($childs as $child) {
                $arr[$child->id] = str_repeat(' - ',$level).$child->name_uz;
                $subChilds = $this->getStatisticsItemChildsById($child->id, $level);
                if ($subChilds) {
                    $arr = $arr+$subChilds;
                }
            }
        }
        return $arr;
    }

    public function getRegionsStatistics() {
	    return DB::table("regions as r")
            ->join("statistics_regions as sr", "r.id", "=", "sr.region_id")
            ->join("statistics as s", "sr.statistic_id", "=", "s.id")
            ->join("statistics as ps", "s.parent_id", "=", "ps.id")
            ->select("r.name_uz", "r.name_ru", "r.name_cyrl", "s.name_uz as s_name_uz", "s.name_ru as s_name_ru", "s.name_cyrl as s_name_cyrl",
                "sr.value", "sr.year", "ps.name_uz as ps_name_uz", "ps.name_ru as ps_name_ru", "ps.name_cyrl as ps_name_cyrl", "sr.created_at", "sr.updated_at", "sr.id"
            )->paginate($this->limit);
    }

    public function getStatistics() {
	    $locale = App::getLocale();
        if ($locale == 'ru') {
            $locale_name = 's.name_ru';
        }elseif ($locale == 'en') {
            $locale_name = 's.name_en';
        }elseif ($locale == 'oz') {
            $locale_name = 's.name_uz';
        }else {
            $locale_name = 's.name_cyrl';
        }

	    return DB::select("
        select s.id, ".$locale_name." as name, sum(sr.value) as value
        from b_statistics as s
        inner join b_statistics_regions as sr on sr.statistic_id = s.id
        where s.parent_id = 4
        group by s.id, ".$locale_name."
        limit 6
        ");
    }

    public function getDiagramValues() {
        $locale = App::getLocale();

        if ($locale == 'ru') {
            $locale_name = 's.name_ru';
        }elseif ($locale == 'en') {
            $locale_name = 's.name_en';
        }elseif ($locale == 'oz') {
            $locale_name = 's.name_uz';
        }else {
            $locale_name = 's.name_cyrl';
        }

        return DB::select("
        select ".$locale_name." as name, sum(sr.value) as value
        from b_statistics as s
        inner join b_statistics_regions as sr on sr.statistic_id = s.id
        where s.parent_id = 1
        group by ".$locale_name."
        ");
    }

    public function getStat() {
        $locale = App::getLocale();

        if ($locale == 'ru') {
            $locale_name = 's.name_ru';
            $orderby = 'desc';
        }elseif ($locale == 'en') {
            $locale_name = 's.name_en';
            $orderby = 'asc';
        }elseif ($locale == 'oz') {
            $locale_name = 's.name_uz';
            $orderby = 'desc';
        }else {
            $locale_name = 's.name_cyrl';
            $orderby = 'desc';
        }

        return DB::select("
        select ".$locale_name." as name, sum(sr.value) as value
        from b_statistics as s
        inner join b_statistics_regions as sr on sr.statistic_id = s.id
        where s.parent_id = 2
        group by ".$locale_name."
        order by ".$locale_name." ".$orderby."
        ");
    }
}
