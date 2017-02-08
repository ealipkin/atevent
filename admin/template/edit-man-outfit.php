<h2>Добавить новый мужской наряд</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Имя
				</div>
				<input type="text" name="name" value="" data-type="name" class="need-validate">

				<div class="edit-block-label">
					Сайт (шаблон - <br><span class="add-tpl">http://www.7svadeb.ru</span>)
				</div>
				<input type="text" name="site" value="" data-type="site">

				<div class="edit-block-label">
					Предоставляемые услуги
				</div>
				<input type="text" name="service_type" value="" data-type="service_type" class="need-validate">

			</div>
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Контакты
				</div>
				<input type="text" name="contacts" value="" data-type="contacts">

				<div class="edit-block-label">
					Вконтакте (шаблон - <br><span class="add-tpl">http://vk.com/profoto74</span>)
				</div>
				<input type="text" name="vk" value="" data-type="vk">
				<div class="edit-block-label">
					Показывать на сайте
				</div>
				<select name="moderate" data-type="moderate">
					<option value="0">Да</option>
					<option value="1" selected>Нет</option>
				</select>

			</div>
		</div>
	</form>
	<div>
		<h4 class="add-warning"></h4>
	</div>
	<button type="button" class="add-artist-btn">Добавить</button>
</div>
<h2>Редактирование информации о мужских нарядах</h2>
<input type="hidden" class="edit-table-type" data-table="man_outfit">
<?=getManOutfitBlockEdit()?>

<script>
	(function(){
		weddingDressAdd();
		infoEditor();
	})();
</script>