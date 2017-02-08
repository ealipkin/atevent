<div class="span11">
	<h3 class="contacts-title">Уважаемые друзья!</h3>
	<p>
	Ежемесячно в Челябинске проводятся десятки свадеб и других торжественных мероприятий. Именно поэтому так необходимо большое количество артистов, ведущих, фотографов, видеооператоров и свадебных автомобилей. Наша задача- собрать лучших мастеров своего дела на сайте, чтобы у наших клиентов был выбор!
	"Академия Торжеств" предлагает сотрудничество по следующим направлениям:
	<ul>
		<li><a href="/artists">Артисты</a></li> 
		<li><a href="/photographs">Фотографы</a></li>
		<li><a href="/videographs">Видеооператоры</a></li>
		<li><a href="/auto">Водители с личным автомобилем представительского класса</a></li>
		<li>Реклама на сайте</li>
	</ul>
	Если у Вас есть идеи и предложения, касающиеся услуг по организации и проведениию мероприятия, мы рады рассмотреть их. Отправьте нам заявку, и мы свяжемся с Вами в ближайшее время.
	</p>
	<a href="#myModal" role="button" class="btn at-btn partners-btn" data-toggle="modal">Отправить заявку</a>
	<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Заявка на сотрудничество</h3>
	  </div>
	  <div class="modal-body">
		<fieldset id="mailform">
			<label><b>Категория сотрудничества</b></label>
			<select name="linksNav" size="1">
				<option value="1" selected >Артисты</option>
				<option value="2">Фотографы</option>
				<option value="3">Видеооператоры</option>
				<option value="4">Водители с личным автомобилем</option>
				<option value="5">Реклама на сайте</option>
			</select>
			<label><b>Ваше имя</b></label>
			<input type="text" id="user-name">
			<label><b>Адрес электронной почты</b></label>
			<input type="text" id="mail">
			<label><b>Телефон</b></label>
			<input type="text" id="phone">
			<label><b>Текст сообщения</b></label>
			<textarea type="text" id="user-msg" rows="5" class="span5"></textarea><br/>
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
	</div>

	<hr/>
</div>


<script type="text/javascript">
$(document).ready(function(){
		 $('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 8, // For slice animations
        boxCols: 4, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 900, // Slide transition speed
        pauseTime: 5000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: false, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: true, // Start on a random slide
    	});
	$('.mail-btn').click(function(){
		var userName = $('#user-name').val();
		var userMail = $('#mail').val();
		var userPhone = $('#phone').val();
		var userMsg = $('#user-msg').val();
		var flag = $('.anti-spam').prop("checked");


		if(userName=='' || userMsg=='' || userMail=='' || userPhone=='' || flag==false){
			if(userName=='' || userMsg=='' || userMail=='' || userPhone=='' ){
				$.gritter.add({
					title: 'Введены не все данные',
					text: 'Пожалуйста, заполните форму полностью',
					sticky: false, 
					time: 7000,
					class_name: 'my-class'
				});
			}

			if(flag == false){
				$.gritter.add({
					title: 'Анти-спам проверка',
					text: 'Пожалуйста, поставьте галочку под формой',
					sticky: false, 
					time: 7000,
					class_name: 'my-class'
				});
			}

			$('#gritter-notice-wrapper').click(function(){
				$.gritter.removeAll();
			});

		}
		else{
			var title, alert;
			var partnerType = $('option:selected').html();
			$.ajax({
				type: "POST",
				url: "mail.php",
				data: ({
						fio : $('#user-name').val(),
						email : $('#mail').val(),
						phone : $('#phone').val(),
						msg : $('#user-msg').val(),
						type: 'Сотрудничество. '+partnerType
					}),
				success: function(msg){
					console.log(msg);
					$('input:checkbox').removeAttr('checked');
					var arr_res = JSON.parse(msg);
					var name = arr_res.username;
					var post = arr_res.post;
					var date = arr_res.date;
					$('#myModal').modal('hide');
					$('#comments').prepend('<div class="comm_block"><div class="row"><div class="span7"><b>Имя польозвателя:</b>&nbsp'+name+'</div><div class="span4"><b>Отзыв оставлен:</b>&nbsp'+date+'</div></div><div class="row"><div class="span10"><p>'+post+'</p></div></div><hr></div>');
					$('.non-comm').hide();
					$('#user-msg').val('');
					$.gritter.add({
						title: 'Сообщение отправлено.',
						text: 'Спасибо. Ваша заявка важна для нас.',
						sticky: false, 
						time: 7000,
						class_name: 'my-class'
					});
					$('#gritter-notice-wrapper').click(function(){
						$.gritter.removeAll();
					});
					$('#myModal').modal('hide');
				}
			});
		}

	});

});



</script>