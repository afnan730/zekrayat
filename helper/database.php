<?php


class Database
{

    function connect()
    {

        $connection = mysqli_connect('localhost', 'root', '', 'zekraiat_db');
        return $connection;
    }

    function read($query)
    {
        $connection = $this->connect();
        $result = mysqli_query($connection, $query);
        if (!$result) {
            return false;
        } else {
            $data = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function save($query)
    {
        $connection = $this->connect();
        $result = mysqli_query($connection, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}

// $db = new Database();
// $data = $db->read("select * from users");
// print_r($data);
