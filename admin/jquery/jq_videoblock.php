<?php

include_once '../functions.php';



$id = varr_int($_POST['id']);

$videos = getVideoList($id);

echo json_encode($videos);
?>