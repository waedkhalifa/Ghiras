<?php 
  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $return["total"] = 0;
$id=$_GET['user_id'];
       //checking if there is POST data
       $sql = "SELECT * FROM cart where user_id='$id'";


       //building SQL query
       $res = mysqli_query($link, $sql);

       while ($row = mysqli_fetch_assoc($res)) {
        $return["total"] = $return["total"] + ($row["price"] * $row["count"]);
      } 
       
       //check if there is any row
       echo json_encode($return);


           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>