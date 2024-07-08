<?php
try {

    $PostID= $_POST['postid'];
    $context= $_POST['context'];
    $userID= $_POST['userid'];
    $userName=$_POST['username'];
    $userImage=$_POST['userimage'];
/*
    $PostID= "130";
    $context= "Nice";
    $userID= "11820498";
    $userName="Dania";
    $userImage="image_picker8538531097981066432.jpg";

*/


    $db = new mysqli('localhost', 'root', '', 'mozare');
    $sql = "INSERT INTO comments (postid,context,username,userimage,userid) VALUES ('$PostID','$context','$userName','$userImage','$userID')";


    if ($db->query($sql) === TRUE) {

    }
    else{

    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}
