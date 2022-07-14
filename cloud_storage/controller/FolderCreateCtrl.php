<?php
	require_once('../db/connection.php');
    // print_r('$_POST');die;
    $user_id = $_SESSION['id'];
    $folder_name = $_POST['folder'];

    $qry = mysqli_query($conn, "SELECT folder_name from folder WHERE fk_user_id = '".$user_id."'");
    while($data = mysqli_fetch_assoc($qry)){
        if($folder_name == $data['folder_name']){
            $return= ['key'=> "E" , 'msg'=>"This Folder alrady Created"];
            echo json_encode($return);
            die;
        }
    }
    $qry = "INSERT INTO folder (fk_user_id, folder_name) VALUES ('".$user_id."', '".$folder_name."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Folder Created."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Folder not Created."];
    }
    echo json_encode($return);
    
?>