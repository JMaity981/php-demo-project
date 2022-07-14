<?php 
	//require('../db/db.php');
	// ***** checking session value ***** //
	// if(!isset($_SESSION['email'])){
	// 	header('Location:../shopping_system.php');
	// }
?>
<!DOCTYPE html>
	<html lang="en">

			<head>
			  <meta charset="utf-8" />
			  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
			  <title>
			   Shopping System
			  </title>
			  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
			  <!--     Fonts and icons     -->
			  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
			  <!-- CSS Files -->
			  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
			  <!-- CSS Just for demo purpose, don't include it in your project -->
			  <link href="../assets/demo/demo.css" rel="stylesheet" />
			  <link rel="icon" type="image/png" href="../assets/img/images (2).jpg">
			</head>

		<body class="">
			<div class="wrapper bg-white">
				  <!-- ===== Dash Board Start ==== -->
				  <?php include('./common/dashboard.php');?>
				  <!-- ====== Dash Board End ===== -->
				  
					<div class="main-panel">
					
						<!-- ===== Header Start ==== -->
						<?php include('./common/header.php');?>
						<!-- ===== Header End ==== -->
						
						 <!-- ===== Main Contant Start ===== -->
							<div class="content">
								<?php
									//echo"<pre>";print_r($_SESSION);
								?>
						 
							</div>
						  <!-- ===== End main Contant ===== -->
						  
						  <!-- ======== Fotter Start ====== -->
						  <?php include('./common/fotter.php');?>
						  <!-- ===== Fotter End ===== -->
					  
					</div>
			</div>
		</body>
	</html>
