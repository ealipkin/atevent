<?php
	require_once('bloks/root.php');
	if($landing==1){ $class='landing-content p0 clearfix';}
/*
* HTML-минимизация
*/
ob_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <?php
    //Подключение head
    require_once('bloks/head.php');
    ?>
    <meta name="viewport" content="width=device-width">
    <?
    require_once('bloks/style.php');
    ?>
</head>
<body>
	<div class="container">


		<?php
			//Подключение шапки сайта
			require_once('bloks/header.php');
		?>


		<?php
			if(!empty($slider)){
				require_once($slider_path);
			}
		?>
		<div class="content <?=$class?> ">

			<?php
				if (isset($file)){
		        	require_once($file);
		    	}
			?>
		</div>

	<?php
		//Подключение подвала
		require_once('bloks/footer.php');
	?>

	</div>



	<!--  Счетчики -->

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	    (function (d, w, c) {
	        (w[c] = w[c] || []).push(function() {
	            try {
	                w.yaCounter22928173 = new Ya.Metrika({
	                    id:22928173,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true,
	                    webvisor:true
	                });
	            } catch(e) { }
	        });

	        var n = d.getElementsByTagName("script")[0],
	            s = d.createElement("script"),
	            f = function () { n.parentNode.insertBefore(s, n); };
	        s.type = "text/javascript";
	        s.async = true;
	        s.src = "https://mc.yandex.ru/metrika/watch.js";

	        if (w.opera == "[object Opera]") {
	            d.addEventListener("DOMContentLoaded", f, false);
	        } else { f(); }
	    })(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript>
	<!-- <div><img src="https://mc.yandex.ru/watch/22928173" style="position:absolute; left:-9999px;" alt="" /></div> -->
	</noscript>
	 <!-- /Yandex.Metrika counter -->


	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45694839-1', 'at-event.ru');
	  ga('send', 'pageview');

	</script>
	<!--  //Счетчики -->

    <link rel="shortcut icon" href="/favicon.ico">
    <style>
        /*main.css*/

        /*nivo-slider/nivo-slider.css*/
        .nivo-box,.nivo-caption,.nivoSlider{overflow:hidden}.nivoSlider{position:relative;width:895px;height:auto;margin:0 auto;border:2px solid #ff3468}.nivoSlider img{position:absolute;top:0;left:0;max-width:none}.nivo-main-image{display:block!important;position:relative!important;width:100%!important}.nivoSlider a.nivo-imageLink{position:absolute;top:0;left:0;width:100%;height:100%;border:0;padding:0;margin:0;z-index:6;display:none;background:#fff;filter:alpha(opacity=0);opacity:0}.nivo-box,.nivo-slice{position:absolute;display:block;z-index:5}.nivo-slice{height:100%;top:0}.nivo-box img{display:block}.nivo-caption{position:absolute;left:0;bottom:0;background:#000;color:#fff;width:100%;z-index:8;padding:5px 10px;opacity:.8;display:none;-moz-opacity:.8;filter:alpha(opacity=8);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.nivo-caption p{padding:5px;margin:0}.nivo-caption a{display:inline!important}.nivo-html-caption{display:none}.nivo-directionNav a{position:absolute;top:45%;z-index:9;cursor:pointer}.nivo-prevNav{left:0}.nivo-nextNav{right:0}.nivo-controlNav{text-align:center;padding:5px 0!important}.nivo-controlNav a{cursor:pointer}.nivo-controlNav a.active{font-weight:700;}

        /*nivo-slider/themes/default/default.css*/
        .theme-default .nivoSlider{position:relative;background:url(loading.gif) 50% 50% no-repeat #fff;margin-bottom:10px;-webkit-box-shadow:0 1px 5px 0 #4a4a4a;-moz-box-shadow:0 1px 5px 0 #4a4a4a;box-shadow:0 1px 5px 0 #4a4a4a}.theme-default .nivoSlider img{position:absolute;top:0;left:0;display:none}.theme-default .nivoSlider a{border:0;display:block}.theme-default .nivo-controlNav{text-align:center;padding:20px 0}.theme-default .nivo-controlNav a{display:inline-block;width:22px;height:22px;background:url(bullets.png) no-repeat;text-indent:-9999px;border:0;margin:0 2px}.theme-default .nivo-controlNav a.active{background-position:0 -22px}.theme-default .nivo-directionNav a{display:block;width:50px;height:100%;background:url(img/arrows.png) no-repeat 0 50%;text-indent:-9999px;border:0;opacity:0.6;-webkit-transition:all 200ms ease-in-out;-moz-transition:all 200ms ease-in-out;-o-transition:all 200ms ease-in-out;transition:all 200ms ease-in-out;top:0;background-position-y:50%;background-position-x:18px}.theme-default:hover .nivo-directionNav a{opacity:.6}.theme-default a.nivo-nextNav{background: transparent url("img/arrows.png") no-repeat scroll 275% 50%; right:0}.theme-default a.nivo-nextNav:hover,.theme-default a.nivo-prevNav:hover{opacity:1}.theme-default a.nivo-prevNav{left:0; background: transparent url("img/arrows.png") no-repeat scroll -185% 50%;}.theme-default .nivo-caption{font-family:Helvetica,Arial,sans-serif}.theme-default .nivo-caption a{color:#fff;border-bottom:1px dotted #fff}.theme-default .nivo-caption a:hover{color:#fff}.theme-default .nivo-controlNav.nivo-thumbs-enabled{width:100%}.theme-default .nivo-controlNav.nivo-thumbs-enabled a{width:auto;height:auto;background:0 0;margin-bottom:5px}.theme-default .nivo-controlNav.nivo-thumbs-enabled img{display:block;width:120px;height:auto}

        /*fancybox*/
        .fancybox-image,.fancybox-inner,.fancybox-nav,.fancybox-nav span,.fancybox-outer,.fancybox-skin,.fancybox-tmp,.fancybox-wrap,.fancybox-wrap iframe,.fancybox-wrap object{padding:0;margin:0;border:0;outline:0;vertical-align:top}.fancybox-wrap{position:absolute;top:0;left:0;z-index:8020}.fancybox-skin{position:relative;background:#f9f9f9;color:#444;text-shadow:none;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.fancybox-opened{z-index:8030}.fancybox-opened .fancybox-skin{-webkit-box-shadow:0 10px 25px rgba(0,0,0,.5);-moz-box-shadow:0 10px 25px rgba(0,0,0,.5);box-shadow:0 10px 25px rgba(0,0,0,.5)}.fancybox-inner,.fancybox-outer{position:relative}.fancybox-inner{overflow:hidden}.fancybox-type-iframe .fancybox-inner{-webkit-overflow-scrolling:touch}.fancybox-error{color:#444;font:14px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;margin:0;padding:15px;white-space:nowrap}.fancybox-iframe,.fancybox-image{display:block;width:100%;height:100%}.fancybox-image{width:100%;height:100%;max-width:100%;max-height:100%}#fancybox-loading,.fancybox-close,.fancybox-next span,.fancybox-prev span{background-image:url(/js/fancybox/fancybox_sprite.png)}#fancybox-loading{position:fixed;top:50%;left:50%;margin-top:-22px;margin-left:-22px;background-position:0 -108px;opacity:.8;cursor:pointer;z-index:8060}#fancybox-loading div{width:44px;height:44px;background:url(/js/fancybox/fancybox_loading.gif) center center no-repeat}.fancybox-close{position:absolute;top:-18px;right:-18px;width:36px;height:36px;cursor:pointer;z-index:8040}.fancybox-nav{position:absolute;top:0;width:15%;height:85%;cursor:pointer;text-decoration:none;background:transparent url(/js/fancybox/blank.gif);-webkit-tap-highlight-color:rgba(0,0,0,0);z-index:8040}.fancybox-prev{left:0}.fancybox-next{right:0}.fancybox-nav span{position:absolute;top:50%;width:36px;height:34px;margin-top:-18px;cursor:pointer;z-index:8040;visibility:hidden}.fancybox-prev span{left:10px;background-position:0 -36px}.fancybox-next span{right:10px;background-position:0 -72px}.fancybox-nav:hover span{visibility:visible}.fancybox-tmp{position:absolute;top:-99999px;left:-99999px;visibility:hidden;max-width:99999px;max-height:99999px;overflow:visible!important}.fancybox-lock{}.fancybox-overlay{position:absolute;top:0;left:0;overflow:hidden;display:none;z-index:8010;background:url(/js/fancybox/fancybox_overlay.png)}.fancybox-overlay-fixed{position:fixed;bottom:0;right:0}.fancybox-lock .fancybox-overlay{overflow:auto;overflow-y:auto}.fancybox-title{visibility:hidden;font:400 13px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;position:relative;text-shadow:none;z-index:8050}.fancybox-opened .fancybox-title{visibility:visible}.fancybox-title-float-wrap{position:absolute;bottom:0;right:50%;margin-bottom:-35px;z-index:8050;text-align:center}.fancybox-title-float-wrap .child{display:inline-block;margin-right:-100%;padding:2px 20px;background:0 0;background:rgba(0,0,0,.8);-webkit-border-radius:15px;-moz-border-radius:15px;border-radius:15px;text-shadow:0 1px 2px #222;color:#FFF;font-weight:700;line-height:24px;white-space:nowrap}.fancybox-title-outside-wrap{position:relative;margin-top:10px;color:#fff}.fancybox-title-inside-wrap{padding-top:10px}.fancybox-title-over-wrap{position:absolute;bottom:0;left:0;color:#fff;padding:10px;background:#000;background:rgba(0,0,0,.8);}
        /* fancybox thumbs*/
        #fancybox-thumbs{position:fixed;left:0;width:100%;overflow:hidden;z-index:8050}#fancybox-thumbs.bottom{bottom:2px}#fancybox-thumbs.top{top:2px}#fancybox-thumbs ul{position:relative;list-style:none;margin:0;padding:0}#fancybox-thumbs ul li{float:left;padding:1px;opacity:.5}#fancybox-thumbs ul li.active{opacity:.75;padding:0;border:1px solid #fff}#fancybox-thumbs ul li:hover{opacity:1}#fancybox-thumbs ul li a{display:block;position:relative;overflow:hidden;border:1px solid #222;background:#111;outline:0}#fancybox-thumbs ul li img{display:block;position:relative;border:0;padding:0;max-width:none;}
    </style>


    <link href="/css/main.css" rel="stylesheet">
    <!--JS-->
    <!--
	<script src="/js/fancybox/jquery.fancybox.js"></script>-->
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script defer  src="/js/jquery-1.11.3.min.js"></script>
    <script defer  src="/js/fancybox/jquery.fancybox.pack.js"></script>
    <script defer  src="/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
    <script defer  src="/js/jquery.nivo.slider.pack.js"></script>
    <script defer  src="/js/jquery.lazyload.min.js"></script>
    <script defer  src="/js/scripts.full.js?101"></script>
    <!--[if lt IE 9]>
    <script defer  type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script defer  src="./js/selectivizr-min.js"></script>
    <![endif]-->
    <?php
    if(isset($scripts))
    {
        echo $scripts;
    }
    ?>
    <script>
        $(document).ready(function(){
            $('.showAllMenu').click(function(a){
                a.preventDefault();
                $('.hideMenu').show();
                $(this).hide();
            });
        });
    </script>
</body>
</html>
<?php
/*
* HTML-минимизация
*/
$out = ob_get_clean();
$out = preg_replace('/(?![^<]*<\/pre>)[\n\r\t]+/', "\n", $out);
$out = preg_replace('/ {2,}/', ' ', $out);
$out = preg_replace('/>[\n]+/', '>', $out);
echo $out;
?>