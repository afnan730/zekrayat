<?php

include_once "../models/user.php";

$email = '';

$password = '';
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->validateUser($_POST);

    if (empty($result)) {

        $present_time = date("d/m/Y h:i A");
        $expire = 7 * 24 * 60 * 60 + time();
        setcookie("LastLogin", $present_time, $expire);
        // var_dump($_COOKIE["LastLogin"]);
        // exit;


        header("Location:home.php");
        die;
    }
}
