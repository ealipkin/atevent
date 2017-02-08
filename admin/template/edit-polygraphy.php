<h2>Полиграфия</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
		    
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Имя
				</div>
				<input type="text" name="name" value="" data-type="name" class="need-validate need-add">

				<div class="edit-block-label">
					Описание
				</div>
				<input type="text" name="desc" value="" data-type="desc" class="need-add">

				<div class="edit-block-label">
					Сайт (<span class="add-tpl">http://www.site.ru</span>)
				</div>
				<input type="text" name="site" value="" data-type="site" class="need-add">
				
			</div>
			

			<div class="edit-block column col-3 clearfix">
			
				
				<div class="edit-block-label">
					Вконтакте
				</div>
				<input type="text" name="vk" value="" data-type="vk" class="need-add">
				
				
				<div class="edit-block-label">
					Телефон
				</div>
				<input type="text" name="contacts" value="" data-type="contacts" class="need-add">


				<div class="edit-block-label">
					Показывать на сайте
					<br>  
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
<h2>Редактирование информации о услугах полиграфии</h2>
<input type="hidden" class="edit-table-type" data-table="polygraphy">
<?=getPolygraphyEdit()?>

<script>
	(function(){
		universalAddHandler();
		infoEditor();
	})();
</script>