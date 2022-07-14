<?php
	require_once('../db/connection.php');
    session_start();
    if(isset($_SESSION["id"])){
        unset($_SESSION["id"]);
    }
    //session_destroy();
    if(session_destroy()){
        $return['key'] = 'S';
        $return['msg'] = 'Logout Successfully.';
    }
    echo json_encode($return);
?>