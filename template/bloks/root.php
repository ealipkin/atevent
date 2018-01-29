<?php
$scripts = '';
$styles = '';
$slider = 0;
$TITLE = "Академия Торжеств :: ";
$landing = 0;

//Подключение слайдера
$slider_inc = "";

//Путь к слайдеру
$slider_path = 'bloks/slider.php';
$leftmenu_path = 'bloks/leftmenu.php';
$menu_path = 'bloks/menu.php';
$menu_hide = 'bloks/menuhide.php';
//*******************************************************************************

switch ($_URLP) {
    case 'contacts':
        $TITLE .= 'Контакты';
        $file = 'bloks/contacts.php';
        $slider = 1;
        $styles = '';
        $description ='';
        $keywords = '';
        break;

    case 'sendmail':
        $TITLE .= 'Написать письмо';
        $file = 'bloks/sendmail.php';
        $slider = 1;
        $styles = '';
        $scripts .= '<script src="/js/Gritter/js/jquery.gritter.js"></script>';
        $description ='';
        $keywords = '';
        break;

    case 'price':
        $TITLE .= 'Цены';
        $file = 'bloks/price.php';
        $slider = 1;
        $styles = '';
        $scripts = '';
        $description ='';
        $keywords = '';
        break;

    case 'our-price':
        $TITLE .= 'Цены';
        $file = 'bloks/our-price.php';
        $slider = 1;
        $styles = '';
        $scripts = '';
        $description ='';
        $keywords = '';
        break;

    case 'reviews':
        $TITLE .= 'Отзывы о нас';
        $file = 'bloks/reviews.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'decorate':
        $TITLE .= 'Оформление праздника';
        $file = 'bloks/decorate.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'dec_auto':
        $TITLE .= 'Украшение автомобилей';
        $file = 'bloks/decorate/auto.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'dec_hall':
        $TITLE .= 'Оформление зала';
        $file = 'bloks/decorate/hall.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'dec_reg':
        $TITLE .= 'Оформление выездной регистрации';
        $file = 'bloks/decorate/reg.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'dec_bubbles':
        $TITLE .= 'Фигуры из шаров';
        $file = 'bloks/decorate/bubbles.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'author_services':
        $TITLE .= 'Авторские услуги';
        $file = 'bloks/author_services.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'artists':
        $TITLE .= 'Артисты';
        $file = 'bloks/artists.php';
        $slider = 1;
        $menuhide = 0;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'photographs':
        $TITLE .= 'Фотографы';
        $file = 'bloks/photographs.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'videographs':
        $TITLE .= 'Видеооператоры';
        $file = 'bloks/videographs.php';
        $slider = 1;
        $styles = '<link href="/css/fb-hidearrow.css" rel="stylesheet">';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'style_wedding':
        $TITLE .= 'Стилизованная свадьба';
        $file = 'bloks/style_wedding.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'accessories':
        $TITLE .= 'Свадебные аксессуары';
        $file = 'bloks/accessories.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_wedding':
        $TITLE .= 'Свадебные аксессуары';
        $file = 'bloks/accessorises/wedacc.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_fotozone':
        $TITLE .= 'Фотозоны';
        $file = 'bloks/accessorises/fotozone.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_sweets':
        $TITLE .= 'Сладкий стол';
        $file = 'bloks/accessorises/sweets.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_renta':
        $TITLE .= 'Аренда реквизитов';
        $file = 'bloks/accessorises/renta.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_glass':
        $TITLE .= 'Оформление бокалов и бутылок';
        $file = 'bloks/accessorises/glass.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_invites':
        $TITLE .= 'Изготовление приглашений и конвертов';
        $file = 'bloks/accessorises/invites.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_sitcards':
        $TITLE .= 'Изготовление рассадочных карточек';
        $file = 'bloks/accessorises/sitcards.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'acc_other':
        $TITLE .= 'Изготовление прочих аксессуаров';
        $file = 'bloks/accessorises/other.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'cakes':
        $TITLE .= 'Свадебные торты';
        $file = 'bloks/cakes.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'auto':
        $TITLE .= 'Прокат автомобилей';
        $file = 'bloks/auto.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'flowers':
        $TITLE .= 'Свадебная флористика';
        $file = 'bloks/flowers.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'advice':
        $TITLE .= 'Советы молодоженам';
        $file = 'bloks/advice.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'partners':
        $TITLE .= 'Сотрудничество';
        $file = 'bloks/partners.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'about':
        $TITLE .= 'О нас';
        $file = 'bloks/about.php';
        $slider = 1;
        $landing = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'places':
        $TITLE .= 'Места проведения';
        $file = 'bloks/places.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'original_service':
        $TITLE .= 'Оригинальные услуги';
        $file = 'bloks/original_service.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'firework':
        $TITLE .= 'Праздничный фейерверк';
        $file = 'bloks/firework.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'at':
        $TITLE = 'Ведущие на праздники и корпоративы в Челябинске Андрей и Татьяна';
        $file = 'bloks/at.php';
        $slider = 0;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case 'wedding':
        $TITLE = 'Ведущие на садьбу в Челябинске Андрей и Татьяна';
        $file = 'bloks/wedding.php';
        $slider = 0;
        $landing = 1;
        $description = '
            <meta name="Description" content="Ведущие на садьбу в Челябинске Андрей и Татьяна от агенства «Академия Торжеств». Нет ничего невозможно - Ваши желания должны исполняться!">
        ';
        $keywords = '';
        break;

    case 'weddingbattle':
        $TITLE = 'Тамада на свадьбы и юбилей в Челябинске - WEDDINGBATTLE';
        $file = 'bloks/weddingbattle.php';
        $slider = 0;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case 'other_services':
        $TITLE .= 'Другие услуги';
        $file = 'bloks/other_services.php';
        $slider = 1;
        $landing = 0;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'os_horse':
        $TITLE .= 'Конные услуги';
        $file = 'bloks/os/horse.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'os_yacht':
        $TITLE .= 'Прогулка на яхте';
        $file = 'bloks/os/yacht.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'os_balloon':
        $TITLE .= 'Полет на воздушном шаре';
        $file = 'bloks/os/balloon.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'os_plane':
        $TITLE .= 'Аренда самолета, вертолета';
        $file = 'bloks/os/plane.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'os_parachute':
        $TITLE .= 'Прыжок с парашютом';
        $file = 'bloks/os/parachute.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'photo_places':
        $TITLE .= 'Свадебная флористика';
        $file = 'bloks/photo_places.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'wedding_dress':
        $TITLE .= 'Свадебные платья';
        $file = 'bloks/fashion/dress.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'man_outfit':
        $TITLE .= 'Костюмы для жениха';
        $file = 'bloks/fashion/man_outfit.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'hair_makeup':
        $TITLE .= 'Прическа и макияж';
        $file = 'bloks/fashion/hair_makeup.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'rings':
        $TITLE .= 'Обручальные кольца';
        $file = 'bloks/fashion/rings.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'salut':
        $TITLE .= 'Праздничный салют';
        $file = 'bloks/fireworks/salut.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'fire_fountains':
        $TITLE .= 'Дорожки из фонтанов';
        $file = 'bloks/fireworks/fire_fountains.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'fire_sings':
        $TITLE .= 'Дорожки из фонтанов';
        $file = 'bloks/fireworks/fire_sings.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'day_salut':
        $TITLE .= 'Дневные салюты';
        $file = 'bloks/fireworks/day_salut.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'tech_sound':
        $TITLE .= 'Техническое оснащение : Звуковое';
        $file = 'bloks/tech/tech_sound.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'tech_light':
        $TITLE .= 'Техническое оснащение : Световое';
        $file = 'bloks/tech/tech_light.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'tech_video':
        $TITLE .= 'Техническое оснащение : Видео';
        $file = 'bloks/tech/tech_video.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'tech_effects':
        $TITLE .= 'Техническое оснащение : Спецэффекты';
        $file = 'bloks/tech/tech_effects.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'fun':
        $TITLE .= 'Развлечения';
        $file = 'bloks/fun.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'polygraphy':
        $TITLE .= 'Полиграфия';
        $file = 'bloks/polygraphy.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'souvenirs':
        $TITLE .= 'Подарки и сувениры';
        $file = 'bloks/souvenirs.php';
        $slider = 1;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'test':
        $TITLE .= 'Тестовая страница';
        $file = 'bloks/test.php';
        $adaptive = 1;
        $slider = 1;
        $landing = 0;
        $description ='';
        $keywords = '';
        break;

    case 'search':
        $TITLE .= 'Поиск по сайту';
        $file = 'bloks/search.php';
        $slider = 0;
        $styles = '';
        $scripts .= '';
        $description ='';
        $keywords = '';
        break;

    case 'we-perform-official':
        $TITLE .= 'Проведение свадебных торжеств';
        $file = 'bloks/we-perform/official.php';
        $slider = 1;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case 'we-perform-birthday':
        $TITLE .= 'Проведение дней рождений и юбилеев';
        $file = 'bloks/we-perform/birthday.php';
        $slider = 1;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case 'we-perform-corporate':
        $TITLE .= 'Проведение корпоративных мероприятий и вечерино';
        $file = 'bloks/we-perform/corporate.php';
        $slider = 1;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case 'we-perform-graduation':
        $TITLE .= 'Проведение корпоративных мероприятий и вечеринок';
        $file = 'bloks/we-perform/graduation.php';
        $slider = 1;
        $landing = 1;
        $description ='';
        $keywords = '';
        break;

    case '':
        $TITLE .= "Главная страница";
        $slider = 1;
        $file = 'bloks/main.php';
        $description ='';
        $keywords = '';
        break;


    default:
        $TITLE .= "Страница не найдера";
        $slider = 1;
        $file = 'bloks/404.php';

}
?>