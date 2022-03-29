<?php 

namespace App\Repositories;

class UploadsRepository
{
	
	public static function file($file)
	{
		$fileName = time().'-'.str_random(20).'.'.$file->getClientOriginalExtension();
		$savedFile = $file->move('./uploads/files/', $fileName);
		return $fileName;		
	}

}