<?php
require('../db/db.php');
global $conn;
// for select tag option value
$value = mysqli_query($conn,"SELECT * FROM category_setup ");
// for table data show
$quary = "SELECT select_category.*, category_setup.category FROM select_category INNER JOIN category_setup ON select_category.fk_category_id=category_setup.id";
$table_data = mysqli_query($conn,$quary);

// ******* For Edit *******//
if(!empty($_GET)){
	$url_id = $_GET['row_id'];
	// for get data of particuler row
	$result = mysqli_query($conn,"SELECT * FROM select_category WHERE id = '".$url_id."'");
	$row = mysqli_fetch_assoc($result);
	$action = '../controller/edit_select_category.php';
	$category = $row['fk_category_id'];
	$category_type = $row['category_type'];
}else{
	$action = '../controller/select_category_controller.php';
	$category = '';
	$category_type = '';
	$url_id  = '';
}
	// ***** checking session value ***** //
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
								  <h4 class="card-title">Select Category</h4>
								</div>
								<div class="card-body">
									<form autocomplete="off" id="cat_type" action = "<?php echo $action;?>" method="POST">
									<input type = "hidden" name="id" value="<?php echo $url_id?>">
										<div class="row">
										<div>
											<label class="bmd-label-floating">Category</label>
											<select class="browser-default custom-select" name= "category">
												<option value="">Category Select</option>
												<?php while($cat_id = mysqli_fetch_assoc($value)){?>
												<?php
													if($cat_id['id'] == $category){
														$text = 'selected';
													}else{
														$text = '';
													}
												?>
												<option value="<?php echo $cat_id['id']?>" <?php echo $text?> ><?php echo $cat_id['category'];?></option>
												<?php } ?>
											</select>
										</div>
											<div class="col-md-12">
												<div class="form-group">
												  <label class="bmd-label-floating">Category Type</label>
												  <input type="text" class="form-control" name="categorytype" value = "<?php echo $category_type?>">
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
							  <h4 class="card-title ">Category Type</h4>
							  <p class="card-category"> Here is a subtitle for this table</p>
							</div>
							<div class="table-responsive">
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
									</thead>
									<tbody>
										<?php
												$i=1;
												while($table_row=mysqli_fetch_assoc($table_data)){?>
												<tr>
													<td>
														<!-- ===== Start Edit option ===== -->
														<a href="?row_id=<?php echo $table_row["id"];?>"
														class="btn btn-sm btn-success m-b-4"><i class="fa fa-pencil"></i></a>
														<!-- ===== End Edit Option ===== -->
															
														<!-- ===== Delete Option Start ===== -->
														<a href="../controller/delete_select_category.php?row_id=<?php echo $table_row["id"];?>"
														class="btn btn-sm btn-danger m-b-4"onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
														<!-- ===== End Delete Option ===== -->
													</td>
													
													<td>
														<?php echo $table_row['category'];?>
													</td>
													<td>
														<?php echo $table_row['category_type'];?>
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
		$("#cat_type").validate({
			rules:{
				category:{
					required:true,
				},
				categorytype:{
					required:true,
				},
			},
			messages:{
				category:{
					required:"select category",
				},
				categorytype:{
					required:"Enter the product category type",
				},
			},
		});
	</script>
</body>
</html>
