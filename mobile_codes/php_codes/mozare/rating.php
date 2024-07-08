<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}


 $arr = array();
$id=$_GET['id'];
$rating=$_POST['rating'];
$tot=0;
$sql2 = "Select * from plant WHERE id='$id'";
$res2 = mysqli_query($db, $sql2);
$numrows2 = mysqli_num_rows($res2);


if ($numrows2 > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res2)) {
          $tot=$rating+$row['rating'];
          $tot=$tot/2;
    }}

$sql = "UPDATE plant SET rating = '$tot' WHERE id='$id'";
$res = mysqli_query($db, $sql);

if($res){

    //write success
    $obj=mysqli_fetch_object($res);
       
       echo json_encode($obj);
   
   // file_put_contents("upload\\".$imagename,$image2);
   // $path = 'C:\\dev\\mozare\\images\\'.$imagename;
   // file_put_contents($path,$image2);

    }
mysqli_close($db);
header('Content-Type: application/json');

return;

?>