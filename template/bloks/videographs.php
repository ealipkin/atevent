<?
	$getPrize = db_query("SELECT `video` FROM `prize`");
	$prize = $getPrize[0]['video'];
	if($prize>0){
		$prize = $prize;
	}
	else {
		$prize=0;
	}
?>
<div class="text info-block">
	<h3 class="title-main">Фото и видео услуги</h3>
	<p>
	 Яркие впечатления и теплые воспоминания - это то, что должно остаться у Вас после праздника. 
	 Но, к сожалению, всему свойственно забываться. Мы поможем сделать так, чтобы Ваш праздник остался в памяти на всю жизнь! 
	 «Академия Торжеств» предлагает большой выбор профессиональных фотографов и видеооператорв, 
	 которые обязательно сделают Ваш праздник незабываемым! В данном разделе представлены лучшие мастера своего дела, 
	 работающие в различных стилях и ценовых категориях. 
	</p>
	<p>
		 В каталоге указана стоимость свадебной фото/видеосъемки 10-12 ч. Возможен заказ оператора на меньшее количество часов. 
 		Уточняйте информацию по телефону <strong>8 982 311 28 92</strong>
	</p>
	<p> 
		Красивые свадебные фильмы и красочные фотографии всегда будут напоминать Вам о самых важных моментах 
 		и вновь окунать Вас в атмосферу праздника!
	</p>
</div>
<div class="content-filter clearfix">
	<span>Показывать </span>
	<a href="/photographs">фотографов</a> 
	/ 
	видеооператоров
	<span> | </span>
	<span>Сортировать по </span>
	<select class="sort-select" name="">
		<option value="name">имени</option>
		<option value="price">цене</option>
		<!--option value="price_htl">сначала дорогие</option-->
		<!--option value="">типу</option-->
	</select>
</div>
<div class="fixtaion-overlay"></div>
<div class="info-wrapper">
	<?=getVideographBlock(0, 7, 'name', $prize)?>
</div>


<?php 
$scripts .= "
<script>
	$(function() {
		var table = 'video';

        scrollLoader();

    	$('.sort-select').on('change',function(){
    		inProcess = true;
    		sort = $('.sort-select').val();

    		$('.fixtaion-overlay').show();
			getContent(table,0,7,sort); 
			$('.info-wrapper > div').remove();
    		setTimeout(function() { 
    			$('.fixtaion-overlay').hide(); 
    		}, 50);
    	});

    	setTimeout(function(){
			$('.fancybox-thumb + span').remove();
    	}, 300)

	});
</script>
";
?>