<?php
try {

    $postID=$_POST['postid'];
    $userID=$_POST['userid'];
    $isLiked=0;

    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from likes where postid=".$postID;
    $res = $db->query($qrystr);
    for ($i = 0; $i < $res->num_rows; $i++)
    {

    }

    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from likes where userid=".$userID;
    $res2 = $db->query($qrystr);
    if ($res2->num_rows>0)
        $isLiked=1;
    else $isLiked=0;

    echo json_encode(array("isLiked"=>"$isLiked","Likes"=>"$res->num_rows"));;
} catch (Exception $e) {

}