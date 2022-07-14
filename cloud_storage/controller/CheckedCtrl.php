<?php
	require_once('../db/connection.php');
    $id= $_GET['id'];
    $is_active= $_GET['is_active'];
    $qry = "UPDATE resistration SET is_active = '".$is_active."' WHERE id= '".$id."'";
	$update= mysqli_query($conn, $qry);
    if($update){
        $return['key'] = 'S';
		$return['msg'] = 'Update successfully.';
    } 
    echo json_encode($return);
?>