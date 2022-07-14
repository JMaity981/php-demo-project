<?php
require('../db/db.php');
global $conn;
// ***** SELECT DATA FOR CATEGORY SETUP TABLE for dropdown***** //
$category = mysqli_query($conn,"SELECT * FROM category_setup");

// ***** SELECT DATA FOR SELECT CATEGORY TABLE for dropdown***** //
$select_category = mysqli_query($conn,"SELECT * FROM select_category");

// ***** Select data for main(brand setup),category_setup,select_category table for show table ***** //
$join = "SELECT brand_setup.*,category_setup.category,select_category.category_type FROM brand_setup INNER JOIN category_setup ON brand_setup.fk_category_id=category_setup.id INNER JOIN select_category ON brand_setup.fk_category_type_id=select_category.id";
$value_for_join = mysqli_query($conn,$join);

if(!empty($_GET)){
	$url_id = $_GET['row_id'];
	$result = mysqli_query($conn,"SELECT * FROM brand_setup WHERE id = '".$url_id."'");
	$value = mysqli_fetch_assoc($result);
	$action = '../controller/brand_setup_edit.php';
	$fk_category_id = $value['fk_category_id'];
	$fk_category_type_id = $value['fk_category_type_id'];
	$brand = $value['brand'];
}else{
	$action = '../controller/brand_setup_controller.php';
	$fk_category_id = '';
	$fk_category_type_id = '';
	$brand = '';
	$url_id = '';
}
	
	// ***** checking session value***** //
	if(!isset($_SESSION['email'])){
		header('Location: ../shopping_system.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
        <div class="container-fluid">
			<div class="row">
				<div class="col-md-5">
					<div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title">Brand Setup</h4>
						</div>
						<div class="card-body">
							<form autocomplete="off" id="brand_serup" action = "<?php echo $action;?>" method="POST">
								<input type = "hidden" name="id" value="<?php echo $url_id?>">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<div>
											<label class="bmd-label-floating">Category Select</label>
										</div>
											<select class="browser-default custom-select" name= "category">
											
												<!-- ***** Start show value in category fild ***** -->
												<option value="">Category</option>
												<?php while($cat_id = mysqli_fetch_assoc($category)){?>
												<?php
												if($cat_id['id'] == $fk_category_id){
													$text = 'selected';
												}else{
													$text ='';
												}
												?>
												<option value = "<?php echo $cat_id['id'];?>"
												<?php echo $text;?>> <?php echo $cat_id['category'];?>
												</option>
												<?php }?>
												<!-- ***** End show value in category fild ***** -->
											</select>
											<div>
												<label class="bmd-label-floating">Select Category Type</label>
											</div>
											<select class="browser-default custom-select" name= "categorytype">
												<option value="">Category Type</option>
												<!-- Start show value in category type fild -->
												<?php while($cat_type_id = mysqli_fetch_assoc($select_category)){?>
												<?php
												if($cat_type_id['id'] == $fk_category_type_id){
													$text = 'selected';
												}else{
													$text = '';
												}
												?>
												<option value = "<?php echo $cat_type_id['id'];?>"
													<?php echo $text;?>> <?php echo $cat_type_id['category_type'];?>
												</option>
												<?php } ?>
												<!-- End show value in category type fild -->
												
												
											</select>
											<div>
												<label class="bmd-label-floating">Brand</label>
											</div>
										  <input type="text" class="form-control" name="brand" value="<?php echo $brand?>">
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="card">
					<div class="card-header card-header-primary">
							  <h4 class="card-title ">Brand Setup</h4>
							  <p class="card-category"> Here is a subtitle for this table</p>
							</div>
					<div class="table-responsive table-hover">
						<table class="table">
							<thead class=" text-primary">
								<th>
								 Action
								</th>
								<th>
								  Category
								</th>
								<th>
									Category Type
								</th>
								<th>
									Brand
								</th>
							</thead>
							<tbody>
								<?php
									$i=1;
									while($row=mysqli_fetch_assoc($value_for_join)){
								?>
								<tr>
									<td>
										<!-- Start edit option -->
										<a href="../view/brand_setup.php?row_id=<?php echo $row["id"];?>"
										class="btn btn-sm btn-success m-b-4"><i class="fa fa-pencil"></i></a>
										<!-- End edit option -->
										
										<!-- Start delete option -->
										<a href="../controller/brand_setup_delete.php?row_id=<?php echo $row["id"];?>"
										class="btn btn-sm btn-danger m-b-4" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
										<!-- End delete option -->
									</td>
									<td>
										<?php echo $row['category'];?>
									</td>
									<td>
										<?php echo $row['category_type'];?>
									</td>
									<td>
										<?php echo $row['brand']?>
									</td>
								</tr>
								<?php $i++;}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
        </div>
    </div>
	  <!-- ===== End main Contant ===== -->
	  
	  <!-- ======== Fotter Start ====== -->
	  <?php include('./common/fotter.php');?>
	  <!-- ===== Fotter End ===== -->
	  
    </div>
  </div>
  	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script>
		$("#brand_serup").validate({
			rules:{
				category:{
					required:true,
				},	
				categorytype:{
					required:true,
				},
				brand:{
					required:true,
				},
			},
			messages:{
				category:{
					required:"Plese Select Category",
				},
				categorytype:{
					required:"Plese Select Category Type",
				},
				brand:{
					required:"Plese Enter The Brand",
				},
			},
		});
	</script>
</body>
</html>
