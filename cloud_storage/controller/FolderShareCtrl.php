<?php
	require_once('../db/connection.php');
    // print_r($_POST);die;
    $fk_user_id = $_SESSION['id'];
    $fk_folder_id = $_POST['h_folder_id'];
    $share_person_user_id = $_POST['email_id'];

    $qry = mysqli_query($conn, "SELECT * FROM share_folder WHERE fk_user_id = '".$fk_user_id."' AND fk_folder_id = '".$fk_folder_id."' AND share_person_user_id = '".$share_person_user_id."'");
    if(mysqli_num_rows($qry) > 0){
        $return= ['key'=> "E" , 'msg'=>"This Folder Already Shared this Person."];
        echo json_encode($return);
        die;
    }

    $insert = mysqli_query($conn, "INSERT INTO share_folder (fk_user_id, fk_folder_id, share_person_user_id) VALUES ('".$fk_user_id."', '".$fk_folder_id."', '".$share_person_user_id."')");
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"File Shared."];
    }else{
        $return= ['key'=> "S" , 'msg'=>"File not Shared."];
    }
    echo json_encode($return);
?>