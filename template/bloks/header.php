<header id="main-header" class="page-header clearfix">
    <div class="header-left">
        <div>
            <ul>
                <li class="icon icon-about"><a href="about">О нашем агенстве</a></li>
                <li class="icon icon-phone"><a href="#" class="popup-link dashed" data-link="popup-callback">Заказать
                        обратный звонок</a></li>
                <li class="icon icon-mail"><a href="#" class="popup-link dashed" data-link="popup-mail">Написать нам</a>
                </li>
            </ul>
        </div>
        <div style="display: none">test</div>
        <div class="serach-form ya-site-form ya-site-form_inited_no"
             onclick="return {'action':'/search','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск at-event','suggest':true,'target':'_self','tld':'ru','type':3,'usebigdictionary':true,'searchid':2205509,'webopt':false,'websearch':false,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'Поиск','input_placeholderColor':'#cccccc','input_borderColor':'#ffffff'}">
            <form action="http://yandex.ru/sitesearch" method="get" target="_self">
                <input type="hidden" name="searchid" value="2205509"/>
                <input type="hidden" name="l10n" value="ru"/>
                <input type="hidden" name="reqenc" value=""/>
                <input type="search" name="text" value=""/>
            </form>
        </div>
    </div>
    <div class="header-center">
        <?= ('/' == $_SERVER["REQUEST_URI"]) ? '' : '<a href="/" >' ?>
        <img src="./img/logo-name-pink.png" width="321px">
        <?= ('/' == $_SERVER["REQUEST_URI"]) ? '' : '</a>' ?>
        <h5>Свадебное агенство</h5>
    </div>
    <div class="header-right">
        <h4 style="text-align:right">
            <a href="tel:79823112892" class="phone-link">+7 (982) 311-28-92</a>
        </h4>
        <h6 style="text-align:right">г. Челябинск, ул. Бейвеля, 27</h6>

        <div class="header-social-btn">
            <a class="vk-btn" href="https://vk.com/at.event" target="_blank"></a>
            <a class="youtube-btn" href="https://www.youtube.com/channel/UC676j7XaxvcC2cYz5Ghf6zA"
               target="_blank"></a>
            <a class="insta-btn" href="https://instagram.com/at.event/" target="_blank"></a>
        </div>
    </div>
</header>
<a href='#' class='mobile_menu mobile_menu_first showAllMenu'>Показать меню</a>
<nav class="main-menu">
    <ul>
        <li><a <?= ('/at' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/at"' ?> >
                <div class="main-menu-lead"></div>
                <span>Ведущие</span></a></li>
        <li><a <?= ('/artists' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/artists"' ?>>
                <div class="main-menu-artists"></div>
                <span>Артисты</span></a></li>
        <li><a <?= ('/auto' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/auto"' ?>>
                <div class="main-menu-auto"></div>
                <span>Автомобили</span></a></li>
        <li>
            <a <?= ('/decorate' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/decorate"' ?>>
                <div class="main-menu-decorate"></div>
                <span>Оформление</span></a></li>
        <li>
            <a <?= ('/photographs' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/photographs"' ?>>
                <div class="main-menu-photo"></div>
                <span>Фото/видео</span></a></li>
        <li><a <?= ('/cakes' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/cakes"' ?>>
                <div class="main-menu-cakes"></div>
                <span>Торты</span></a></li>
        <li><a <?= ('/places' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/places"' ?>>
                <div class="main-menu-restaraunts"></div>
                <span>Рестораны</span></a></li>
        <li>
            <a <?= ('/other_services' == $_SERVER["REQUEST_URI"]) ? 'class="menu-active" href="#"' : 'href="/other_services"' ?>>
                <div class="main-menu-another"></div>
                <span>Другие услуги</span></a></li>
    </ul>
</nav>
<!-- Модальные окна -->
<div class="popup__overlay popup-callback">
    <div class="popup">
        <a href="#" class="popup__close">X</a>
        <h4>Заказать обратный звонок</h4>

        <p>Мы можем перезвонить в удобное для Вас время<br> и дать консультацию по любому вопросу!</p>

        <form id="form" class="popup-form" data-type="Форма обратного звонка в шапке сайта">
            <div class="form-preloader">
            </div>
            <input class="f-name" type="text" placeholder="Введите ваше имя" name="Имя">
            <input class="f-phone" type="text" placeholder="Введите ваш телефон" name="Телефон">
            <input class="f-mail" type="text" placeholder="Адрес электронной почты" name="Почта">
            <input class="f-time" type="text" placeholder="Время удобное для звонка" name="Время для звонка">
            <button class="popup-callback-btn button">Отправить</button>
            <div class="form-message"></div>
        </form>
    </div>
</div>

<div class="popup__overlay popup-mail">
    <div class="popup">
        <a href="#" class="popup__close">X</a>
        <h4>Напишите нам!</h4>

        <p>У вас есть вопросы? Мы с радостью ответим на них!</p>

        <form id="form" class="popup-form" data-type="Форма напишите мне в шапке сайта">
            <div class="form-preloader">
            </div>
            <input class="f-name" type="text" placeholder="Введите ваше имя" name="Имя" required="" minlength="1">
            <input class="f-mail" type="text" placeholder="Адрес электронной почты" name="Почта">
            <textarea class="f-text" type="text" placeholder="Текст сообщения" name="Текст сообщения"></textarea>
            <button class="popup-mailme-btn button">Отправить</button>
            <div class="form-message"></div>
        </form>
    </div>
</div>