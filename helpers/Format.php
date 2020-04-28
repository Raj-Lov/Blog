<?php
/**
* Helper Format class
*/
class Format{

	// date formating
	public function dateFormat($date){
		return date('F j, Y, g:i a', strtotime($date));
	}

}



?>