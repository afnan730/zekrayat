<?php
require_once '../helper/database.php';

class Comment
{


    function addComment($data)
    {
        $picId = $data['imgId'];
        $user_id = $data['userid'];
        $username = $data['username'];
        $comment = $data['content'];

        $db = new Database();
        $query = "INSERT INTO comments (photo_id,user_id,username,comment) values('$picId','$user_id','$username','$comment')";
        $db->save($query);
    }

    function getComments($picID)
    {
        $query = "select * from comments where photo_id='$picID' order by id desc";
        $db = new Database();
        $result = $db->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
