<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}


$name=$_POST['username'];
$eng=$_POST['eng'];

$sql = "UPDATE user SET eng = '$eng' where username='$name'";
$res = mysqli_query($db, $sql);

if($res){

    //write success
    $obj=mysqli_fetch_object($res);
       
       echo json_encode($obj);
   
    }
mysqli_close($db);
header('Content-Type: application/json');

return;

?>