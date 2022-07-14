<!DOCTYPE html>
<html>
<head>
	<title>Student Insert</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="public/assets/css-cdn/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="registration">Resistration</a>
		<a class="navbar-brand" href="login">Login</a>
		<a class="navbar-brand" href="dashboard">Dashboard</a>
	</nav>
	<h1 style="text-align: center;">
		<u>Student Registration</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				{{ Form::open(array('id'=> 'registration_form', 'enctype'=> 'multipart/form-data')) }}
				<!-- <form action="value-insert" method="POST" enctype="multipart/form-data"> -->
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="fname">First Name:</label>
								<input type="text" class="form-control" name="fname" placeholder="Enter Your First Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="fname">Middle Name:</label>
								<input type="text" class="form-control" name="mname" placeholder="Enter Your Middle Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="lname">Last Name:</label>
								<input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="gender">Gender:</label>
								<select name="gender"  class="form-control">
									<option value="" disabled>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
								<input type="date" class="form-control" name="dob">
							</div>
						</div>
					</div>		
					<div class="form-group">
						<label for = "address">Address:</label>
						<textarea name="address" placeholder="Eneter Your Address" class="form-control" rows="5" cols="12"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pcode">Pin-code:</label>
								<input type="number" class="form-control" name="pcode" placeholder="Enter Your Pin-code" maxlength="6">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="profile_picture">Profile Picture:</label>
								<input type="file" name="profile_picture" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Id:</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile No.:</label>
								<input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
							</div>
						</div>
					</div>		
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="psw">Password:</label>
								<input type="password" class="form-control psw" name="psw" placeholder="Enter Your Password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_psw">Confirm Password:</label>
								<input type="password" class="form-control" name="c_psw" placeholder="Enter Your Confirm Password">
							</div>
						</div>
					</div>
					<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<input type="reset" value="Reset" name="Reset" class="btn btn-secondary">
				<!-- </form> -->
				{{ Form::close() }}
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script src="public/assets/js-cdn/jquery.min.js"></script>
	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";
		$("#registration_form").validate({
            rules:{
                fname:{
                    required:true
                },
				lname:{
                    required:true
                },
				gender:{
                    required:true
                },
				dob:{
                    required:true
                },
				pcode:{
					required: true,
					digits: true,
					minlength: 6,
					maxlength: 6
				},
				mobile:{
					required: true,
					digits: true,
					minlength: 10
				},
				psw:{
					required: true,
					minlength: 3
				},
				c_psw:{
					required: true,
					equalTo: ".psw"
				}
            },
            highlight:function(element,errorClass){
				$(element).parent().addClass('error');
				$(element).addClass('error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('error');
				$(element).removeClass('error');
			},
            submitHandler: function (form){
                var data = new FormData($(form)[0]);//file upload
				// var data = $(form).serialize();
				// console.log(data);
				$.ajax({
					url: baseUrl+"/value-insert",
					dataType: 'json',
					type: "POST",
					data: data,
                    cache: false,//only file upload
					contentType: false,//only file upload
					processData: false,//only file upload
					success: function(data){
						//  console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 1500);
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