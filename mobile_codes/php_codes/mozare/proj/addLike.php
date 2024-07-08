<?php
try {
    $userID=$_POST['userid'];
    $postID=$_POST['postid'];
    $db = new mysqli('localhost', 'root', '', 'mozare');


    $sql = "INSERT INTO likes (postid,userid) VALUES ('$postID','$userID')";


    if ($db->query($sql) === TRUE) {

    }
    else{

    }

    $db->close();

} catch (Exception $e) {
    echo $e;

}