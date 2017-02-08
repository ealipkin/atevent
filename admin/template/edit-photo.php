<h2>Добавить нового фотографа</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Имя
				</div>
				<input type="text" name="name" value="" data-type="name">

				<div class="edit-block-label">
					Сайт (шаблон - <br><span class="add-tpl">http://ufimcev.com</span>)
				</div>
				<input type="text" name="site" value="" data-type="site">

				<div class="edit-block-label">
					Номер телефона<br>(шаблон - <span class="add-tpl">7(903)577-78-98</span>)
				</div>
				<input type="text" name="phone" value="" data-type="phone">

			</div>
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Цена (шаблон - '<span class="add-tpl">24000</span>')
				</div>
				<input type="text" name="price" value="" data-type="price">

				<div class="edit-block-label">
					Вконтакте (шаблон - <br><span class="add-tpl">http://vk.com/profoto74</span>)
				</div>
				<input type="text" name="vkpage" value="" data-type="vkpage">
			<br><br><br>
				<div class="edit-block-label">
					Показывать на сайте
				</div>
				<select name="moderate" data-type="moderate">
					<option value="0">Да</option>
					<option value="1" selected>Нет</option>
				</select>

			</div>
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Описание
				</div>
				<textarea name="description" data-type="desc"></textarea>
			</div>
		</div>
	</form>
	<div>
		<h4 class="add-warning"></h4>
	</div>
	<button type="button" class="add-artist-btn">Добавить</button>
</div>
<h2>Редактирование информации о фотографах</h2>
<div>
	<h4>Фотограф месяца</h4>
	<div class="ajax-cont">
		<div class="clearfix">
			<?=getPhotographsList()?>
			<div class="prize-select__btn-cont">
				<a href="#" class="button prize-btn" alt="Сохранить">
					<img class="btn-img" src="/img/save-btn.png" alt="">
					<img class="btn-preloader" src="/img/adm-btn-preloader.gif" alt="">
				</a>
			</div>
		</div>
		<div class="ajax-info"></div>
	</div>
</div>
<?=getPhotographsBlockEdit()?>
<script>
	(function(){
		photoAdd();
		infoEditor();
		prizeChange();
	})();
</script>