<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}

$id=$_GET['item_id'];
$count=$_POST['count'];


           
           $sqlcount= "SELECT * from cart WHERE item_id='$id'";
           $res3 = mysqli_query($db, $sqlcount);
         $row1 = mysqli_fetch_assoc($res3);
            $value=$count;
       
           $sqlupdate = "UPDATE cart SET count='$value' WHERE item_id='$id'";
          $res4 = mysqli_query($db, $sqlupdate);

           
    
    
   
mysqli_close($db);
header('Content-Type: application/json');

return;

?>