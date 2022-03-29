<?php 

if (!function_exists('getFile')) {
    function getFile($fileName)
    {
      $file = public_path('uploads/files/'.$fileName);
      if (file_exists($file)) {
        return '/uploads/files/'.$fileName;
      }
      return false;
    }
}

if (!function_exists('getIcon')) {
    function getIcon($fileName)
    {
      $file = public_path('uploads/icons/'.$fileName);
      if (file_exists($file)) {
        return '/uploads/icons/'.$fileName;
      }
      return false;
    }
}

if (!function_exists('getThumbnail')) {
    function getThumbnail($fileName)
    {
    	$file = public_path('uploads/thumbnails/'.$fileName);
    	if (file_exists($file)) {
	    	return '/uploads/thumbnails/'.$fileName;
    	}
    	return false;
    }
}

if (!function_exists('getMedium')) {
    function getMedium($fileName)
    {
	    $file = public_path('uploads/medium/'.$fileName);
    	if (file_exists($file)) {
	    	return '/uploads/medium/'.$fileName;
    	}
    	return false;
    }
}

if (!function_exists('getFull')) {
    function getFull($fileName)
    {
	    $file = public_path('uploads/'.$fileName);
    	if (file_exists($file)) {
	    	return '/uploads/'.$fileName;
	    }
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($fileName)
    {
      if ($fileName) {
        $fullFile = public_path('uploads/'.$fileName);
        $thumbnailFile = public_path('uploads/thumbnails/'.$fileName);
        $mediumFile = public_path('uploads/medium/'.$fileName);
        if(file_exists($fullFile)){
            unlink($fullFile);
        }
        if(file_exists($thumbnailFile)){
            unlink($thumbnailFile);
        }
        if(file_exists($mediumFile)){
            unlink($mediumFile);
        }
      }
    }
}

if (!function_exists('deleteIcon')) {
    function deleteIcon($fileName)
    {
      if ($fileName) {
        $fullFile = public_path('uploads/icons/'.$fileName);
        if(file_exists($fullFile)){
            unlink($fullFile);
        }
      }
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($fileName)
    {
      if ($fileName) {
        $fullFile = public_path('uploads/files/'.$fileName);
        if(file_exists($fullFile)){
            unlink($fullFile);
        }
      }
    }
}


if (!function_exists('toAscii')) {
    function toAscii($str, $delimiter='-') {
      $clean = iconv('UTF-8', 'ASCII//TRANSLIT', rus2translit(trim($str)));
      $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
      $clean = strtolower(trim($clean, '-'));
      $clean = preg_replace("/[_|+ -]+/", $delimiter, $clean);
      return $clean;
    }
}


if (!function_exists('rus2translit')) {
    function rus2translit($string) {
      $converter = array(
          'а' => 'a',   'б' => 'b',   'в' => 'v',
          'г' => 'g',   'д' => 'd',   'е' => 'e',
          'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
          'и' => 'i',   'й' => 'y',   'к' => 'k',
          'л' => 'l',   'м' => 'm',   'н' => 'n',
          'о' => 'o',   'п' => 'p',   'р' => 'r',
          'с' => 's',   'т' => 't',   'у' => 'u',
          'ф' => 'f',   'х' => 'h',   'ц' => 'c',
          'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
          'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
          'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
          'ғ' => 'g',
          'ҳ' => 'h',
          'қ' => 'q',
          'ў' => 'u',
          
          'А' => 'A',   'Б' => 'B',   'В' => 'V',
          'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
          'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
          'И' => 'I',   'Й' => 'Y',   'К' => 'K',
          'Л' => 'L',   'М' => 'M',   'Н' => 'N',
          'О' => 'O',   'П' => 'P',   'Р' => 'R',
          'С' => 'S',   'Т' => 'T',   'У' => 'U',
          'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
          'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
          'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
          'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
          'Ғ' => 'G',
          'Ҳ' => 'H',
          'Қ' => 'Q',
          'Ў' => 'U',
      );
      return strtr($string, $converter);
  }
}


if (!function_exists('monthList')) {
  function monthList($month = false) {
    $arr = array(
      1  => __('main.January'),
      2  => __('main.February'),
      3  => __('main.March'),
      4  => __('main.April'),
      5  => __('main.May'),
      6  => __('main.June'),
      7  => __('main.July'),
      8  => __('main.August'),
      9  => __('main.September'),
      10 => __('main.October'),
      11 => __('main.November'),
      12 => __('main.December'),
    );
    if (isset($arr[$month])) {
      return $arr[$month];
    }
    return $arr;
  }
}

if (!function_exists('array_column_ext')) {
  function array_column_ext($array, $columnkey, $indexkey = null) {
      $result = array();
      foreach ($array as $subarray => $value) {
          if (array_key_exists($columnkey,$value)) { $val = $array[$subarray][$columnkey]; }
          else if ($columnkey === null) { $val = $value; }
          else { continue; }
              
          if ($indexkey === null) { $result[] = $val; }
          elseif ($indexkey == -1 || array_key_exists($indexkey,$value)) {
              $result[($indexkey == -1)?$subarray:$array[$subarray][$indexkey]] = $val;
          }
      }
      return $result;
  }
}

if (!function_exists('getOption')) {
  function getOption($anchor) {
    $option = \App\Repositories\OptionsRepository::getOptionsByAnchor($anchor);
    if ($option) {
      return $option->content;
    }
    return false;
  }
}

if (!function_exists('getTextBlock')) {
  function getTextBlock($anchor) {
    $textblock = \App\Repositories\TextBlocksRepository::getTextBlockByAnchor($anchor);
    if ($textblock) {
      return $textblock->content;
    }
    return false;
  }
}

if (!function_exists('clearEmptyTranslates')) {
  function clearEmptyTranslates($data) {
    if ($data && count($data)) {
      foreach ($data as $key => $item) {
        if (!(isset($item->translates) && count($item->translates))) {
          unset($data[$key]);
        }
      }
    }
    return $data;
  }
}