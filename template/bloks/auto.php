<?php

    if(!empty($_GET['type'])){
        $type = $_GET['type'];
    }
    else $type = 0;
    
	$auto_type = getAutosType();
	$options_type = '<option value="0">все автомобили</option>';
	foreach ($auto_type as $key_type => $value_type) {
	    if($value_type['id']==$type) {
	        $type_checked='selected';
	    }
	    else {
	        $type_checked = '';
	    }
	    $options_type .= '<option value="'.$value_type['id'].'" '.$type_checked.'>'.$value_type['view_name'].'</option>';
	}
	
	$getPrize = db_query("SELECT `autos` FROM `prize`");
	$prize = $getPrize[0]['autos'];
	if($prize>0){
		$prize = $prize;
	}
	else {
		$prize=0;
	}

?>

<div class="text info-block">
	<h3>Прокат автомобилей</h3>
	<p>
		«Академия Торжеств» предлагает огромный выбор лимузинов, автомобилей представительского класса или автобусов. 
		Прогулка на большом лимузине известных марок по улицам города, фотографии в шикарных интерьерах с подсветкой и 
		мерцающими огнями, зеркала, музыка, бар и большое пространство- в полной мере позволит Вам отдохнуть и насладиться поездкой! 
		А как великолепно смотрится организованный кортеж, состоящий из одинаковых моделей одного цвета, украшенных в едином стиле. 
		А, может, посадить всех в один комфортабельный автобус, чтобы гости могли познакомиться и не откладывать веселье на вечер? 
		В нашем каталоге Вы найдете именно то, что подходит для Вашего праздника!
	</p>
	<p>
		В этих автомобилях Вы будете чувствовать комфорт и уют!  Мы приедем  быстро, и Вы непременно будете на месте в назначенный час.
	</p>
	<p>
		Цены на лимузины указаны при аренде автомобиля в субботу. В другие дни недели цены ниже, уточняйте по телефону <b>8(982)311-28-92</b>. При заказе автомобиля в ночное время стоимость увеличивается на 300 рублей.
	</p>	
</div>
<div class="content-filter clearfix">
	<span>Показывать: </span>
	<select class="sort-select-auto" name="">
	    <?=$options_type?>
	</select>
</div>
<div class="info-wrapper">
	<?=getAutoBlock($type,$prize)?>
</div>



<?php 
$scripts .= "

<script>
	(function(){
	    $('.sort-select-auto').on('change',function(){
	        console.log($(this).val());
	        window.location.href='/auto?type='+$(this).val();
	    });
        //scrollLoader('autos','$type');
    })();
</script>
";
?>