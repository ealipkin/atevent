<?php

include_once 'config.php';

$name=substr($_POST['userName'], 0, 55);
$msg=$_POST['userMsg'];

//echo $name;
//Очистка данных.
function clearData($var){
	$var = trim(mysql_real_escape_string($var));
	return $var;
}

//Отправка сообщения.
function add_post($name,$msg){
	$name = clearData($name);
	$msg = clearData($msg);

	if(empty($name)) $name = 'Гость';

	if(!empty($msg)){
		$query = "INSERT INTO msg (username, post)
				VALUES ('$name','$msg')";
		if(mysql_query($query)){
			$res = 0;
		}
		else{
			$res = 1;
		}
	}

	return $res;
}

$send = add_post($name,$msg);
if($send!=0){
	echo 'Произошла ошибка, попробуйте ещё раз';
}
else{
	$last_id = mysql_insert_id();
	$query = "SELECT username, post, LEFT(date, 16) AS date FROM msg WHERE id = $last_id";
	$res = mysql_query($query);
	$arr_res = mysql_fetch_assoc($res);
	echo json_encode($arr_res);
}

mysql_close();
?>