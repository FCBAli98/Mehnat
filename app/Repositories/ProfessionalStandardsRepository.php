<?php 

namespace App\Repositories;

use App\ProfessionalStandard;
use App\ProfessionalStandardUz;
use App\Repositories\UploadsRepository;

class ProfessionalStandardsRepository{

	public function getIndex()
	{
		return ProfessionalStandard::paginate(50);
	}

	public function fileUpload($data, $id)
	{
		$model = ProfessionalStandard::find($id);
		$model_2 = ProfessionalStandardUz::find($id);
		$filename = UploadsRepository::file($data['file']);
		$files = $model->files??[];
		$files[] = $filename;
		$model->files = $files;
		$model_2->files = $files;
		$model_2->save();
		return $model->save();
	}

	public function deleteFile($id, $index)
	{
		$model = ProfessionalStandard::find($id);
		$model_2 = ProfessionalStandardUz::find($id);	

		if ($model_2 && $model_2->files && isset($model_2->files[$index])) {
			$files = $model_2->files;
			deleteFile($files[$index]);
			unset($files[$index]);
			$model_2->files = $files;
			$model_2->save();
		}	
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