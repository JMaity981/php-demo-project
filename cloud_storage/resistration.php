<?php
	require_once('db/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resistration</title>
	<link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: linear-gradient(to right, #b92b27, #1565c0)
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Registration Form</center></h2>
			</div>
		</div>
		<form method="POST" id="registration" >
			<div class="row">
				<div class=" col-md-3 r">
					<label for="name"><strong>Name:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								</svg>
    						</span>
  						</div>
						<input type="text" name="name" class="form-control" id="name" placeholder="Ente Your Name">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="email"><strong>E-Mail:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  									<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
								</svg>
    						</span>
  						</div>
						<input type="email" name="email" class="form-control" id="email" placeholder="Enter Tour E-Mail">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="u_name"><strong>User Name:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								</svg>
    						</span>
  						</div>
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Enter a Username">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="psw"><strong>Password:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  									<path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg>
    						</span>
  						</div>
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Enter the Password">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="c_psw"><strong>Confirm Password:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  									<path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg>
    						</span>
  						</div>
						<input type="password" name="c_psw" class="form-control" id="c_psw" placeholder="Enter the Confirm Password">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="package"><strong>Choose Your Package:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
  									<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg>
    						</span>
  						</div>
  						<select class="custom-select" id="package" name="package">
  							<option value="" disabled selected>Select Your Package</option>
  							<?php
								$qry = mysqli_query($conn,"SELECT * FROM package");
								while ($data = mysqli_fetch_assoc($qry)) {
							?>
							<option value="<?=$data['id']?>"><?=$data['package_name']?></option>
							<?php
								}
							?>
  						</select>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-4"></div>
				<div class="col-md-2">
					<button type="reset" class="btn btn-dark">
						RESET
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-warning">SUBMIT</button>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
						<br><a href="login.php">Are You Already Resisterd: LOGIN</a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</form>
	</div>
	<script src="assets/js-cdn/bootstrap.bundle.min.js"></script>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
	<script>
		$("#registration").validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				u_name:{
					required: true,
					minlength: 3
				},
                psw:{
					required: true,
					minlength: 3
				},
				c_psw:{
					required: true,
					equalTo: "#psw"
				},
                package:{
                    required: true
                }
			},

			highlight:function(element,errorClass){
				$(element).parent().addClass('has-error');
				$(element).addClass('has-error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('has-error');
				$(element).removeClass('has-error');
			},
			submitHandler: function (form){
				var data = $('form').serialize();
				$.ajax({
					url: "./controller/RegistrationCtrl.php" ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								window.location.href = "./login.php";
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
	</script>	
</body>
</html>