<?php 

namespace App\Repositories;
use Illuminate\Support\Facades\URL;
use App\Models\Translate;
use App\Models\Category;
use App\Models\Article;

class BaseRepository{

	public $limit = 20;

	public $model;

	public $model_type;

	public function findById($id)
	{
		return $this->model->find($id);
	}

	public function findByIdFront($id)
	{
		$model = $this->model->where(['id' => $id, 'enabled' => 1])->with(['translates'])->first();
		if ($model->title) {
			return $this->model->find($id);
		}
		abort(404);
	}

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getModel()
    {
    	return $this->model;
    }

	public function getLocaleListForLangParam()
	{
		$arr = [];
		if (\Config::get('laravellocalization.supportedLocales')) {
			foreach (\Config::get('laravellocalization.supportedLocales') as $lang => $locale) {
				$arr[$lang] = [
					'name' => $locale['native'],
					'active' => isset($_GET['lang'])?($_GET['lang']==$lang):(\App::getLocale()==$lang)
				];
			}
		}
		return $arr;
	}

	public function getLanguagesArr()
	{
		return array_column_ext(\Config::get('laravellocalization.supportedLocales'), 'native',-1);
	}

	public function deleteTranslate($id)
	{
		$model = $this->findById($id);
		if ($model->translates) {
			foreach ($model->translates as $translate) {
				$translate->delete();
			}
		}
		return true;
	}

	public function search($types = [])
	{
		$searchRequestParams = app('request')->input('search');
		$where = [];
		$idArr = ['empty' => 1];
		if ($searchRequestParams) {
			foreach ($searchRequestParams as $key => $param) {
				if ($param !== null) {
					if (isset($types[$key]) && $types[$key] == 'like') {
						if (isset($idArr['empty'])) {
							$idArr = ['first' => 1];
						}
						$translatesQuery = Translate::select(['object_id'])->where(['object_type' => $this->model->type, 'object_key' => $key])->where('object_value','like','%'.$param.'%');
						if (!isset($idArr['first'])) {
							$translatesQuery->whereIn('object_id', $idArr);
						}
						$idArr = $translatesQuery->get()->toArray();
						if ($idArr) {
							$idArr = array_column($idArr, 'object_id');
						}
					}elseif(isset($types[$key]) && $types[$key] == 'date'){
						$date = date('Y-m-d', strtotime($param));
						$where[] = [$key, '=', $date];
					}else{
						$where[] = [$key, '=', $param];
					}
				}
			}
		}
		$query = $this->model->where($where);
		if (!isset($idArr['empty'])) {
			$query->whereIn('id', $idArr);
		}
		return $query;
	}

	public function getRelationMenu($menu_id)
	{
		if ($menu_id) {
			return Article::where(['category_id' => $menu_id, 'type' => 'menu-item', 'enabled' => 1])->with(['translates'])->orderBy('order', 'asc')->get();
		}
		return [];
	}

	public function getCategoriesTree()
	{
		$all = Category::where(['type' => 'menu', 'parent_id' => null])->with(['translates'])->get();
		$arr = [];
		if ($all) {
			foreach ($all as $item) {
				$arr[$item->id] = $item->title;
				$childs = $this->getItemChildsById($item->id, 0);
				if ($childs) {
					$arr = $arr+$childs;
				}
			}
		}
		return ['' => 'Выберите']+$arr;
	}

	public function getItemChildsById($parent_id, $level)
	{
		$level += 1;
		$childs = Category::where(['type' => 'menu', 'parent_id' => $parent_id])->with(['translates'])->get();
		$arr = [];
		if (count($childs) > 0) {
			foreach ($childs as $child) {
				$arr[$child->id] = str_repeat(' - ',$level).$child->title;
				$subChilds = $this->getItemChildsById($child->id, $level);
				if ($subChilds) {
					$arr = $arr+$subChilds;
				}
			}
		}
		return $arr;
	}

}