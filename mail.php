<?php
/*var_dump($_POST);
echo "<br />";*/
//Принимаем постовые данные
$data_array = $_POST['dataText'];
/*
$fio=substr($_POST['fio'], 0, 60);
$mail=substr($_POST['email'], 0, 60);
$phone=substr($_POST['phone'], 0, 25);
$msg=$_POST['msg'];
$type=$_POST['type'];

/*
echo "ФИО пользователя - $fio";
echo "<br />";
echo "Почта - $mail";
echo "<br />";
echo "Телефон - $phone";
echo "<br />";
echo "Сообщение - $msg";
echo "<br />";
*/
 
//Тут указываем на какой ящик посылать письмо
$to = "mail@at-event.ru";
//$to = "evgeny2@rambler.ru";

//Далее идет тема и само сообщение
$subject = "Сообщения от пользователей";
$message = 
"
	Письмо отправлено из формы '".$type."' на сайте.<br />
	Пользователь указал:<br />
	ФИО: ".htmlspecialchars($fio)."<br />
	Почта: ".htmlspecialchars($mail)."<br />
	Телефон: ".htmlspecialchars($phone)."<br />
	Сообщение пользователя: ".htmlspecialchars($msg)."<br />
";
$headers = "From: Users <mail@at-event.ru>\r\nContent-type: text/html; charset=utf8 \r\n";



if(mail ($to, $subject, $data_array, $headers))
{
	/*
	$to_copy = "andrey.tatyana@bk.ru";
	//$to_copy = "evgeny2@rambler.ru";
	$copy = mail ($to_copy, $subject, $message, $headers);
	*/
	echo '1';

}

else 
{
	echo '0';
}