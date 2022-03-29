<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
	protected $table = 'signals';

	protected $fillable = [
  	'fio',
  	'subject',
  	'content',
	];

	protected $casts = [
		"fio" => "string",
		"subject" => "string",
		"content" => "array",
		"created_at" => "date:Y-m-d H:i:s",
		"updated_at" => "date:Y-m-d H:i:s",
	];

	public function getMessageAttribute()
  {
    return $this->content['message']??"";
  }

  public function getFileAttribute()
  {
    return $this->content['file']??"";
  }

}
