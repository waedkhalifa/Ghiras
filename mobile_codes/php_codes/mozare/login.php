<?php 

  $return["error"] = false;
  $return["message"] = "";
  $return["success"] = false;
  $return["id"]="";

  $link = mysqli_connect('localhost', 'root', '', 'mozare');

  if(isset($_POST["username"]) && isset($_POST["password"])){
       //checking if there is POST data

       $username = $_POST["username"];
       $password = $_POST["password"];

       //escape inverted comma query conflict from string

       $sql = "SELECT * FROM user WHERE username = '$username'";
       //building SQL query
       $res = mysqli_query($link, $sql);
       $numrows = mysqli_num_rows($res);
       
       //check if there is any row
       if($numrows > 0){
           
           //is there is any data with that username
           $obj = mysqli_fetch_object($res);
           //get row as object
           if($password == $obj->password){
               $return["success"] = true;
               $return["username"] = $obj->username;
               $return["imagename"] = $obj->imagename;
               $return["email"] = $obj->email;
               $return["id"]=$obj->id;
               
           }else{
               $return["error"] = true;
               $return["message"] = "Your Password is Incorrect.";
           }
       }else{
           
           $return["error"] = true;
           $return["message"] = 'No username found.';
           
       }
  }else{
      $return["error"] = true;
      $return["message"] = 'Send all parameters.';
  }
  mysqli_close($link);

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($return);
  //converting array to JSON string
?>