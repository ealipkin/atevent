// Simple JavaScript Templating
// John Resig - http://ejohn.org/ - MIT Licensed
(function() {
  var cache = {};

  this.tmpl = function tmpl(str, data) {
    // Figure out if we're getting a template, or if we need to
    // load the template - and be sure to cache the result.
    var fn = !/\W/.test(str) ?
      cache[str] = cache[str] ||
        tmpl(document.getElementById(str).innerHTML) :

      // Generate a reusable function that will serve as a template
      // generator (and which will be cached).
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +

        // Introduce the data as local variables using with(){}
        "with(obj){p.push('" +
        // Convert the template into pure JavaScript
        str
        .replace(/[\r\t\n]/g, " ")
        .split("<%").join("\t")
        .replace(/((^|%>)[^\t]*)'/g, "$1\r")
        .replace(/\t=(.*?)%>/g, "',$1,'")
        .split("\t").join("');")
        .split("%>").join("p.push('")
        .split("\r").join("\\'")
        + "');}return p.join('');");

    // Provide some basic currying to the user
    return data ? fn(data) : fn;
  };

})();

function showHide(divId) {
  if (document.getElementById(divId).style.display == 'block') {
    document.getElementById(divId).style.display = 'none';
  }
  else {
    document.getElementById(divId).style.display = 'block';
  }
}

(function() {
  $('.mosaic').justifiedGallery({
    rowHeight: '220px',
    captions: false,
    margins: 0,
    lastRow: 'justify',
  });
  
  //old scripts
  $('a.grouped_elements').fancybox({
    maxHeight: '600',
    prevEffect: 'fade',
    nextEffect: 'fade',
    nextClick: true,
    helpers: {title: {type: 'inside'}, thumbs: {width: 100, height: 50}}
  });
  $('a.photo_group').fancybox({
    maxHeight: '600',
    prevEffect: 'fade',
    nextEffect: 'fade',
    nextClick: true,
    helpers: {title: {type: 'inside'}, thumbs: {width: 100, height: 50}}
  });
  $('.various').fancybox({
    maxWidth: 800,
    maxHeight: 600,
    fitToView: false,
    width: '70%',
    height: '70%',
    autoSize: false,
    closeClick: false,
    openEffect: 'none',
    closeEffect: 'none',
    padding: 0,
    helpers: {thumbs: {width: 90, height: 70}},
  });
  $('#slider').nivoSlider({
    effect: 'random',
    slices: 8,
    boxCols: 4,
    boxRows: 4,
    animSpeed: 900,
    pauseTime: 5000,
    startSlide: 0,
    directionNav: true,
    controlNav: false,
    controlNavThumbs: false,
    pauseOnHover: true,
    manualAdvance: false,
    prevText: 'Prev',
    nextText: 'Next',
    randomStart: true,
    afterLoad: function(e){
      $('#slider').addClass('nivoSlider-inited');
    }
  });
  
  $('.nivoSlider a[href=popup-open]').click(function() {
    $('.popup-mail').show()
  });
  
  $('.popup-link').click(function(e) {
    e.preventDefault();
    var $popup = $('.' + $(this).data('link'));
    $popup.css('display', 'block');
    $popup.find('.form-message').hide();
    $popup.find('.button').show();
  });
  $('.popup__close').click(function(e) {
    e.preventDefault();
    $(this).parent().parent().hide();
  });
  $('#back-top').hide();
  $(window).scroll(function() {
    if ($(this).scrollTop() > 350) {
      $('#back-top').fadeIn();
    } else {
      $('#back-top').fadeOut();
    }
  });
  $('#back-top a').click(function() {
    $('body,html').animate({scrollTop: 0}, 800);
    return false;
  });
  $('.toggle-hide-block').click(function(event) {
    event.preventDefault();
    
    let $target = $(event.currentTarget);
    let id = $target.data('id');
    let currentPos = window.pageYOffset;
    let hideBlock;
    
    if(id) {
      hideBlock = $('.hide-block[data-id="' + id + '"]');
    } else {
      hideBlock = $(this).closest('div').find('.hide-block');
    }
    
    if (hideBlock.is(':visible')) {
      hideBlock.slideUp();
      window.scrollTo(0, hideBlock.getBoundingClientRect().top - 20);
    } else {
      hideBlock.slideDown();
    }
    $('.turn-hide-block').click(function(event) {
      event.preventDefault();
      $(this).parent().slideUp();
      window.scrollTo(0, currentPos);
      currentPos = 0;
    });
  });
  
  $('.hide-block').append('<a href="#"" class="turn-hide-block dashed-link">Свернуть</a>');


  $('.showAllMenu').click(function(e) {
    e.preventDefault();
    let $menu = $('.main-nav');

    if ($menu.hasClass('main-nav_show')) {
      $menu.removeClass('main-nav_show');
      $(this).text('Показать меню');
    } else {
      $menu.addClass('main-nav_show');
      $(this).text('Скрыть меню');
    }
  });

  $('.review-text-block').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.review-slider',
    adaptiveHeight: true,
  });
  
  $('.review-slider').slick({
    adaptiveHeight: true,
    asNavFor: '.review-text-block',
    centerMode: true,
    focusOnSelect: true,
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 5,
        }
      }
    ]
  });
  
  $('.landing-promo-2__benefits').slick({
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: "unslick",
      },
    ],
  });
  
  $('.price-promo__list').slick({
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: "unslick",
      },
    ],
  });
  
  $('.landing-sendform-btn').click(function(event) {
    event.preventDefault();
    var form = $(this).parent();
    var nameField = $(form).find('.f-name');
    var name = nameField.attr('name') + ': ' + nameField.val();
    var phoneField = $(form).find('.f-phone');
    var phone = phoneField.attr('name') + ': ' + phoneField.val();
    var timeField = $(form).find('.f-time');
    var time = timeField.attr('name') + ': ' + timeField.val();
    var type = $(form).data('type');
    var preloader = $(form).children('.form-preloader');
    var title = 'Раздел сайта - ' + $('title').text();
    if (checkForm(form)) {
      $(preloader).height($(form).height());
      $(preloader).fadeIn();
      $(form).children().attr('disabled', 'disabled');
      var dataText = getSendText(type, name, title, phone, time);
      $.ajax({
        type: 'POST', url: '/mail.php', data: ({dataText: dataText}), success: function(response) {
          $('form').children().attr('disabled', 'disabled');
          $(form).children('button').hide();
          $(preloader).fadeOut();
          $(form).children('.form-message').text('Заявка успешно отправлена!').show();
        }, error: function(data) {
          $(preloader).fadeOut();
          $(form).children().removeAttr('disabled', 'disabled');
          $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
        }
      });
    }
  });
  $('.popup-callback-btn').click(function(event) {
    event.preventDefault();
    var form = $(this).parent();
    var nameField = $(form).find('.f-name');
    var name = nameField.attr('name') + ': ' + nameField.val();
    var phoneField = $(form).find('.f-phone');
    var phone = phoneField.attr('name') + ': ' + phoneField.val();
    var mailField = $(form).find('.f-mail');
    var mail = mailField.attr('name') + ': ' + mailField.val();
    var timeField = $(form).find('.f-time');
    var time = timeField.attr('name') + ': ' + timeField.val();
    var type = $(form).data('type');
    var preloader = $(form).children('.form-preloader');
    var title = 'Раздел сайта - ' + $('title').text();
    if (checkForm(form)) {
      $(preloader).height($(form).height());
      $(preloader).fadeIn();
      $(form).children().attr('disabled', 'disabled');
      var dataText = getSendText(type, name, title, phone, time);
      $.ajax({
        type: 'POST', url: '/mail.php', data: ({dataText: dataText}), success: function(response) {
          $(form).children('button').hide();
          $(preloader).fadeOut();
          $(form).children('.form-message').text('Заявка успешно отправлена!').show();
        }, error: function(data) {
          $(preloader).fadeOut();
          $(form).children().removeAttr('disabled', 'disabled');
          $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
        }
      });
    }
  });
  $('.popup-mailme-btn').click(function(event) {
    event.preventDefault();
    var form = $(this).parent();
    var nameField = $(form).find('.f-name');
    var name = nameField.attr('name') + ': ' + nameField.val();
    var mailField = $(form).find('.f-mail');
    var mail = mailField.attr('name') + ': ' + mailField.val();
    var textField = $(form).find('.f-text');
    var text = textField.attr('name') + ': ' + textField.val();
    var type = $(form).data('type');
    var preloader = $(form).children('.form-preloader');
    var pageTitle = 'Раздел сайта - ' + $('title').text();
    if (checkForm(form)) {
      $(preloader).height($(form).height());
      $(preloader).fadeIn();
      $(form).children().attr('disabled', 'disabled');
      var dataText = getSendText(type, name, mail, text, pageTitle);
      $.ajax({
        type: 'POST', url: '/mail.php', data: ({dataText: dataText}), success: function(response) {
          $(form).children('button').hide();
          $(preloader).fadeOut();
          $(form).children('.form-message').text('Заявка успешно отправлена!').show();
        }, error: function(data) {
          $(preloader).fadeOut();
          $(form).children().removeAttr('disabled', 'disabled');
          $(form).children('.form-message').text('Произошла ошибка, попробуйте еще раз.').show();
        }
      });
    }
  });
  $('.b-head').hide();
  $('.anchor-slider .nivo-imageLink').click(function(event) {
    event.preventDefault();
    sliderClick(this);
  });
  $('.review-slider a:nth-child(3n)').click();
  var cloneSearchForm = $('.serach-form').clone();
  $('.footer-right').prepend(cloneSearchForm);
  $('.menu-active').click(function(event) {
    event.preventDefault();
  });
  $("img.lazy").lazyload({effect: "fadeIn"});


})();


//Old scripts

(function(w, d, c) {
  var s = d.createElement('script'), h = d.getElementsByTagName('script')[0], e = d.documentElement;
  if ((' ' + e.className + ' ').indexOf(' ya-page_js_yes ') === -1) {
    e.className += ' ya-page_js_yes';
  }
  s.type = 'text/javascript';
  s.async = true;
  s.charset = 'utf-8';
  s.src = (d.location.protocol === 'https:' ? 'https:' : 'http:') + '//site.yandex.net/v2.0/js/all.js';
  h.parentNode.insertBefore(s, h);
  (w[c] || (w[c] = [])).push(function() {
    Ya.Site.Form.init();
  });
})(window, document, 'yandex_site_callbacks');

function sliderClick(obj) {
  var sort = 'name';
  if ($('#' + $(obj).attr('href') + '').length != 0) {
    $('html,body').animate({scrollTop: $('#' + $(obj).attr('href') + '').offset().top}, 400);
  } else {
    var startNumber = parseInt($('.info-kind:last').attr('data-id'));
    if ($('.sort-select').val()) {
      sort = $('.sort-select').val()
    }
    getContent(document.location.pathname.slice(1), startNumber, startNumber + 7, sort);
    setTimeout(function() {
      sliderClick(obj);
    }, 500);
  }
  return false;
}
function getSendText() {
  var dataText = '';
  var dataReturn = '';
  for (var i in arguments) {
    dataText += '|\n';
    dataText += arguments[i];
    dataText += '\n';
  }
  return dataText;
}
function checkForm(form) {
  var inputs = form.find('input');
  var textarea = form.find('textarea');
  var check = 0;
  $(inputs).each(function() {
    $(this).change(function() {
      if (!$(this).val()) $(this).addClass('error'); else $(this).removeClass('error');
    });
    if (!$(this).val()) {
      $(this).addClass('error');
    } else {
      $(this).removeClass('error');
      check++;
    }
  });
  if (textarea.length > 0) {
    $(textarea).each(function() {
      $(this).change(function() {
        if (!$(this).val()) $(this).addClass('error'); else $(this).removeClass('error');
      });
      if (!$(this).val()) {
        $(this).addClass('error');
      } else {
        $(this).removeClass('error');
        check++;
      }
    });
  }
  return (parseInt(inputs.length + textarea.length) == check);
}
function scrollLoader() {
  var count = 0;
  var countNext = 7;
  var sort = 'name';
  var skip_id = $('.info-kind:first').attr('data-skip');
  $('.loader').hide();
  $('.fixtaion-overlay').hide();
  $('.fixtaion-overlay').height($('.info-wrapper').height());
  var inProcess = false;
  var content = $('.info-wrapper'), loading = '<img src=\'./loading.gif\' alt=\'Loading\' />';
  $(window).scroll(function() {
    var table = $('.type-select').val();
    count = $('.info-kind:last').attr('data-id');
    sort = $('.sort-select').val();
    if (!table) table = document.location.pathname.slice(1);
    if ($(window).scrollTop() + $(window).height() >= (content.offset().top + content.height() - $(window).height()) - 500 && !inProcess) {
      inProcess = true;
      getContent(table, count, countNext, sort, skip_id);
      setTimeout(function() {
        inProcess = false;
      }, 500);
    }
  });
}
function getContent(table, count, countNext, sort, skip_id) {
  var content = $('.info-wrapper'), loading = '<img src=\'./loading.gif\' alt=\'Loading\' />';
  $.ajax({
    url: '/jscroll.php',
    dataType: 'json',
    type: 'GET',
    data: {count: count, count_next: countNext, sort: sort, table: table, skip_id: skip_id},
    success: function(data) {
      content.addClass('load-flag');
      $('.loader').hide();
      content.append(data);
      count = $('.info-kind:last-child').attr('data-id');
      $('.loader').hide();
    },
    beforeSend: function() {
      $('.loader').show();
    }
  }).complete(function() {
    $('.loader').hide();
  });
}
