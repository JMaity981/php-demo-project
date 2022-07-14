<?php
	require_once('../db/connection.php');
    $folder_id=$_GET['folder_id'];

    $s_qry = mysqli_query($conn,"SELECT id, photo_name FROM photo_upload WHERE 	fk_folder_id = '".$folder_id."'");
    while($data = mysqli_fetch_assoc($s_qry)){
        $photo_name = $data['photo_name'];
        $path= '../uploads/'.$photo_name;
	    unlink($path);

        $qry = "DELETE FROM share_photo WHERE fk_photo_id= '".$data['id']."'";
        $delete= mysqli_query($conn,$qry);
    }


    $qry = "DELETE FROM folder WHERE id= '".$folder_id."'";
    $delete= mysqli_query($conn,$qry);

    $qry2 = "DELETE FROM photo_upload WHERE fk_folder_id = '".$folder_id."'";
    $delete2= mysqli_query($conn,$qry2);

    $qry3 = "DELETE FROM share_folder WHERE fk_folder_id = '".$folder_id."'";
    $delete2= mysqli_query($conn,$qry3);

    if($delete and $delete2){
        $return['key'] = 'S';
    }else{
        $return= ['key'=>"E", 'message'=>"Photo not Deleted"];
    }
    echo json_encode($return);
?>