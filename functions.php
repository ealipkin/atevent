<?php
include_once ('config.php');

function test(){
	echo ($res[0][count]);
}


//Получение комментариев
function get_comments(){
	$posts = array();
	$query = "SELECT username, post, LEFT(date, 16) AS date FROM msg ORDER BY date DESC";
	$res = mysql_query($query);
	while($row = mysql_fetch_assoc($res)){
		$posts[] = $row;
	}
	return $posts;
}

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

//!Вывода массива
function PreArray($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

//Артисты
function getArtistBlock($count=0, $count_next=7, $sort='name', $id=0){
	$html = '';

	if(!empty($id)){
		$data_array = db_query("SELECT * FROM `artists` WHERE `moderate` = 0 AND `id` =".$id." ORDER BY `".$sort."`");
		$html .= getArtistTmpl($data_array,$count,$id);
	}

	$data_array = db_query("SELECT * FROM `artists` WHERE `moderate` = 0 AND `id` <> ".$id." ORDER BY `".$sort."` ");

	$html .= getArtistTmpl($data_array,$count);

	return $html;
}

function getArtistTmpl($array,$count,$prize=0){
    if(!empty($array)){
        foreach ($array as $key => $value) {
    		$count++;
    		$id = $value['id'];
    		$path = $value['path'];
    		$avatar = getAvatar($id,1);
    		
    		$hideClass = '';
			$skip_id = '';
    		
    		$arr_photo = db_query("SELECT * FROM `artists_photo` WHERE `artist_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
    		
    		if(!empty($value['type'])) $type = ', '.$value['type'];
    		else $type = '';
    		
    		
			if(!empty($prize)){
				//$medal = 'info-kind-avatar--medal info-kind-avatar--medal-photo';
				$skip_id = 'data-skip="'.$prize.'"';
			}
    		
    		// if($key > 7){$hideClass = 'info-kind-hidden';}
    		
    		$html .='
    		<div class="info-kind artist-block '.$hideClass.'" data-id="'.$count.'" id="artist-'.$id.'" '.$skip_id.'>
    			<a href="/'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
    		  		<img class="info-kind-avatar lazy" data-original="/'.$path.$avatar['photo_t'].'" width="213px" height="216px" src="" alt="">
    			</a>
    			<section class="additional-info">
    				<header class="clearfix">
    					<div class="info-main info-main--artists">
    						<h4>'.$value['name'].$type.'</h4>
    						<h5>Цена - '.$value['price'].'</h5>
    					</div>
    				</header>					
    				<p class="info-desc">'.$value['desc'].'</p>
    				<div class="add-info-thumbs">';
    		foreach ($arr_photo as $key => $value) {
    
    			$html .='
    				<a href="/'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
    					<img src="/'.$path.$value['photo_t'].'" width="82px" height="54px">
    				</a>
    			';
    		}
    
    
    		$html .='
    				</div>
    			</section>
    		</div>
    		';
    
    	}
		
		
    }
    
	return $html;
}


//Получаем тип авто
function getAutosType () {
	$array = db_query("SELECT * FROM `autos_type` ORDER BY `name` ");
	return $array;
}
function getAutosTypeName($type_id) {
    $array = db_query("SELECT `name` FROM `autos_type` WHERE `id` = ".$type_id." ");
    return $array[0]['name'];
}

//Авто
function getAutoBlock($type_id=0, $prize_id=0) {
    $html = '';
    $list_length = count(getAutosType());
    
    if(($type_id > 0) && ($type_id <= $list_length)){
        $list_type = getAutosTypeName($type_id);
        
        if($prize_id>0){
            $array = db_query("SELECT * FROM `autos` WHERE `moderate` = 0 AND `type` = '".$list_type."' AND `id`='".$prize_id."' ORDER BY name ");
            if(!empty($array)){
                $html .= getAutoTmpl($array);
            }
        }
        
        $array = db_query("SELECT * FROM `autos` WHERE `moderate` = 0 AND `type` = '".$list_type."'  AND `id`<>'".$prize_id."' ORDER BY name ");
        
        if(empty($array)){
            return false;
        }
        
        $html .= getAutoTmpl($array);
    }
    else {
        if($prize_id>0){
            $array = db_query("SELECT * FROM `autos` WHERE `moderate` = 0 AND `id`='".$prize_id."' ORDER BY name ");
            
            $html .= getAutoTmpl($array);
        }
        
	    $array = db_query("SELECT * FROM `autos` WHERE `moderate` = 0 AND `id`<>'".$prize_id."' ORDER BY `name` ");
	    
        $html .= getAutoTmpl($array);
    }

    

	return $html;
}

function getAutoTmpl($array) {
    if(!empty($array)){
    	foreach ($array as $key => $value) {
    		$id = $value['id'];
    		$avatar = getAvatar($id,3);
    		$arr_photo = db_query("SELECT * FROM `autos_photo` WHERE `auto_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
    		$path = $value['path'];
    		if(!empty($value['type']))	$type = ', '.$value['type'];
    		else $type = '';
    
    		$html .='
    		<div class="info-kind artist-block" >
    	  		<img class="info-kind-avatar"  width="213px" height="216px" src="'.$path.$avatar['photo_t'].'" alt="">
    			<section class="additional-info">
    				<header class="clearfix">
    					<div class="info-main">
    						<h4>'.$value['name'].'</h4>
    						<h5>Цена - '.$value['price'].'</h5>
    					</div>
    					<div class="info-contacts">
    					</div>
    				</header>					
    				<p class="info-desc">'.$value['desc'].'</p>
    				<div class="add-info-thumbs">';
    		foreach ($arr_photo as $key => $value) {
    
    			$html .='
    				<a href="'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
    					<img class="lazy" data-original="'.$path.$value['photo_t'].'" src="">
    				</a>
    			';
    		}
    
    
    		$html .='
    				</div>
    			</section>
    		</div>
    		';
    	}
        
    }
    return $html;
    
}
//Получаем фотки в дополнительном блоке
function getPhotoInBlock($id,$type){
	if($type==1){$table = 'artists_photo';
		$arr_photo = db_query("SELECT `photo`,`photo_t` FROM `artists_photo` WHERE `artist_id` = ".$id." AND `avatar` = 0");
	}
	if($type==2){$table = 'photographs_photo';
		$arr_photo = db_query("SELECT `photo`,`photo_t` FROM `photographs_photo` WHERE `phgrphs_id` = ".$id." AND `avatar` = 0");
	}
	if($type==3){$table = 'auto_photo';
		$arr_photo = db_query("SELECT `photo`,`photo_t` FROM `autos_photo` WHERE `auto_id` = ".$id." AND `avatar` = 0");
	}
	if($type==4){$table = 'places_photo';
		$arr_photo = db_query("SELECT `photo`,`photo_t` FROM `places_photo` WHERE `place_id` = ".$id." AND `avatar` = 0");
	}
	if($type==5){$table = 'orig_service_photo';
		$arr_photo = db_query("SELECT `photo`,`photo_t` FROM `orig_service_photo` WHERE `service_id` = ".$id." AND `avatar` = 0");
	}

	return $arr_photo;
}

//Получаем аватарку
function getAvatar($id,$type){
	if($type==1){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `artists_photo` WHERE `artist_id` = ".$id." AND `avatar` = 1");
	}
	if($type==2){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `photographs_photo` WHERE `phgrphs_id` = ".$id." AND `avatar` = 1");
	}
	if($type==3){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `autos_photo` WHERE `auto_id` = ".$id." AND `avatar` = 1");
	}
	if($type==4){
		$avatar = db_query("SELECT `avatar` FROM `videographs` WHERE `id` = ".$id." ");
	}
	if($type==5){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `places_photo` WHERE `place_id` = ".$id." AND `avatar` = 1");
	}
	if($type==6){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `orig_service_photo` WHERE `service_id` = ".$id." AND `avatar` = 1");
	}
	if($type==7){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `style_wedding_photo` WHERE `p_id` = ".$id." AND `avatar` = 1");
	}
	if($type==8){
		$avatar = db_query("SELECT `photo`,`photo_t` FROM `firework_photo` WHERE `p_id` = ".$id." AND `avatar` = 1");
	}
	return $avatar[0];
}

//Выводим блоки с фотографами
function getPhotographsBlock($count=0, $count_next=7, $sort='name', $id=0){
	$html = '';

	if(!empty($id)){
		$data_array = db_query("SELECT * FROM `photographs` WHERE `moderate` = 0 AND `id` =".$id." ORDER BY `".$sort."` LIMIT ".$count.",".$count_next." ");
		$html .= getPhotographsTpl($data_array,$count,$id);
	}

	$data_array = db_query("SELECT * FROM `photographs` WHERE `moderate` = 0 AND `id` <> ".$id." ORDER BY `".$sort."` LIMIT ".$count.",".$count_next." ");

	$html .= getPhotographsTpl($data_array,$count);

	return $html;
}

//Шаблон блока с фотографами
function getPhotographsTpl($array,$count,$prize=0) {
    if(!empty($array)){
		foreach ($array as $key => $value) {
			$count++;
			$id = $value['id'];
			$path = $value['path'];
			$avatar = getAvatar($value['id'],2);
			$arr_photo = db_query("SELECT * FROM `photographs_photo` WHERE `phgrphs_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
			$skip_id = '';
			
			if(!empty($prize)){
				$medal = 'info-kind-avatar--medal info-kind-avatar--medal-photo';
				$skip_id = 'data-skip="'.$prize.'"';
			}


			$html .='
			<div class="info-kind artist-block" data-id="'.$count.'" id="pht-'.$id.'" '.$skip_id.'>
				<div class="info-kind-avatar '.$medal.'" >
			  		<img width="213px" height="216px" src="'.$path.$avatar['photo_t'].'" alt="">
			  	</div>
				<section class="additional-info">
					<header class="clearfix">
						<div class="info-main">
							<h4>'.$value['name'].'</h4>
							<h5>цена от '.$value['price'].' рублей</h5>
						</div>
						<div class="info-contacts">
							<h4>+'.$value['phone'].'</h4>
							';
							if(!empty($value['site'])){
								$html .= '<a class="info-link" href="'.$value['site'].'" target="_blank">сайт</a>';
							}
							if(!empty($value['vkpage'])){
								$html .= '<a class="info-vk-link" href="'.$value['vkpage'].'" target="_blank">вконтакте</a>';
							}
							$html.='
						</div>
					</header>					
					<p class="info-desc">'.$value['desc'].'</p>
					<div class="add-info-thumbs">';
			foreach ($arr_photo as $key => $value) {

				$html .='
					<a href="'.$path.$value['photo'].'" class="photo_group" rel="group'.$id.'" title="">
						<img src="'.$path.$value['photo_t'].'">
					</a>
				';
			}


			$html .='
					</div>
				</section>
			</div>
			';

		}
    }
	return $html;

}

function getVideoList($id){
	//$html = 'Примеры работ оператора: <br>';
	$arr_vids = db_query("SELECT `video`,`video_t` FROM `videographs_video` WHERE `vidgrphs_id` = '".$id."' LIMIT 7");
	$lenth = count($arr_vids);
	foreach ($arr_vids as $key => $value) {
		$count = $key+1;
		$html .= '<a class="various fancybox-thumb" rel="group'.$id.' fancybox-thumb" data-fancybox-type="iframe" href="'.$value['video'].'"><img class="vidgr-add-block" src="img/vidgraphers/'.$value['video_t'].'"  alt=""></a>';
	}
return  $html;
}

//Блок с видеооператором
function getVideographBlock($count=0, $count_next=7, $sort='name', $id=0){

	$html = '';

	if(!empty($id)){
		$data_array = db_query("SELECT * FROM `videographs` WHERE `moderate` = 0 AND `id` =".$id." ORDER BY `".$sort."` LIMIT ".$count.",".$count_next." ");
		$html .= getVideographTpl($data_array,$count,$id);
	}

	$data_array = db_query("SELECT * FROM `videographs` WHERE `moderate` = 0 AND `id` <> ".$id." ORDER BY `".$sort."` LIMIT ".$count.",".$count_next." ");
	$html .= getVideographTpl($data_array,$count);

	return $html;
}

//Шаблон блока оператора
function getVideographTpl($array,$count,$prize=0) {

    if(!empty($array)){
    	foreach ($array as $key => $value) {
    		$count++;
    		$id = $value['id'];
    		$path = $value['path'];
    		$avatar = getAvatar($value['id'],4);
    		$skip_id = '';
    		if(!empty($prize)){
    			$medal = 'info-kind-avatar--medal info-kind-avatar--medal-video';
    			$skip_id = 'data-skip="'.$prize.'"';
    		}

    		$html .='
    			<div class="info-kind artist-block" data-id="'.$count.'" id="pht-'.$id.'" '.$skip_id.'>
    				'.$path.'
    				<div class="info-kind-avatar '.$medal.'" >
    				  	<img class="info-kind-avatar"  width="213px" height="216px" src="img/vidgraphers/'.$value['avatar'].'" alt="">
    		  		</div>
    				<section class="additional-info">
    					<header class="clearfix">
    						<div class="info-main">
    							<h4>'.$value['name'].'</h4>
    							<h5>цена от '.$value['price'].' рублей</h5>
    						</div>
    						<div class="info-contacts">
    							<h4>+'.$value['phone'].'</h4>
    							';
    							if(!empty($value['site'])){
    								$html .= '<a class="info-link" href="'.$value['site'].'" target="_blank">сайт</a>';
    							}
    							if(!empty($value['vkpage'])){
    								$html .= '<a class="info-vk-link" href="'.$value['vkpage'].'" target="_blank">вконтакте</a>';
    							}
    							$html.='
    						</div>
    					</header>					
    					<p class="info-desc">'.$value['desc'].'</p>
    					<div class="add-info-thumbs">';

    			$html.='
    					'.getVideoList($value['id']).'</div>';

    			$html.='
    		</div>
    		';

    		//
    		//return PreArray($arr_artists);
    	}
    }

	return $html;
}

//Рестораны
function getPlaceBlock($count=0, $count_next=7, $id=0){
	// $count_next = $count+5;
	
	if(!empty($id)){
    	$data_array = db_query("SELECT * FROM `places` WHERE `moderate` = 0 AND `id` =".$id." ORDER BY name");
    	$html .= getPlaceTpl($data_array,$count,$id);
	}

	$data_array = db_query("SELECT * FROM `places` WHERE `moderate` = 0 AND `id` <> ".$id." ORDER BY name ");



// 	$data_array = db_query("SELECT * FROM `places` WHERE `moderate` = 0 ORDER BY name");

    $html .= getPlaceTpl($data_array,$count);

	return $html;
}
function getPlaceTpl($array,$count,$prize=0) {
    if(!empty($array)){
    	foreach ($array as $key => $value) {
    		$count++;
    		$id = $value['id'];
    		$avatar = getAvatar($value['id'],5);
    		$arr_photo = db_query("SELECT * FROM `places_photo` WHERE `place_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
    		$path = $value['path'];
    
    		$html .='
    		<div class="info-kind artist-block" data-id="'.$count.'" id="place-'.$id.'">
    			<img class="info-kind-avatar"  width="213px" height="216px" src="'.$path.$avatar['photo_t'].'" alt="">
    			<section class="additional-info">
    				<header class="clearfix">
    					<div class="info-main">
    						<h4>'.$value['name'].'</h4>
    						<h5>'.$value['adress'].'</h5>
    					</div>
    					<div class="info-contacts">
    						<h4>'.$value['phone'].'</h4>
    						<a href="'.$value['site'].'" target="_blank">сайт ресторана</a>
    						<!--a href="#">вконтакте</a-->
    					</div>
    				</header>					
    				<p class="info-desc">'.$value['desc'].'</p>
    				<div class="add-info-thumbs">';
    		foreach ($arr_photo as $key => $value) {
    			$html .='
    				<a href="'.$path.$value['photo'].'" class="grouped_elements" rel="group'.$id.'" title="">
    					<img class="lazy" data-original="'.$path.$value['photo_t'].'" src="">
    				</a>
    			';
    		}
    
    
    		$html .='
    				</div>
    			</section>
    		</div>
    		';
    
    	}
    }
    
	return $html;
}


function getSiteLink($adress){
		$code = '<a href="http://'.$adress.'">'.$adress.'</a>';
	return $code;
}

function getPhotoPath($id,$type){
	if($type==2){
		$path = db_query("SELECT `path` FROM `photographs` WHERE `id` = ".$id."");
	}

	return $path;
}

function getAdvice(){
	$arr_advice = db_query("SELECT * FROM `advice` WHERE `moderate` = 0 ORDER BY `position`");
	$html = '<ul>';
	foreach ($arr_advice as $key => $value) {
	$html .='
		<li>
			<div>
				<h5><a href="#" class="toggle-hide-block dashed-link">'.$value['title'].'</a></h5>
				<p>'.$value['desc'].'</p>
				<div id="add-art'.$value['id'].'" class="hide-block" style="display:none">'.$value['text'].'</div>
			</div>
			<hr class="advice-hr">

		</li>
		';

		//
		//return PreArray($arr_artists);
	}
	$html .= '</ul>';
	return $html;
}

//Текст советов молодоженам
function getAdviceText($id){
	$advice = db_query("SELECT `text` FROM `advice` WHERE `id` = $id");

	return $advice;
}

//Блок с оригинальными услугами
function getOriginalServiceBlock(){
	$arr_service = db_query("SELECT * FROM `orig_service` WHERE `moderate` = 0 ORDER BY `name`");

	foreach ($arr_service as $key => $value) {
		$avatar = getAvatar($value['id'],6);
		$html .='
			<div class="span9 text artist-block">
				<div class="span2 art-avatar">
				<a href="'.$value['path'].$avatar['photo'].'" class="grouped_elements" rel="group'.$value['id'].'" title="">
			  		<img src="'.$value['path'].$avatar['photo_t'].'" alt="">
				</a>
			</div>
			<div class="span7 text">
				<div class="row">
					<div class="span5">
						<h4>'.$value['name'].'</h4>
					</div>
					<div class="span2 artist-price">
						<h5>'.$value['price'].'</h5>
					</div>
				</div>
				<p>'.$value['desc'].'</p>
			</div>
			<a id="art'.$value['id'].'" class="offset5 art-view">Подробнее...</a>
			<div id="add-art'.$value['id'].'" class="span7 artist-add" style="display:none"><p>'.$value['desc_add'].'</p></div>
		</div>
		';
	}
	return $html;
}

function getFireworkVideoList($id){
	$arr_vids = db_query("SELECT `video`,`video_t` FROM `firework_video` WHERE `p_id` = '".$id."' LIMIT 7");
	$lenth = count($arr_vids);
	foreach ($arr_vids as $key => $value) {
		$count = $key+1;
		$html .= '
		<a class="various fancybox-thumb" rel="group'.$id.' fancybox-thumb" data-fancybox-type="iframe" href="'.$value['video'].'">
			<img class="vidgr-add-block" src="img/firework/video/'.$value['video_t'].'" alt="" width="82px" height="54px">
		</a>';
	}
	return  $html;
}

function getFireworkBlock($count=0, $count_next=7, $table='firework'){
	// $count_next = $count+5;
	$data_array = db_query("SELECT * FROM `".$table."` WHERE `moderate` = 0 ORDER BY `position` LIMIT ".$count.",".$count_next."  ");

	foreach ($data_array as $key => $value) {
		$count++;
		$id = $value['id'];
		$avatar = getAvatar($id,8);
		$path = $value['path'];
		if(!empty($value['type']))	$type = ', '.$value['type'];
		else $type = '';


		$photo_array =  db_query("SELECT * FROM `firework_photo` WHERE `p_id` = ".$value['id']." AND `avatar` = 0 LIMIT 7");
		$video_array =  db_query("SELECT * FROM `firework_video` WHERE `p_id` = ".$value['id']." LIMIT 7");
		$photos_block = '';

		foreach ($photo_array as $key2 => $value2) {
			$photos_block .= '
					<a href="'.$value['path'].$value2['photo'].'" class="grouped_elements" rel="group'.$value['id'].'" title="">
				  		<img src="'.$value['path'].$value2['photo_t'].'" alt="" width="82px" height="54px">
					</a>';
		}

		$html .='
		<div class="info-kind artist-block clearfix info-kind--nonheight" data-id="'.$count.'">
		  	<img class="info-kind-avatar"  width="213px" height="216px" src="'.$path.$avatar['photo_t'].'" alt="">
			<section class="additional-info">
				<header class="clearfix">
					<div class="info-main--full">
						<h4>'.$value['title'].$type.'</h4>
					</div>
				</header>

				<p class="info-desc--full">'.$value['desc'].'</p>

				<div class="add-info-thumbs block-first-row clearfix">
					'.$photos_block.'
				</div>

				<div class="add-info-thumbs block-second-row clearfix">';
		if(!empty($video_array)){
			$html .= '	
						'.getFireworkVideoList($value['id']).'
					';
		}

		$html .='
				</div>
			</section>
		</div>
		';
	}
	return $html;
}

//Блоки с перечнем свадеб
function getStweddingBlock(){
	$data_array = db_query("SELECT * FROM `style_wedding` WHERE `moderate` = 0 ORDER BY `position`");
	foreach ($data_array as $key => $value) {
		$avatar = getAvatar($value['id'],7);
		$html.= '
			<div class="thumbs">
				<a href="/style_wedding?id='.$value['id'].'" title="'.$value['name'].'">
					<div class="stack twisted"><img src="'.$value['path'].$avatar['photo_t'].'" alt=""></div>
					<h6 style="text-align:center">'.$value['name'].'</h6>
				</a>
			</div>
	';

	}

	echo $html;
}

//Название свадьбы
function getWeddingTitle($id){
	$data_array = db_query("SELECT `name` FROM `style_wedding` WHERE `id` = ".$id." ");
	return $data_array[0]['name'];

}

//Страница стилизованной свадьбы
function getStWedding($id){
	$data_array = db_query("SELECT * FROM `style_wedding_photo` WHERE `p_id` = ".$id."");
	$title = getWeddingTitle($id);
	foreach ($data_array as $key => $value) {
		$html.= '
			<div class="span3">
				<a class="grouped_elements" rel="group1" href="/img/st_wedding/'.$id.'/'.$value['photo'].'" title="'.$title.'">
					<img data-original="/img/st_wedding/'.$id.'/'.$value['photo_t'].'" class="lazy img-polaroid">
				</a>
			</div>
	';

	}

	echo $html;
}

function getGalleryBlock($table) {
	$data_array = db_query("SELECT * FROM `".$table."` WHERE `moderate` = 0");

	foreach ($data_array as $key => $value) {

		$photo_array =  db_query("SELECT * FROM `".$table."_photo` WHERE `block_id` = ".$value['id']." ");

		$html .= '
		<div class="gallery-item__container">
			<div class="gallery-item__header clearfix">
				<div class="gallery-item__title-group">
					<h4>'.$value['name'].'</h4>
				</div>
					<div class="gallery-item__info">
					<div class="gallery-item__links">';

		if($value['site']){
					$html .='
						<a href="'.$value['site'].'" target="_blank">
							сайт
						</a>';
		}
		if($value['site'] && $value['vk']) {
					$html .='<span class="gallery-item__divider"> , </span>';
		}
		if($value['vk']){
					$html .='
						<a href="'.$value['vk'].'" target="_blank">
							вконтакте
						</a>';
		}
				$html .='
					</div>
					<div class="gallery-item__contacts">
						'.$value['contacts'].'
					</div>
				</div>
			</div>
			<div class="gallery-item__desc">'.$value['desc'].'</div>
			<div class="bocal-gallery clearfix">';
				foreach ($photo_array as $key2 => $value2) {
					$html .= '
						<div class="span3">
							<a class="grouped_elements" rel="group'.$value['id'].'" href="'.$value['path'].'/'.$value2['photo'].'" title="">
								<img data-original="'.$value['path'].'/'.$value2['photo_t'].'" class="img-polaroid lazy">
							</a>
						</div>';
				}
		$html .= '
			</div>
		</div>';
	}

	echo $html;

}

function getPhotoGalleryBlock($table, $id) {
	$data_array = db_query("SELECT * FROM `".$table."` WHERE `id` = ".$id." ");

	$html .= '<div class="clearfix">';
		for ($i = 1; $i <= 10; $i++) {
			$html .= '
				<div class="gallery-item--four">
					<a class="grouped_elements" rel="group'.$id.'" href="'.$data_array[0]['path'].'/'.$i.'.jpg" title="">
						<img data-original="'.$data_array[0]['path'].'/'.$i.'_t.jpg" class="lazy img-polaroid">
					</a>
				</div>';
		}

	$html .= '</div>';

	echo $html;

}

function getTechGalleryBlock($table,$id){
	$data_array = db_query("SELECT * FROM `".$table."` WHERE `id` = ".$id." ");
	$path = $data_array[0]['path'];
	$photo_array =  db_query("SELECT * FROM `".$table."_photo` WHERE `block_id` = ".$id." ");


	foreach ($photo_array as $key => $value) {
		$html .= '
			<div class="gallery-item--four">
				<a class="grouped_elements" rel="group'.$id.'" href="'.$path.'/'.$value['photo'].'" title="'.$value['desc'].'">
					<img data-original="'.$path.'/'.$value['photo_t'].'" class="lazy img-polaroid">
				</a>
			</div>';
	}

	echo $html;
}

function getRingsList ($table){
	$data_array = db_query("SELECT * FROM `".$table."` WHERE `moderate` = 0");
	//$path = $data_array[0]['path'];
	//$photo_array =  db_query("SELECT * FROM `".$table."_photo` WHERE `block_id` = ".$id." ");




	foreach ($data_array as $key => $value) {
        $html .= '
		<div class="gallery-item__container">
			<div class="gallery-item__header clearfix">
				<div class="gallery-item__title-group">
					<h4>'.$value['name'].'</h4>
					<h5>'.$value['adress'].'</h5>
				</div>
					<div class="gallery-item__info">
					<div class="gallery-item__contacts">
						'.$value['contacts'].'
					</div>
					<div class="gallery-item__links">';

                        if($value['site']){
                            $html .='
                                        <a href="'.$value['site'].'" target="_blank">
                                            сайт
                                        </a>';
                        }
                        if($value['site'] && $value['vk']) {
                            $html .='<span class="gallery-item__divider"> , </span>';
                        }
                        if($value['vk']){
                            $html .='
                                        <a href="'.$value['vk'].'" target="_blank">
                                            вконтакте
                                        </a>';
                        }
                        $html .='
					</div>
				</div>
			</div>
			<div class="gallery-item__desc">'.$value['desc'].'</div>
			<div class="bocal-gallery clearfix">';

        $html .= '
			</div>
		</div>';
	}

	echo $html;
//    var_dump($data_array);
}
?>