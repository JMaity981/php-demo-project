<?php
	require_once('../db/connection.php');
    // if($_SESSION["is_admin"]=='Y'){
    //     if(isset($_SESSION["a_id"])){
    //         unset($_SESSION["a_id"]);
    //         unset($_SESSION["is_admin"]);
    //         header('Location: ../admin.php');
    //     }
    // }else{
        if(isset($_SESSION["s_id"])){
            unset($_SESSION["s_id"]);
            unset($_SESSION["name"]);
            header('Location: ../student.php');
        }
    // }
    // $return['key'] = 'S';
    // $return['msg'] = 'Logout Successfully.';
    // echo json_encode($return);
?>