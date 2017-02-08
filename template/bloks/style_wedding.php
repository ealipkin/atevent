<?php 
	if(empty($_GET['id'])){
		echo '	
				<h3>Стилизованная свадьба</h3>
				<p>
					Стилизованное мероприятие - отличный способ выделиться из окружающих и сделать свой праздник необычайно красивым, а самое главное - особенным! «Академия Торжеств» предлагает Вам идеи по организации тематических свадеб. Оформление интерьера, украшения для банкетного зала, автомобилей и другие аксессуары, изготовленные в едином стиле и цветовой гамме, будут смотреться ярко и выразительно. Придумайте свою историю, и мы поможем воплотить ее в жизнь, организовать праздник, придерживаясь общей тематики. Начните с самого начала: создайте приглашения, обозначающие Ваши намерения, и гости поймут, что будут присутствовать не просто на празднике, а на театрализованном представлении, что усилит их желание и ожидание этого торжества. Мы придумаем конкурсы и выступления, характерные для стиля мероприятия, подберем необходимые костюмы и аксессуары, подготовим сценарий и необходимы реквизиты. 
					На просторах интернета достаточное много различных идей для проведения тематической свадьбы. Сделайте из своего праздника чудесную сказку или сюжет для праздничного фильма, ведь именно это останется в Вашей памяти на долгие годы!
				</p>
				<div class="thumbs-4-content clearfix">';
				getStweddingBlock();
		echo '</div>';
	}
	if(!empty($_GET['id'])){
		$title = getWeddingTitle($_GET['id']);
		echo '	
		<h3 class="acc-header">'.$title.'</h3>
		<hr class="acc-hr" />

		<div>
			<a href="/style_wedding" class="button">
				<i class="icon-white icon-arrow-left"></i> Назад к свадьбам
			</a>
			<!--a href="#myModal" role="button" class="btn back-btn at-btn acc-order-btn" data-toggle="modal">Оформить заказ!</a-->
		</div>
		<!--div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Заказ свадьбы</h3>
			  </div>
			  <div class="modal-body">
				<fieldset id="mailform">
					<label><b>Ваше имя</b></label>
					<input type="text" id="fio">
					<label><b>Телефон для связи</b></label>
					<input type="text" id="phone">
					<label><b>Текст сообщения</b></label>
					<textarea type="text" id="msg" rows="5" class="span5"></textarea><br/>
					<label class="checkbox">
			  		<input type="checkbox" class="anti-spam"> <b>Анти-спам проверка. Пожалуйста поставьте галочку перед отправкой.</b>
					</label><br />
					<span class="help-block" style="color:red">Все поля обязательны для заполнения!</span>
				</fieldset>
			  </div>
			  <div class="modal-footer">
			    <button class="btn " data-dismiss="modal" aria-hidden="true">Отмена</button>
			    <button class="mail-btn btn at-btn">Отправить!</button>
			  </div>
		</div-->

		<div class="decorate-gallery clearfix">
	';

	getStWedding($_GET['id']);

	echo '</div>';
	}
?>

	
<script type="text/javascript">
	$(window).load(function() {
		
		$("a.grouped_elements").fancybox();
		
		/* Using custom settings */
		
		$("a#inline").fancybox({
			'hideOnContentClick': true
		});

		/* Apply fancybox to multiple items */
		
		$("a.group").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});      
	});
</script>