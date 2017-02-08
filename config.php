<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_NAME', 'at');


/*
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'at-event');
*/

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Нет соединения с сервером');
mysql_select_db(DB_NAME) or die('Нет соединения с БД');
mysql_query("SET NAMES 'utf8'");


?>
