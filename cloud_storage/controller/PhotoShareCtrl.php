<?php
	require_once('../db/connection.php');
    // print_r($_POST);die;
    $fk_user_id = $_SESSION['id'];
    $fk_photo_id = $_POST['h_photo_id'];
    $share_person_user_id = $_POST['email_id'];
    $photo_name = $_POST['h_photo_name'];

    $link = "share.php?img_path=uploads/$photo_name&share_to=$share_person_user_id";//not use
    // print($link);die;

    $qry = mysqli_query($conn, "SELECT * FROM share_photo WHERE fk_user_id = '".$fk_user_id."' AND fk_photo_id = '".$fk_photo_id."' AND share_person_user_id = '".$share_person_user_id."'");
    if(mysqli_num_rows($qry) > 0){
        $return= ['key'=> "E" , 'msg'=>"This Photo Already Shared this Person."];
        echo json_encode($return);
        die;
    }
    $insert = mysqli_query($conn, "INSERT INTO share_photo (fk_user_id, fk_photo_id, share_person_user_id, link) VALUES ('".$fk_user_id."', '".$fk_photo_id."', '".$share_person_user_id."', '".$link."' )");
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Photo Shared."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Photo not Shared."];
    }
    echo json_encode($return);
?>