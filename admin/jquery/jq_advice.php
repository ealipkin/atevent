<?php

include_once '../functions.php';


$advice_id = varr_int($_POST['id']);

$advice = getAdviceText($advice_id);

echo json_encode($advice['0']['text']);
?>