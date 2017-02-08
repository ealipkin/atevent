<h2>Добавить новый ресторан</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Название
				</div>
				<input type="text" name="name" value="" data-type="name" class="need-add">

				<div class="edit-block-label">
					Номер телефона<br>(шаблон - <span class="add-tpl">7(903)577-78-98</span>)
				</div>
				<input type="text" name="phone" value="" data-type="phone" class="need-add">

				<div class="edit-block-label">
					 Адрес
				</div>
				<input type="text" name="adress" value="" data-type="adress" class="need-add">

			</div>
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					E-mail
				</div>
				<input type="text" name="email" value="" data-type="email" class="need-add">

				<div class="edit-block-label">
					Сайт (шаблон - <br><span class="add-tpl">http://www.site.ru</span>)
				</div>
				<input type="text" name="site" value="" data-type="site" class="need-add">
			<br><br>
				<div class="edit-block-label">
					Показывать на сайте
				</div>
				<select name="moderate" data-type="moderate" class="need-add">
					<option value="0">Да</option>
					<option value="1" selected>Нет</option>
				</select>

			</div>
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Описание
				</div>
				<textarea name="description" data-type="desc" class="need-add"></textarea>
			</div>
		</div>
	</form>
	<div>
		<h4 class="add-warning"></h4>
	</div>
	<button type="button" class="add-artist-btn">Добавить</button>
</div>
<h2>Редактирование информации о ресторанах</h2>
<input type="hidden" class="edit-table-type" data-table="places">

<div>
	<h4>Ресторан месяца</h4>
	<div class="ajax-cont">
		<div class="clearfix">
			<?=getList('places')?>
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

<?=getPlacesBlockEdit()?>
<script>
	(function(){
		universalAddHandler();
		infoEditor();
		prizeChange();
	})();
</script>