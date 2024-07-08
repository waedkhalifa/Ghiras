<?php
$image=$_FILES['image']['name'];
$path='images/'.$image;
$tempName=$_FILES['image']['tmp_name'];
move_uploaded_file($tempName,$path);