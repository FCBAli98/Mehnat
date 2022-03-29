<?php 

namespace App\Repositories;

use App\Role;

class RolesRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new Role();
    }

	public function getIndex()
	{
		return $this->model->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function findById($id)
	{
		return $this->model->find($id);
	}
	
	public function create($data)
	{
		if ($this->model->fill($data)->save()) {
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		if($model->fill($data)->update()){
			return $model;
		}
		return false;
	}	

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}