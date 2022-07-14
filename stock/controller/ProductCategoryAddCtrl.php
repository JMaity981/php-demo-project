<?php
	require_once('../db/connection.php');
    // print_r('$_POST');die;
    $category = $_POST['p_category'];
    // print $category; die;

    $qry = "INSERT INTO product_category (category) VALUES ('".$category."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Product Category Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Product Category Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>