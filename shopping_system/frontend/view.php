<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="assets/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous"/>
	</head>
	<body>
		
		<?php $currentPage = 'home'; ?>
		<!-- include upper header -->
		<?php include('./common/upper_header.php');?>
		<!-- end upper header -->


		<div class="container">
			<div id="gototop"> </div>

			<!-- include lower header -->
			<?php include('./common/lower_header.php');?>
			<!-- end lower header -->

			<!-- include top menu bar -->
			<?php include('./common/menu_bar.php');?>
			<!-- end menu bar -->
			
			<div class="row">
				<!-- include side menu -->
				<?php include('./common/side_menu.php');?>
				<!-- End side menu -->
				
				<div id="all_product">
				</div>
				
			</div>
			
			
			
			<!-- include brand icon -->
			<?php include('./common/brand_icon.php');?>
			<!-- end brand icon -->


			<!-- include fotter -->
			<?php include('./common/fotter1.php');?>
			<!-- end fotter -->
		</div>

		<!-- include fotter 2 -->
		<?php include('./common/fotter2.php');?>
		<!-- end fotter 2 -->
	</body>
</html>