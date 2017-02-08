<div class="menu-button"><a id="menu-show" class="btn btn-primary">Показать меню</a></div>
<div class="wrapper-menu-hide hide-handler">
	<a href="/accessories" class="thumbnail main-menu-el m-acc hide-handler" title="Аксессуары">
		<img src="/img/menu_icon/accessorise.png" alt="" class="hide-handler">
		<h7 class="menu-btn hide-handler">Свадебные аксессуары</h7>
	</a>
	<a href="/decorate" class="thumbnail main-menu-el m-dec" title="Оформление праздника">
	  	<img src="/img/menu_icon/decorate.png" alt="">
		<h7 class="menu-btn">Оформление праздника</h7>
	</a>
	<a href="/artists" class="thumbnail main-menu-el m-artist" title="Артисты">
	  	<img src="/img/menu_icon/artists.png" alt="">
		<h7 class="menu-btn">Артисты</h7>
	</a>
	<a href="/photographs" class="thumbnail main-menu-el m-pht" title="Услуги фотографов">
	  	<img src="/img/menu_icon/camera.png" alt="">
		<h7 class="menu-btn">Фотографы</h7>
	</a>
	<a href="/videographs" class="thumbnail main-menu-el m-vid" title="Услуги видеооператоров">
		<img src="/img/menu_icon/cinema.png" alt="">
		<h7 class="menu-btn">Видеооператоры</h7>
	</a>
	<a href="/custom" class="thumbnail main-menu-el m-cust" title="Авторские услуги">
	  	<img src="/img/menu_icon/autors.png" alt="">
		<h7 class="menu-btn">Авторские услуги</h7>
	</a>
	<a href="/cakes" class="thumbnail main-menu-el m-cake" title="Торты">
	  	<img src="/img/menu_icon/cakes.png" alt="">
		<h7 class="menu-btn">Изготовление тортов</h7>
	</a>
	<a href="/auto" class="thumbnail main-menu-el m-auto" title="Прокат автомобилей">
	  	<img src="/img/menu_icon/auto.png" alt="">
		<h7 class="menu-btn">Прокат автомобилей</h7>
	</a>
	<a href="/flowers" class="thumbnail main-menu-el m-flw" title="Свадебная флористика">
	  	<img src="/img/menu_icon/flowers.png" alt="">
		<h7 class="menu-btn">Свадебная флористика</h7>
	</a>
	<a href="/places" class="thumbnail main-menu-el m-places" title="Места проведения">
	  	<img src="/img/menu_icon/restaurant.png" alt="">
		<h7 class="menu-btn">Места проведения</h7>
	</a>
	<a href="/advice" class="thumbnail main-menu-el m-adv" title="Советы молодоженам">
	  	<img src="/img/menu_icon/advice.png" alt="">
		<h7 class="menu-btn">Советы молодоженам</h7>
	</a>
	<a href="/partners" class="thumbnail main-menu-el m-ptn" title="Советы молодоженам">
	  	<img src="/img/menu_icon/partners.png" alt="">
		<h7 class="menu-btn">Сотрудничество</h7>
	</a>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#menu-show').click(function(){
			if($('.wrapper-menu-hide').css('display') == 'none'){
				$('.wrapper-menu-hide').slideDown('400');
			}
			else{
				$('.wrapper-menu-hide').slideUp('400');
			}
			//if($('.wrapper-menu-hide').hasClass('open') == false){setTimeout(function(){$('.wrapper-menu-hide').slideUp('400');},4000);}
		});
		/*$('.wrapper-menu-hide').mouseleave(function(){
				setTimeout(function(){
						$('.wrapper-menu-hide').slideUp('400');
				},2000);
		});*/
	});
</script>