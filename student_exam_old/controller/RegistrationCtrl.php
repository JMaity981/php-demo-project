<?php
	require_once('../db/connection.php');

    $name = $_POST['name'];
    $class_id = $_POST['class_id'];
    $roll_no = $_POST['roll_no'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $qry = "INSERT INTO registration (name, class_id, roll_no, user_id, password) VALUES ('".$name."', '".$class_id."', '".$roll_no."', '".$user_id."', '".$password."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Registration Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Registration Un-sucessfully."];
    }
    echo json_encode($return);
    
?>