<?php
	require_once('./db/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Admin login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="a_login" action="controller/Admin_loginCtrl.php">
					            <label for="u_name"><strong>Username:</strong></label>
						        <input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username" required="">
					            <label for="psw"><strong>Password</strong></label>
						        <input type="password" name="psw" class="form-control" id="psw" placeholder="Password" required="">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
	<script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
	<script>
		$("#a_login").validate({
		submitHandler: function (form){
			var data = $("#a_login").serialize();
			var action = $("#a_login").attr('action');
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
							window.location.href = "./admin.php"; 
						}, 2000);
						
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