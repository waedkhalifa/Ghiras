



<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $arr2 = array();
$id=$_GET['user_id'];

       //checking if there is POST data
     //  $sql = "SELECT * FROM reciept Where user_id='$id'";
     $sql="SELECT year ,SUM(price) as sum FROM reciept where user_id='$id' And operation='sell' group by year";

       //building SQL query
       $res = mysqli_query($link, $sql);

       
       //check if there is any row
       $numrows = mysqli_num_rows($res);


if ($numrows > 0) {
    // output data of each row

 

    while($row=mysqli_fetch_assoc($res)){
      array_push($arr, $row);

     }
     $return['len']=count($arr);
    
     //array_push($arr, $return);
     //echo json_encode($arr);
    }


    $sql2="SELECT year ,SUM(price) as sum2 FROM reciept where user_id='$id' And operation='buy' group by year";

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
  array_push($arr, $return);

  echo json_encode($arr);
 }
           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>