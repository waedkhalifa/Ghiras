<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}

$favorite=$_GET['fav'];
$user_id=$_POST['user_id'];
$item_id=$_POST['item_id'];

$arr=array();


$sql = "insert into favorite set fav = '$favorite',user_id='$user_id',item_id='$item_id'";

$res = mysqli_query($db, $sql);


mysqli_close($db);
header('Content-Type: application/json');

return;

?>