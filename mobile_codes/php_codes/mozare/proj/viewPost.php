<?php
try {

    $PostId=$_POST['id'];

    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from posts where id=".$PostId;
    $res = $db->query($qrystr);
    for ($i = 0; $i < $res->num_rows; $i++)
    {
        $users = $res->fetch_object();
        echo json_encode($users);
    }
} catch (Exception $e) {

}