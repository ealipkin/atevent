<?php
/**
  * Скрипт проверки авторизации пользователей
  */

// Запускаем сессию, из которой будем извлекать логин и пароль
// авторизовавшихся пользователей
session_start();
  
// Подлючаем файл с пользовательскими функциями

/**
  * Чтобы определить авторизован ли пользователь, нам нужно 
  * проверить существуют ли в базе данных записи для его логина
  * и пароля. Для этого воспользуемся пользовательской функцией
  * проверки корректности данных авторизовавшегося пользователя.
  * Если эта функция вернет false, значит авторизации нет. 
  * При отсутствии авторизации мы просто переадресовываем 
  * пользователя к странице авторизации.
  */

// Если в сессии присуствуют данные и о логине, и о пароле,
// проверяем их
if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['password']) && $_SESSION['password']) {
	// Если проверка существующих данных завершается неудачей
	if(!checkAuth($_SESSION['login'], $_SESSION['password'])) {
		// Переадресовываем пользователя на страницу авторизации
		header('location: adm/login');
		// Прекращаем выполнение скрипта
		exit;
	}
}
// Если данных либо о логине, либо о пароле пользователя нет,
// считаем что авторизации нет, переадресовываем пользователя
// на страницу авторизации
else {
	header('location: adm/login');
	// Прекращаем выполнение сценария
	exit;
}
?>