<?php 

  $return["error"] = false;
  $return["message"] = "";

  $link = mysqli_connect('localhost', 'root', '', 'mozare');
  //connecting to database server

  $val = isset($_POST["username"]) && isset($_POST["email"])
         && isset($_POST["password"]) ;

  if($val){
       //checking if there is POST data

       $username = $_POST["username"]; //grabing the data from headers
       $email = $_POST["email"];
       $password1 = $_POST["password"];

       //add more validations here
    
$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($link, $user_check_query); //$result=$db->query($user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['username'] === $username) {
        $return["message"] = "Username already exists";
    }

    if ($user['email'] === $email) {
        $return["message"] = "email already exists";

    }
}




       //if there is no any error then ready for database write
       if($return["error"] == false){
            $username = mysqli_real_escape_string($link, $username);
            $email = mysqli_real_escape_string($link, $email);
            $password1 = mysqli_real_escape_string($link, $password1);
            //$password2 = mysqli_real_escape_string($link, $password2);
            //$password1 = password_verify($password2);

            //escape inverted comma query conflict from string

            $sql = "INSERT INTO user SET
                                username = '$username',
                                email = '$email',
                                password = '$password1',
                                about='nothing',
                                image='noimage.jpg',
                                imagename='noimage.jpg',
eng='no'";
            //student_id is with AUTO_INCREMENT, so its value will increase automatically

            $res = mysqli_query($link, $sql);
            if($res){
                //write success
            }else{
                $return["error"] = true;
                $return["message"] = "Database error";
            }
       }
  }else{
      $return["error"] = true;
      $return["message"] = 'Send all parameters.';
  }

  mysqli_close($link); //close mysqli

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($return);
  //converting array to JSON string
?>