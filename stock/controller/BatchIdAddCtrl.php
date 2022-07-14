<?php
	require_once('../db/connection.php');
    // print_r('$_POST');die;
    $product_category_id = $_POST['p_category_id'];
    $batch_id = $_POST['batch_id'];

    $qry = "INSERT INTO batch_id (fk_product_category_id, batch_id_name) VALUES ('".$product_category_id."', '".$batch_id."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Batch id Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Batch id Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>