<?php



?>

<style>
#content{
	font-size: 14px;
	width: 60%;
	margin: 0 auto;
	border: 1px solid #ccc;
	padding: 0 7px;
}
	#content p{
		margin: 10px;
	}
	#content p span:first-child{
		font-size: 20px;
		font-weight: bold;
		padding: 10px;
	}
	.jscroll-loading{
		text-align: center;
		padding: 7px 0;
	}
	.next a{
		padding: 7px 5px;
		color: #000;
		border-radius: 5px;
		display: block;
		border: 1px solid #ccc;
		margin: 0 auto 8px;
		text-decoration: none;
		width: 30px;
	}
	.next a:hover{
		border: 1px solid #54A7EB;
		color: #54A7EB; 
	}

</style>

<div id="content">
	<div class="next">
		<a href="путь_до_обработчика">next</a>
	</div>
</div>



<script>
$(function(){

	var content = $("#content"),
		loading = "<img src='./loading.gif' alt='Loading' />";

	// Подгрузка первых записей
	$.ajax({
		url: "./jscroll.php",
		dataType: "json",
		type: "GET",
		data: {type: "start"},
		success: function(data){

			if(data){

				content.append(data);
				content.find(".jscroll-loading:first").slideUp(700, function(){

					$(this).remove();
				});

				// Вызываем плагин
				$("#content").jscroll({
					autoTriggerUntil: 2,
					loadingHtml: loading
				});
			};
		},
		beforeSend: function(){

			content.append("<div class='jscroll-loading'>" + loading + "</div>");
		}
	});
});
</script>