<?php
	require_once('../db/connection.php');
    // $file_pointer = "../uploads/".$_GET['photo_name'];
    // unlink($file_pointer);
    $photo_name = $_GET['photo_name'];
    $path= '../uploads/'.$photo_name;
	unlink($path);

    $photo_id=$_GET['photo_id'];
    $qry = "DELETE FROM photo_upload WHERE id= '".$photo_id."'";
    $delete= mysqli_query($conn,$qry);

    $qry2 = "DELETE FROM share_photo WHERE fk_photo_id = '".$photo_id."'";
    $delete2= mysqli_query($conn,$qry2);

    if($delete and $delete2){
        $return['key'] = 'S';
    }else{
        $return= ['key'=>"E", 'message'=>"Photo not Deleted"];
    }
    echo json_encode($return);
?>