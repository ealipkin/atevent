<?php

include_once 'functions.php';

$table = varr_str($_POST['table']);

if($table=='artists') {
	$name = varr_str($_POST['name']);
	$type = varr_str($_POST['type']);
	$price = varr_str($_POST['price']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `artists` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$path = 'img/artists/'.$position.'/' ;
	$sql = "INSERT INTO `".$table."`(`name`, `type`, `price`, `desc`, `path`, `position`, `moderate`) VALUES ('".$name."', '".$type."', '".$price."', '".$desc."', '".$path."', '".$position."', '".$moderate."')";
}


if($table=='autos') {
	$name = varr_str($_POST['name']);
	$type = varr_str($_POST['type']);
	$price = varr_str($_POST['price']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `autos` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$path = 'img/auto/'.$position.'/' ;
	$sql = "INSERT INTO `".$table."`(`name`,  `price`,  `type`, `desc`, `path`, `position`, `moderate`) VALUES ('".$name."', '".$price."', '".$type."', '".$desc."', '".$path."', '".$position."', '".$moderate."')";
}

if($table=='photographs') {
	$name = varr_str($_POST['name']);
	$price = varr_str($_POST['price']);
	$phone = varr_str($_POST['phone']);
	$site = varr_str($_POST['site']);
	$vkpage = varr_str($_POST['vkpage']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `photographs` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$path = 'img/phgraphers/'.$position.'/' ;
	$sql = "INSERT INTO `photographs`(`name`, `price`, `phone`, `site`, `vkpage`, `desc`, `path`, `position`, `moderate`) VALUES ('".$name."', '".$price."', '".$phone."', '".$site."', '".$vkpage."', '".$desc."', '".$path."', '".$position."', '".$moderate."')";
}

if($table=='videographs') {
	$name = varr_str($_POST['name']);
	$price = varr_str($_POST['price']);
	$phone = varr_str($_POST['phone']);
	$site = varr_str($_POST['site']);
	$vkpage = varr_str($_POST['vkpage']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `videographs` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$sql = "INSERT INTO `videographs`(`name`, `price`, `phone`, `site`, `vkpage`, `desc`, `position`, `moderate`) VALUES ('".$name."', '".$price."', '".$phone."', '".$site."', '".$vkpage."', '".$desc."', '".$position."', '".$moderate."')";
}

if($table=='places') {
	$name = varr_str($_POST['name']);
	$adress = varr_str($_POST['adress']);
	$phone = varr_str($_POST['phone']);
	$email = varr_str($_POST['email']);
	$site = varr_str($_POST['site']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `places` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$path = 'img/phgraphers/'.$position.'/' ;
	$sql = "INSERT INTO `places`(`name`, `adress`, `phone`, `email`, `site`, `desc`, `path`, `position`, `moderate`) VALUES ('".$name."', '".$adress."', '".$phone."', '".$email."', '".$site."', '".$desc."', '".$path."', '".$position."', '".$moderate."')";
}


if($table=='wedding_dress' || $table=='man_outfit' || $table=='hair_makeup' || $table=='souvenirs') {
	$name = varr_str($_POST['name']);
	$service_type = varr_str($_POST['service_type']);
	$contacts = varr_str($_POST['contacts']);
	$site = varr_str($_POST['site']);
	$vk = varr_str($_POST['vk']);
	$moderate = varr_str($_POST['moderate']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `".$table."` ");
	$position = $sql_position_query[0]['maxposition']+1;
	if(empty($position)) { $position = 0; }

	$sql = "INSERT INTO `".$table."` (`name`, `service_type`, `contacts`, `site`, `vk`, `position`, `moderate`) VALUES ('".$name."', '".$service_type."', '".$contacts."', '".$site."', '".$vk."', '".$position."', '".$moderate."')";

	// Выполняем запрос
	$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");

	$latest_id = mysql_insert_id();

	$sql = "UPDATE `".$table."` SET `path` = 'img/".$table."/".$latest_id."' WHERE `id` = ".$latest_id.";";

}

if($table=='rings') {
	$name = varr_str($_POST['name']);
	$contacts = varr_str($_POST['contacts']);
	$desc = varr_str($_POST['desc']);
	$moderate = varr_str($_POST['moderate']);
	$site = varr_str($_POST['site']);
	$adress = varr_str($_POST['adress']);

	$sql_position_query = db_query("SELECT MAX(position) FROM `rings` ");
	$position = $sql_position_query[0]['maxposition']+1;
	$path = 'img/rings/'.$position.'/' ;
	$sql = "INSERT INTO `rings`(`name`, `contacts`, `site`, `desc`, `adress`, `path`, `position`, `moderate`)
			VALUES 			('".$name."', '".$contacts."','".$site."', '".$desc."', '".$adress."', '".$path."', '".$position."', '".$moderate."')";
}

if($table=='polygraphy') {
	$name = varr_str($_POST['name']);
	$desc = varr_str($_POST['desc']);
	$site = varr_str($_POST['site']);
	$vk = varr_str($_POST['vk']);
	$contacts = varr_str($_POST['contacts']);
	$moderate = varr_str($_POST['moderate']);
	
	$sql = "INSERT INTO `polygraphy`(`name`, `desc`, `site`, `vk`, `contacts`, `moderate`)
			VALUES 			('".$name."', '".$desc."','".$site."', '".$vk."', '".$contacts."', '".$moderate."')";
}

// Выполняем запрос
$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");

echo json_encode($query);


?>