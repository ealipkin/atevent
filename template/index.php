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

    <!--JS-->
    <!--
	<script src="/js/fancybox/jquery.fancybox.js"></script>-->
	<!--script src="./js/jquery-2.1.1.min.js"></script-->
	<script src="/js/jquery-1.11.3.min.js"></script>
	<script src="/js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script> 
	<script src="/js/jquery.nivo.slider.pack.js"></script>
	<script src="/js/jquery.lazyload.min.js"></script>
	<script src="/js/scripts.full.js?98"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="./js/selectivizr-min.js"></script>
	<![endif]-->
	<?php
		if(isset($scripts))
			{
				echo $scripts;
			}
	?>
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