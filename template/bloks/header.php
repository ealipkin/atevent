<header class="main-header page-layout">
    <div class="main-header__left">
        <ul>
            <li><a href="about">О нашем агенстве
                </a>
            </li>
            <li><a class="popup-link dashed" href="" data-link="popup-callback">
                    Заказать
                    обратный звонок
                </a>
            </li>
            <li><a class="popup-link dashed" href="" data-link="popup-mail">Написать нам
                </a>
            </li>
        </ul>
        <div class="main-header__search">
            <div class="serach-form ya-site-form ya-site-form_inited_no"
                 onclick="return {'action':'/search','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск at-event','suggest':true,'target':'_self','tld':'ru','type':3,'usebigdictionary':true,'searchid':2205509,'webopt':false,'websearch':false,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'Поиск','input_placeholderColor':'#cccccc','input_borderColor':'#ffffff'}">
                <form action="http://yandex.ru/sitesearch" method="get" target="_self">
                    <input type="hidden" name="searchid" value="2205509">
                    <input type="hidden" name="l10n" value="ru">
                    <input type="hidden" name="reqenc" value="">
                    <input type="search" name="text" value="">
                </form>
            </div>
        </div>
    </div>
    <div class="main-header__center">
        <?= ('/' == $_SERVER["REQUEST_URI"]) ? '<span>' : '<a href="/" >' ?>
        <img src="./img/logo-name-pink.png">
        <?= ('/' == $_SERVER["REQUEST_URI"]) ? '</span>' : '</a>' ?>
        <h5>Свадебное агенство</h5>
    </div>
    <div class="main-header__right">
        <h4><a class="phone-link" href="tel:79823112892">+7 (982) 311-28-92</a></h4>
        <h6>г. Челябинск, ул. Бейвеля, 27</h6>
        <div class="main-header__socials socials"><a class="socials__link socials__link_vk"
                                                     href="https://vk.com/at.event" target="_blank"></a><a
                    class="socials__link socials__link_youtube"
                    href="https://www.youtube.com/channel/UC676j7XaxvcC2cYz5Ghf6zA" target="_blank"></a><a
                    class="socials__link socials__link_insta" href="https://instagram.com/at.event/"
                    target="_blank"></a></div>
    </div>
</header>
<span class="mobile_menu mobile_menu_first showAllMenu">Показать меню</span>

<nav class="main-nav page-layout">
    <ul class="main-nav__inner">
        <li class="main-nav__item">
            <a class="main-nav__link" href="/at">

                <a <?= ('/at' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/at"' ?> >
                    <span class="main-nav__image main-menu-lead"></span><span>Ведущие</span>
                </a>
        </li>
        <li class="main-nav__item">
            <a <?= ('/artists' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/artists"' ?>>
                <span class="main-nav__image main-menu-artists"></span><span>Артисты</span>
            </a>
        </li>
        <li class="main-nav__item">

            <a <?= ('/auto' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/auto"' ?>>
                <span class="main-nav__image main-menu-auto"></span><span>Автомобили</span>
            </a>
        </li>
        <li class="main-nav__item">

            <a <?= ('/decorate' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/decorate"' ?>>
                <span class="main-nav__image main-menu-decorate"></span><span>Оформление</span>
            </a>
        </li>
        <li class="main-nav__item">

            <a <?= ('/photographs' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/photographs"' ?>>
                <span class="main-nav__image main-menu-photo"></span><span>Фото/видео</span>
            </a>
        </li>
        <li class="main-nav__item">
            <a <?= ('/cakes' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/cakes"' ?>>
                <span class="main-nav__image main-menu-cakes"></span><span>Торты</span>
            </a>
        </li>
        <li class="main-nav__item">

            <a <?= ('/places' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/places"' ?>>
                <span class="main-nav__image main-menu-restaraunts"></span><span>Рестораны</span>
            </a>
        </li>
        <li class="main-nav__item">
            <a <?= ('/other_services' == $_SERVER["REQUEST_URI"]) ? 'class="main-nav__link main-nav__link_active" href=""' : 'href="/other_services"' ?>>
                <span class="main-nav__image main-menu-another"></span><span>Другие услуги</span>
            </a>
        </li>
    </ul>
</nav>
<!-- Модальные окна -->
<div class="popup__overlay popup-callback">
    <div class="popup">
        <a href="" class="popup__close">X</a>
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
        <a href="" class="popup__close">X</a>
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