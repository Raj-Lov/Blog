<?php
/**
* Helper Format class
*/
class Format{

	// date formating
	public function dateFormat($date){
		return date('F j, Y, g:i a', strtotime($date));
	}

	// post body text shorten
	public function postBodyShorten($text, $limit = 400){
		$text = $text. " " ;
		$text = substr($text, 0, $limit);
		$text = $text."..... " ;
		return $text;
	}

}



?>