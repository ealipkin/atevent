<?php
	$scripts=''; 
	$styles=''; 
	$slider = 0;
	$TITLE = "Академия Торжеств :: ";
	$landing = 0;
	
	//Подключение слайдера
	$slider_inc = "";

	//*******************************************************************************
	switch($_URLP){
		case 'adm/edit-artists':
			$TITLE .= 'Артисты - редактирование';
			$file  = 'edit-artists.php';
		break;
		case 'adm/edit-auto':
			$TITLE .= 'Прокат авто - редактирование';
			$file  = 'edit-auto.php';
		break;
		case 'adm/edit-photo':
			$TITLE .= 'Фотографы - редактирование';
			$file  = 'edit-photo.php';
		break;
		case 'adm/edit-video':
			$TITLE .= 'Операторы - редактирование';
			$file  = 'edit-video.php';
		break;
		case 'adm/edit-place':
			$TITLE .= 'Рестораны - редактирование';
			$file  = 'edit-place.php';
		break;
		case 'adm/edit-wedding-dress':
			$TITLE .= 'Свадебные платья - редактирование';
			$file  = 'edit-wedding-dress.php';
		break;
		case 'adm/edit-man-outfit':
			$TITLE .= 'Наряд жениха - редактирование';
			$file  = 'edit-man-outfit.php';
		break;
		case 'adm/edit-hair-makeup':
			$TITLE .= 'Прически и макияж - редактирование';
			$file  = 'edit-hair-makeup.php';
		break;
		case 'adm/edit-rings':
			$TITLE .= 'Обручальыне кольца - редактирование';
			$file  = 'edit-rings.php';
		break;
		case 'adm/edit-polygraphy':
			$TITLE .= 'Обручальыне кольца - редактирование';
			$file  = 'edit-polygraphy.php';
		break;
		case 'adm/edit-souvenirs':
			$TITLE .= 'Сувениры - редактирование';
			$file  = 'edit-souvenirs.php';
		break;




		default:
			$TITLE .= "Главная страница";
			$slider = 1;
			$file  = 'main.php';
			$styles = '
						<link href="/css/nivo-slider/default/default.css" rel="stylesheet">
						<link href="/js/fancybox/helpers/jquery.fancybox-thumbs.css" rel="stylesheet">
						<link href="/js/fancybox/jquery.fancybox.css" rel="stylesheet">
						';

			$scripts .= '
						<script src="/js/fancybox/jquery.fancybox.pack.js"></script>
						<script src="/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
						<script src="/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
						<script src="/js/jquery.nivo.slider.pack.js"></script>
						';
		break;
	}
?>
