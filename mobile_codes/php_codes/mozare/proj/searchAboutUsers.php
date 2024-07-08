<?php
try {
    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from user";
    $res = $db->query($qrystr);
    if($res!=null)
    for ($i = 0; $i < $res->num_rows; $i++)
    {
        $users = $res->fetch_object();
        echo json_encode($users);
    }
} catch (Exception $e) {

}