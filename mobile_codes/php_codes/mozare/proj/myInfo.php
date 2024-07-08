<?php
try {

$myID= $_POST['myID'];

$db = new mysqli('localhost', 'root', '', 'mozare');
$qrystr = "select * from user where id=".$myID;
$res = $db->query($qrystr);
for ($i = 0; $i < $res->num_rows; $i++)
    {
        $users = $res->fetch_object();
        echo json_encode($users);
    }
} catch (Exception $e) {

}