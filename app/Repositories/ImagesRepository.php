<?php 

namespace App\Repositories;

class ImagesRepository
{
	
	public static function upload( $file )
	{
		$fileName = time().'-'.str_random(20).'.'.$file->getClientOriginalExtension();
		$thumbnail = \Image::make($file)->resize(200, null, function ($constraint) {
	    $constraint->aspectRatio();
		})->save('./uploads/thumbnails/'.$fileName);
		$medium = \Image::make($file)->resize(600, null, function ($constraint) {
	    $constraint->aspectRatio();
		})->save('./uploads/medium/'.$fileName);
		$savedFile = $file->move('./uploads/', $fileName);
		return $fileName;
	}

	public static function uploadIcon($file)
	{
		$fileName = time().'-'.str_random(20).'.'.$file->getClientOriginalExtension();
		$savedFile = $file->move('./uploads/icons/', $fileName);
		return $fileName;		
	}

}