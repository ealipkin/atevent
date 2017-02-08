<?php
	$comments = get_comments();
?>
<div class="span11">
	<h3 class="contacts-title">Дорогие друзья!</h3>
	<p>
		Свои отзывы о нашей работе вы можете нажав на кнопку.
	</p>
	<a href="#myModal" role="button" class="btn at-btn" data-toggle="modal">Оставить отзыв</a>
	<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Отзыв о нас</h3>
	  </div>
	  <div class="modal-body">
		<fieldset id="mailform">
			<label><b>Ваше имя</b></label>
			<input type="text" id="user-name">
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

<div class="span11" id="comments">
	<?php
	if(!empty($comments)){
		foreach ($comments as $post) {
	?>
		<div class="comm_block">
			<div class="row">
				<div class="span7"><b>Имя польозвателя:</b>&nbsp <?=clearDataClient($post['username'])?> </div>
				<div class="span4"><b>Отзыв оставлен:</b>&nbsp <?=clearDataClient($post['date'])?> </div>
			</div>
			<div class="row">
				<div class="span10">
					<p><?=nl2br(clearDataClient($post['post']))?> </p>
				</div>
			</div>
			<hr>
		</div>
	<?php
		}
	}
	else{
	?>
		<div class="comm_block non-comm">
			<div class="row">
				<div class="span10">
					<b>Отзывов пока никто не оставил.</b>
				</div>
				<br/>
			</div>
			<hr/>
		</div>
	<?php
	}
	?>
</div>

<div class="span11">
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
        randomStart: true, // Start on a random slide
	});
	//$('#myModal').modal(options);

	$('.mail-btn').click(function(){
		var userName = $('#user-name').val();
		var userMsg = $('#user-msg').val();
		var flag = $('.anti-spam').prop("checked");


		if(userName=='' || userMsg=='' ||flag==false){
			if(userName=='' || userMsg==''){
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
			$.ajax({
				type: "POST",
				url: "otziv_send.php",
				data: ({
					userName : userName,
					userMsg : userMsg
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
					$.gritter.add({
						title: 'Сообщение отправлено.',
						text: 'Спасибо за отзыв',
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