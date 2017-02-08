<?php

include_once 'functions.php';

$id = varr_int($_POST['id']);
$table = varr_str($_POST['table']);

$type = $table;

if($table==='photographs'){$type="photo";}
if($table==='videographs'){$type="video";}


/*
$result = db_query("UPDATE * FROM `artists` SET  `".$field."` =  '".$info."' WHERE  `id` =".$artist_id."");*//*
$result = db_query("UPDATE `".$field."` FROM `artists` SET `".$info."` WHERE `id` =".$artist_id."");*/


// // Составляем строку запроса
$sql = "UPDATE `prize` SET `".$type."` = '".$id."' ";

// // $sql = "UPDATE `".$table."` SET `".$field."` = '".$info."' WHERE `id` = ".$id.";";
// // Выполняем запрос
 $query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");


 	echo json_encode($sql);
?>