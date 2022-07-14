<?php
	require_once('../db/connection.php');
    // print_r($_POST);die;
    $size_byte = $_POST['size_mb'] * 1024 *1024;
    $insert = mysqli_query($conn, "INSERT INTO package (package_name, size) VALUES ('".$_POST['package_name']."', '".$size_byte."')");
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Package Add Sucessfully."];
    }else{
        $return= ['key'=> "S" , 'msg'=>"Package Add Unsucessfully."];
    }
    echo json_encode($return);
?>