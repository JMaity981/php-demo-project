<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Insert</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
</head>
<body>
	<h1 style="text-align: center;">
		<u>Describe Your Student Details</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="student_insert_action.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="fname">First Name:</label>
								<input type="text" class="form-control" name="fname" placeholder="Enter Your First Name"required="required">
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
								<label for="lname">Lirst Name:</label>
								<input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name"required="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="gender">Gender:</label>
								<select name="gender"  class="form-control"required="required">
									<option value="">Select</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									<option value="O">Others</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
								<input type="date" class="form-control" name="dob" required="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Id:</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email Id" required="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile No.:</label>
								<input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" required="required">
							</div>
						</div>
					</div>				
					<div class="form-group">
						<label for"address">Address:</label>
						<textarea name="address" placeholder="Eneter Your Address" class="form-control" rows="5" cols="12" required="required"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pcode">Pin-code:</label>
								<input type="number" class="form-control" name="pcode" placeholder="Enter Your Pin-code" maxlength="6" required="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pcode">Profile Picture:</label>
								<input type="file" name="profile_picture" required="required">
							</div>
						</div>
					</div>
					<input type="submit" value="Submit" name="submit" class="btn btn-primary">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>