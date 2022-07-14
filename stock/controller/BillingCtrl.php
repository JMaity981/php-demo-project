<?php
	require_once('../db/connection.php');
    // print_r($_POST);
    date_default_timezone_set('Asia/Kolkata');

    $bill_no = date('Ymd').date('His');
    $name = $_POST['name'];
    $mobile  = $_POST['mobile'];
    $total = $_POST['total'];
    $discount_parsent = $_POST['discount_parsent'];
    $discount = $_POST['discount_amount'];
    $billing_price = $_POST['billing_price'];
    $date = date('Y-m-d');

    $no=$_POST['no'];
    $bill_profit = 0;
    for($i=1; $i<=$no; $i++){
        $product_id = $_POST['p_name'.$i];
        $quantity = $_POST['quantity'.$i];
        $t_price = $_POST['t_price'.$i];
        $sell_price = $t_price - ($t_price * ($discount_parsent/100));

        $qry = mysqli_query($conn,"SELECT buy_price, available, total_sell_amount FROM add_stock WHERE id = '".$product_id."'");
        $data = mysqli_fetch_assoc($qry);
        $buy_price = $data['buy_price'] * $quantity;
        $profit = $sell_price - $buy_price;
        $available = $data['available'] - $quantity;
        $total_sell_amount = $data['total_sell_amount'] + $sell_price;
        $qry = "UPDATE add_stock SET available = '".$available."', total_sell_amount = '".$total_sell_amount."' WHERE id = '".$product_id."'";
        $update = mysqli_query($conn, $qry);

        $qry = "INSERT INTO bill_product (fk_bill_no, product_id, quantity, sell_price, profit) VALUES ('".$bill_no."', '".$product_id."', '".$quantity."', '".$sell_price."', '".$profit."')";
        $insert = mysqli_query($conn, $qry);

        $bill_profit = $bill_profit + $profit;
    }
    $qry = "INSERT INTO bill (bill_no, name, mobile, total, discount_parsent, discount, billing_price, profit, date) VALUES ('".$bill_no."', '".$name."', '".$mobile."', '".$total."', '".$discount_parsent."', '".$discount."', '".$billing_price."', '".$bill_profit."', '".$date."')";
    $insert_2 = mysqli_query($conn, $qry);
    if($update and $insert and $insert_2){
        $return= ['key'=> "S" , 'msg'=>"BILL Added Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"BILL Added Un-sucessfully."];
    }
    echo json_encode($return);
?>