<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $arr2 = array();
$id=$_GET['user_id'];
$return['rev']=0;
$return2['los']=0;
$return3['profit']=0;
       //checking if there is POST data
       $sql = "SELECT * FROM reciept Where user_id='$id'";

       //building SQL query
       $res = mysqli_query($link, $sql);

       
       //check if there is any row
       $numrows = mysqli_num_rows($res);


if ($numrows > 0) {
    // output data of each row

 

    while($row=mysqli_fetch_assoc($res)){
      array_push($arr, $row);

     }

     $sql2 = "SELECT * FROM reciept Where operation='sell' AND user_id='$id'";
     
     //building SQL query
     $res2 = mysqli_query($link, $sql2);
     //check if there is any row
     $numrows2 = mysqli_num_rows($res2);
     if($numrows2>0){
      while($row2=mysqli_fetch_assoc($res2)){
      $return['rev']=$return['rev']+$row2['price'];}
     }



     $sql3 = "SELECT * FROM reciept Where operation='buy' AND user_id='$id'";
    // 
    //building SQL query
    $res3 = mysqli_query($link, $sql3);
    //check if there is any row
    $numrows3= mysqli_num_rows($res3);
 
    if($numrows3>0){
      while($row3=mysqli_fetch_assoc($res3)){
      $return2['los']=$return2['los']+$row3['price'];}
     }

$return3['profit']= $return['rev']-$return2['los'];
     array_push($arr2,$return);
     array_push($arr2,$return2);
     array_push($arr2,$return3);
     $result = array_merge($arr2, $arr);
     //array_push($arr, $return);
     echo json_encode($result);
    }

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>