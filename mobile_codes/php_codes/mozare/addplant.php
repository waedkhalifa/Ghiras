<?php

$db=mysqli_connect('localhost','root','','mozare');
if(!$db){
    echo 'Database connection error'.$db->error_no;
}
 $arr = array();
$name=$_POST['name'];

$price=$_POST['price'];
$price2=$_POST['price2'];
$price3=$_POST['price3'];

$watering=$_POST['watering'];
$days=$_POST['dayss'];
$temp=$_POST['temp'];

$about=$_POST['about'];
$favorite=$_POST['favorite'];
$category=$_POST['category'];
$image=utf8_decode($_POST['image']);
$image2=base64_decode($_POST['image']);
$imagename=$_POST['imagename'];
$userid=$_POST['userid'];

$imageTwo=utf8_decode($_POST['image2']);
$image22=base64_decode($_POST['image2']);
$imagenameTwo=$_POST['imagename2'];

$imageThree=utf8_decode($_POST['image3']);
$image23=base64_decode($_POST['image3']);
$imagenameThree=$_POST['imagename3'];



$sql = "INSERT INTO plant SET name = '$name',price='$price',price2='$price2',price3='$price3',watering='$watering',temp='$temp',dayss='$days',about='$about',image = '$image',imagename='$imagename',image2 = '$imageTwo',imagename2='$imagenameTwo',image3 = '$imageThree',imagename3='$imagenameThree',favorite='$favorite',user_id='$userid',rating='0',category='$category'";
$sql2= "SELECT id from plant WHERE name='$name'";
$res = mysqli_query($db, $sql);
$res2 = mysqli_query($db, $sql2);


if($res){
   echo "njoiio";

    //write success
    $obj=mysqli_fetch_object($res2);
       
       echo json_encode($obj);
   
    file_put_contents("upload\\".$imagename,$image2);
    file_put_contents("upload\\".$imagenameTwo,$image22);
    file_put_contents("upload\\".$imagenameThree,$image23);

    $path = 'C:\\dev\\mozare\\images\\'.$imagename;
    file_put_contents($path,$image2);

    $path2 = 'C:\\dev\\mozare\\images\\'.$imagenameTwo;
    file_put_contents($path2,$image22);

    $path3 = 'C:\\dev\\mozare\\images\\'.$imagenameThree;
    file_put_contents($path3,$image23);

    }
mysqli_close($db);
header('Content-Type: application/json');

return;

?>