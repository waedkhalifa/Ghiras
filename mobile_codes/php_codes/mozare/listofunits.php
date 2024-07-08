<?php 

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  $arr = array();
  $id=$_GET['id'];

       //checking if there is POST data
       $sql = "SELECT * FROM plant where id='$id' AND category='p'";
      
       //building SQL query
       $res = mysqli_query($link, $sql);
      
       //check if there is any row
       $numrows = mysqli_num_rows($res);
      
if ($numrows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
       // $n=$row['name'];
       if($row['price']!="0" && $row['price2']=="0" && $row['price3']=="0"){
      $arr=array("Kg");
    }

    else if($row['price']!="0" && $row['price2']!="0" && $row['price3']=="0"){
        $arr=array("Kg","g");

      }

      else if($row['price']!="0" && $row['price2']!="0" && $row['price3']!="0"){
        $arr=array("Kg","g","Seedlings");
      }

     else if($row['price']!="0" && $row['price2']=="0" && $row['price3']!="0"){
        $arr=array("Kg","Seedlings");
      }
      else if($row['price']=="0" && $row['price2']!="0" && $row['price3']!="0"){
        $arr=array("g","Seedlings");
      }

      else if($row['price']=="0" && $row['price2']!="0" && $row['price3']=="0"){
        $arr=array("g");
      }

      else if($row['price']=="0" && $row['price2']=="0" && $row['price3']!="0"){
        $arr=array("Seedlings");
      }


    }
    echo json_encode($arr);
    
}




    //checking if there is POST data
       $sql = "SELECT * FROM plant where id='$id' AND category='c'";
      
       //building SQL query
       $res = mysqli_query($link, $sql);
      
       //check if there is any row
       $numrows = mysqli_num_rows($res);
      
if ($numrows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
       // $n=$row['name'];
       if($row['price']!="0" && $row['price2']=="0" && $row['price3']=="0"){
      $arr=array("Kg");
    }

    else if($row['price']!="0" && $row['price2']!="0" && $row['price3']=="0"){
        $arr=array("Kg","Box");

      }

      else if($row['price']!="0" && $row['price2']!="0" && $row['price3']!="0"){
        $arr=array("Kg","Box","Pallet");
      }

     else if($row['price']!="0" && $row['price2']=="0" && $row['price3']!="0"){
        $arr=array("Kg","Pallet");
      }
      else if($row['price']=="0" && $row['price2']!="0" && $row['price3']!="0"){
        $arr=array("Box","Pallet");
      }

      else if($row['price']=="0" && $row['price2']!="0" && $row['price3']=="0"){
        $arr=array("Box");
      }

      else if($row['price']=="0" && $row['price2']=="0" && $row['price3']!="0"){
        $arr=array("Pallet");
      }


    }
    echo json_encode($arr);
}




    //checking if there is POST data
    $sql = "SELECT * FROM plant where id='$id' AND category='e'";
      
    //building SQL query
    $res = mysqli_query($link, $sql);
   
    //check if there is any row
    $numrows = mysqli_num_rows($res);
   
if ($numrows > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($res)) {
    // $n=$row['name'];
    if($row['price']!="0" && $row['price2']=="0" && $row['price3']=="0"){
   $arr=array("Piece");
 }

 



 }
 echo json_encode($arr);
}
   
       

           //is there is any data with that username


  // tell browser that its a json data
  //converting array to JSON string
?>