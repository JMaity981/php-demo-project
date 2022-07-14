<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  	<style type="text/css">
	body
	{
		background: url(images/sign_up_background.jpg) no-repeat;
		background-size:cover;
	}
	.container
	{
		position:relative;
		width: 450px;
		min-height:300px;
		background:rgba(255,255,255,0.8);
		box-shadow:0 5px 15px rgba(0,0,0,1);
	}
  		.error{
  			color:red;
  		}
  		#mob_error{
  			display: none;
  		}
  	</style> 
	<?php
	 	$x=rand(100000,900000); 
	?>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">CREATE ACCOUNT</h2>
				<legend></legend>
				<form id="MyForm" method="POST" action="sign_up_action.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<select name="gender"  class="form-control">
							<option value="">Select</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="O">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label for="profile_pic">Profile Picture:</label>
						<input type="file" class="form-control" name="profile_pic">
					</div>
					<div class="form-group">
						<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
						<input type="date" class="form-control" name="dob">
					</div>
					<div class="form-group">
						<label for="state">State:</label>
						<?php
							$qry = mysqli_query($con,"SELECT * FROM states");
						?>
						<select name="state" class="form-control" onchange="stateChange(this.value)">
							<option value="" disabled selected>Choose State</option>
							<?php
							while ($data = mysqli_fetch_assoc($qry)) {
							?>
								<option value="<?php echo $data['id'];?>"><?php echo $data['state_name'];?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="district">District:</label>
						<select class="form-control" name="district" id="district">
							<option value="" disabled selected>Choose District</option>
							<?php
								while ($data = mysqli_fetch_assoc($qry))  {
							?>
							<option value="district('<?=$data["id"]?>')"><?php  echo $data['district_name'];?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="pin_code">Pin-code:</label>
						<input type="number" class="form-control" name="pin_code" placeholder="Enter Your Pin-code">
					</div>
					<div class="form-group">
						<label for="mobile">Mobile No.:</label>
						<input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile No." onkeyup="" >
						<span class="error" id="mob_error">Mobile no. Already registered </span>
					</div>
					<div class="form-group">
						<label for="email">Email Id:</label>
						<input type="text" class="form-control" name="email" placeholder="Enter Your Email Id">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" class="form-control" name="confirm_password" placeholder="Enter Your Confirm Password">
					</div>
					<div claass="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="captcha">Captcha:</label>
								<input type="number" class="form-control btn btn-basic" value="<?php echo $x; ?>" readonly="readonly" name="captcha" id="captcha">
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for=enter_captcha>Enter Captcha Code:</label>
								<input type="number" class="form-control" placeholder="Enter the captcha code" name="enter_captcha" id="enter_captcha">
							</div>
						</div>
					</div>
					<input type="submit" value="Sign Up" name="sign_up" class="form-control btn btn-primary">
				</form>
			
			
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/lib/jquery.js"></script>
  	<script src="js/dist/jquery.validate.js"></script>
	<script>
		function stateChange(s_id){
			$.ajax({
				url: "get_distric_data.php",
				type: "POST",
				data:{s_id:s_id},
				success: function(res){
					console.log(res);
					$('#district option').not(':first').remove();
					$('#district option:first').after(res);
				}
			});
		}
	</script>
		<script>

		$("#mobile").keyup(function(mob_no){
		var mobile_no = $("#mobile").val();
			$.ajax({
				url:'check_mobile_no.php',
				type:'post',
				data:{mobile:mobile_no},
				success:function(res){
					console.log(res);
					if(res == 'error'){
						$('#mob_error').show();
						$('#mobile').removeClass('valid');
						$('#mobile').addClass('error');
					}else{
						$('#mob_error').hide();
						$('#mobile').removeClass('error');
						$('#mobile').addClass('valid');
					}
				}
			});
    })


	</script>
	<script type="text/javascript">
		$.validator.setDefaults({
			// submitHandler: function() {
			// 	//alert("submitted!");
			// }
		});
		$().ready(function() {
			$("#MyForm").validate({
				rules: {
					name: "required",
					gender: "required",
					profile_pic: "required",
					dob: "required",
					state: "required",
					district:"required",
					pin_code: {
						required: true,
						minlength: 6,
						maxlength:6
					},
					mobile: {
						required: true,
						minlength: 10,
						maxlength: 10
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 8
					},
					confirm_password: {
						required: true,
						minlength: 8,
						equalTo: "#password"
					},
					enter_captcha: {
						required: true,
						equalTo: "#captcha"
					}
					
				},
				messages: {
					name: "Please enter your name",
					gender: "please enter your Gender",
					profile_picture: "Please upload a picture",
					dob: "Please enter your Date-of-birth",
					state: "Please select your State",
					district: "please select your District",
					pin_code: {
						required :"Please enter your Pin_code",
						minlength: "Please enter your correct Pin_code",
						maxlength: "Please enter your correct Pin_code"
					},
					mobile:  {
						required: "please enter a Mobile No.",
						minlength: "please enter the correct Mobile No.",
						maxlength: "please enter the correct Mobile No."
					},
					email: {
						required: "Please enter a Email address",
						email:"Please enter a valid Email address"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long",
						equalTo: "Please enter the same password as above"
					},
					enter_captcha:  {
						required: "Please enter the Captcha Code",
						equalTo: "Please Enter You correct Captcha Code"
					}
				}
			});
		});
	</script>
</body>
</html>