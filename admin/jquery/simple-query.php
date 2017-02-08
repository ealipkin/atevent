<?php

include_once 'functions.php';

$id = varr_int($_POST['id']);
$field = varr_str($_POST['field']);
$info = varr_str($_POST['info']);
$table = varr_str($_POST['table']);
/*
$result = db_query("UPDATE * FROM `artists` SET  `".$field."` =  '".$info."' WHERE  `id` =".$artist_id."");*//*
$result = db_query("UPDATE `".$field."` FROM `artists` SET `".$info."` WHERE `id` =".$artist_id."");*/


// Составляем строку запроса
$sql = "UPDATE `".$table."` SET `".$field."` = '".$info."' WHERE `id` = ".$id.";";
// Выполняем запрос
$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");

/*
if($query){
	$query = db_query("SELECT `".$field."` FROM `artists` WHERE `id` = '".$id."' ");
}*/


echo json_encode($query);
?>