<?php 

namespace App\Repositories;

use App\ProfessionalStandard;
use App\ProfessionalStandardUz;
use App\Repositories\UploadsRepository;
use Lang;

class ProfessionalStandardsUzRepository{

	public function getIndex()
	{
		return ProfessionalStandardUz::paginate(50);
	}

	public function fileUpload($data, $id)
	{
		$model = ProfessionalStandardUz::find($id);
		$filename = UploadsRepository::file($data['file']);
		$files = $model->files??[];
		$files[] = $filename;
		$model->files = $files;
		return $model->save();
	}

	public function deleteFile($id, $index)
	{
		$model = ProfessionalStandardUz::find($id);
		if ($model && $model->files && isset($model->files[$index])) {
			$files = $model->files;
			deleteFile($files[$index]);
			unset($files[$index]);
			$model->files = $files;
			return $model->save();
		}
		abort(404);
	}

}