<?php
try {

    $myID= $_POST['myID'];
    $userID= $_POST['userID'];
    $reason=$_POST['reason'];


    $db = new mysqli('localhost', 'root', '', 'mozare');
    $sql = "INSERT INTO reports (id,reason,writerid) VALUES ('$userID','$reason','$myID')";


    if ($db->query($sql) === TRUE) {

    }
    else{

    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}