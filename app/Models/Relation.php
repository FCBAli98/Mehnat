<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
	protected $table = 'relations';

	protected $fillable = [
	  	'local_object',
	  	'local_id',
	  	'foreign_object',
	  	'foreign_id',
	  	'relation_type',
	];

	public static function saveRelation($model, $local_object ,$foreign_id, $foreign_object, $type)
	{
		if ($foreign_id) {
			$relation = $model->relationstable->firstWhere('relation_type','=',$type);
	        if (!$relation) {
	            $relation = new Relation();
	            $relation->relation_type = $type;
	            $relation->local_object = $local_object;
	            $relation->local_id = $model->id;
	        }
            $relation->foreign_object = $foreign_object;
            $relation->foreign_id = $foreign_id;
	        $relation->save();
		}else{
			$relation = $model->relationstable->firstWhere('relation_type','=',$type);
			if ($relation) {
				$relation->delete();
			}
		}
	}

	public static function deleteRelation($id, $type, $object)
	{
		Relation::where(['local_id' => $id, 'relation_type' => $type, 'local_object' => $object])->delete();
	}

}
