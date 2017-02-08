<?php 
	require_once('./admin/checkAuth.php');
	require_once('root.php');
	if($landing==1){ $class='landing-content p0';}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php
	//Подключение head
	require_once('head.php');
?>

<script src="/js/jquery-1.11.3.min.js"></script>
<!--script src="./js/jquery-2.1.1.min.js"></script-->
<script src="/admin/js/scripts.js?123"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="./js/selectivizr-min.js"></script>
<![endif]-->


</head>
<body>
	<div class="container clearfix">


		<?php
			//Подключение шапки сайта
			require_once('header.php');
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
		//require_once('footer.php');
	?>

		
	</div>

    <!--JS-->
	<script src="/js/jquery-2.1.1.min.js"></script>
	<?php
		if(isset($scripts))
			{
				echo $scripts;
			}
	?>

</body>
</html>