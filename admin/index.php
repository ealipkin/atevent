<?php
	define('path_root',dirname(__FILE__).'/'); // Полный путь к сайту
	require_once(path_root."admin/functions.php");


	if(stristr($_URLP, 'adm/logout') != false){
		require_once(path_root.'admin/template/logout.php');
	}
	else if(stristr($_URLP, 'adm/login') != false){
		require_once(path_root.'admin/template/login.php');
	}
	else {
		require_once(path_root.'admin/template/index.php');
	}
	
	//echo $_URLP;*/
?>