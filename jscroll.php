<?php
include_once 'config.php';
include_once 'functions.php';

function is_ajax(){

	if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
	   !empty($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
	   strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest"){

		return true;
	}

	return false;
}

function is_get(){

	if($_SERVER["REQUEST_METHOD"] == "GET"){

		return true;
	}

	return false;
}



## Обработка запросов
if(is_get() && is_ajax()){
	$count = (int) $_GET["count"];
	$count_next = (int) $_GET["count_next"];
	$table = $_GET["table"];
	$sort = $_GET["sort"];
	$type_id = $_GET["type_id"];
	$skip_id = $_GET["skip_id"];
	
	if(empty($skip_id)){
	    $skip_id=0;
	}
	
	switch($table)
	{
		case 'artists':
	      $html = getArtistBlock($count,$count_next,$sort,$skip_id);
		break;
		case 'places': 
	      $html = getPlaceBlock($count,$count_next);
		break;
		case 'photographs':
	      $html = getPhotographsBlock($count,$count_next,$sort,$skip_id);
		break;
		case 'videographs': 
	      $html = getVideographBlock($count,$count_next,$sort, $skip_id);
		break;
		case 'autos': 
	      $html = getAutoBlock($count,$count_next,'autos',$type_id);
	      //$html = $type_id;
		break;
	}
	echo (json_encode($html));
}

exit;
?>