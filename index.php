<?php
	define('path_root',dirname(__FILE__).'/'); // Полный путь к сайту
	require_once("functions.php"); //Подключаем файл с функциями

	//Разбор строки
	$_URLP=null;
	if(isset($_GET['q']) && $_GET['q']){
		//Обрабатываем ссылку
		$_URLP=strtolower(varr_str($_GET['q']));
	}
	//Убираем расширение из адреса
	$_URLP=str_replace('.php','',@$_URLP);
	if(stristr($_URLP, 'adm') != false){
		require_once(path_root.'admin/index.php');
	}
	else {
		require_once(path_root.'template/index.php');
	}
?>