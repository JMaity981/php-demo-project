<?php
require('../db/db.php');
global $conn;
// ***** Select data for category setup table ***** //
$cat_setup = mysqli_query($conn,"SELECT * FROM category_setup");
// ***** Select data for select category table ***** //
$cat_select = mysqli_query($conn,"SELECT * FROM select_category");
// ***** Select data for brand setup table ***** //
$brand_name = mysqli_query($conn,"SELECT * FROM brand_setup");

// ****** show value on the table ***** //
$join = "SELECT product_setup.*,category_setup.category,select_category.category_type,brand_setup.brand FROM product_setup INNER JOIN category_setup ON product_setup.	fk_category_id=category_setup.id INNER JOIN select_category ON product_setup.fk_category_type_id=select_category.id INNER JOIN brand_setup ON product_setup.fk_brand_id=brand_setup.id";
$join_vaue = mysqli_query($conn,$join);
// ***** Edit ***** //
if(!empty($_GET)){
	$id = $_GET['row_id'];
	$result = mysqli_query($conn,"SELECT * FROM product_setup WHERE id = '".$id."'");
	$value = mysqli_fetch_assoc($result);
	$action = '../controller/product_setup_edit.php';
	$fk_cat_id = $value['fk_category_id'];
	$fk_cat_type_id = $value['fk_category_type_id'];
	$fk_brand_id = $value['fk_brand_id'];
	$product_name = $value['product_name'];
	$color = $value['color'];
	$price = $value['price'];
	$model = $value['Model_no'];
	$quentity = $value['quentity'];
	$description = $value['description'];
	$image = $value['image'];
}else{
	$action = '../controller/product_setup_controller.php';
	$fk_cat_id = '';
	$fk_cat_type_id = '';
	$fk_brand_id = '';
	$product_name = '';
	$color = '';
	$price = '';
	$model = '';
	$quentity = '';
	$image = '';
	$description ='';
	$id='';
}
	// *****  checking session value *****//
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
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
	<body>
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
										<h4 class="card-title">Product Setup</h4>
									</div>
									<div class="card-body">
										<form autocomplete="off" id="product_setup" action = "<?php echo $action;?>" method="POST" enctype="multipart/form-data">
											<input type = "hidden" name="id" value="<?php echo $id?>">
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
													<div>
														<label class="bmd-label-floating">Category Select</label>
													</div>
														<!-- Start select value in category select fild -->
														<select class="browser-default custom-select" name="category">
															<option value="">Category</option>
																<?php while($category = mysqli_fetch_assoc($cat_setup)){?>
																<?php
																if($category['id'] == $fk_cat_id){
																	$text = 'selected';
																}else{
																	$text = '';
																}
																?>
															<option value ="<?php echo $category['id'];?>"
																<?php echo $text;?>> 
																<?php echo $category['category'];}?>
															</option>
														</select>
														<!-- End select value in category select fild -->
														<div>
															<label class="bmd-label-floating">Category Type</label>
														</div>
														<select class="browser-default custom-select" name = "cat_type">
															<option value="">Select Type</option>
															<!-- start select value in category type fild -->
															<?php while($c_type = mysqli_fetch_assoc($cat_select)){?>
															<?php
																if($c_type['id'] == $fk_cat_type_id){
																	$text = 'selected';
																}else{
																	$text = '';
																}
															?>
															<option value = "<?php echo $c_type['id'];?>"
																<?php echo $text;?>>
																<?php echo $c_type['category_type'];}?>
																<!-- end select value in category type fild -->
															</option>
														</select>
														<div>
															<label class="bmd-label-floating">Brand Name</label>
														</div>
														<select class="browser-default custom-select" name = "brand">
															<option value="">Select brand</option>
															<!-- start select value in brand fild -->
															<?php while($brand = mysqli_fetch_assoc($brand_name)){?>
															<?php
																if($brand['id'] == $fk_brand_id){
																	$text = 'selected';
																}else{
																	$text = '';
																}
															?>
															<option value = "<?php echo $brand['id'];?>"
																<?php echo $text;?>>
																<?php echo $brand['brand'];}?>
															</option>
															<!-- end select value in brand fild -->
														</select>
														<div>
															<label class="bmd-label-floating">Product Name</label>
														</div>
														<input type="text" class="form-control" name="p_name" value = "<?php echo $product_name;?>">
														<div>
															<label class="bmd-label-floating">Color</label>
														</div>
														<input type="text" class="form-control" name="color" value = "<?php echo $color;?>">
														<div>
															<label class="bmd-label-floating">Price</label>
														</div>
														<input type="text" class="form-control" name="price" value="<?php echo $price;?>">
														<div>
															<label class="bmd-label-floating">Model No</label>
														</div>
														<input type="text" class="form-control" name="model" value="<?php echo $model;?>">
														<div>
															<label class="bmd-label-floating">Quentity</label>
														</div>
														<input type="text" class="form-control" name="quentity" value="<?php echo $quentity;?>">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<div>
																		<label>Description</label>
																	</div>
																	<div class="form-group">
																		<textarea class="form-control" name="description" value="<?php echo $description;?>" rows="5"></textarea> 
																	</div>
																</div>
															</div>
														</div>
														<label>Product image</label>
														<form class="md-form">
															<div class="file-field">
																<div class="btn btn-primary btn-sm float-left">
																  <span>Choose file</span>
																  <input type="file" name="image">
																  <input type="hidden" name="old_image" value="<?php echo $image;?>">
																</div>
																<div class="file-path-wrapper">
																  <input class="file-path validate" type="text" placeholder="Upload your file">
																</div>
															</div>
														</form>
														<?php if ($image != ''){?>
															<img src="../image_upload/<?php echo $image;?>" style="width:100px; height:80px"/>
														<?php }?>
													</div>
												</div>
												<button type="submit" class="btn btn-primary pull-right">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="card">
									<div class="card-header card-header-primary">
										<h4 class="card-title ">Product Setup</h4>
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
													Brand Name
												</th>
												<th>Product Name</th>
												<th> Color </th>
												<th>Price</th>
												<th>Quentity</th>
												<th>Image</th>
											</thead>
											<tbody>
												<?php
												$i=1;
												while($row=mysqli_fetch_assoc($join_vaue)){
												?>
												<tr>
													<td>
														<!-- Start edit option -->
														<a href="../view/product_setup.php?row_id=<?php echo $row["id"];?>"
															class="btn btn-sm btn-success m-b-4"><i class="fa fa-pencil"></i>
														</a>
														<!-- End edit option -->

														<!-- Start delete option -->
														<a href="../controller/product_setup_delete.php?row_id=<?php echo $row["id"];?>"
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
														<?php echo $row['brand'];?>
													</td>
													<td>
														<?php echo $row['product_name'];?>
													</td>
													<td>
														<?php echo $row['color'];?>
													</td>
													<td>
														<?php echo $row['price'];?>
													</td>
													<td>
														<?php echo $row['quentity'];?>
													</td>
													<td><img src="../image_upload/<?php echo $row['image'];?>" style="width:50px; height:40px"/></td>
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
			$("#product_setup").validate({
				rules:{
					category:{
						required:true,
					},
					cat_type:{
						required:true,
					},
					brand:{
						required:true,
					},
					p_name:{
						required:true,
					},
					color:{
						required:true,
					},
					price:{
						required:true,
					},
					model:{
						required:true,
					},
					quentity:{
						required:true,
					},
					description:{
						required:true,
					},
					image:{
						required:true,
					},
				},
				messages:{
					category:{
						required:"Plese select the product category",
					},
					cat_type:{
						required:"Select the product type",
					},
					brand:{
						required:"Select the brand",
					},
					p_name:{
						required:"Enter the product name",
					},
					color:{
						required:"Enter the product color",
					},
					price:{
						required:"Enter the price",
					},
					model:{
						required:"Enter the product model",
					},
					quentity:{
						required:"Enter the product quentity",
					},
					description:{
						required:"Enter description",
					},
					image:{
						required:"Enter the product image",
					},
				},
			});
		</script>
	</body>
</html>