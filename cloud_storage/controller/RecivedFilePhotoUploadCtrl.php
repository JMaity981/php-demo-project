<?php
	require_once('../db/connection.php');
    // print_r($_FILES);die;
    $folder_id = $_POST['folder_id'];

    $qry = mysqli_query($conn,"SELECT fk_user_id FROM folder WHERE id='".$folder_id."'");
    $data = mysqli_fetch_assoc($qry);
    $user_id = $data['fk_user_id'];

    $photo_size = $_FILES['photo']['size'];

    //Photo Extension Checking
    $test = explode('.', $_FILES['photo']['name']);
    $extension = end($test);
    if($extension!='jpg' and $extension!='png' and $extension!='jpeg'){
        $return= ['key'=> "E" , 'msg'=>"Upload a correct Picture"];
        echo json_encode($return);
        die;
    }

    //Memory checking
    $qry= mysqli_query($conn, "SELECT photo_size FROM photo_upload WHERE fk_user_id = '".$user_id."'");
    $total_photo_size = $photo_size; 
    while($data = mysqli_fetch_assoc($qry)){
        $total_photo_size = $total_photo_size + $data['photo_size'];
    }
    $qry= mysqli_query($conn, "SELECT size FROM package INNER JOIN resistration ON package.id = resistration.package_id WHERE resistration.id = '".$user_id."'");
    $data = mysqli_fetch_assoc($qry);
    $total_memory = $data['size'];
    if($total_memory<$total_photo_size){
        $return= ['key'=> "E" , 'msg'=>"This Folder Memory Full"];
        echo json_encode($return);
        die;
    }

    //photo upload
    $photo_name = rand(10000,99999).'.'.$extension;
    $location = '../uploads/'.$photo_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $location);
    $photo = basename($_FILES["photo"]["name"]);

    $qry = "INSERT INTO photo_upload (fk_user_id, fk_folder_id, photo_name, photo_size) VALUES ('".$user_id."', '".$folder_id."', '".$photo_name."', '".$photo_size."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Photo Upload on Recived Folder."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Photo not Uploaded."];
    }
    echo json_encode($return);
?>