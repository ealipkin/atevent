<?php
	$getPrize = db_query("SELECT `artists` FROM `prize`");
	$prize = $getPrize[0]['artists'];
	if($prize>0){
		$prize = $prize;
	}
	else {
		$prize=0;
	}
?>
<div class="info-wrapper artist-page">
	<h3>Артисты</h3>

	<?=getArtistBlock(0, 7, 'name', $prize)?>
</div>
