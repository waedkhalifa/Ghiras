<?php
try {

    

    $db = new mysqli('localhost', 'root', '', 'mozare');
$userID= $_POST['userID'];
    $qrystr = "select * from user where id='$userID'";
    $res = $db->query($qrystr);
    for ($i = 0; $i < $res->num_rows; $i++)
    {
        $users = $res->fetch_object();
        echo json_encode($users);
    }
} catch (Exception $e) {

}