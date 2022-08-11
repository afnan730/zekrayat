<?php
include_once "../models/photo.php";
include_once "../models/comment.php";


$picId = $_GET['id'];
$imgpath;
//if the value of photo id is found in url
if (isset($_GET['id'])) {
    $viewImg = new Photo();
    $pathArray = $viewImg->getPath($_GET["id"]);
    //if the photo id in db path will be returned
    if ($pathArray) {
        $imgpath = $pathArray[0]["img_path"];
    } else {
        echo "path not found";
    }
} else {
    echo "page not found";
}


//when comment button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['commentText'])) {
        header("Location:../views/viewImage.php?id=$picId");
        die;
    } else {
        $commentData = array();

        $commentData['content'] = addslashes($_POST['commentText']);
        $commentData['username'] = $_SESSION['username'];
        $commentData['userid'] = $_SESSION['zekraiayat_userid'];
        $commentData['imgId'] = $picId;

        $obj = new Comment();
        $obj->addComment($commentData);
        header("Location:viewImage.php?id=$picId");
        die;
    }
}

$obj1 = new Comment();
$comments = $obj1->getComments($picId);

$obj2 = new Photo();
$nameArr = $obj2->getuserName($picId);
$name = $nameArr[0]['username'];
$imgAlbum = $obj2->getAlbum($picId);
