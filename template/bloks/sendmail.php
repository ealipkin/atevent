<div class="span11">
	<h3 class="contacts-title">Дорогие друзья!</h3>
	<p>
		Если у Вас появились вопросы или пожелания, Вы можете написать нам письмо, заполнив форму ниже.
	</p>
	<hr/>
	<fieldset id="mailform">
		<label><b>ФИО</b></label>
		<input type="text" id="fio">
		<label><b>Адрес электронной почты</b></label>
		<input type="text" id="mail">
		<label><b>Телефон</b></label>
		<input type="text" id="phone">
		<label><b>Текст сообщения</b></label>
		<textarea type="text" id="msg" rows="5" class="span5"></textarea><br/>
		<label class="checkbox">
	      <input type="checkbox" class="anti-spam"> <b>Анти-спам проверка. Пожалуйста поставьте галочку перед отправкой.</b>
	    </label><br />
		<span class="help-block" style="color:red">Все поля обязательны для заполнения!</span>
		<button class="mail-btn btn at-btn">Отправить!</button>
	</fieldset>
	<hr/>
	<p>
		С уважением, <b>«Академия Торжеств»</b>
	</p>
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
        //randomStart: true, // Start on a random slide
        randomStart: true, // Start on a random slide
    	});


		$('.mail-btn').click(function(){
			var fio = $('#fio').val();
			var mail = $('#mail').val();
			var phone = $('#phone').val();
			var msg = $('#msg').val();
			var flag = $('.anti-spam').prop("checked");


			if(fio=='' || mail=='' || phone=='' || msg=='' || flag==false){
				if(fio=='' || mail=='' || phone=='' || msg==''){
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
						// (string | обязательно) заголовок сообщения
						title: 'Анти-спам проверка',
						// (string | обязательно) текст сообщения 
						text: 'Пожалуйста, поставьте галочку под формой',
						// (bool | опция) Тип сообщения, значение true соответствует липкому сообщению,
						//  которое удаляется с экрана только вручную.
						sticky: false, 
						// (int | опция) время показа сообщения (миллисекунд)
						time: 7000,
						// (string | опция) имя класса, который назначается для данного сообщения 
						class_name: 'my-class'
					});
				}

				$('#gritter-notice-wrapper').click(function(){
					$.gritter.removeAll();
				});

			}
			else{
				var title, alert;
				$.ajax({
					type: "POST",
					url: "/mail.php",
					data: ({
						fio : $('#fio').val(),
						email : $('#mail').val(),
						phone : $('#phone').val(),
						msg : $('#msg').val(),
						type: 'Отправка письма'
						}),
					success: function(msg){
						//console.log(msg);
						if(msg==1){title = 'Успех!'; alert = 'Письмо успешно отправлено'}
						else {title = 'Ошибка'; alert = 'Произошла ошибка, попробуйте ещё раз'}
						$.gritter.add({
							title: title,
							text: alert,
							sticky: false, 
							time: 7000,
							class_name: 'my-class'
						});
						$('input:checkbox').removeAttr('checked');
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