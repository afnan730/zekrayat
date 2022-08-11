<?php

include_once "../models/user.php";
$firstname = '';
$lastname = '';
$email = '';
$occupation = '';
$city = '';
$password = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->validateNewUSer($_POST);
    if (empty($result)) {

        header("Location:login.php");
        die;
    }
}
