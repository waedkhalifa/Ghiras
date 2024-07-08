<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}

$id=$_POST['id'];
$count=$_POST['count'];
$unit=$_POST['unit'];
$nprice=$_POST['price'];
$userid=$_POST['userid'];
$arr2 = array();
$arr=array();

$sql2= "SELECT * from plant WHERE id='$id'";
$sql5= "SELECT * from cart WHERE item_id='$id'";
$sql6= "SELECT * from cart WHERE user_id='$userid' AND item_id='$id' AND unit='$unit'";


$res5 = mysqli_query($db, $sql5);
$numrows5 = mysqli_num_rows($res5);


$res2 = mysqli_query($db, $sql2);
$numrows = mysqli_num_rows($res2);


$res6 = mysqli_query($db, $sql6);
$numrows6 = mysqli_num_rows($res6);
echo "$numrows";
if($numrows6>0){

 
$c1=$row22['count'];
  $row22 = mysqli_fetch_assoc($res5);
  $value2=1+$row22['count'];
  $sqlupdate2 = "UPDATE cart SET count='$value2' WHERE item_id='$id'";
  $res10 = mysqli_query($db, $sqlupdate2);
}
if($numrows6==0){
if ($numrows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res2)) {
        $n=$row['name'];
        $p=$row['price'];
        $i=$row['imagename'];

        $sql = "INSERT INTO cart SET item_id='$id', name = '$n',price='$nprice',imagename='$i',unit='$unit',user_id='$userid',count='$c1'";

        $res = mysqli_query($db, $sql);
    $obj=mysqli_fetch_object($res);
      
           echo json_encode($obj);
           
           $sqlcount= "SELECT * from cart WHERE item_id='$id'";
           $res3 = mysqli_query($db, $sqlcount);
         $row1 = mysqli_fetch_assoc($res3);
            $value=$count;
       
           $sqlupdate = "UPDATE cart SET count='$value' WHERE item_id='$id'";
          $res4 = mysqli_query($db, $sqlupdate);

           
    }
    }
    else{
        echo "nothing";
    }}
mysqli_close($db);
header('Content-Type: application/json');

return;

?>