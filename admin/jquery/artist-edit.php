<?php

include_once 'functions.php';

$artist_id = varr_int($_POST['id']);
$field = varr_str($_POST['field']);
$info = varr_str($_POST['info']);
/*
$result = db_query("UPDATE * FROM `artists` SET  `".$field."` =  '".$info."' WHERE  `id` =".$artist_id."");*//*
$result = db_query("UPDATE `".$field."` FROM `artists` SET `".$info."` WHERE `id` =".$artist_id."");*/


// Составляем строку запроса
$sql = "UPDATE `artists` SET `".$field."` = '".$info."' WHERE `id` = ".$artist_id.";";
// Выполняем запрос
$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");

if($query){
	$query = db_query("SELECT `".$field."` FROM `artists` WHERE `id` = '".$artist_id."' ");
}


echo json_encode($query[0][$field]);
?>