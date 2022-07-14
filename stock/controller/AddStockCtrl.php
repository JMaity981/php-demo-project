<?php
	require_once('../db/connection.php');
    // print_r($_FILES);die;
    $fk_product_category_id	 = $_POST['p_category_id'];
    $fk_batch_id = $_POST['batch_id'];
    $product_name = $_POST['p_name'];
    $quantity = $_POST['quantity'];
    $buy_price = $_POST['b_price'];
    $sell_price = $_POST['s_price'];
    $total_buy_amount = $buy_price * $quantity;
    $photo_name = '';
    if($_FILES['photo']['name'] != ''){
        $test = explode('.', $_FILES['photo']['name']);
        $extension = end($test);
        if($extension!='jpg' and $extension!='png' and $extension!='jpeg'){
            $return= ['key'=> "E" , 'msg'=>"upload a correct Picture"];
            echo json_encode($return);
            die;
        }  
        $photo_name = rand(10000,99999).'.'.$extension;
        $location = '../uploads/'.$photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $location);
        $photo = basename($_FILES["photo"]["name"]);
    }
    $qry = "INSERT INTO add_stock (fk_product_category_id, fk_batch_id, product_name, photo, quantity, buy_price, sell_price, available, total_buy_amount) VALUES ('".$fk_product_category_id."', '".$fk_batch_id."', '".$product_name."', '".$photo_name."', '".$quantity."', '".$buy_price."', '".$sell_price."', '".$quantity."', '".$total_buy_amount."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Product Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Product Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>