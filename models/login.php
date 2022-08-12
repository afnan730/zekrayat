<?php
include_once '/xampp/htdocs/zekrayat/helper/database.php';
class Login
{
    function check_login($id)
    {
        if (is_numeric($id)) {
            $query = "select * from users where userid='$id'";
            $db = new Database();
            $result = $db->read($query);
            if ($result) {
                $userdata = $result[0];
                return $userdata;
            } else {


                header("Location:../public/index.php");
                die;
            }
        } else {
            // echo '<br><br><br><br>';
            // print_r($_SESSION);
            // exit;


            header("Location:../public/index.php");

            die;
        }
    }
}
