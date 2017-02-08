<?php
// Подключаем файл с параметрами подключения к СУБД
include_once 'admin/config.php';

// Проверка имени пользователя
function checkLogin($str) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$str) {
		$error = 'Вы не ввели имя пользователя';
		return $error;
	}
	
	/**
	  * Проверяем имя пользователя с помощью регулярных выражений
	  * Логин должен быть не короче 4, не длиннее 16 символов
	  * В нем должны быть символы латинского алфавита, цифры, 
	  * в нем могут быть символы '_', '-', '.'
	  */
	$pattern = '/^[-_.a-z\d]{4,16}$/i';	
	$result = preg_match($pattern, $str);
	
	// Если проверка не прошла, возвращаем сообщение об ошибке
	if(!$result) {
		$error = 'Недопустимые символы в имени пользователя или имя пользователя слишком короткое (длинное)';
		return $error;
	}
	
	// Если же всё нормально, вернем значение true
	return true;
}

// Проверка пароля пользователя
function checkPassword($str) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$str) {
		$error = 'Вы не ввели пароль';
		return $error;
	}
	
	/**
	  * Проверяем пароль пользователя с помощью регулярных выражений
	  * Пароль должен быть не короче 6, не длиннее 16 символов
	  * В нем должны быть символы латинского алфавита, цифры, 
	  * в нем могут быть символы '_', '!', '(', ')'
	  */
	$pattern = '/^[_!)(.a-z\d]{6,16}$/i';	
	$result = preg_match($pattern, $str);
	
	// Если проверка не прошла, возвращаем сообщение об ошибке
	if(!$result) {
		$error = 'Недопустимые символы в пароле пользователя или пароль слишком короткий (длинный)';
		return $error;
	}
	
	// Если же всё нормально, вернем значение true
	return true;
}

/**
  * Функция авторизации пользователя.
  * Авторизация пользователей у нас будет осуществляться
  * с помощью сессий PHP.
  */
function authorization($login, $password) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$login) {
		$error = 'Не указан логин';
		return $error;
	} 
	elseif(!$password) {
		$error = 'Не указан пароль';
		return $error;
	}
		
	// Нам нужно проверить, есть ли такой пользователь среди зарегистрированных
	// Составляем строку запроса
	$sql = "SELECT `id` FROM `users` WHERE `login`='".$login."' AND `password`='".$password."'";
	// Выполняем запрос
	$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Если пользователя с такими данными нет, возвращаем сообщение об ошибке
	if(mysql_num_rows($query) == 0)	{
		$error = 'Пользователь с указанными данными не зарегистрирован';
		return $error;
	}
	
	// Если пользователь существует, запускаем сессию
	session_start();
	// И записываем в неё логин и пароль пользователя
	// Для этого мы используем суперглобальный массив $_SESSION
	$_SESSION['login'] = $login;
	$_SESSION['password'] = $password;
	
	// Не забываем закрывать соединение с базой данных
	mysql_close();

	// Возвращаем true для сообщения об успешной авторизации пользователя
	return true;
}

function checkAuth($login, $password) {
	// Если нет логина или пароля, возвращаем false
	if(!$login || !$password)	return false;
		
	// Составляем строку запроса
	$sql = "SELECT `id` FROM `users` WHERE `login`='".$login."' AND `password`='".$password."'";
	// Выполняем запрос
	$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Если пользователя с такими данными нет, возвращаем false;
	if(mysql_num_rows($query) == 0)	{
		return false;
	}

	// Не забываем закрывать соединение с базой данных
	//mysql_close();	

	// Иначе возвращаем true
	return true;
}


//Артисты
function getArtistBlockEdit($count=0, $table='artists'){
	$html = '<input type="hidden" class="edit-table-type" data-table="'.$table.'">';
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	foreach ($arr_artists as $key => $value) {
		$count++;
		$id = $value['id'];
		$avatar = getAvatar($id,1);
		$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `artist_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$path = $value['path'];
		if(!empty($value['type']))	$type = ', '.$value['type'];
		else $type = '';
		if($value['moderate']==0){
			$options = '
						<option value="0" selected>Да</option>
						<option value="1" >Нет</option>';
		}
		else {
			$options = '
			<option value="0" >Да</option>
			<option value="1" selected>Нет</option>';
		}

		$html .='
		<div class="info-kind artist-block" data-id="'.$value['id'].'">
			<h5>'.$value['name'].', '.$value['type'].', Цена - '.$value['price'].' (папка с фотографиями - '.$value['path'].')</h5>
			<div class="edit-info-block clearfix">
				<div class="edit-block column col-3 clearfix">


					<div class="edit-block-label">
						Название
					</div>
					<input type="text" name="name" value="'.$value['name'].'" data-type="name">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Цена
					</div>
					<input type="text" name="price" value="'.$value['price'].'" data-type="price">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Тип артиста
					</div>
					<input type="text" name="type" value="'.$value['type'].'" data-type="type">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
					<div class="edit-block-label">
						Показывать на сайте
					</div>
					<select name="moderate" data-type="moderate">
						'.$options.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Описание
					</div>
					<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
			</div>
			<div class="edit-info-block clearfix">
				<!--div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Порядок отображения
					</div>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img src="/img/save-btn.png" alt="">
					</a>
				</div-->
			</div>

				<!--div class="add-info-thumbs">';
		/*foreach ($arr_photo as $key => $value) {

			$html .='
				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
					<img src="/'.$path.$value['photo_t'].'">
				</a>
			';
		}
*/

		$html .='
				</div>

			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
		  		<img class="info-kind-avatar" src="/'.$path.$avatar['photo_t'].'" alt="">
			</a-->
		</div>
		';

	}
	return $html;
}




//Авто
function getAutosBlockEdit($count=0, $table='autos'){
	$html = '<input type="hidden" class="edit-table-type" data-table="'.$table.'">';
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	$auto_type = getAutosType();
	foreach ($arr_artists as $key => $value) {
		$count++;
		$options_type = '';
		$id = $value['id'];
		$avatar = getAvatar($id,1);
		$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `auto_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$path = $value['path'];
		$type = $value['type'];
		
		if($value['moderate']==0){
			$options = '
						<option value="0" selected>Да</option>
						<option value="1" >Нет</option>';
		}
		else {
			$options = '
			<option value="0" >Да</option>
			<option value="1" selected>Нет</option>';
		}
		
		foreach ($auto_type as $key_type => $value_type) {
		    if($type===$value_type['name']){$type_checked = 'selected';}
		    else $type_checked = '';
		    $options_type .= '<option value="'.$value_type['name'].'" '.$type_checked.'>'.$value_type['name'].'</option>';
		}
		
		$html .='
		<div class="info-kind artist-block" data-id="'.$value['id'].'">
			<h5>'.$value['name'].', цена - '.$value['price'].' (папка с фотографиями - '.$value['path'].')</h5>
			<div class="edit-info-block clearfix">
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Название
					</div>
					<input type="text" name="name" value="'.$value['name'].'" data-type="name">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Цена
					</div>
					<input type="text" name="price" value="'.$value['price'].'" data-type="price">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
					<div class="edit-block-label">
						Показывать на сайте
					</div>
					<select name="moderate" data-type="moderate">
						'.$options.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
					<div class="edit-block-label">
						Тип автомобиля
					</div>
					<select name="type" data-type="type">
						'.$options_type.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				
				</div>

				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Описание
					</div>
					<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
			</div>
			<div class="edit-info-block clearfix">
				<!--div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Порядок отображения
					</div>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img src="/img/save-btn.png" alt="">
					</a>
				</div-->
			</div>

				<!--div class="add-info-thumbs">';
		/*foreach ($arr_photo as $key => $value) {

			$html .='
				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
					<img src="/'.$path.$value['photo_t'].'">
				</a>
			';
		}
*/

		$html .='
				</div>

			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
		  		<img class="info-kind-avatar" src="/'.$path.$avatar['photo_t'].'" alt="">
			</a-->
		</div>
		';

	}
	return $html;
}

//Список фотографов
function getPhotographsList(){
	$html = '<select class="prize-select" data-table="photographs">
			<option value="0">-</option>
	';
	$arr_artists = db_query("SELECT * FROM `photographs` WHERE `moderate` = 0 ORDER BY `name` ");
	$getPrize = db_query("SELECT `photo` FROM `prize`");
	$prize = $getPrize[0]['photo'];

	foreach ($arr_artists as $key => $value) {
		$id = $value['id'];
		$selected = '';
		if($prize==$id){$selected='selected';}

		$html .='
		<option value="'.$value['id'].'" '.$selected.'>
			'.$value['name'].'
		</option>';

	}

	$html .='</select>';

	return $html;
}
//Список операторов
function getVideographsList(){
	$html = '<select class="prize-select" data-table="videographs">
			<option value="0">-</option>
	';
	$arr_artists = db_query("SELECT * FROM `videographs` WHERE `moderate` = 0 ORDER BY `name` ");
	$getPrize = db_query("SELECT `video` FROM `prize`");
	$prize = $getPrize[0]['video'];

	foreach ($arr_artists as $key => $value) {
		$id = $value['id'];
		$selected = '';
		if($prize==$id){$selected='selected';}

		$html .='
		<option value="'.$value['id'].'" '.$selected.'>
			'.$value['name'].'
		</option>';

	}

	$html .='</select>';

	return $html;
}
//Список артистов
function getArtistsList(){
	$html = '<select class="prize-select" data-table="artists">
			<option value="0">-</option>
	';
	$arr_artists = db_query("SELECT * FROM `artists` WHERE `moderate` = 0 ORDER BY `name` ");
	$getPrize = db_query("SELECT `artists` FROM `prize`");
	$prize = $getPrize[0]['artists'];

	foreach ($arr_artists as $key => $value) {
		$id = $value['id'];
		$selected = '';
		if($prize==$id){$selected='selected';}

		$html .='
		<option value="'.$value['id'].'" '.$selected.'>
			'.$value['name'].'
		</option>';

	}

	$html .='</select>';

	return $html;
}


//Список артистов
function getList($table){
	$html = '<select class="prize-select" data-table='.$table.'>
			<option value="0">-</option>
	';
	$arr_artists = db_query("SELECT * FROM `".$table."` WHERE `moderate` = 0 ORDER BY `name` ");
	$getPrize = db_query("SELECT `".$table."` FROM `prize`");
	$prize = $getPrize[0][$table];

	foreach ($arr_artists as $key => $value) {
		$id = $value['id'];
		$selected = '';
		if($prize==$id){$selected='selected';}

		$html .='
		<option value="'.$value['id'].'" '.$selected.'>
			'.$value['name'].'
		</option>';

	}

	$html .='</select>';

	return $html;
}



//Фотографы для редактирования
function getPhotographsBlockEdit($count=0, $table='photographs'){
	$html = '<input type="hidden" class="edit-table-type" data-table="'.$table.'">';
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	foreach ($arr_artists as $key => $value) {
		$count++;
		$id = $value['id'];
		$avatar = getAvatar($id,1);
		$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$path = $value['path'];
		if(!empty($value['type']))	$type = ', '.$value['type'];
		else $type = '';
		if($value['moderate']==0){
			$options = '
						<option value="0" selected>Да</option>
						<option value="1" >Нет</option>';
		}
		else {
			$options = '
			<option value="0" >Да</option>
			<option value="1" selected>Нет</option>';
		}
		$html .='
		<div class="info-kind artist-block" data-id="'.$value['id'].'">
			<h5>'.$value['name'].', цена - '.$value['price'].' (папка с фотографиями - '.$value['path'].')</h5>
			<div class="edit-info-block clearfix">
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Имя
					</div>
					<input type="text" name="name" value="'.$value['name'].'" data-type="name">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>


					<div class="edit-block-label">
						Цена
					</div>
					<input type="text" name="price" value="'.$value['price'].'" data-type="price">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Номер телефона
					</div>
					<input type="text" name="phone" value="'.$value['phone'].'" data-type="phone">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Сайт
					</div>
					<input type="text" name="site" value="'.$value['site'].'" data-type="site">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Вконтакте
					</div>
					<input type="text" name="vkpage" value="'.$value['vkpage'].'" data-type="vkpage">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Показывать на сайте
					</div>
					<select name="moderate" data-type="moderate">
						'.$options.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Описание
					</div>
					<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
			</div>
			<div class="edit-info-block clearfix">
				<!--div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Порядок отображения
					</div>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img src="/img/save-btn.png" alt="">
					</a>
				</div-->
			</div>

				<!--div class="add-info-thumbs">';
		/*foreach ($arr_photo as $key => $value) {

			$html .='
				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
					<img src="/'.$path.$value['photo_t'].'">
				</a>
			';
		}
*/

		$html .='
				</div>

			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
		  		<img class="info-kind-avatar" src="/'.$path.$avatar['photo_t'].'" alt="">
			</a-->
		</div>
		';

	}
	return $html;
}






//Видеографы
function getVideographsBlockEdit($count=0, $table='videographs'){
	$html = '<input type="hidden" class="edit-table-type" data-table="'.$table.'">';
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	foreach ($arr_artists as $key => $value) {
		$count++;
		$id = $value['id'];
		$avatar = getAvatar($id,1);
		//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$path = $value['path'];
		if(!empty($value['type']))	$type = ', '.$value['type'];
		else $type = '';
		if($value['moderate']==0){
			$options = '
						<option value="0" selected>Да</option>
						<option value="1" >Нет</option>';
		}
		else {
			$options = '
			<option value="0" >Да</option>
			<option value="1" selected>Нет</option>';
		}

		$html .='
		<div class="info-kind artist-block" data-id="'.$value['id'].'">
			<h5>'.$value['name'].', цена - '.$value['price'].' (папка с фото - img/vidgraphers/'.$value['id'].')</h5>
			<div class="edit-info-block clearfix">
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Имя
					</div>
					<input type="text" name="name" value="'.$value['name'].'" data-type="name">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>


					<div class="edit-block-label">
						Цена
					</div>
					<input type="text" name="price" value="'.$value['price'].'" data-type="price">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Номер телефона
					</div>
					<input type="text" name="phone" value="'.$value['phone'].'" data-type="phone">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Сайт
					</div>
					<input type="text" name="site" value="'.$value['site'].'" data-type="site">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Вконтакте
					</div>
					<input type="text" name="vkpage" value="'.$value['vkpage'].'" data-type="vkpage">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Показывать на сайте
					</div>
					<select name="moderate" data-type="moderate">
						'.$options.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Описание
					</div>
					<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
			</div>
			<div class="edit-info-block clearfix">
				<!--div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Порядок отображения
					</div>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img src="/img/save-btn.png" alt="">
					</a>
				</div-->
			</div>

				<!--div class="add-info-thumbs">';

/*		foreach ($arr_photo as $key => $value) {

			$html .='
				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
					<img src="/'.$path.$value['photo_t'].'">
				</a>
			';
		}
*/

		$html .='
				</div>

			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
		  		<img class="info-kind-avatar" src="/'.$path.$avatar['photo_t'].'" alt="">
			</a-->
		</div>
		';

	}
	return $html;
}

//Рестораны
function getPlacesBlockEdit($count=0, $table='places'){
	$html = '<input type="hidden" class="edit-table-type" data-table="'.$table.'">';
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	foreach ($arr_artists as $key => $value) {
		$count++;
		$id = $value['id'];
		$avatar = getAvatar($id,1);
		//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$path = $value['path'];
		if(!empty($value['type']))	$type = ', '.$value['type'];
		else $type = '';
		if($value['moderate']==0){
			$options = '
						<option value="0" selected>Да</option>
						<option value="1" >Нет</option>';
		}
		else {
			$options = '
			<option value="0" >Да</option>
			<option value="1" selected>Нет</option>';
		}

		$html .='
		<div class="info-kind artist-block" data-id="'.$value['id'].'">
			<h5>'.$value['name'].', цена - '.$value['price'].' (папка с фото - '.$value['path'].')</h5>
			<div class="edit-info-block clearfix">
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Имя
					</div>
					<input type="text" name="name" value="'.$value['name'].'" data-type="name">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>


					<div class="edit-block-label">
						Номер телефона
					</div>
					<input type="text" name="phone" value="'.$value['phone'].'" data-type="phone">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Адрес
					</div>
					<input type="text" name="adress" value="'.$value['adress'].'" data-type="adress">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						E-mail
					</div>
					<input type="text" name="email" value="'.$value['email'].'" data-type="email">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

					<div class="edit-block-label">
						Сайт
					</div>
					<input type="text" name="site" value="'.$value['site'].'" data-type="site">
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>


					<div class="edit-block-label">
						Показывать на сайте
					</div>
					<select name="moderate" data-type="moderate">
						'.$options.'
					</select>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>

				</div>
				<div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Описание
					</div>
					<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img class="btn-img" src="/img/save-btn.png" alt="">
						<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
					</a>
				</div>
			</div>
			<div class="edit-info-block clearfix">
				<!--div class="edit-block column col-3 clearfix">
					<div class="edit-block-label">
						Порядок отображения
					</div>
					<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
						<img src="/img/save-btn.png" alt="">
					</a>
				</div-->
			</div>

				<!--div class="add-info-thumbs">';

/*		foreach ($arr_photo as $key => $value) {

			$html .='
				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
					<img src="/'.$path.$value['photo_t'].'">
				</a>
			';
		}
*/

		$html .='
				</div>

			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
		  		<img class="info-kind-avatar" src="/'.$path.$avatar['photo_t'].'" alt="">
			</a-->
		</div>
		';

	}
	return $html;
}


//Свадебные наряды для редактирования
function getWeddingDressBlockEdit($count=0, $table='wedding_dress'){
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	if(!empty($arr_artists)){
		foreach ($arr_artists as $key => $value) {
			$count++;
			$id = $value['id'];
			//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$path = $value['path'];
			if($value['moderate']==0){
				$options = '
							<option value="0" selected>Да</option>
							<option value="1" >Нет</option>';
			}
			else {
				$options = '
				<option value="0" >Да</option>
				<option value="1" selected>Нет</option>';
			}
			$html .='
			<div class="info-kind artist-block" data-id="'.$value['id'].'">
				<h5>'.$value['name'].', услуга - '.$value['service_type'].' (папка с фотографиями - '.$value['path'].')</h5>
				<div class="edit-info-block clearfix">
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Имя
						</div>
						<input type="text" name="name" value="'.$value['name'].'" data-type="name">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Сайт
						</div>
						<input type="text" name="site" value="'.$value['site'].'" data-type="site">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Предоставляемые услуги
						</div>
						<input type="text" name="service_type" value="'.$value['service_type'].'" data-type="service_type">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>


					</div>
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Номер телефона
						</div>
						<input type="text" name="contacts" value="'.$value['contacts'].'" data-type="contacts">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Вконтакте
						</div>
						<input type="text" name="vk" value="'.$value['vk'].'" data-type="vk">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Показывать на сайте
						</div>
						<select name="moderate" data-type="moderate">
							'.$options.'
						</select>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

					</div>
				</div>
			</div>
			';

		}
	}
	return $html;
}

//Свадебные наряды для редактирования
function getManOutfitBlockEdit($count=0, $table='man_outfit'){
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	if(!empty($arr_artists)){
		foreach ($arr_artists as $key => $value) {
			$count++;
			$id = $value['id'];
			//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$path = $value['path'];
			if($value['moderate']==0){
				$options = '
							<option value="0" selected>Да</option>
							<option value="1" >Нет</option>';
			}
			else {
				$options = '
				<option value="0" >Да</option>
				<option value="1" selected>Нет</option>';
			}
			$html .='
			<div class="info-kind artist-block" data-id="'.$value['id'].'">
				<h5>'.$value['name'].', услуга - '.$value['service_type'].' (папка с фотографиями - '.$value['path'].')</h5>
				<div class="edit-info-block clearfix">
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Имя
						</div>
						<input type="text" name="name" value="'.$value['name'].'" data-type="name">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Сайт
						</div>
						<input type="text" name="site" value="'.$value['site'].'" data-type="site">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Предоставляемые услуги
						</div>
						<input type="text" name="service_type" value="'.$value['service_type'].'" data-type="service_type">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>


					</div>
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Номер телефона
						</div>
						<input type="text" name="contacts" value="'.$value['contacts'].'" data-type="contacts">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Вконтакте
						</div>
						<input type="text" name="vk" value="'.$value['vk'].'" data-type="vk">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Показывать на сайте
						</div>
						<select name="moderate" data-type="moderate">
							'.$options.'
						</select>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

					</div>
				</div>
			</div>
			';

		}
	}
	return $html;
}

//Свадебные наряды для редактирования
function getHairMakeupBlockEdit($count=0, $table='hair_makeup'){
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	if(!empty($arr_artists)){
		foreach ($arr_artists as $key => $value) {
			$count++;
			$id = $value['id'];
			//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$path = $value['path'];
			if($value['moderate']==0){
				$options = '
							<option value="0" selected>Да</option>
							<option value="1" >Нет</option>';
			}
			else {
				$options = '
				<option value="0" >Да</option>
				<option value="1" selected>Нет</option>';
			}
			$html .='
			<div class="info-kind artist-block" data-id="'.$value['id'].'">
				<h5>'.$value['name'].', услуга - '.$value['service_type'].' (папка с фотографиями - '.$value['path'].')</h5>
				<div class="edit-info-block clearfix">
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Имя
						</div>
						<input type="text" name="name" value="'.$value['name'].'" data-type="name">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Сайт
						</div>
						<input type="text" name="site" value="'.$value['site'].'" data-type="site">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Предоставляемые услуги
						</div>
						<input type="text" name="service_type" value="'.$value['service_type'].'" data-type="service_type">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>


					</div>
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Номер телефона
						</div>
						<input type="text" name="contacts" value="'.$value['contacts'].'" data-type="contacts">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Вконтакте
						</div>
						<input type="text" name="vk" value="'.$value['vk'].'" data-type="vk">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Показывать на сайте
						</div>
						<select name="moderate" data-type="moderate">
							'.$options.'
						</select>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

					</div>
				</div>
			</div>
			';

		}
	}
	else {
		$html = 'В базе данных ничего не найдено';
	}
	return $html;
}

//Свадебные наряды для редактирования
function getRingsEdit($count=0, $table='rings'){
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	if(!empty($arr_artists)){
		foreach ($arr_artists as $key => $value) {
			$count++;
			$id = $value['id'];
			//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$path = $value['path'];
			if($value['moderate']==0){
				$options = '
							<option value="0" selected>Да</option>
							<option value="1" >Нет</option>';
			}
			else {
				$options = '
				<option value="0" >Да</option>
				<option value="1" selected>Нет</option>';
			}
			$html .='
			<div class="info-kind artist-block" data-id="'.$value['id'].'">
				<h5>'.$value['name'].'</h5>
				<div class="edit-info-block clearfix">
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Имя
						</div>
						<input type="text" name="name" value="'.$value['name'].'" data-type="name">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Сайт
						</div>
						<input type="text" name="site" value="'.$value['site'].'" data-type="site">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

						<div class="edit-block-label">
							Телефон
						</div>
						<input type="text" name="contacts" value="'.$value['contacts'].'" data-type="contacts">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
        				<div class="edit-block-label">
        					Адрес
        				</div>
        				<input type="text" name="adress" value="'.$value['adress'].'" data-type="adress" class="need-add">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
						<div class="edit-block-label">
							Показывать на сайте
						</div>
						<select name="moderate" data-type="moderate">
							'.$options.'
						</select>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

					</div>
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Описание
						</div>
						<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
					</div>
				</div>
			</div>
			';

		}
	}
	else {
		$html = 'Ничего не найдено в базе данных';
	}
	return $html;
}



//Свадебные наряды для редактирования
function getPolygraphyEdit($count=0, $table='polygraphy'){
	$arr_artists = db_query("SELECT * FROM `".$table."` ORDER BY `name` ");
	$selected = '';
	if(!empty($arr_artists)){
		foreach ($arr_artists as $key => $value) {
			$count++;
			$id = $value['id'];
			//$arr_photo = db_query("SELECT * FROM `".$table."_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$path = $value['path'];
			if($value['moderate']==0){
				$options = '
							<option value="0" selected>Да</option>
							<option value="1" >Нет</option>';
			}
			else {
				$options = '
				<option value="0" >Да</option>
				<option value="1" selected>Нет</option>';
			}
			$html .='
			<div class="info-kind artist-block" data-id="'.$value['id'].'">
				<h5>'.$value['name'].'</h5>
				<div class="edit-info-block clearfix">
				
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Имя
						</div>
						<input type="text" name="name" value="'.$value['name'].'" data-type="name">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>


						<div class="edit-block-label">
							Описание
						</div>
						<input type="text" name="desc" value="'.$value['desc'].'" data-type="desc">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
						
        				<div class="edit-block-label">
        					Сайт
        				</div>
        				<input type="text" name="site" value="'.$value['site'].'" data-type="site" class="need-add">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
						

					</div>
					
					
					<div class="edit-block column col-3 clearfix">
					
						
        				<div class="edit-block-label">
        					Вконтакте
        				</div>
        				<input type="text" name="vk" value="'.$value['vk'].'" data-type="vk" class="need-add">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
						
        				<div class="edit-block-label">
        					Телефон
        				</div>
        				<input type="text" name="contacts" value="'.$value['contacts'].'" data-type="contacts" class="need-add">
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
						
						<div class="edit-block-label">
							Показывать на сайте
						</div>
						<select name="moderate" data-type="moderate">
							'.$options.'
						</select>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>

					</div>
					
					<div class="edit-block column col-3 clearfix">
						<div class="edit-block-label">
							Описание
						</div>
						<textarea name="description" data-type="desc">'.$value['desc'].'</textarea>
						<a href="#" class="button save-btn" alt="Сохранить" class="ajax-save-btn">
							<img class="btn-img" src="/img/save-btn.png" alt="">
							<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
						</a>
					</div>
				</div>
			</div>
			';

		}
	}
	else {
		$html = 'Ничего не найдено в базе данных';
	}
	return $html;
}





?>