<?php
	require_once('./db/connection.php');
    if(!isset($_SESSION['id'])){
		header('Location: ./login.php');
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
        Add Product Category
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
                                    <h4 class="card-title">Package Upgrade:</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="package_upgrade">
                                        <label for="package_id"><strong>Select Package:</strong></label>
                                        <select name="package_id" class="form-control" id="package_id">
                                            <option value="" disabled selected>Choose the Package</option>
                                            <?php
                                                $qry= mysqli_query($conn, "SELECT size FROM package INNER JOIN resistration ON package.id = resistration.package_id WHERE resistration.id = '".$_SESSION['id']."'");
                                                $data = mysqli_fetch_assoc($qry);
                                                $old_size = $data['size'];
								                $qry = mysqli_query($conn,"SELECT * FROM package WHERE size > '".$old_size."'");
                                                while ($data = mysqli_fetch_assoc($qry)) {
                                            ?>
							                    <option value="<?=$data['id']?>"><?=$data['package_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary pull-right">Upgrade</button>
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
        $('.photoupload-li').addClass('active');
        $("#package_upgrade").validate({
            rules:{
                package_id:{
                    required:true
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
				var data = $('form').serialize();
				// console.log(data);
				$.ajax({
					url: "./controller/PackageUpgradeCtrl.php",
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 2000);
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
