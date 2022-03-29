<?php 

namespace App\Repositories;

use App\Models\Signal;

class SignalsRepository extends \App\Repositories\BaseRepository{

	public function __construct()
  {
		$this->model = new Signal();
  }

	public function getIndex()
	{
		$model = $this->search([
			'enabled' => 'int'
		]);
		return $model->orderBy('id', 'desc')->paginate($this->limit);
	}

}