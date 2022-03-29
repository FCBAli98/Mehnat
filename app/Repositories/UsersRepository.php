<?php 

namespace App\Repositories;

use App\User;
use App\Role;

class UsersRepository extends \App\Repositories\BaseRepository{

	public function __construct()
    {
		$this->model = new User();
    }

	public function getIndex()
	{
		return $this->model->orderBy('id', 'desc')->paginate($this->limit);
	}

	public function findById($id)
	{
		return $this->model->find($id);
	}

	public function getRolesList()
	{
		return Role::pluck('display_name', 'id');
	}

	public function create($data)
	{
		$data['password'] = bcrypt($data['password']);
		if ($this->model->fill($data)->save()) {
			$this->model->roles()->attach($data['role']);
			return $this->model;
		}
		return false;
	}

	public function update($id, $data)
	{
		$model = $this->findById($id);
		if ($data['new_password']) {
			$data['password'] = bcrypt($data['new_password']);
		}
		if($model->fill($data)->update()){
			$model->roles()->sync([$data['role']]);
			return $model;
		}
		return false;
	}	

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}