<?php
require_once 'session_controller.php';
include_once '../models/photo.php';

$id = $_POST['img_id'];



$pic = new Photo;

$pathArray = $pic->getPath($id);
if ($pathArray) {
    $imgpath = "../views/" . $pathArray[0]["img_path"];
    // echo '<pre>';
    // var_dump($imgpath);
    // echo '</pre>';
    // exit;

    $pic->deleteImage($id, $imgpath);
    header("Location:../views/albums.php");
} else {
    echo "path not found";
}
