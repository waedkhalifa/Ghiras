<?php


// Create connection
$conn = new mysqli('localhost', 'root', '', 'mozare');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userid=$_POST['user_id'];
// sql to delete a record
$sql = "DELETE FROM cart WHERE user_id='$userid'";
$res = mysqli_query($conn, $sql);



if ($res===TRUE){
  echo "true";
}
else{
  echo "false";
}

 

$conn->close();
?>