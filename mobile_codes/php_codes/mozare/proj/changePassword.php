<?php

try {
    $myID=$_POST['myID'];
    $password=$_POST['password'];
    $db = new mysqli('localhost', 'root', '', 'mozare');

    if ($db->connect_error)
    {
        die("Connection failed: " . $db->connect_error);
    }

    $qrystr = 'update user set password="'.$password.'" where id="'.$myID.'"';

    if ($db->query($qrystr) === TRUE)
    {

    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}