<?php

try {

    $myID = $_POST['myID'];
    $myName = $_POST['myName'];
    $myAbout = $_POST['myAbout'];
    $myEmail = $_POST['myEmail'];

   /* $myID = "11820499";
    $myName = "Noor Nazzal";
    $myAbout = "Am so happy YES lololololo";
    $myEmail = "NoorNazzal87@gmail.com";*/

    $db = new mysqli('localhost', 'root', '', 'mozare');
    if ($db->connect_error)
    {
        die("Connection failed: " . $db->connect_error);
    }

    $qrystr = 'update user set username="'.$myName.'",email="'.$myEmail.'",about="'.$myAbout.'" where id='.$myID;

    if ($db->query($qrystr) === TRUE)
    {

    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}