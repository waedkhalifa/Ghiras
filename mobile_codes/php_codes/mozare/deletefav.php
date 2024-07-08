<?php


// Create connection
$conn = new mysqli('localhost', 'root', '', 'mozare');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_id=$_POST['user_id'];
$item_id=$_POST['item_id'];
// sql to delete a record
$sql = "DELETE FROM favorite WHERE user_id='$user_id' and item_id='$item_id'";

$res = mysqli_query($conn, $sql);

if ($res===TRUE){
  echo "true";
}
else{
  echo "false";
}

 

$conn->close();
?>