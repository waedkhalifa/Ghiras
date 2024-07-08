<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $id=$_GET['id'];
       //checking if there is POST data
       $sql = "SELECT * FROM crops where id='$id'";

       //building SQL query
       $res = mysqli_query($link, $sql);
       
       //check if there is any row
       $numrows = mysqli_num_rows($res);

       while($obj=mysqli_fetch_object($res)){
        array_push($arr, $obj);

       }
       echo json_encode($arr);

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>