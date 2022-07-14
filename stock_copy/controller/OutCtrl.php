<?php
	require_once('../db/connection.php');

    $p_id = $_POST['p_id'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    $qry = "INSERT INTO stock_out (fk_product_id, selling_quantity, date, selling_price) VALUES ('".$p_id."', '".$quantity."', '".$date."', '".$price."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Selling Product Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Selling Product Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>