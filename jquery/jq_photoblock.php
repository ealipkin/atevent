<?php

include_once '../functions.php';



$artist_id = varr_int($_POST['id']);
$type = varr_int($_POST['type']);

$photos = getPhotoInBlock($artist_id,$type);
$path = getPhotoPath($artist_id,$type);
echo json_encode($photos);
?>