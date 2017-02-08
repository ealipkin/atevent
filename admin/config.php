<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'ealipkin');
define('DB_PASS', '10293847');
define('DB_NAME', 'ealipkin');


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
