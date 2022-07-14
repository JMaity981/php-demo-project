<?php
	require_once('../db/connection.php');
    $package_id = $_POST['package_id'];
    // print($package_id);die;
    $qry = "UPDATE resistration SET package_id = '".$package_id."' WHERE id = '".$_SESSION['id']."'";
	$update = mysqli_query($conn, $qry);
    if($update){
        $return= ['key'=> "S" , 'msg'=>"Package Upgraded."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Package Not Upgraded."];
    }
    echo json_encode($return);
?>