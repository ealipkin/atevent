<style>
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
    display: block;
}
.mobile_menu {
    display: none;
}
body {
    line-height: 1;
}

ol, ul {
    list-style: none;
}

blockquote, q {
    quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content: '';
    content: none;
}

/*
table {
border-collapse: collapse;
border-spacing: 0; }
*/
.clearfix:before,
.clearfix:after {
    content: "";
    display: table;
}

.clearfix:after {
    clear: both;
}

.clearfix {
    zoom: 1; /* Хак для IE 6 и 7 */
}

/* #Basic Styles
================================================== */
body {
    background: #fff;
    font: 14px/21px "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #444;
    -webkit-font-smoothing: antialiased; /* Fix for webkit rendering */
    -webkit-text-size-adjust: 100%;
}

.ta-c {
    text-align: center;
}

.image-block {
    display: block;
    width: 100%;
    margin: 0 auto;
    text-align: center;
}

.image-block--left {
    padding-top: 6px;
    display: block;
    float: left;
    margin: 0 15px 0 0;
}

.image-block--left img, .image-block--right img {
    width: 200px;
}

.image-block--right {
    float: right;
    padding-top: 6px;
    display: block;
    margin: 0 0 0 15px;
}

/* #Typography
================================================== */
h1, h2, h3, h4, h5, h6 {
    color: #ff3468;
    font-family: "Georgia", "Times New Roman", serif;
    font-weight: normal;
}

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
    font-weight: inherit;
}

h1 {
    font-size: 46px;
    line-height: 50px;
    margin-bottom: 14px;
}

h2 {
    font-size: 35px;
    line-height: 40px;
    margin-bottom: 10px;
}

h3 {
    font-size: 28px;
    line-height: 34px;
    margin-bottom: 20px;
}

h4 {
    font-size: 21px;
    line-height: 30px;
    margin-bottom: 4px;
}

h5 {
    font-size: 17px;
    line-height: 24px;
}

h6 {
    font-size: 14px;
    line-height: 21px;
}

.subheader {
    color: #777;
}

p {
    margin: 0 0 20px 0;
}

p img {
    margin: 0;
}

p.lead {
    font-size: 21px;
    line-height: 27px;
    color: #777;
}

em {
    font-style: italic;
}

strong {
    font-weight: bold;
    color: #333;
}

small {
    font-size: 80%;
}

/*	Blockquotes  */
blockquote, blockquote p {
    font-size: 17px;
    line-height: 24px;
    color: #777;
    font-style: italic;
}

blockquote {
    margin: 0 0 20px;
    padding: 9px 20px 0 19px;
    border-left: 1px solid #ddd;
}

blockquote cite {
    display: block;
    font-size: 12px;
    color: #555;
}

blockquote cite:before {
    content: "\2014 \0020";
}

blockquote cite a, blockquote cite a:visited, blockquote cite a:visited {
    color: #555;
}

hr {
    border: solid #ddd;
    border-width: 1px 0 0;
    clear: both;
    margin: 10px 0 15px;
    height: 0;
}

/* #Links
================================================== */
a {
    color: #ff3468;
    text-decoration: underline;
    outline: 0;
}

a:visited {
    color: #da5775;
    text-decoration: underline;
    outline: 0;
}
.popup-link:visited {
    color: #ff3468;
}

a:hover {
    color: #00c08c;
    text-decoration: none;
}

.dashed-link {
    text-decoration: none;
    position: relative;
}

.dashed-link:visited {
    color: #ff3468;
}

.dashed-link:after {
    content: '';
    width: 100%;
    border-bottom: 1px dashed rgb(255, 52, 104);
    position: absolute;
    left: 0;
    bottom: 0;
}

.dashed-link:hover:after {
    content: '';
    border: none;
}

p a, p a:visited {
    line-height: inherit;
}

/* #Lists
================================================== */
ul, ol {
    margin-bottom: 20px;
}

ul {
    list-style: none outside;
}

.ul {
    list-style: outside url(/img/li-pink.png);
    padding-left: 25px;
}

ol {
    list-style: decimal;
}

ol, ul.square, ul.circle, ul.disc {
    margin-left: 30px;
}

ul.square {
    list-style: square outside;
}

ul.circle {
    list-style: circle outside;
}

ul.disc {
    list-style: disc outside;
}

ul ul, ul ol,
ol ol, ol ul {
    margin: 4px 0 5px 30px;
    font-size: 90%;
}

ul ul li, ul ol li,
ol ol li, ol ul li {
    margin-bottom: 6px;
}

li {
    line-height: 18px;
    margin-bottom: 12px;
}

ul.large li {
    line-height: 21px;
}

li p {
    line-height: 21px;
}

/* #Images
================================================== */

img.scale-with-grid {
    max-width: 100%;
    height: auto;
}

/* #Icons
================================================== */

.icon-phone {
    /*
            padding-left: 15px;
            background: url('../img/icons/icon-phone.png') no-repeat 0 50%; */
}

.icon-mail {
    /*
            padding-left: 15px;
            background: url('../img/icons/icon-mail.png') no-repeat 0 50%; */
}

.icon-about {
    /*
            padding-left: 15px;
            background: url('../img/icons/about.png') no-repeat 0 50%; */
}

/* #Buttons
================================================== */

.button,
.button:visited,
button,
input[type="submit"],
input[type="reset"],
input[type="button"] {
    background: #FF3467; /* Old browsers */
    background: #FF3467 -moz-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* FF3.6+ */
    background: #FF3467 -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, .2)), color-stop(100%, rgba(0, 0, 0, .2))); /* Chrome,Safari4+ */
    background: #FF3467 -webkit-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* Chrome10+,Safari5.1+ */
    background: #FF3467 -o-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* Opera11.10+ */
    background: #FF3467 -ms-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* IE10+ */
    background: #FF3467 linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* W3C */
    border: 1px solid #A61136;
    border-top: 1px solid #A61136;
    border-left: 1px solid #A61136;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    text-shadow: 0 1px rgba(0, 0, 0, .75);
    cursor: pointer;
    margin-bottom: 20px;
    line-height: normal;
    padding: 8px 10px;
    font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
}

.button:hover,
button:hover,
input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover {
    color: #eee;
    background: #FF3467; /* Old browsers */
    background: #FF3467 -moz-linear-gradient(top, rgba(255, 255, 255, .3) 0%, rgba(0, 0, 0, .3) 100%); /* FF3.6+ */
    background: #FF3467 -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, .3)), color-stop(100%, rgba(0, 0, 0, .3))); /* Chrome,Safari4+ */
    background: #FF3467 -webkit-linear-gradient(top, rgba(255, 255, 255, .3) 0%, rgba(0, 0, 0, .3) 100%); /* Chrome10+,Safari5.1+ */
    background: #FF3467 -o-linear-gradient(top, rgba(255, 255, 255, .3) 0%, rgba(0, 0, 0, .3) 100%); /* Opera11.10+ */
    background: #FF3467 -ms-linear-gradient(top, rgba(255, 255, 255, .3) 0%, rgba(0, 0, 0, .3) 100%); /* IE10+ */
    background: #FF3467 linear-gradient(top, rgba(255, 255, 255, .3) 0%, rgba(0, 0, 0, .3) 100%); /* W3C */
    border: 1px solid #BF4D6A;
    border-top: 1px solid #BF4D6A;
    border-left: 1px solid #BF4D6A;
}

.button:active,
button:active,
input[type="submit"]:active,
input[type="reset"]:active,
input[type="button"]:active {
    border: 1px solid #666;
    background: #FF3467; /* Old browsers */
    background: #FF3467 -moz-linear-gradient(top, rgba(255, 255, 255, .35) 0%, rgba(0, 0, 0, .4) 100%); /* FF3.6+ */
    background: #FF3467 -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, .35)), color-stop(100%, rgba(0, 0, 0, .4))); /* Chrome,Safari4+ */
    background: #FF3467 -webkit-linear-gradient(top, rgba(255, 255, 255, .35) 0%, rgba(0, 0, 0, .4) 100%); /* Chrome10+,Safari5.1+ */
    background: #FF3467 -o-linear-gradient(top, rgba(255, 255, 255, .35) 0%, rgba(0, 0, 0, .4) 100%); /* Opera11.10+ */
    background: #FF3467 -ms-linear-gradient(top, rgba(255, 255, 255, .35) 0%, rgba(0, 0, 0, .4) 100%); /* IE10+ */
    background: #FF3467 linear-gradient(top, rgba(255, 255, 255, .35) 0%, rgba(0, 0, 0, .4) 100%); /* W3C */
}

.button.full-width,
button.full-width,
input[type="submit"].full-width,
input[type="reset"].full-width,
input[type="button"].full-width {
    width: 100%;
    padding-left: 0 !important;
    padding-right: 0 !important;
    text-align: center;
}

/* Fix for odd Mozilla border & padding issues */
button::-moz-focus-inner,
input::-moz-focus-inner {
    border: 0;
    padding: 0;
}

.button[disabled="disabled"],
button[disabled="disabled"],
.button:hover[disabled="disabled"],
button:hover[disabled="disabled"] {
    opacity: 0.5;
    background: #FF3467; /* Old browsers */
    background: #FF3467 -moz-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* FF3.6+ */
    background: #FF3467 -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, .2)), color-stop(100%, rgba(0, 0, 0, .2))); /* Chrome,Safari4+ */
    background: #FF3467 -webkit-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* Chrome10+,Safari5.1+ */
    background: #FF3467 -o-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* Opera11.10+ */
    background: #FF3467 -ms-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* IE10+ */
    background: #FF3467 linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%); /* W3C */
    border: 1px solid #A61136;
    border-top: 1px solid #A61136;
    border-left: 1px solid #A61136;
    color: #fff;
}

/* #Forms
================================================== */

form {
    margin-bottom: 20px;
}

fieldset {
    margin-bottom: 20px;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="search"],
textarea,
select,
.ya-site-form__input,
.ya-site-form__input-text {
    border: 1px solid #ccc;
    padding: 6px 4px;
    outline: none;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    font: 14px 'Palatino Linotype', 'Book Antiqua', Palatino, serif;;
    color: #777;
    margin: 0;
    width: 190px;
    max-width: 100%;
    display: block;
    margin-bottom: 10px;
    background: #fff;
}

select {
    padding: 0;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="search"]:focus,
textarea:focus,
.ya-site-form__input-text:focus,
.ya-site-form__input:focus {
    border: 1px solid #FF8FAB !important;
    color: #444 !important;
    -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .2) !important;
    -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2) !important;
    box-shadow: 0 0 3px rgba(0, 0, 0, .2) !important;
}

textarea {
    min-height: 60px;
}

label,
legend {
    display: block;
    font-weight: bold;
    font-size: 13px;
}

select {
    width: 220px;
}

input[type="checkbox"] {
    display: inline;
}

label span,
legend span {
    font-weight: normal;
    font-size: 13px;
    color: #444;
}

/* #Misc
================================================== */
.remove-bottom {
    margin-bottom: 0 !important;
}

.half-bottom {
    margin-bottom: 10px !important;
}

.add-bottom {
    margin-bottom: 20px !important;
}

/*---------------------------
Переоформление таблиц
---------------------------*/

.custom-table a:link {
    color: #666;
    font-weight: bold;
    text-decoration: none;
}

.custom-table a:visited {
    color: #999999;
    font-weight: bold;
    text-decoration: none;
}

.custom-table a:active, table a:hover {
    color: #bd5a35;
    text-decoration: underline;
}

.custom-table {
    width: 800px;
    border-spacing: 0;
    font-family: Arial, Helvetica, sans-serif;
    color: #666;
    font-size: 14px;
    text-shadow: 1px 1px 0px #fff;
    background: #eaebec;
    margin: 0 auto;
    border: #ccc 1px solid !important;
    -moz-border-radius: 3px !important;
    -webkit-border-radius: 3px !important;
    border-radius: 3px !important;
    -moz-box-shadow: 0 1px 2px #d1d1d1 !important;
    -webkit-box-shadow: 0 1px 2px #d1d1d1 !important;
    box-shadow: 0 1px 2px #d1d1d1 !important;
}

.custom-table th {
    padding: 21px 25px 22px 25px;
    border-top: 1px solid #fafafa;
    border-bottom: 1px solid #e0e0e0;
    background: #ededed;
    background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
    background: -moz-linear-gradient(top, #ededed, #ebebeb);
}

.custom-table th:first-child {
    text-align: left;
    padding-left: 20px;
}

.custom-table tr:first-child th:first-child {
    -moz-border-radius-topleft: 3px;
    -webkit-border-top-left-radius: 3px;
    border-top-left-radius: 3px;
}

.custom-table tr:first-child th:last-child {
    -moz-border-radius-topright: 3px;
    -webkit-border-top-right-radius: 3px;
    border-top-right-radius: 3px;
}

.custom-table tr {
    text-align: center;
    padding-left: 20px;
}

.custom-table tr td:first-child {
    text-align: left;
    padding-left: 20px;
    border-left: 0;
}

.custom-table tr td {
    padding: 12px;
    border-top: 1px solid #ffffff;
    border-bottom: 1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;
    background: #fafafa;
    background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
    background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}

.custom-table tr.even td {
    background: #f6f6f6;
    background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
    background: -moz-linear-gradient(top, #f8f8f8, #f6f6f6);
}

.custom-table tr:last-child td {
    border-bottom: 0;
}

.custom-table tr:last-child td:first-child {
    -moz-border-radius-bottomleft: 3px;
    -webkit-border-bottom-left-radius: 3px;
    border-bottom-left-radius: 3px;
}

.custom-table tr:last-child td:last-child {
    -moz-border-radius-bottomright: 3px;
    -webkit-border-bottom-right-radius: 3px;
    border-bottom-right-radius: 3px;
}

.custom-table tr:hover td {
    background: #f2f2f2;
    background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
    background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}

/* #Основные стили
==================================================
*/

body {
    background-color: #fce2f3;
    background-image: url(../img/fon-133.jpg);
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    font-size: 14px;
    line-height: 20px;
    color: #333;
}

.layout-positioner {
    padding: 0 20px;
    margin: 0 auto;
}

.container {
    margin: 0 auto;
    width: 940px;
    padding: 0 20px;
    position: relative;
}

.search {
    margin-bottom: 0px;
}

.container > header {
    padding: 10px 20px;
    background-color: #fff;
    border-bottom: 1px solid #e5e5e5;
}

.container > header a {
    font-size: 16px;
}

.container > header li {
    margin-bottom: 5px;
}

.phone-link {
    font-size: 21px;
    text-decoration: none;
    cursor: default;
    color: #ff3468;
}

.phone-link:hover, .phone-link:visited, .phone-link:focus {
    color: #ff3468;
}

.footer .phone-link:hover,
.footer .phone-link:visited,
.footer .phone-link:focus,
.footer .phone-link:active {
    color: #fff;
}
.footer .ya-site-form__input {
    width: 100%;
}

.header-center {
    color: #ff3468 !important;
    margin-bottom: 10px;
}

@media screen and (min-width: 800px) {
    .header-center {
        margin-bottom: 0;
        width: 400px;
        float: left;
    }
}

.header-center h5 {
    text-align: center;
}

.header-center img {
    max-width: 100%;
    display: block;
    margin: 0 auto;
}

.header-right {
    width: 200px;
    float: right;
}

.header-left {
    text-align: center;
    margin-bottom: 15px;
}


@media screen and (min-width: 800px) {
    .header-left {
        width: 250px;
        min-height: 117px;
        float: left;
        text-align: left;
        margin-bottom: 0;
    }
}

.header-left ul {
    margin-bottom: 0px;
}

.info-link {
    margin-right: 10px;
}

.serach-form {
    height: 45px;
}

.review-text {
    font-weight: 600;
    font-size: 1.2em;
    min-height: 3em;
    padding: 30px 30px 40px;
    border-radius: 21px;
    line-height: 1.5em;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(255, 52, 104, 0.9);
    /*white-space: pre-line;*/
}

/*
.review-text:after {
    content: ' ';
    left: 330px;
    position: absolute;
    top: 232px;
    display: block;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 8px 10px 0px 10px;
    border-color: #f06e5c transparent transparent;
}*/
/** Соц сети
====================
**/
.header-social-btn, .footer-social-btn {
    margin-top: 10px;
    position: relative;
    text-align: right;
}

.header-social-btn li, .footer-social-btn li {
    margin: 0;
    padding: 0;
    list-style: none;
    position: absolute;
    top: 0;
}

.header-social-btn a {
    background-color: #ff719a;
    background-size: 70%;
}

.footer-social-btn a {
    background-size: 70%;
}
.header-social-btn a,
.footer-social-btn a {
    height: 33px;
    width: 33px;
    background-repeat: no-repeat;
    display: inline-block;
    border-radius: 5px;
    margin: 0 5px 0 0;
    background-position: center;
}

.header-social-btn a:last-child {
    margin-right: 0;
}

.header-social-btn a:hover,
.footer-social-btn a:hover {
    opacity: 0.8;
}

.vk-btn {
    background-image: url(../img/icons/vk.svg);
}

.youtube-btn {
    background-image: url(../img/icons/youtube.svg);
}

.insta-btn {
    background-image: url(../img/icons/insta.svg);
}

/** Меню  **/
.main-menu {
    width: 900px;
    padding: 10px 0 0;
    height: 150px;
    background: #fff;
    display: none;
    overflow: scroll;
}

.main-menu_show {
    display: block;
}

.main-menu ul {
    display: flex;
}

.main-menu ul, .actions ul {
    text-align: center;
    margin-bottom: 0;
}

.main-menu li {
    padding-left: 7px;
    padding-right: 7px;
}

.main-menu a, .actions a {
    display: block;
    margin: 5px auto 0;
}

.main-menu div {
    width: 100px;
    height: 100px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
    margin: 0 auto 10px;
    box-shadow: inset 0px 0px 20px rgba(0, 0, 0, 0.5);
}

.main-menu li:hover div, .actions li:hover div {
    box-shadow: inset 0px 0px 20px rgba(255, 52, 104, 0.5);
    -moz-transition: all 0.2s 0.06s ease;
    -o-transition: all 0.2s 0.06s ease;
    -webkit-transition: all 0.2s 0.06s ease;
    opacity: 1;
}

.main-menu-artists {
    background: url(../img/menu/artists.png) no-repeat top;
}

.main-menu-lead {
    background: url(../img/menu/lead.png) no-repeat top;
}

.main-menu-auto {
    background: url(../img/menu/auto.png) no-repeat top;
}

.main-menu-decorate {
    background: url(../img/menu/decorate.png) no-repeat top;
}

.main-menu-photo {
    background: url(../img/menu/photo.png) no-repeat top;
}

.main-menu-cakes {
    background: url(../img/menu/cakes.jpg) no-repeat top;
}

.main-menu-firework {
    background: url(../img/menu/firework.png) no-repeat top;
}

.main-menu-restaraunts {
    background: url(../img/menu/restaurant.png) no-repeat top;
}

.main-menu-another {
    background: url(../img/menu/another.png) no-repeat top;
}

.active {
    text-decoration: none;
}

@media screen and (min-width: 800px) {
    .main-menu {
        display: block;
        overflow: visible;
        padding-left: 20px;
        padding-right: 20px;
    }

    .main-menu ul {
        display: block;
    }

    .main-menu li {
        float: left;
        width: 100px;
        margin-right: 14px;
        padding: 0;
    }

    .main-menu li:last-child {
        margin-right: 0;
    }
}

/**  /Меню  **/

.slider-wrapper {
    background: #fff;
    width: 100%;
    height: 310px;
}

/** ФИЛЬТР **/

.content-filter select {
    width: auto;
    display: inline-block;
}

/**
Конент
========================**/

/* Спец. предложения */

.actions {
    width: 880px;
    padding: 10px 20px 0 20px;
    height: 220px;
    background: #fff;
}

.actions li {
    float: left;
    width: 170px;
    margin-right: 60px;
}

.actions li:last-child {
    margin-right: 0;
}

.actions div {
    width: 170px;
    height: 170px;
    margin: 0 auto 10px;
    box-shadow: inset 0px 0px 20px rgba(0, 0, 0, 0.5);
    opacity: 0.8;
}

.action-1 {
    background: url(../img/spec/author.jpg) no-repeat top;
}

.action-2 {
    background: url(../img/spec/places.jpg) no-repeat top;
}

.action-3 {
    background: url(../img/spec/style.jpg) no-repeat top;
}

.action-4 {
    background: url(../img/spec/advice.jpg) no-repeat top;
}

/* ----------------  */
.content {
    background: #fff;
    width: 900px;
    padding: 0 20px 20px;

}

.footer {
    background: #ffbbcd;
    width: 900px;
    height: 120px;
    padding: 20px 20px 40px;
    position: relative;
}

.footer *, .footer a {
    color: #444;
}

.footer li {
    font-size: 12px;
    margin-bottom: 0px;
}

.footer ul {
    float: left;
    margin: 0 20px;
}

.footer > div {
    float: left;
}

.footer > div:last-child {
    float: right;
}

.footer-left {
    color: #fff;
    width: 300px;
}

.footer-right {
    width: 200px;
}
@media screen and (max-width: 800px){
    .phone-link {
        width: 200px;
        text-align: center;
        margin: 7px auto;
        font-size: 18px !important;
    }
    .info-contacts {
        height: auto !important;
    }
    .info-contacts {
        height: auto !important;
        width: auto !important;
    }
    .info-kind-avatar {
        height: auto !important;
        width: 100% !important;
    }
    .info-kind {
        height: auto !important;
        width: auto !important;
    }
    .additional-info {
        float: none !important;
        width:auto !important;
    }
    .info-main {
        width: auto !important;
        height: auto !important;
        float: none !important;
    }
    .add-info-thumbs>a>img {
        float: none !important;
        display: inline-block !important;
        width: 45% !important;
        height: auto !important;
        margin: 0 2% 10px 2% !important;
    }
    .add-info-thumbs:after {
        clear: both;
    }
    .mobile_menu {
        color: #fff;
        display: block;
        padding: 15px 0;
        border-bottom: dashed 1px #555;
        text-decoration: none;
        font-size: 18px;
    }
    .showAllMenu, .hideAllMenu {
        border-bottom: none;
        color: #fff !important;
        background: url(/img/mobile_menu.png) 12px center no-repeat;
        padding:15px 8px 15px 70px;
        margin: 0 0 0 0;
    }
    .landing-content {
        width: auto !important;
    }
    .landing-content img {
        width: 100%!important;
    }
    .callback-block-text {
        float: none !important;
        width: auto !important;
    }
    .callback-form {
        float: none !important;
        width: auto !important;
    }
    .slider-wrapper {
        display: none;
    }
    .container {
        width: auto;
    }
    .header-center {
        width: 100%;
    }
    img.review-avatar {
        height: auto !important;
    }
    .callback-block-two {
        background: none !important;
    }
    .leading-video-block iframe {
        width: 100% !important;
        margin: 0 0 30px 0;
    }
    .header-social-btn {
        display: none;
    }
    .header-right {
        float: none;
        text-align: center;
        width: auto;
    }
    .main-menu {
        height: auto;
        width: auto;
    }
    .content {
        width: auto;
    }
    .actions {
        width: auto;
        height: auto;
    }
    .actions li, .actions li:last-child {
        float: none;
        margin: 0 auto;
    }
    .footer {
        width: auto;
        height: auto;
        background: transparent;
    }
    .footer > div {
        float: none;
    }
    .footer-left {
        width: auto;
    }
    .footer ul{
        margin: 30px 0 0 0;
    }
    .footer ul li {
        padding: 5px;
    }
    .main-footer {
        display: none;
    }
    .header-right h4, .header-right h6 {
        text-align: center !important;
    }
    .serach-form {
        display: none;
    }
    .footer-right {
        display: none;
    }
    .container>header a {
        text-align: center;
    }
}
</style>