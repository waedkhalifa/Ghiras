<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $id=$_GET['id'];

       //checking if there is POST data
       $sql = "SELECT * FROM plant Where favorite='1p'";
       $sql2 = "SELECT * FROM plant Where favorite='1c'";
       $sql3 = "SELECT * FROM plant Where favorite='1e'";
       //building SQL query
       $res = mysqli_query($link, $sql);
       $res2=mysqli_query($link, $sql2);
       $res3=mysqli_query($link, $sql3);
       
       //check if there is any row
       $numrows = mysqli_num_rows($res);
       $numrows2 = mysqli_num_rows($res2);
       $numrows3 = mysqli_num_rows($res3);

if ($numrows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        array_push($arr,$row);
    }
}
if ($numrows2 > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($res2)) {
        array_push($arr,$row2);
    }
}  
if ($numrows3 > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($res3)) {
        array_push($arr,$row3);
    }
}   
       echo json_encode($arr);

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>