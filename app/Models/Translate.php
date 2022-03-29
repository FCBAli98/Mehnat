<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
	protected $table = 'translates';

	protected $fillable = [
	  	'object_type',
	  	'object_id',
	  	'object_key',
	  	'object_value',
	  	'languages',
	];

	public $timestamps = false;

	public static function saveTranslations($model, $key, $value, $type, $language = false)
	{
		if ($value) {
			$translate = $model->translates->firstWhere('object_key','=',$key);
	        if (!$translate) {
	            $translate = new Translate();
	            $translate->object = $type;
	            $translate->object_type = $model->type;
	            $translate->object_id = $model->id;
	            $translate->object_key = $key;
	            $translate->languages = $language?$language:\App::getLocale();
	        }
	        $translate->object_value = $value;
	        $translate->save();
		}else{
			$translate = $model->translates->firstWhere('object_key','=',$key);
			if ($translate) {
				$translate->delete();
			}
		}
	}

	public static function deleteTranslations($id, $type)
	{
		Translate::where(['object' => $type, 'object_id' => $id])->delete();
	}

	public function article()
    {
        return $this->belongsTo(Article::class, 'object_id', 'id');
    }
}
