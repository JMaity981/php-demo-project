<?php
	require_once('../db/connection.php');
    // print_r($_FILES);die;
    $user_id = $_SESSION['id'];
    $slect_file = 0;
    foreach($_FILES['photo']['name'] as $key=>$val){
        if($key == 5){
            $return= ['key'=> "E" , 'msg'=>"Maximum 5 file upload at a time"];
            echo json_encode($return);
            die;
        }
        $slect_file++;
    }
    if(isset($_POST['folder_id'])){
        $folder_id = $_POST['folder_id'];
        $qry = mysqli_query($conn, "SELECT COUNT(id) FROM photo_upload WHERE fk_folder_id = '".$folder_id."'");
        $data = mysqli_fetch_assoc($qry);
        //print($data['COUNT(id)']);die;
        if(($slect_file + $data['COUNT(id)']) > 10){
            $return= ['key'=> "E" , 'msg'=>"Maximum 10 photos in a folder"];
            echo json_encode($return);
            die;
        }
    }else{
        $folder_id = '0';
    }
    
    // print($slect_file);die;
    

    foreach($_FILES['photo']['name'] as $key=>$val){

    
        $photo_size = $_FILES['photo']['size'][$key];

        //Photo Extension Checking
        $test = explode('.', $_FILES['photo']['name'][$key]);
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
            $return= ['key'=> "E" , 'msg'=>"Your Memory Full"];
            echo json_encode($return);
            die;
        }

        //photo upload
        $photo_name = rand(10000,99999).'.'.$extension;
        $location = '../uploads/'.$photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'][$key], $location);
        $photo = basename($_FILES["photo"]["name"][$key]);

        $qry = "INSERT INTO photo_upload (fk_user_id, fk_folder_id, photo_name, photo_size) VALUES ('".$user_id."', '".$folder_id."', '".$photo_name."', '".$photo_size."')";
        $insert = mysqli_query($conn, $qry);
    }
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Photo Uploaded."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Photo not Uploaded."];
    }
    echo json_encode($return);
?>