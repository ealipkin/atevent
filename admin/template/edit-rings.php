<h2>Добавить обручальное кольцо</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Имя
				</div>
				<input type="text" name="name" value="" data-type="name" class="need-validate need-add">

				<div class="edit-block-label">
					Сайт (шаблон - <br><span class="add-tpl">http://www.7svadeb.ru</span>)
				</div>
				<input type="text" name="site" value="" data-type="site" class="need-add">

				<div class="edit-block-label">
					Телефон
				</div>
				<input type="text" name="contacts" value="" data-type="contacts" class="need-add">
				
				<div class="edit-block-label">
					Адрес
				</div>
				<input type="text" name="adress" value="" data-type="adress" class="need-add">

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
<h2>Редактирование информации о обручальных кольцах</h2>
<input type="hidden" class="edit-table-type" data-table="rings">
<?=getRingsEdit()?>

<script>
	(function(){
		universalAddHandler();
		infoEditor();
	})();
</script>