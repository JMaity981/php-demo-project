<?php
	require_once('./db/connection.php');
    //print_r(basename($url));die;
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
        Add Stock
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
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Add Your Stock</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="add_stock" enctype="multipart/form-data">
                                        <label for="p_category_id"><strong>Product Categtory:</strong></label>
                                        <select name="p_category_id" class="form-control" id="p_category_id" onChange="categoryChange(this.value)">
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
                                        <label for="batch_id"><strong>Batch Id:</strong></label>
                                        <select class="form-control" name="batch_id" id="batch_id">
                                            <option value='' disabled selected>Select Batch Id</option>
                                        </select>
                                        <label for="p_name"><strong>Product Name:</strong></label>
			                            <input type="text" name="p_name" class="form-control" id="p_name">
                                        <label class="bmd-label-floating"><strong>Upload Picture:</strong></label>
                                        <input type="file" class="form-control" name="photo" id="photo">
                                        <label for="quantity"><strong>Quantity:</strong></label>
			                            <input type="number" name="quantity" class="form-control" id="quantity">
                                        <label for="b_price"><strong>Buy_Price(Single pcs.):</strong></label>
			                            <input type="number" name="b_price" class="form-control" id="b_price">
                                        <label for="s_price"><strong>Selling Price(Single pcs.):</strong></label>
			                            <input type="number" name="s_price" class="form-control" id="s_price">
                                        <button type="submit" class="btn btn-primary pull-right">Add Your Stock</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
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
        $('.addstock-li').addClass('active');
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
        $("#add_stock").validate({
            rules:{
                p_category_id:{
                    required:true
                },
                batch_id:{
                    required:true
                },
                p_name:{
                    required:true
                },
                quantity:{
                    required:true,
                    digits:true
                },
                b_price:{
                    required:true,
                    number:true
                },
                s_price:{
                    required:true,
                    number:true
                }
            },
            highlight:function(element,errorClass){
				$(element).parent().addClass('error');
				$(element).addClass('error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('error');
				$(element).removeClass('error');
			},
            submitHandler: function (form){
				// var data = $('form').serialize();
                var data = new FormData($(form)[0]);//only file upload
				console.log(data);
				$.ajax({
					url: "./controller/AddStockCtrl.php" ,
					dataType: 'json',
					type: "POST",
					data: data,
                    cache: false,//only file upload
					contentType: false,//only file upload
					processData: false,//only file upload
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 1500);
						}else if(data.key== 'E'){
							toastr.error(data.msg);
						}
						else{
							toastr.error('error');
						}
					},
					error: function(error){
						console.log(error.responseText);
					},
				});
			},
        });
    </script>
</body>

</html>
