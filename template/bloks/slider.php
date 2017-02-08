<?php
function getSlider($path){
	return $html = '
		<div class="slider-wrapper theme-default">
			<div id="slider" class="nivoSlider">
			<img src="./img/slider/'.$path.'/1.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/2.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/3.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/4.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/5.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/6.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/7.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/8.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/9.jpg" alt="" width="895px" height="280px" title=""/>
			<img src="./img/slider/'.$path.'/10.jpg" alt="" width="895px" height="280px" title=""/>
			</div>
		</div>
	';
}

function getLinkedSlider($path, $link_array){

	foreach ($link_array as $key => $value) {
	    if($value === ''){
    		$img_html .= '
    		<span>
    			<img src="./img/slider/'.$path.'/'.++$key.'.jpg" alt="" title="" width="895px" height="280px"/>
    		</span>
		';
	    } else {
    		$img_html .= '
    		<a href="'.$value.'">
    			<img src="./img/slider/'.$path.'/'.++$key.'.jpg" alt="" title="" width="895px" height="280px"/>
    		</a>
    		';
	    }
	}
	
	return $html = '
		<div class="slider-wrapper theme-default anchor-slider">
			<div id="slider" class="nivoSlider">
				'.$img_html.'
			</div>
		</div>
	';
}

switch($_URLP)
{
	case 'decorate': 
	case 'dec_hall': 
	case 'dec_auto': 
	case 'dec_bubbles': 
	case 'flowers': 
	case 'acc_invites': 
	case 'acc_glass': 
	case 'acc_sitcards': 
	case 'acc_other':
	case 'dec_reg':
	case 'acc_fotozone':
	case 'acc_wedding':
	case 'acc_renta':
	case 'acc_sweets':
		$img_path = 'decor';
		$html = getSlider($img_path);
	break;

	case 'other_services': 
		$img_path = 'other_services';
		$html = getSlider($img_path);
	break;


	case 'firework':
		$img_path = 'firework';
		$html = getSlider($img_path);
	break;

	case 'auto':
		$img_path = 'auto';

		$links[0] = '';
		$links[1] = '';
		$links[2] = '';
		$links[3] = 'popup-open';
		$links[4] = '';
		$links[5] = '';
		$links[6] = 'popup-open';
		$links[7] = '';
		$links[8] = '';
		$links[9] = 'popup-open';
		$links[10] = '';
		$links[11] = '';
		$links[12] = '';
		$links[13] = 'popup-open';

		$html = getLinkedSlider($img_path, $links);
	break;

	case 'style_wedding':
		$img_path = 'style_wedding';
		$html = getSlider($img_path);
	break;

	case 'advice':
		$img_path = 'advice';
		$html = getSlider($img_path);
	break;

	case 'places':
		$img_path = 'places';

		$links[0] = '';
		$links[1] = '';
		$links[2] = '';
		$links[3] = 'popup-open';
		$links[4] = '';
		$links[5] = '';
		$links[6] = 'popup-open';
		$links[7] = '';
		$links[8] = '';
		$links[9] = 'popup-open';
		$links[10] = '';
		$links[11] = '';
		$links[12] = '';
		$links[13] = 'popup-open';

		$html = getLinkedSlider($img_path, $links);
	break;

	case 'photographs':
		$img_path = 'photo';

		$links[0] = '';
		$links[1] = '';
		$links[2] = '';
		$links[3] = 'popup-open';
		$links[4] = '';
		$links[5] = '';
		$links[6] = 'popup-open';
		$links[7] = '';
		$links[8] = '';
		$links[9] = 'popup-open';
		$links[10] = '';
		$links[11] = '';
		$links[12] = '';
		$links[13] = 'popup-open';

		$html = getLinkedSlider($img_path, $links);
	break;
    
    case 'author_services':
		$img_path = 'author_services';
		$html = getSlider($img_path);
	break;
	
	case 'artists':
		$img_path = 'artists';

		$links[0] = '';
		$links[1] = '';
		$links[2] = '';
		$links[3] = '';
		$links[4] = 'popup-open';
		$links[5] = '';
		$links[6] = '';
		$links[7] = 'popup-open';
		$links[8] = '';
		$links[9] = 'popup-open';
		$links[10] = '';
		$links[11] = '';
		$links[12] = '';
		$links[13] = 'popup-open';

		$html = getLinkedSlider($img_path, $links);
	break;
	
	case 'photo_places':
		$html = getSlider('photo_places');
	break;
	
	case 'cakes':
		$html = getSlider('cakes');
	break;
	
	case 'videographs':
		$html = getSlider('videographs');
	break;
	
	case 'wedding_dress':
		$html = getSlider('wedding_dress');
	break;
	
	case 'man_outfit':
		$html = getSlider('man_outfit');
	break;
	
	case 'hair_makeup':
		$html = getSlider('hair_makeup');
	break;
	
	case 'rings':
		$html = getSlider('rings');
	break;
	
	case 'salut':
		$html = getSlider('salut');
	break;
	
	case 'fire_fountains':
		$html = getSlider('fire_fountains');
	break;
	
	case 'fire_sings':
		$html = getSlider('fire_sings');
	break;
	
	case 'day_salut':
		$html = getSlider('day_salut');
	break;
	
	case 'fire_fountains':
		$html = getSlider('fire_fountains');
	break;
	
	case 'tech_sound':
		$html = getSlider('tech_sound');
	break;
	
	case 'tech_light':
		$html = getSlider('tech_light');
	break;
	
	case 'tech_video':
		$html = getSlider('tech_video');
	break;
	
	case 'tech_effects':
		$html = getSlider('tech_effects');
	break;
	
	case 'fun':
		$html = getSlider('fun');
	break;
	
	case 'polygraphy':
		$html = getSlider('polygraphy');
	break;
	
	case 'souvenirs':
		$html = getSlider('souvenirs');
	break;
	
	case 'original_service':
		$html = getSlider('souvenirs');
	break;

	case 'at':
		$img_path = 'at';
		$html = '
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="./img/slider/at/1.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/2.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/3.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/4.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/5.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/6.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/7.jpg" alt="" width="895px" height="280px" />
					<img src="./img/slider/at/8.jpg" alt="" width="895px" height="280px" />
				</div>
			</div>
		';
	break;

	default:		 
		$html = '
			<div class="slider-wrapper theme-default ">
				<div id="slider" class="nivoSlider">
					<a target="_blank" href="at">
						<img src="./img/slider/main/1_1.jpg" alt="" width="895px" height="280px" />
					</a>
					<span>
						<img src="./img/slider/main/2_2.jpg" alt="" width="895px" height="280px" />
					</span>
					<span>
						<img src="./img/slider/main/3_3.jpg" alt="" width="895px" height="280px" />
					</span>

					<span>
						<img src="./img/slider/main/4_4.jpg" alt="" width="895px" height="280px" />
					</span>

					<span>
						<img src="./img/slider/main/5_5.jpg" alt="" width="895px" height="280px" />
					</span>

					<span>
						<img src="./img/slider/main/6_6.jpg" alt="" width="895px" height="280px" />
					</span>
					
					<span>
						<img src="./img/slider/main/7_7.jpg" alt="" width="895px" height="280px" />
					</span>
					
					<span>
						<img src="./img/slider/main/8_8.jpg" alt="" width="895px" height="280px" />
					</span>
					
					<span>
						<img src="./img/slider/main/9_9.jpg" alt="" width="895px" height="280px" />
					</span>
					
					<span>
						<img src="./img/slider/main/10_10.jpg" alt="" width="895px" height="280px" />
					</span>

				</div>
			</div>
		';
		break;
} 


/*
	if($_URLP != ''){

	}

	if($_URLP == 'advice'){
		$img_path = 'advice'; 
	}
	if($_URLP == 'cakes'){
		$img_path = 'cakes'; 
	}
	if($_URLP == 'partners'){
		$img_path = 'partners'; 
	}
	if($_URLP == 'original_service'){
		$img_path = 'orig_service'; 
	}


	*/
	echo $html;

?>

