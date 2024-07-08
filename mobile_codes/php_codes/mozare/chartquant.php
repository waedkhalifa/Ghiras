



<?php 

$link = mysqli_connect('localhost', 'root', '', 'mozare');
$arr = array();
$arr2 = array();
$id=$_GET['user_id'];
$return['len']=0;
     //checking if there is POST data
   //  $sql = "SELECT * FROM reciept Where user_id='$id'";
   $sql="SELECT year,item_id, sum(quantity) as sum FROM reciept where operation='sell' group by item_id";

     //building SQL query
     $res = mysqli_query($link, $sql);

     
     //check if there is any row
     $numrows = mysqli_num_rows($res);


if ($numrows > 0) {
  // output data of each row



  while($row=mysqli_fetch_assoc($res)){
    array_push($arr, $row);

   }

  
   //array_push($arr, $return);
   $return['len']=count($arr);
  }

  $sql2="SELECT year, sum(quantity) as sum2 FROM reciept where user_id='$id' AND operation='buy' group by year";

     //building SQL query
     $res2 = mysqli_query($link, $sql2);

     
     //check if there is any row
     $numrows2 = mysqli_num_rows($res2);


if ($numrows2 > 0) {
  // output data of each row



  while($row2=mysqli_fetch_assoc($res2)){
    array_push($arr, $row2);

   }

  
   //array_push($arr, $return);
  
  }
         //is there is any data with that username
         array_push($arr, $return);
         echo json_encode($arr);
// tell browser that its a json data
//converting array to JSON string
?>