<?php


// Create connection
$conn = new mysqli('localhost', 'root', '', 'mozare');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id=$_POST['id'];
// sql to delete a record
$sql = "DELETE FROM user WHERE id='$id'";

$res = mysqli_query($conn, $sql);

if ($res===TRUE){
  echo "true";
}
else{
  echo "false";
}



$conn->close();
?>