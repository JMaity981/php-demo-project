<?php
	require_once('./db/connection.php');
    if (!isset($_GET['p_category_id'])){
        $t_qry = mysqli_query($conn,"SELECT * FROM add_stock");
    }else if($_GET['batch_id']==''){
        $t_qry = mysqli_query($conn,"SELECT * FROM add_stock WHERE fk_product_category_id = '".$_GET['p_category_id']."'");
    }else{
        $t_qry = mysqli_query($conn,"SELECT * FROM add_stock WHERE 	fk_batch_id = '".$_GET['batch_id']."'");
    }
?>
<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        STOCK VIEW
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
</head>

<body class="">
    <div class="wrapper ">
        <!-- ============ Side menu start ==============-->

        <?php include('./common/sidebar.php');?>
            
        <!-- =============Side menu end =============-->
        <div class="main-panel">
            <!-- ============= Header start ======== -->
            <?php include('./common/header.php')?>
            <!-- =========== Header end ==============-->
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Stock View Table</h4>   
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <form method="GET" id="stock_search" action="stock_view.php">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><strong>Product Categtory:</strong></label>
                                                <select name="p_category_id" id="p_category_id" class="form-control p_category_id" onChange="categoryChange(this.value)">
                                                    <option value="" disabled selected>Choose the Product Category</option>
                                                    <?php
                                                        $qry = mysqli_query($conn,"SELECT * FROM product_category");
                                                        while ($data = mysqli_fetch_assoc($qry)) {
                                                    ?>
                                                        <option value="<?php echo $data['id'];?>"><?php echo $data['category'];?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong>Batch Id:</strong></label>
                                                <select class="form-control batch_id" id="batch_id" name="batch_id">
                                                    <option value='' disabled selected>Select Batch Id</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Srl No.</th>
                                                <th>Product Category</th>
                                                <th>Batch id</th>
                                                <th>Product Name</th>
                                                <th>Photo</th>
                                                <th>Quantity</th>
                                                <th>Buy Price</th>
                                                <th>Sell Price</th>
                                                <th>Avaible</th>
                                                <th>Profit</th>
                                            </tr>
                                            <?php
                                                $srl_no = 0;
                                                    while ($data = mysqli_fetch_assoc($t_qry)) {
                                                        $srl_no++;
                                                        $category_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT category FROM product_category WHERE id = '".$data['fk_product_category_id']."'"));
                                                        $category = $category_data['category'];
                                                        $batch_id_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT batch_id_name FROM batch_id WHERE id = '".$data['fk_batch_id']."'"));
                                                        $batch_id = $batch_id_data['batch_id_name'];
                                                        $profit = $data['total_sell_amount'] - $data['total_buy_amount'];
                                            ?>
                                            <tr>
                                                <td><?=$srl_no?></td>
                                                <td><?=$category?></td>
                                                <td><?=$batch_id?></td>
                                                <td><?=$data['product_name']?></td>
                                                <td><img src="uploads/<?=$data['photo']?>" height="50px"></td>
                                                <td><?=$data['quantity']?></td>
                                                <td><?=$data['buy_price']?></td>
                                                <td><?=$data['sell_price']?></td>
                                                <td><?=$data['available']?></td>
                                                <td><?=$profit?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========== Footer & core js Start =========-->
            <?php include('./common/footer.php');?>
            <!-- =========== Footer & core js End =======-->
        </div>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
        $('.nav-item').removeClass('active');
        $('.stockview-li').addClass('active');
        function categoryChange(product_category_id){
			$.ajax({
				url: "./controller/get_batch_id_data.php",
				type: "POST",
				data:{product_category_id:product_category_id},
                dataType: 'json',
				success: function(res){
					//console.log(res);
                    $('#batch_id').html('');
                    $('#batch_id').html("<option value=''>Select Batch Id</option>");
                    $.each(res, function (i, item) {
                        $('#batch_id').append($('<option>', { 
                            value: item.id,
                            text : item.batch_id_name 
                        }));
                    });
				}
			});
		};
    </script>
</body>

</html>
