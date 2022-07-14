<?php
	require_once('../db/connection.php');

    $id=$_GET['u_id'];
    $qry = "DELETE FROM registration WHERE id= '".$id."'";
    $delete= mysqli_query($conn,$qry);
    if($delete){
        $return['key'] = 'S';
    }else{
        $return= ['key'=>"E", 'message'=>"Delete Unsuccessfully"];
    }
    echo json_encode($return);
?>