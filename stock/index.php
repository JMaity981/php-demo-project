<?php
	require_once('./db/connection.php');
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
        Billing Page
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
                            <h4 class="card-title">Billing Form</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="billing">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="name"><strong>Name:</strong></label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mobile"><strong>Mobile No.:</strong></label>
                                        <input type="number" name="mobile" class="form-control" id="mobile">
                                    </div>
                                </div>
                                <div class="add_product_position">
                                    <div class="row add_product_body">
                                        <div class="col-md-3">
                                            <label><strong>Product Categtory:</strong></label>
                                            <select name="p_category_id1" class="form-control p_category_id1" onChange="categoryChange(this.value,1)">
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
                                        <div class="col-md-2">
                                            <label><strong>Batch Id:</strong></label>
                                            <select class="form-control batch_id1" name="batch_id1" onChange="batchChange(this.value,1)">
                                                <option value='' disabled selected>Select Batch Id</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label><strong>Product Name:</strong></label>
                                            <select class="form-control p_name1" name="p_name1" onChange="prodactChange(this.value,1)">
                                                <option value='' disabled selected>Select Product Name</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label><strong>Price(per):</strong></label>
                                            <input type="number" name="price1" class="form-control price1" value="" readonly>
                                        </div>
                                        <div class="col-md-1">
                                            <label><strong>Quantity:</strong></label>
                                            <!-- <input type="number" name="quantity1" class="form-control quantity1"> -->
                                            <select class="form-control quantity1 qnt" data-no="1" name="quantity1">
                                                <option value='' disabled selected>Select Quantity</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label><strong>Total Price:</strong></label>
                                            <input type="number" name="t_price1" class="form-control t_price1" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary pull-left" id="add_product">Add Product</button>
                                <button type="button" class="btn btn-primary pull-right" id="total_count">TOTAL</button><br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>Total:</strong></label>
                                        <input type="number" name="total" class="form-control" id="total" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="discount_parsent"><strong>Discount(%):</strong></label>
                                        <input type="number" name="discount_parsent" class="form-control" id="discount_parsent">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="discount_amount"><strong>Discount:</strong></label>
                                        <input type="number" name="discount_amount" class="form-control" id="discount_amount">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="billing_price"><strong>Billing Price:</strong></label>
                                        <input type="number" name="billing_price" class="form-control" id="billing_price">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Paid Successfull</button>
                            </form>
                            <!-- <form method="POST" id="dicount_form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>Total:</strong></label>
                                        <input type="number" name="total" class="form-control" id="total" readonly value="2658">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="discount_parsent"><strong>Discount(%):</strong></label>
                                        <input type="number" name="discount_parsent" class="form-control" id="discount_parsent">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="discount_amount"><strong>Discount:</strong></label>
                                        <input type="number" name="discount_amount" class="form-control" id="discount_amount">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="billing_price"><strong>Billing Price:</strong></label>
                                        <input type="number" name="billing_price" class="form-control" id="billing_price">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Paid Successfull</button>
                            </form> -->
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
        $('.billing-li').addClass('active');
        var no=1;
        function categoryChange(product_category_id,no){
			$.ajax({
				url: "./controller/get_batch_id_data.php",
				type: "POST",
				data:{product_category_id:product_category_id},
                dataType: 'json',
				success: function(res){
					//console.log(res);
                    $('.batch_id'+no).html('');
                    $('.batch_id'+no).html("<option value=''>Select Batch Id</option>");
                    $.each(res, function (i, item) {
                        $('.batch_id'+no).append($('<option>', { 
                            value: item.id,
                            text : item.batch_id_name 
                        }));
                    });
				}
			});
		};
        function batchChange(batch_id,no){
            //console.log(batch_id);
			$.ajax({
				url: "./controller/get_product_data.php",
				type: "POST",
				data:{batch_id:batch_id},
                dataType: 'json',
				success: function(res){
					//console.log(res);
                    $('.p_name'+no).html('');
                    $('.p_name'+no).html("<option value=''>Select Product Name</option>");
                    $.each(res, function (i, item) {
                        $('.p_name'+no).append($('<option>', { 
                            value: item.id,
                            text : item.product_name 
                        }));
                    });
				}
			});
		};
        function prodactChange(product_id,no){
            //console.log(no);
			$.ajax({
				url: "./controller/get_add_stock_table_data.php",
				type: "POST",
				data:{product_id:product_id},
                dataType: 'json',
				success: function(res){
					//console.log(res[0].sell_price);
                    $(".price"+no).val(res[0].sell_price)
                    $('.quantity'+no).html('');
                    // $('.quantity'+no).html("<option value=''>Select Quantity</option>");
                    for(let i=1; i<=res[0].available; i++){
                    // $.each(res, function (i, item) {
                        $('.quantity'+no).append($('<option>', { 
                            value: i,
                            text : i 
                        }));
                    };
				}
			});
		};
        //BLUR use
        // $("input[name=quantity]").blur(function(){
        $(document).on('blur', ".qnt", function(){
            var no=$(this).attr('data-no');
            console.log(no);
            var t_price = parseInt($(".price"+no).val()) * parseInt($(".quantity"+no).val());
            console.log(t_price);
            $(".t_price"+no).val(t_price);
        });
        //Add Prodct Button
        $("#add_product").click(function(){
            no++;
            var html = `<div class="row add_product_body">
                            <div class="col-md-3">
                                <label><strong>Product Categtory:</strong></label>
                                <select name="p_category_id${no}" class="form-control p_category_id${no}" onChange="categoryChange(this.value,${no})">
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
                            <div class="col-md-2">
                                <label><strong>Batch Id:</strong></label>
                                <select class="form-control batch_id${no}" name="batch_id${no}" onChange="batchChange(this.value,${no})">
                                    <option value='' disabled selected>Select Batch Id</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Product Name:</strong></label>
                                <select class="form-control p_name${no}" name="p_name${no}" onChange="prodactChange(this.value,${no})">
                                    <option value='' disabled selected>Select Product Name</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label><strong>Price(per):</strong></label>
                                <input type="number" name="price${no}" class="form-control price${no}" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <label><strong>Quantity:</strong></label>
                                <select class="form-control qnt quantity${no}" data-no="${no}" name="quantity${no}">
                                    <option value='' disabled selected>Select Quantity</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label><strong>Total Price:</strong></label>
                                <input type="number" name="t_price${no}" class="form-control t_price${no}" value="" readonly>
                            </div>
                        </div>`;
            $(".add_product_position").append(html);
        });
        //TOTAL button
        $("#total_count").click(function(){
            var total_count=0;
            for(let i=1; i<=no; i++){
                total_count = total_count + parseInt($(".t_price"+i).val()); 
            }
            $("#total").val(total_count);
        });
        //FROM Validation & AJAX
        $("#billing").validate({
            rules:{
                name:{
                    required:true
                },
                mobile:{
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                discount_parsent:{
                    required:true,
                    number:true
                },
                discount_amount:{
                    required:true,
                    number:true
                },
                billing_price:{
                    required:true,
                    number:true
                },
                p_category_id1:{
                    required:true
                },
                batch_id1:{
                    required:true
                },
                p_name1:{
                    required:true
                },
                quantity1:{
                    required:true,
                    digits:true
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
				var data = $(form).serialize()+'&no='+no;

                //var data = new FormData($(form)[0]);//only file upload
				//console.log(data);
				$.ajax({
					url: "./controller/BillingCtrl.php" ,
					dataType: 'json',
					type: "POST",
					data: data,
                    // cache: false,//only file upload
					// contentType: false,//only file upload
					// processData: false,//only file upload
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 3000);
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
        //Discount Parsent BLUR
        $(document).on('blur', "#discount_parsent", function(){
            var discount_amount = $("#total").val() * ($("#discount_parsent").val()/100);
            $("#discount_amount").val(discount_amount);
            var billing_price = $("#total").val() - discount_amount;
            $("#billing_price").val(billing_price);
        });
        //Billing Price BLUR
        $(document).on('blur', "#billing_price", function(){
            var discount_amount = $("#total").val() - $("#billing_price").val();
            $("#discount_amount").val(discount_amount);
            var discount_parsent = 100 * (discount_amount / $("#total").val());
            $("#discount_parsent").val(discount_parsent);
        });
        //Discount Amount BLUR
        $(document).on('blur', "#discount_amount", function(){
            var billing_price = $("#total").val() - $("#discount_amount").val();
            $("#billing_price").val(billing_price);
            var discount_parsent = 100 * ($("#discount_amount").val() / $("#total").val());
            $("#discount_parsent").val(discount_parsent);
        });
    </script>
</body>

</html>
