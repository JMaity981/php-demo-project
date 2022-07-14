<?php
	require_once('../db/connection.php');

    $p_name = $_POST['p_name'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    $qry = "INSERT INTO stock_in (p_name, buying_quantity, date, price) VALUES ('".$p_name."', '".$quantity."', '".$date."', '".$price."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Product Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Product Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>