
<!DOCTYPE html>
<html>
<head>
	<title>Student From</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<style type="text/css">
  		.form-section{
  			padding: 50px;
  		}
  		.form{
  			margin-top: 40px;
  		}
  		img{
  			width: 100%;
  		}
		  .has-error{
			color: #fd3259 !important;
		}
  	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="height: 800px">
			<div class="col-md-6 bg-primary">
				<img src="https://cdn4.vectorstock.com/i/1000x1000/05/33/e-learning-flat-poster-vector-2190533.jpg" >
			</div>
			<div class="col-md-6 form-section">
				<h2>STUDENT REGISTRATION FROM</h2>
				<form class="form" id="registration" action="action_page.php" method="POST">
					<div class="row">
						<div class="form-group col-md-6">
						    <label for="name"><strong>Name:</strong></label>
						    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
					  	</div>
					  	<div class="form-group col-md-6">
						    <label for="f_name"><strong>Father Name:</strong></label>
						    <input type="text" class="form-control" id="f_name" name="father_name" placeholder="Enter Father name">
					  	</div>
					  	<div class="form-group col-md-12">
						    <label for="address"><strong>Address:</strong></label>
						    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
					  	</div>
					  	<div class="form-group col-md-12">
					  		<label for="gender"><strong>Gender:</strong></label>
							<input type="checkbox" name="gender" value="m">Male
							<input type="checkbox" name="gender" value="f">Female
					  	</div>
					  	<div class="form-group col-md-6">
								<label for="state"><strong>State:</strong></label>
								<select class="custom-select" name="state">
									<option value=""></option>
									<option>West Bengal</option>
								</select>
						</div>
						<div class="form-group col-md-6">
							<label for="city"><strong>City:</strong></label>
							<select class="custom-select" name="city">
								<option value=""></option>
								<option>Tamluk</option>
								<option>Haldiya</option>
								<option>Kolkata</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label for="dob"><strong>DOB:</strong></label>
							<input type="date" class="form-control" name="dob">
						</div>
						<div class="form-group col-md-12">
							<label for="pin"><strong>Pincode:</strong></label>
							<input type="number" class="form-control" name="pin">
						</div>
						<div class="form-group col-md-12">
							<label for="course"><strong>Course:</strong></label>
							<input type="text" class="form-control" name="course">
						</div>
						<div class="form-group col-md-12">
							<label for="email"><strong>Email ID:</strong></label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="col-md-6"></div>
						<div class="col-md-3">
							<button type="button" class="btn btn-secondary" id="reset">Reset All</button>
						</div>
						<div class="col-md-3">
							<button type="submit" class="btn btn-primary">Submit Form</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>-->
	<!-- <script src="./asset/js/jquery.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	<script src="https://legion.onelogis.ml/public/assets/js/vendors/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="./asset/js/validate.min.js"></script>

	<script>
		$("#registration").validate({
			rules: {
    			name: {
					required: true,
				},
				father_name: {
					required: true,
				},
				address: {
					required: true,
				},
				gender:{
					required: true,
				},
				state:{
					required: true,
				},
				city:{
					required: true,
				},
				dob:{
					required: true,
				},
				pin:{
					required: true,
					//number:true,
					// min: 6,
					// max: 6,
					digits:true,minlength:3,maxlength:3
				},
				course:{
					required: true,
				},
				email:{
					required: true,
					email: true,
            		minlength:10
				},
  			},
			messages: {
				name: {
					required: "Enter your name",
				},
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
				var action = $("#registration").attr('action');
				$.ajax({
					url: action,
                    type: "POST",
                    data:data,
					success: function(data){
						console.log(data);
					},
					error: function(error){
						console.log(error);
					}
				});
			},
		});
		$("#reset").click(function(){
			//alert('OK');
			//$("#registration")[0].reset();
			//document.getElementById('registration').reset();
			//$("#registration")[0].reset();
			$("#registration").trigger("reset");
  		});
	</script>
</body>
</html>