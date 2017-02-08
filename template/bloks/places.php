<?php
	$getPrize = db_query("SELECT `places` FROM `prize`");
	$prize = $getPrize[0]['places'];
	if($prize>0){
		$prize = $prize;
	}
	else {
		$prize=0;
	}
?>

<div class="info-wrapper">
    <h3 class="title-main">Рестораны</h3>
	<?=getPlaceBlock(0,7,$prize)?>
</div>
<?php
$scripts .= "
<script>
		//scrollLoader();
</script>
";
?>