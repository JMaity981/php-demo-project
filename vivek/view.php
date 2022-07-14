<?php
require_once 'db/connection.php';
	if(empty($_SESSION['login_id'])){
		header("Location:".site_url());
	}
	
	$quy = "SELECT * FROM `registration` WHERE `id` = '".base64_decode($_GET['id'])."' ";
	$data = mysqli_query($conn, $quy);
	$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DGSK | Everything is possible</title>

    <!-- Bootstrap core CSS -->
    <link href="view/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="view/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="view/public/css/agency.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  	<style>
  		.error {
  			color: #e90000;
  			font-size: 13px;
  			margin-top: 7.5px;
  			border-color: #e90000 !important;
  		}
		.img-fluid {
			max-width: 30%;
			height: auto;
		}
		.gallery{
			display: inline-block;
			margin-top: 20px;
		}
  	</style>

	</head>

	<body id="page-top">
	<!-- Navigation -->
    <?php
		include('admin_nav.php');
	?>
    <!-- Contact -->
    <section id="registration" class="reg-pd">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h4 class="section-heading text-uppercase">Application form for <?php echo $row['candidate_name']; ?></h4>
					<h3 class="section-subheading text-muted"></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">

					<!-- <a class="thumbnail fancybox" rel="ligthbox" href="<?php //echo site_url().'view/public/uploaded_img/'.$row['photo']; ?>">
							<img class="img-fluid" alt="" src="<?php //echo site_url().'view/public/uploaded_img/'.$row['photo']; ?>" />
						</a> -->
					<div class="row">
						<div class="col-md-9"></div>
						<div class="col-md-3">
							<div style="float:left;width:33%">
								<img src="<?php echo site_url().'view/public/uploaded_img/'.$row['photo']; ?>" class="img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:auto;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="candidatename">Name of Candidate</label>
								<input type="text" class="form-control" id="candidatename" value="<?php echo $row['candidate_name']; ?>" name="candidatename" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">E-mail Address</label>
								<input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="fathername">Father's Name</label>
								<input type="text" class="form-control" id="fathername" value="<?php echo $row['father_name']; ?>" name="fathername" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="fathername">Date of Birth</label>
								<input type="text" class="form-control dob" value="<?php echo date('d/m/Y', strtotime($row['dob'])); ?>" id="dob" name="dob" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="state">State</label>
								<input type="text" class="form-control" id="agencyname" value="West bengal" name="agencyname" disabled>
							</div>
						</div>	
						<div class="col-md-6">	
							<div class="form-group">
								<label for="district">District</label>
								<input type="text" class="form-control" id="agencyname" value="<?php echo $row['district']; ?>" name="agencyname" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="permanentaddress">Permanent Address</label>
								<textarea class="form-control" id="permanentaddress" rows="3" name="permanentaddress" disabled><?php echo $row['permanent_address']; ?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="officeaddress">Office Address</label>
								<textarea class="form-control" id="officeaddress" rows="3" name="officeaddress" disabled><?php echo $row['office_address']; ?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pincode">Pin Code</label>
								<input type="text" class="form-control" id="pincode" value="<?php echo $row['pin_code']; ?>" name="pincode" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile Number</label>
								<input type="text" class="form-control" id="mobile" value="<?php echo $row['mobile']; ?>" name="mobile" disabled>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="holder">Account Holder Name</label>
								<input type="text" class="form-control" id="holder" value="<?php //echo $row['account_holder_name']; ?>" name="holder_name" disabled>
							</div> -->
						</div>
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="bankname">Bank name</label>
								<input type="text" class="form-control" id="bankname" value="<?php //echo $row['bank_name']; ?>" name="bankname" disabled>
							</div> -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="ac_no">Bank Details (Ac.No.)</label>
								<input type="text" class="form-control" id="ac_no" value="<?php //echo $row['account_no']; ?>" name="ac_no" disabled>
							</div> -->
						</div>
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="ifsccode">IFSC Code</label>
								<input type="text" class="form-control" id="ifsccode" value="<?php //echo $row['ifsc_code']; ?>" name="ifsccode" disabled>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<div class='list-group gallery'>
					<!-- <div class='col-sm-12 col-xs-12 col-md-6 col-lg-6' style="float: left">
					<label for="photo">Candidate photo</label>
						<a class="thumbnail fancybox" rel="ligthbox" href="<?php //echo site_url().'view/public/uploaded_img/'.$row['photo']; ?>">
							<img class="img-fluid" alt="" src="<?php //echo site_url().'view/public/uploaded_img/'.$row['photo']; ?>" />
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<script>
		var base_url = "<?php echo site_url();?>";
	</script>
    <!-- Bootstrap core JavaScript -->
    <script src="view/public/vendor/jquery/jquery.min.js"></script>
    <script src="view/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="view/public/vendor/jquery-validation/jquery.validate.min.js"></script> 

    <!-- Plugin JavaScript -->
    <script src="view/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="view/public/js/jqBootstrapValidation.js"></script>
    <script src="view/public/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="view/public/js/agency.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	<script>
	$(document).ready(function(){
		$(".fancybox").fancybox({
			openEffect: "none",
			closeEffect: "none"
		});
	});
	</script>
  </body>

</html>
