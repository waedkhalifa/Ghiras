<?php
try {

    $image=$_FILES['image']['name'];
    $context=$_POST['context'];
    $userID=$_POST['id'];
    $userName=$_POST['username'];
    $userImage=$_POST['userimage'];
    $db = new mysqli('localhost', 'root', '', 'mozare');
    $path='images/'.$image;
    $tempName=$_FILES['image']['tmp_name'];
    //move_uploaded_file($tempName,$path);

  $sql = "INSERT INTO posts (userid,context,image,username,userimage) VALUES ('$userID','$context','$image','$userName','$userImage')";


  if ($db->query($sql) === TRUE) {

  }
  else{

  }

  $db->close();

} catch (Exception $e) {
  echo $e;

}