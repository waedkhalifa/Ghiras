<?php

try {

    $image=$_FILES['image']['name'];
    $name=$_POST['name'];
    $myID=$_POST['id'];
    $db = new mysqli('localhost', 'root', '', 'mozare');
    $path='images/'.$image;
    $tempName=$_FILES['image']['tmp_name'];
    move_uploaded_file($tempName,$path);
    if ($db->connect_error)
    {
        die("Connection failed: " . $db->connect_error);
    }

    $qrystr = 'update user set image="'.$image.'",imagename="'.$name.'" where id='.$myID;

    if ($db->query($qrystr) === TRUE)
    {


    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}