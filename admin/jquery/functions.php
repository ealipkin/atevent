<?php
include_once '../config.php';

//Очистка пользовательских данных
function clearDataClient($var){
	$var = htmlspecialchars($var);

	return $var;
}

//Преобразование переменной в строку
function varr_str($str) {
	return mysql_real_escape_string(str_replace("/*","",stripslashes(strip_tags(trim($str)))));
}

//Преобразование переменных в целые числа
function varr_int($int) {
	return intval($int);
}

//Запрос в БД
function db_query($query) {
	//mysql_query("SET time_zone = '+03:00'");
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");
	$query = mysql_query($query) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	if(mysql_insert_id() > 0) return mysql_insert_id();
	while(@$fetch = mysql_fetch_assoc($query)){
		foreach($fetch as $pole=>$value){
			$data[preg_replace("/[^_a-zA-Z0-9]/", "", strtolower($pole))] = $value;
		}
		$array[] = $data;
	}
	return @$array;
}
?>