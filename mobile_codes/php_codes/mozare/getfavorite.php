<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $user_id=$_GET['user_id'];
 

       //checking if there is POST data
      $sql= "SELECT * from favorite inner join plant on favorite.item_id=plant.id where favorite.user_id='$user_id'";
     //  $sql = "SELECT * FROM favorite Where user_id='$id'";
   
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

?>