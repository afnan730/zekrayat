<?php
require_once '../database.php';

class Photo
{

    private $error = "";
    function validateInput($userId, $imgData, $album, $username)
    {
        if (empty($album)) {
            $this->error .= 'please select album to add image to!<br>';
        }
        if (empty($imgData["tmp_name"])) {
            $this->error .= 'please choose image to upload!<br>';
        }

        if ($this->error == "") {
            //create img
            $this->addPhoto($userId, $imgData, $album, $username);
        } else {

            return $this->error;
        }
    }

    private function addPhoto($userId, $imgData, $imgAlbum, $username)
    {

        $photo_id = $this->createPhotoId();

        $user_id = $userId;
        $album = $imgAlbum;
        $personName = $username;

        $folder = "uploads/" . $user_id . "/" . $imgAlbum . "/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $imgName = $this->randomString(6) . $imgData["name"];
        $filename = $folder . $imgName;
        move_uploaded_file($imgData['tmp_name'], $filename);

        //add to database
        $query = "insert into photos (photo_id,user_id,album,img_path,username) values($photo_id, $user_id,'$album','$filename','$personName')";
        $db = new Database();
        $db->save($query);
    }

    private function createPhotoId()
    {
        $length = rand(4, 19);
        $number = '';
        for ($i = 0; $i < $length; $i++) {
            $new_number = rand(0, 9);
            $number .= $new_number;
        }
        return $number;
    }

    private function randomString($n)
    {
        $characters = "0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
        $str = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
        return $str;
    }

    function getPhotos($userID)
    {
        $query = "select * from photos where user_id='$userID' order by id desc";
        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function deleteImage($imgId, $imgpath)
    {
        $query = "Delete from photos where photo_id='$imgId'";
        $db = new Database();
        $result = $db->save($query);

        if ($result) {

            unlink($imgpath);
            // echo '<br><br><br><br><br>';
            // echo 'deleted';
            //header("Location:../public/about.php");
        } else {
            return false;
        }
    }

    function getImages()
    {
        $query = "select * from photos order by id desc";
        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function getPath($id)
    {

        $query = "SELECT img_path from photos where photo_id='$id' ";

        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function getuserName($photoId)
    {

        $query = "SELECT username from photos where photo_id='$photoId' ";

        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function getAlbum($photoId)
    {

        $query = "SELECT album from photos where photo_id='$photoId' ";

        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            // print_r($result);
            // exit;
            return $result[0]['album'];
        } else {
            return false;
        }
    }
}
