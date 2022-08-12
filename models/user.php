<?php

include_once '/xampp/htdocs/zekrayat/helper/database.php';

class User
{
    private $error = "";
    public function validateNewUSer($data)
    {
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // exit;

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error = $this->error . $key . " is empty! <br>";
            }
            if ($key == "email" && !empty($value)) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->error = $this->error . "invalid email address!<br>";
                } else {
                    $query = "SELECT * from users where email='$value' ";
                    $db = new Database();
                    $result = $db->read($query);
                    if ($result) {
                        $this->error = $this->error . "An account with this email address already exists!<br>";
                    }
                }
            }
            if ($key == "firstname" || $key == "lastname") {
                if (is_numeric($value)) {

                    $this->error = $this->error . "first name and last name can't be a number<br>Please enter your real name<br> ";
                }
            }
        }

        if ($this->error == "") {
            //create user
            $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        $fname = $data['firstname'];
        $lname = $data['lastname'];
        $email = $data['email'];
        $city = $data['city'];
        $occupation = $data['occupation'];
        $password = $data['password'];
        $userid = $this->create_userid();
        $query = "INSERT INTO users (userid,first_name,last_name,email,city,occupation,password) 
          values('$userid','$fname','$lname','$email','$city','$occupation','$password')";
        // echo "created";
        // echo $query;
        $db = new Database();
        $db->save($query);
    }



    private function create_userid()
    {
        $length = rand(4, 19);
        $number = '';
        for ($i = 0; $i < $length; $i++) {
            $new_number = rand(0, 9);
            $number .= $new_number;
        }
        return $number;
    }

    public function validateUSer($data)
    {

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error = $this->error . $key . " is empty! <br>";
            }
            if ($key == "email" && !empty($value)) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->error = $this->error . "invalid email address!<br>";
                }
            }
        }
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);
        $query = "SELECT * from users where email='$email' ";

        $db = new Database();
        $result = $db->read($query);

        // echo '<pre>';
        // var_dump($result);
        // echo '</pre>';
        // echo '<pre>';
        // var_dump($result[0]['firstname']);
        // echo '</pre>';

        if (empty($this->error)) {
            if ($result) {
                $userData = $result[0];
                if ($password == $userData['password']) {
                    $_SESSION['zekraiayat_userid'] = $userData['userid'];
                    $_SESSION['username'] = $userData['first_name'] . " " . $userData['last_name'];
                } else {
                    $this->error .= "wrong password";
                }
            } else {
                $this->error .= "No registered account with the given Email";
            }
        }
        return $this->error;
    }
}
