<?php

include_once '../models/photo.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $image_data = $_FILES['image'];
    $img_album = $_POST['album'];
    $user_id = $userdata["userid"];
    $username = $_SESSION['username'];

    // echo '<pre>';
    // var_dump($image_data);
    // echo '</pre>';
    // exit;

    $photo = new Photo();
    $result = $photo->validateInput($user_id, $image_data, $img_album, $username);
    if (empty($result)) {
        //there is no errors returned from model, image will be saved to database and user is redirected to albums
        header("Location:albums.php");
        die;
    }
    //else error messages will be returned in case the user didn't select image or album, $result will be displayed in addimage.php

}
