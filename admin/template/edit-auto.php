<?php
	$auto_type = getAutosType();
	
	foreach ($auto_type as $key_type => $value_type) {
	    $options_type .= '<option value="'.$value_type['name'].'" '.$type_checked.'>'.$value_type['name'].'</option>';
	}

?>

<h2>Добавить нового автомобиля</h2>
<div class="">
	<form class="add-form">
		<div class="edit-info-block clearfix">
			<div class="edit-block column col-3 clearfix">
				<div class="edit-block-label">
					Название
				</div>
				<input type="text" name="name" value="" data-type="name">

				<div class="edit-block-label">
					Цена (шаблон - '<span class="add-tpl">1400 руб/ч</span>')
				</div>
				<input type="text" name="price" value="" data-type="price">

				<div class="edit-block-label">
					Показывать на сайте
				</div>
				<select name="moderate" data-type="moderate">
					<option value="0">Да</option>
					<option value="1" selected>Нет</option>
				</select>

				<div class="edit-block-label">
					Тип автомобиля
				</div>
				<select name="type" data-type="type">
				    <?=$options_type?>
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
<h2>Редактирование информации о автомобилях</h2>
<div>
	<h4>Авто месяца</h4>
	<div class="ajax-cont">
		<div class="clearfix">
			<?=getList('autos')?>
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
<?=getAutosBlockEdit()?>
<script>
	(function(){
		autoAdd();
		infoEditor();
		prizeChange();
	})();
</script>