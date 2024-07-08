<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();


       //checking if there is POST data
       $sql = "SELECT * FROM user Where eng='yes'";
     
       //building SQL query
       $res = mysqli_query($link, $sql);
     
       
       //check if there is any row
       $numrows = mysqli_num_rows($res);
    

if ($numrows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        array_push($arr,$row);
    }
}

       echo json_encode($arr);

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>