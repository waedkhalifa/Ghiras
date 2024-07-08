<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $user_id=$_GET['user_id'];
  $item_id=$_GET['item_id'];
       //checking if there is POST data
       $sql = "SELECT * FROM favorite where user_id='$user_id' and item_id='$item_id'";

       //building SQL query
       $res = mysqli_query($link, $sql);
       


       while($obj=mysqli_fetch_object($res)){
        array_push($arr, $obj);

       }
       echo json_encode($arr);

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>