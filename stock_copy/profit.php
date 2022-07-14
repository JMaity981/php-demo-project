<?php
	require_once('./db/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Profit</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2><center>Profit Table</center></h2>
        <table style="width: 100%;" class="table">
            <tr>
                <th>Srl. No.</th>
                <th>Product Name</th>
                <th>Total Buy Price</th>
                <th>Total Sell Price</th>
                <th>Total Profit</th>
                <!-- <th>Single Quantity Profit(average)</th> -->
                <th>Total Buy Quantity</th>
                <th>Total Sell Quantity</th>
                <th>Available Quantity</th>
            </tr>
            <?php
                $all_profit = 0;
                $qry = mysqli_query($conn,"SELECT * FROM stock_in");
                $srl_no=0;
                while ($data = mysqli_fetch_assoc($qry)) {
                    $srl_no++;
                    $total_buy_price=$data['buying_quantity']*$data['price'];
                    $qry2 = mysqli_query($conn,"SELECT * FROM stock_out WHERE fk_product_id='".$data['id']."'");
                    $total_sell_price=0;
                    $sell_quantity = 0;
                    while ($data2 = mysqli_fetch_assoc($qry2)) {
                        $total_sell_price = $total_sell_price  +($data2['selling_quantity'] * $data2['selling_price']);
                        $sell_quantity = $sell_quantity + $data2['selling_quantity'];
                    }
                    $total_profit = $total_sell_price - $total_buy_price;
                    $buy_quantity = $data['buying_quantity'];
                    $available_quantity = $buy_quantity - $sell_quantity;
                    $all_profit = $all_profit + $total_profit;
            ?>
            <tr>
                <td><?=$srl_no?></td>
                <td><?=$data['p_name']?></td>
                <td><?=$total_buy_price?></td>
                <td><?=$total_sell_price?></td>
                <td><?=$total_profit?></td>
                <td><?=$buy_quantity?></td>
                <td><?=$sell_quantity?></td>
                <td><?=$available_quantity?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <h2><center>All Profit = <?=$all_profit?> </center></h2>
    </div>
</body>
</html>