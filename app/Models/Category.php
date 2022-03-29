<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Translate;
use App\Models\Relation;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'type',
        'anchor',
        'parent_id',
    ];

    public function translates()
    {
        return $this->hasMany('App\Models\Translate','object_id','id')->where(['object' => 'category','languages' => $this->lang]);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category','parent_id','id');
    }

    public function relationstable()
    {
        return $this->hasMany('App\Models\Relation','local_id','id')->where(['local_object' => 'category']);
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id','id');
    }

    public function translatesCheck()
    {
        return $this->hasMany('App\Models\Translate','object_id','id')->select(['id','object_type','object_id','languages'])->where(['object' => 'category']);
    }

    public function getTitleAttribute()
    {
        return $this->translates->firstWhere('object_key','=','title')?$this->translates->firstWhere('object_key','=','title')->object_value:false;
    }

    public function setTitleAttribute($value)
    {
        $this->title = $value;
    }

    public function getDescriptionAttribute()
    {
        return $this->translates->firstWhere('object_key','=','description')?$this->translates->firstWhere('object_key','=','description')->object_value:false;
    }

    public function setDescriptionAttribute($value)
    {
        $this->description = $value;
    }

    public function getUrlAttribute()
    {
        return $this->translates->firstWhere('object_key','=','url')?$this->translates->firstWhere('object_key','=','url')->object_value:false;
    }

    public function setUrlAttribute($value)
    {
        $this->url = $value;
    }

    public function getRelationMenuIdAttribute()
    {
        return $this->relationstable->firstWhere('relation_type','=','menu')?$this->relationstable->firstWhere('relation_type','=','menu')->foreign_id:false;
    }

    public function setRelationMenuIdAttribute($value)
    {
        $this->relation_menu_id = $value;
    }

    public function getLangAttribute()
    {
        return (isset($_GET['lang']) && $_GET['lang'])?$_GET['lang']:\App::getLocale();
    }

    public function setLangAttribute($value)
    {
        $this->lang = (isset($_GET['lang']) && $_GET['lang'])?$_GET['lang']:$value;
    }

    public function save(array $options = [])
    {
        parent::save($options);
        $this->saveTranslations();
        $this->saveRelations();
        return true;
    }

    public function saveTranslations()
    {
        Translate::saveTranslations($this,'title',$this->title,'category',$this->lang);
        Translate::saveTranslations($this,'description',$this->description,'category',$this->lang);
        Translate::saveTranslations($this,'url',$this->url,'category',$this->lang);
    }

    public function saveRelations()
    {
        Relation::saveRelation($this,'category',$this->relation_menu_id,'category','menu');
    }

    public function getLangsCheckAttribute()
    {
        $languages = \Config::get('laravellocalization.supportedLocales');
        dd($languages);
        if ($this->translatesCheck) {
            foreach ($this->translatesCheck as $translate) {
                if (isset($languages[$translate->languages])) {
                    $languages[$translate->languages]['exists'] = true;
                }
            }
        }
        return $languages;
    }

    public function delete()
    {
        // deleteImage($this->image);
        parent::delete();
        Translate::deleteTranslations($this->id,'category');
        return true;
    }

    public function getRecursiveChildrens($onlyId = false)
    {
        $arr = [];
        $childrens = Category::where(['parent_id' => $this->id])->get();
        if ($childrens) {
            foreach ($childrens as $child) {
                $arr[] = $onlyId?$child->id:$child;
                $childs = $this->getItemChildsById($child->id, $onlyId);
                if ($childs) {
                    $arr = $arr+$childs;
                }
            }
        }
        return $arr;
    }

    public function getItemChildsById($parent_id, $onlyId)
    {
        $childs = Category::where(['parent_id' => $parent_id])->with(['translates'])->get();
        $arr = [];
        if (count($childs) > 0) {
            foreach ($childs as $child) {
                $arr[] = $onlyId?$child->id:$child;
                $subChilds = $this->getItemChildsById($child->id, $onlyId);
                if ($subChilds) {
                    $arr = $arr+$subChilds;
                }
            }
        }
        return $arr;
    }

}
