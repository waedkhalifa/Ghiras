<?php
$postID=$_POST['postid'];
$userID=$_POST['userid'];

$db = new mysqli('localhost', 'root', '', 'mozare');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM likes WHERE postid='$postID' AND userid='$userID'";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}

$db->close();