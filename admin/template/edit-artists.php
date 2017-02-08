<h2>Добавить нового артиста</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Название (имя артиста)
				</div>
				<input type="text" name="name" value="" data-type="name">

				
				<div class="edit-block-label">
					Цена (шаблон - '<span class="add-tpl">от 20000 руб.</span>')
				</div>
				<input type="text" name="price" value="" data-type="price">

				<div class="edit-block-label">
					Количество фотографий
				</div>
				<input type="text" name="photo-count" value="" data-type="photo-count">
			
			</div>
			<div class="edit-block column col-3 clearfix">
			
				<div class="edit-block-label">
					Тип артиста
				</div>
				<input type="text" name="type" value="" data-type="type">
			
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
<h2>Редактирование информации о артистах</h2>

<div>
	<h4>Артист месяца</h4>
	<div class="ajax-cont">
		<div class="clearfix">
			<?=getArtistsList()?>
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

<?=getArtistBlockEdit()?>
<script>
	(function(){
		adtistAdd();
		infoEditor();
		prizeChange();
	})();
</script>