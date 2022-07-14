<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Student Login</center></h2>
			</div>
		</div>
		<form method="post" action="controller/Student_loginCtrl.php" id="s_login">
			<div class="row">
				<div class=" col-md-4 r">
					<label for="u_name"><strong>Username</strong></label>
				</div>
				<div class="col-md-4">
					<div class="input-group mb-3">
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username">
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class=" col-md-4 r">
					<label for="psw"><strong>Password</strong></label>
				</div>
				<div class="col-md-4">
					<div class="input-group mb-3">
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password">
					</div>
				</div>
                <div class="col-md-4"></div>
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">
						LOGIN
					</button>
				</div>
				<div class="col-md-5"></div>
			</div>
		</form>
	</div>
	<script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script src="assets/js-cdn/jquery.dataTables.min.js"></script>
	<script>
		$("#s_login").validate({
		submitHandler: function (form){
			var data = $("#s_login").serialize();
			var action = $("#s_login").attr('action');
			$.ajax({
				url: action,
				type: "POST",
				dataType: 'json',
				data: data,
				success: function(data){
					console.log(data.key);
					if(data.key == 'S'){
						toastr.success(data.msg);
						setTimeout(function(){ 
							window.location.href = "./student_dashboard.php?student_id="+data.student_id; 
						}, 3000);
						
					}else{
						toastr.error(data.msg);
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