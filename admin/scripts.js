/*$(function() {
    //Фансибокс
    $("a.grouped_elements").fancybox({
        maxHeight   : '600',
        prevEffect  : 'fade',
        nextEffect  : 'fade',
        nextClick   : true,
        helpers : {
            title   : {
                type: 'inside'
            },
            thumbs  : {
                width   : 100,
                height  : 50
            }
        }
    });

   // $('.content').append("<div class='loader'><img src='./loading.gif' alt='Loading' /></div>");


    //SLIDER ACTIVATION
    $('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 8, // For slice animations
        boxCols: 4, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 900, // Slide transition speed
        pauseTime: 5000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: false, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: true, // Start on a random slide
    });

    //POPUP
    $('.popup-link').click(function() {
        var popup = '.'+$(this).data('link');
        $(popup).css('display', 'block');
        $(popup).click(function(event) {
            e = event || window.event;
            if (e.target == this) {
                $(popup).css('display', 'none');
            }
        });
        $('.popup__close').click(function() {
            $(popup).css('display', 'none');
        });
    });

    //Кнопка вверх
    $("#back-top").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 350) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
    $('#back-top a').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    //Скрываем и показываем блок
    $('.toggle-hide-block').click(function(){
        event.preventDefault();
        var currentPos = window.pageYOffset;
        var hideBlock = $(this).closest('div').find('.hide-block');
        if(hideBlock.is(':visible')){
            hideBlock.slideUp();
        }
        else {hideBlock.slideDown();}

        $('.turn-hide-block').click(function(event){
            event.preventDefault();
            console.log($(this));
            $(this).parent().slideUp();
            window.scrollTo(0, currentPos);
            currentPos = 0;
        });
    });
    var activeSliderId = $('.review-slider .review-speaker--active').attr('id');
    var sliderActiveText = 'review-text-' + activeSliderId;

    //Кнопка "Свернуть" в раскрывающихся блоках
    $('.hide-block').append('<a href="#" class="turn-hide-block dashed-link">Свернуть</a>');
    //Слайдер отзывов
    $('.review-speaker').click(function(event){
        event.preventDefault();
        $('.review-slider a').removeClass('review-speaker--active');
        $(this).addClass('review-speaker--active');

        var activeSliderId = $('.review-slider .review-speaker--active').attr('id');
        var sliderActiveText = 'review-text-' + activeSliderId;

        $('.review-text-block > *').hide();
        $('.'+sliderActiveText+'').show();
    });

    //Отправка формы с лендинга
    $('.landing-sendform-btn').click(function(event) {
        event.preventDefault();
        var form = $(this).parent();
        var nameField = $(form).find('.f-name');
        var name = nameField.attr('name') + ': ' + nameField.val() ;
        var phoneField = $(form).find('.f-phone');
        var phone = phoneField.attr('name') + ': ' + phoneField.val();
        var timeField = $(form).find('.f-time');
        var time = timeField.attr('name') + ': ' + timeField.val();
        var type = $(form).data('type');
        var preloader = $(form).children('.form-preloader');
  
        if(checkForm(form)){
            $(preloader).height($(form).height());
            $(preloader).fadeIn();
            $(form).children().attr('disabled','disabled');
            var dataText = getSendText(type,name, phone, time);
            $.ajax({
                type: "POST",
                url: "/mail.php",
                data: ({
                    dataText: dataText
                    }),
                success: function(response){
                    $('form').children().attr('disabled','disabled');
                    $(form).children('button').hide();
                    $(preloader).fadeOut();
                    $(form).children('.form-message').text('Заявка успешно отправлена!').show();
                },
                error: function(data){
                    $(preloader).fadeOut();
                    $(form).children().removeAttr('disabled','disabled');
                    $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
                }
            });
        }
    });

    //Отправка формы обратного звонка
    $('.popup-callback-btn').click(function(event){
        event.preventDefault();
        var form = $(this).parent();
        var nameField = $(form).find('.f-name');
        var name = nameField.attr('name') + ': ' + nameField.val() ;
        var phoneField = $(form).find('.f-phone');
        var phone = phoneField.attr('name') + ': ' + phoneField.val();
        var timeField = $(form).find('.f-time');
        var time = timeField.attr('name') + ': ' + timeField.val();
        var type = $(form).data('type');
        var preloader = $(form).children('.form-preloader');
  
        if(checkForm(form)){
            $(preloader).height($(form).height());
            $(preloader).fadeIn();
            $(form).children().attr('disabled','disabled');
            var dataText = getSendText(type,name, phone, time);
            $.ajax({
                type: "POST",
                url: "/mail.php",
                data: ({
                    dataText: dataText
                    }),
                success: function(response){
                    $(form).children('button').hide();
                    $(preloader).fadeOut();
                    $(form).children('.form-message').text('Заявка успешно отправлена!').show();
                },
                error: function(data){
                    $(preloader).fadeOut();
                    $(form).children().removeAttr('disabled','disabled');
                    $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
                }
            });
        }
    });

    $('.popup-mailme-btn').click(function(event){
        event.preventDefault();
        var form = $(this).parent();
        var nameField = $(form).find('.f-name');
        var name = nameField.attr('name') + ': ' + nameField.val() ;
        var textField = $(form).find('.f-text');
        var text = textField.attr('name') + ': ' + textField.val();
        var type = $(form).data('type');
        var preloader = $(form).children('.form-preloader');
  
        if(checkForm(form)){
            $(preloader).height($(form).height());
            $(preloader).fadeIn();
            $(form).children().attr('disabled','disabled');
            var dataText = getSendText(type,name, text);
            $.ajax({
                type: "POST",
                url: "/mail.php",
                data: ({
                    dataText: dataText
                    }),
                success: function(response){
                    $(form).children('button').hide();
                    $(preloader).fadeOut();
                    $(form).children('.form-message').text('Заявка успешно отправлена!').show();
                },
                error: function(data){
                    $(preloader).fadeOut();
                    $(form).children().removeAttr('disabled','disabled');
                    $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
                }
            });
        }
    });

$('.b-head').hide();


//Установка фокуса на центральнов отзыве
    $('.review-slider a:nth-child(3n)').click();

});

//Скрипт поиска по сайту
(function(w,d,c){
    var s=d.createElement('script'),
    h=d.getElementsByTagName('script')[0],
    e=d.documentElement;
    if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){
        e.className+=' ya-page_js_yes';
    }
        s.type='text/javascript';
        s.async=true;s.charset='utf-8';
        s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';
        h.parentNode.insertBefore(s,h);
        (w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init();});
})
(window,document,'yandex_site_callbacks');


//Загрузчик при прокрутке страницы
function scrollLoader(table){
    var inProcess = false;
    var content = $(".content"),
        loading = "<img src='./loading.gif' alt='Loading' />",
        count = $('.info-kind:last').attr('data-id');
    if(!table)table = document.location.pathname.slice(1) ;
        $('.loader').hide();
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= (content.offset().top + content.height()) && !inProcess){
            inProcess = true;
            $.ajax({
                url: "./jscroll.php",
                dataType: "json",
                type: "GET",
                data: {
                    count: count,
                    table: table
                    },
                success: function(data){
                    if (data.length > 0) {
                        $('.loader').hide();
                        content.append(data);
                        count = $('.info-kind:last-child').attr('data-id');
                        inProcess = false;
                    }
                    $('.loader').hide();
                },

                beforeSend: function(){
                    $('.loader').show();
                }
            }).complete(function() {
                $('.loader').hide();
            });
        }

    });
}


//Отправка писем
function getSendText(){
    var dataText = '';
    var dataReturn = '';
    for(var i in arguments){
        dataText += '|\n';
        dataText += arguments[i];
        dataText += '\n';
    }
    return dataText;
}
*/

//Валидация форм
function checkForm(form){
    var inputs = form.find('input.need-validate');
    var check = 0;
    $(inputs).each(function(){
        $(this).change(function(){
            if(!$(this).val())$(this).addClass('error');
            else $(this).removeClass('error');
        });
        if(!$(this).val())$(this).addClass('error');
        else { $(this).removeClass('error'); check++ ;}
    });
    if(parseInt(inputs.length) == check) return true;
    else return false;
}

function infoEditor(){
    var btn = document.querySelectorAll('.save-btn');
    var info, field, id = '';
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    for (var i = 0; i <= btn.length-1; i++) {
        btn[i].addEventListener('click', function(){
            event.preventDefault();
            var btn = this;
            id = btn.parentNode.parentNode.parentNode.dataset['id'];
            field = btn.previousElementSibling.dataset['type'];
            info = btn.previousElementSibling.value;
            btnImage = btn.querySelector('.btn-img');
            preloader = btn.querySelector('.btn-preloader');

            btnImage.style.display = 'none';
            preloader.style.display = 'block';

            $.ajax({
                type: "POST",
                url: "/admin/jquery/simple-query.php",
                data: ({
                    id: id,
                    field: field,
                    info: info,
                    table: tableName
                    }),
                success: function(response){
                    //console.log(response);
                    //var j_son = JSON.parse(response);
                    //console.log(j_son);
                    //info = response;
                    btnImage.style.display = 'block';
                    preloader.style.display = 'none';

                    // $('form').children().attr('disabled','disabled');
                    // $(form).children('button').hide();
                    // $(preloader).fadeOut();
                    // $(form).children('.form-message').text('Заявка успешно отправлена!').show();
                },
                error: function(data){
                    console.log(data);

                    // $(preloader).fadeOut();
                    // $(form).children().removeAttr('disabled','disabled');
                    // $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
                }
            });

        });
    }
}



function adtistAdd(){
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    $(btn).click(function(){

        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: ({
                    name : $('.add-form input[name="name"]').val(),
                    type : $('.add-form input[name="type"]').val(),
                    price : $('.add-form input[name="price"]').val(),
                    desc : $('.add-form textarea[name="description"]').val(),
                    moderate : $('.add-form select[name="moderate"]').val(),
                    photoCount: $('.add-form input[name="photo-count"]').val(),
                    table: tableName
                    }),
                success: function(response){
                   /* btnImage.style.display = 'block';
                    preloader.style.display = 'none';*/
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    //window.location.href = '/adm/edit-'+tableName;
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }
    });
    /*
    $('.add-form input, .add-form textarea').each(function(){
        console.log($(this).val());
    });*/
}


function autoAdd(){
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    $(btn).click(function(){

        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: ({
                    name : $('.add-form input[name="name"]').val(),
                    price : $('.add-form input[name="price"]').val(),
                    desc : $('.add-form textarea[name="description"]').val(),
                    moderate : $('.add-form select[name="moderate"]').val(),
                    type : $('.add-form select[name="type"]').val(),
                    photoCount: $('.add-form input[name="photo-count"]').val(),
                    table: tableName
                    }),
                success: function(response){
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    window.location.href = '/adm/edit-auto';
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }
    });
    /*
    $('.add-form input, .add-form textarea').each(function(){
        console.log($(this).val());
    });*/
}



function photoAdd(){
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    $(btn).click(function(){

        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: ({
                    name : $('.add-form input[name="name"]').val(),
                    price : $('.add-form input[name="price"]').val(),
                    phone : $('.add-form input[name="phone"]').val(),
                    site : $('.add-form input[name="site"]').val(),
                    vkpage : $('.add-form input[name="vkpage"]').val(),
                    desc : $('.add-form textarea[name="description"]').val(),
                    moderate : $('.add-form select[name="moderate"]').val(),
                    table: tableName
                    }),
                success: function(response){
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    window.location.href = '/adm/edit-photo';
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }
    });
    /*
    $('.add-form input, .add-form textarea').each(function(){
        console.log($(this).val());
    });*/
}

function videoAdd(){
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    $(btn).click(function(){

        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: ({
                    name : $('.add-form input[name="name"]').val(),
                    price : $('.add-form input[name="price"]').val(),
                    phone : $('.add-form input[name="phone"]').val(),
                    site : $('.add-form input[name="site"]').val(),
                    vkpage : $('.add-form input[name="vkpage"]').val(),
                    desc : $('.add-form textarea[name="description"]').val(),
                    moderate : $('.add-form select[name="moderate"]').val(),
                    table: tableName
                    }),
                success: function(response){
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    window.location.href = '/adm/edit-video';
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }
    });
    /*
    $('.add-form input, .add-form textarea').each(function(){
        console.log($(this).val());
    });*/
}

function prizeChange() {
    var btn = $('.prize-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];
    var btnImage = btn[0].querySelector('.btn-img');
    var preloader = btn[0].querySelector('.btn-preloader');

    $(btn).click(function(event){
        event.preventDefault();
        var id = $('.prize-select').val();
        var ajaxCont = $(this).closest('.ajax-cont').find('.ajax-info');
        $.ajax({
            type: "POST",
            url: "/admin/jquery/prize-change.php",
            data: ({
                id : id,
                table: tableName
                }),
                success: function(response){
                    btnImage.style.display = 'block';
                    preloader.style.display = 'none';
                    ajaxCont.text('Данные успешно обновлены').addClass('ajax-success').show();
                    setTimeout(function() {
                        ajaxCont.removeClass('ajax-success').hide();
                    }, 3000);
                },
                error: function(data){
                    console.log(data);
                }
        });


    });

}


function weddingDressAdd(){
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'];

    $(btn).click(function(){

        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: ({
                    name : $('.add-form input[name="name"]').val(),
                    service_type : $('.add-form input[name="service_type"]').val(),
                    site : $('.add-form input[name="site"]').val(),
                    vk : $('.add-form input[name="vk"]').val(),
                    contacts : $('.add-form input[name="contacts"]').val(),
                    moderate : $('.add-form select[name="moderate"]').val(),
                    table: tableName
                    }),
                success: function(response){
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    window.location.href =  window.location.href;
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }
    });
}

function universalAddHandler() {
    var btn = document.querySelectorAll('.add-artist-btn');
    var tableName = document.querySelector('.edit-table-type').dataset['table'],
        inputs = $('.add-form .need-add'),
        sendObj = {};

    $(btn).click(function(){

        inputs.each(function() {
            sendObj[$(this).data('type')] = $(this).val();
        });
        sendObj['table'] = tableName;
        //console.log(sendObj);
        if(checkForm($('.add-form'))){
            $.ajax({
                type: "POST",
                url: "/admin/jquery/add-query.php",
                data: sendObj,
                success: function(response){
                    $('.add-warning').html('Выполняется запрос, пожалуйста подождите').show();
                    //debugger;
                    window.location.href =  window.location.href;
                },
                error: function(data){
                    $('.add-warning').html('Произошла ошибка, попробуйте еще раз').show();
                }
            });
        }


    });

}



