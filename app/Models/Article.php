<?php

namespace App\Models;

use App\Models\Translate;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
	protected $table = 'articles';

    protected $fillable = [
        'type',
        'category_id',
        'parent_id',
        'order',
        'enabled',
        'anchor',
        'date'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Article','parent_id','id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Article','parent_id','id')->with(['translates']);
    }

    public function relationstable()
    {
        return $this->hasMany('App\Models\Relation','local_id','id')->where(['local_object' => 'article']);
    }

    public function translates()
    {
        return $this->hasMany('App\Models\Translate','object_id','id')->where(['object' => 'article','languages' => $this->lang]);
    }

    public function translatesCheck()
    {
        return $this->hasMany('App\Models\Translate','object_id','id')->select(['id','object_type','object_id','languages'])->where(['object' => 'article']);
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

    public function getAnotherUrlAttribute()
    {
        return $this->translates->firstWhere('object_key','=','another_url')?$this->translates->firstWhere('object_key','=','another_url')->object_value:false;
    }

    public function setAnotherUrlAttribute($value)
    {
        $this->another_url = $value;
    }

    public function getContentAttribute()
    {
        return $this->translates->firstWhere('object_key','=','content')?$this->translates->firstWhere('object_key','=','content')->object_value:false;
    }

    public function setContentAttribute($value)
    {
        $this->content = $value;
    }

    public function getImageAttribute()
    {
        return $this->translates->firstWhere('object_key','=','image')?$this->translates->firstWhere('object_key','=','image')->object_value:false;
    }

    public function setImageAttribute($value)
    {
        $this->image = $value;
    }

    public function getPositionAttribute()
    {
        return $this->translates->firstWhere('object_key','=','position')?$this->translates->firstWhere('object_key','=','position')->object_value:false;
    }

    public function setPositionAttribute($value)
    {
        $this->position = $value;
    }

    public function getNoAttribute()
    {
        return $this->translates->firstWhere('object_key','=','no')?$this->translates->firstWhere('object_key','=','no')->object_value:false;
    }

    public function setNoAttribute($value)
    {
        $this->no = $value;
    }

    public function getFile1Attribute()
    {
        return $this->translates->firstWhere('object_key','=','file1')?$this->translates->firstWhere('object_key','=','file1')->object_value:false;
    }

    public function setFile1Attribute($value)
    {
        $this->file1 = $value;
    }

    public function getFile2Attribute()
    {
        return $this->translates->firstWhere('object_key','=','file2')?$this->translates->firstWhere('object_key','=','file2')->object_value:false;
    }

    public function setFile2Attribute($value)
    {
        $this->file2 = $value;
    }

    public function getReceptionDaysAttribute()
    {
        return $this->translates->firstWhere('object_key','=','reception_days')?$this->translates->firstWhere('object_key','=','reception_days')->object_value:false;
    }

    public function setReceptionDaysAttribute($value)
    {
        $this->reception_days = $value;
    }

    public function getPhoneAttribute()
    {
        return $this->translates->firstWhere('object_key','=','phone')?$this->translates->firstWhere('object_key','=','phone')->object_value:false;
    }

    public function setPhoneAttribute($value)
    {
        $this->phone = $value;
    }

    public function getAddressAttribute()
    {
        return $this->translates->firstWhere('object_key','=','address')?$this->translates->firstWhere('object_key','=','address')->object_value:false;
    }

    public function setAddressAttribute($value)
    {
        $this->address = $value;
    }

    public function getIframeAttribute()
    {
        return $this->translates->firstWhere('object_key','=','iframe')?$this->translates->firstWhere('object_key','=','iframe')->object_value:false;
    }

    public function setIframeAttribute($value)
    {
        $this->iframe = $value;
    }

    public function getEmailAttribute()
    {
        return $this->translates->firstWhere('object_key','=','email')?$this->translates->firstWhere('object_key','=','email')->object_value:false;
    }

    public function setEmailAttribute($value)
    {
        $this->email = $value;
    }

    public function getAdditionalField1Attribute()
    {
        return $this->translates->firstWhere('object_key','=','additional_field1')?$this->translates->firstWhere('object_key','=','additional_field1')->object_value:false;
    }

    public function setAdditionalField1Attribute($value)
    {
        $this->additional_field1 = $value;
    }

    public function getAdditionalField2Attribute()
    {
        return $this->translates->firstWhere('object_key','=','additional_field2')?$this->translates->firstWhere('object_key','=','additional_field2')->object_value:false;
    }

    public function setAdditionalField2Attribute($value)
    {
        $this->additional_field2 = $value;
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

    public function getHcKeyAttribute()
    {
        return $this->translates->firstWhere('object_key','=','hc_key')?$this->translates->firstWhere('object_key','=','hc_key')->object_value:false;
    }

    public function setHcKeyAttribute($value)
    {
        $this->hc_key = $value;
    }

    public function getLegalEntityCountAttribute()
    {
        return $this->translates->firstWhere('object_key','=','legal_entity_count')?$this->translates->firstWhere('object_key','=','legal_entity_count')->object_value:false;
    }

    public function setLegalEntityCountAttribute($value)
    {
        $this->legal_entity_count = $value;
    }

    public function getFemaleCountAttribute()
    {
        return $this->translates->firstWhere('object_key','=','female_count')?$this->translates->firstWhere('object_key','=','female_count')->object_value:false;
    }

    public function setFemaleCountAttribute($value)
    {
        $this->female_count = $value;
    }

    public function getMaleCountAttribute()
    {
        return $this->translates->firstWhere('object_key','=','male_count')?$this->translates->firstWhere('object_key','=','male_count')->object_value:false;
    }

    public function setMaleCountAttribute($value)
    {
        $this->male_count = $value;
    }

    public function save(array $options = [])
    {
        if (!$this->order) {
            $last = Article::max('order');
            $this->order = $last?($last+1):1;
        }
        parent::save($options);
        $this->saveTranslations();
        $this->saveRelations();
        return true;
    }

    public function getStatusDisplayAttribute()
    {
        return \Config::get('handbook.statuses')[$this->enabled];
    }

    public function saveTranslations()
    {
        if ($this->title !== false) {
            Translate::saveTranslations($this,'title',$this->title,'article',$this->lang);
        }
        if ($this->description !== false) {
            Translate::saveTranslations($this,'description',$this->description,'article',$this->lang);
        }
        if ($this->url !== false) {
            Translate::saveTranslations($this,'url',$this->url,'article',$this->lang);
        }
        if ($this->image !== false) {
            Translate::saveTranslations($this,'image',$this->image,'article',$this->lang);
        }
        if ($this->content !== false) {
            Translate::saveTranslations($this,'content',$this->content,'article',$this->lang);
        }
        if ($this->another_url !== false) {
            Translate::saveTranslations($this,'another_url',$this->another_url,'article',$this->lang);
        }
        if ($this->position !== false) {
            Translate::saveTranslations($this,'position',$this->position,'article',$this->lang);
        }
        if ($this->reception_days !== false) {
            Translate::saveTranslations($this,'reception_days',$this->reception_days,'article',$this->lang);
        }
        if ($this->no !== false) {
            Translate::saveTranslations($this,'no',$this->no,'article',$this->lang);
        }
        if ($this->file1 !== false) {
            Translate::saveTranslations($this,'file1',$this->file1,'article',$this->lang);
        }
        if ($this->file2 !== false) {
            Translate::saveTranslations($this,'file2',$this->file2,'article',$this->lang);
        }
        if ($this->phone !== false) {
            Translate::saveTranslations($this,'phone',$this->phone,'article',$this->lang);
        }
        if ($this->address !== false) {
            Translate::saveTranslations($this,'address',$this->address,'article',$this->lang);
        }
        if ($this->iframe !== false) {
            Translate::saveTranslations($this,'iframe',$this->iframe,'article',$this->lang);
        }
        if ($this->email !== false) {
            Translate::saveTranslations($this,'email',$this->email,'article',$this->lang);
        }
        if ($this->additional_field1 !== false) {
            Translate::saveTranslations($this,'additional_field1',$this->additional_field1,'article',$this->lang);
        }
        if ($this->additional_field2 !== false) {
            Translate::saveTranslations($this,'additional_field2',$this->additional_field2,'article',$this->lang);
        }
        if ($this->legal_entity_count !== false) {
            Translate::saveTranslations($this,'legal_entity_count',$this->legal_entity_count,'article',$this->lang);
        }
        if ($this->male_count !== false) {
            Translate::saveTranslations($this,'male_count',$this->male_count,'article',$this->lang);
        }
        if ($this->female_count !== false) {
            Translate::saveTranslations($this,'female_count',$this->female_count,'article',$this->lang);
        }
        if ($this->hc_key !== false) {
            Translate::saveTranslations($this,'hc_key',$this->hc_key,'article',$this->lang);
        }
    }

    public function saveRelations()
    {
        Relation::saveRelation($this,'article',$this->relation_menu_id,'category','menu');
    }

    public function getLangsCheckAttribute()
    {
        $languages = \Config::get('laravellocalization.supportedLocales');
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
        deleteImage($this->image);
        deleteIcon($this->icon);
        deleteFile($this->file1);
		deleteFile($this->file2);
		parent::delete();
        Translate::deleteTranslations($this->id,'article');
		return true;
	}
}
