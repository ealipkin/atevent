$(function() {
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
  $('.toggle-hide-block').click(function() {
    event.preventDefault();
    var currentPos = window.pageYOffset;
    var hideBlock = $(this).closest('div').find('.hide-block');
    if (hideBlock.is(':visible')) {
      hideBlock.slideUp();
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
  var activeSliderId = $('.review-slider .review-speaker--active').attr('id');
  var sliderActiveText = 'review-text-' + activeSliderId;
  $('.hide-block').append('<a href="#"" class="turn-hide-block dashed-link">Свернуть</a>');
  $('.review-speaker').click(function(event) {
    event.preventDefault();
    $('.review-slider a').removeClass('review-speaker--active');
    $(this).addClass('review-speaker--active');
    var activeSliderId = $('.review-slider .review-speaker--active').attr('id');
    var sliderActiveText = 'review-text-' + activeSliderId;
    $('.review-text-block > *').hide();
    $('.' + sliderActiveText + '').show();
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
});
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
    table = $('.type-select').val();
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