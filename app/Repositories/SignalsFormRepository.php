<?php 

namespace App\Repositories;

use App\Models\Signal;
use App\Repositories\UploadsRepository;

class SignalsFormRepository{

  public function create($request)
  {
  	$model = $this->getModel($request);
  	return Signal::create($model);
  }

  public function getModel($data)
  {
  	$file = null;
  	if (isset($data['file']) && $data['file']) {
	  	$file = UploadsRepository::file($data['file']);
  	}
  	return [
  		"fio" => $data['fio'],
  		"subject" => $data['subject'],
  		"content" => [
  			"message" => $data['message'],
  			"file" => $file,
  		]
  	];
  }

}