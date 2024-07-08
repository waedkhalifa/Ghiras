<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}

$favorite=$_GET['favorite'];
$id=$_POST['id'];
$arr=array();


$sql = "update plant SET favorite = '$favorite' where id='$id'";

$res = mysqli_query($db, $sql);


mysqli_close($db);
header('Content-Type: application/json');

return;

?>