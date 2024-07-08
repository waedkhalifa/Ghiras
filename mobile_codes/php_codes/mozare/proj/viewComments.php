<?php
try {
    $postId= $_POST['postid'];
    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from comments where postid=".$postId;
    $res = $db->query($qrystr);
    if($res!=null)
        for ($i = 0; $i < $res->num_rows; $i++)
        {
            $users = $res->fetch_object();
            echo json_encode($users);
        }
} catch (Exception $e) {

}