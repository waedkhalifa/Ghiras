<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}
 $arr = array();
//$itemid=$_POST['itemid'];
//$price=$_POST['price'];
//$operation=$_POST['operation'];
$userid=$_POST['user_id'];
$operation=$_POST['operation'];
$date=$_POST['date'];
$year=$_POST['year'];
//$imagename=$_POST['imagename'];
$sql2= "SELECT * from cart WHERE user_id='$userid'";
$res2 = mysqli_query($db, $sql2);



while($row = mysqli_fetch_assoc($res2)) {
    $itemid=$row['item_id'];
    $price=$row['price']*$row['count'];
    $imagename=$row['imagename'];
    $quan=$row['count'];

    $sql = "INSERT INTO reciept SET user_id = '$userid',item_id='$itemid',price='$price',operation = '$operation',date='$date',imagename='$imagename',year='$year',quantity='$quan'";
    $res = mysqli_query($db, $sql);

    $sql3= "SELECT * from plant WHERE id='$itemid'";
    $res3 = mysqli_query($db, $sql3);
    while($row2 = mysqli_fetch_assoc($res3)) {
        $id=$row2['user_id'];
        $sql4 = "INSERT INTO reciept SET user_id = '$id',item_id='$itemid',price='$price',operation = 'sell',date='$date',imagename='$imagename',year='$year',quantity='$quan'";
        $res4 = mysqli_query($db, $sql4);
}
}



if($res){
    //write success
    $obj=mysqli_fetch_object($res2);
       
       echo json_encode($obj);
   
 

    }
mysqli_close($db);
header('Content-Type: application/json');

return;

?>