<?php 

namespace App\Repositories;

class SpeechRepository {

	public function getAudio($text, $language = "ru")
	{
		if ($language != "en") {
			$language = "ru";
		}
	    return "data:audio/mp3;base64,".base64_encode(file_get_contents("https://translate.google.com/translate_tts?ie=UTF-8&q=".urlencode($text)."&tl=".urlencode($language)."&total=1&idx=0&textlen=".strlen($text)."&prev=input&client=tw-ob"));
	}

}