<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ALL Sttudents</title>
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
	<h1 style="text-align: center;"><u>All Students</u></h1>
	<div class="container">
		<table style="width: 100%" class="table">
			<tr>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Lirst Name</th>
				<th>Gender</th>
				<th>Date of birth</th>
				<th>Email id</th>
				<th>Mobile no.</th>
				<th>Address</th>
				<th>Pin-code</th>
				<th>Profile Picture</th>
				<th>Edit  Student details</th>
				<th>Delete Students</th>
			</tr>
			<?php
			$qry = mysqli_query($con, "SELECT * FROM `students`");
			while($data = mysqli_fetch_assoc($qry)){
			?>
			<tr>
				<td><?=$data["f_name"];?></td>
				<td><?=$data["m_name"];?></td>
				<td><?=$data["l_name"];?></td>
				<td><?=$data["gender"];?></td>
				<td><?=$data["dob"];?></td>
				<td><?=$data["email"];?></td>
				<td><?=$data["mobile"];?></td>
				<td><?=$data["address"];?></td>
				<td><?=$data["pin_code"];?></td>
				<td><img src="upload/<?=$data["profile_pic"];?>" style="height: 50px;"></td>
				<td><button type="button" class="btn btn-warning" onclick="studentEdit('<?=$data["id"]?>')">EDIT</button></td>
				<td><button type="button" class="btn btn-danger" onclick="studentDel('<?=$data["id"]?>')">DELETE</button></td>
			</tr>	
			<?php
			}
			?>
		</table>
	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h1 class="modal-title" style="text-align: center;"><u>Edit Your Student Details</u></h1>
		      	</div>
		      	<div class="modal-body">
			      	<form action="student_edit_action.php" method="POST" enctype="multipart/form-data">
			      		<input type="hidden" name="hidden_student_id" id="hidden_student_id" value="">
				        <div class="row">
				        	<div class="col-md-4">
				        		<label for="fname">First Name</label>
				        		<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name"required="required">
				        	</div>
				        	<div class="col-md-4">
				        		<label for="mname">Middle Name</label>
				        		<input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Your Middle Name">
				        	</div>
				        	<div class="col-md-4">
				        		<label for="mname">Last Name</label>
				        		<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Your Last Name">
				        	</div>
				        </div>
				        <div class="row">
							<div class="col-md-6">
								<label for="gender">Gender:</label>
								<select name="gender"  id="gender" class="form-control"required="required">
									<option value="">Select</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									<option value="O">Others</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
								<input type="date" class="form-control" name="dob" id="dob" required="required">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
									<label for="email">Email Id:</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Id" required="required">
							</div>
							<div class="col-md-6">
								<label for="mobile">Mobile No.:</label>
								<input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" required="required">
							</div>
						</div>				
						<div class="row">
							<div class="col-md-8">
								<label for"address">Address:</label>
								<textarea name="address" id="address" placeholder="Eneter Your Address" class="form-control" id="" rows="5" cols="12" required="required"></textarea>
							</div>
							<div class="col-md-4">
									<label for="pcode">Pin-code:</label>
									<input type="number" class="form-control" name="pcode" id="pcode" placeholder="Enter Your Pin-code" maxlength="6" required="required">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label for="pcode">Profile Picture:</label>
								<img src="" id="display_profile_pic" style="height: 50px">
							</div>
							<div class="col-md-6">
								<br><br>
								<input type="file" name="profile_picture" id="profile_picture">
								<input type="hidden" name="old_profile_picture" id="old_profile_picture">
							</div>
							<div class="col-md-3">
								<input type="submit" value="Save" name="submit" class="btn btn-primary">
							</div>
						</div>
				    </form>
		      	</div>
		    </div>
	  	</div>
	</div>				
	<script>
		function studentDel(studentId){
			if(confirm("Are you sure to delete?")){
				window.location.href="delete_student.php?student_id="+studentId;
			}
		}
		function studentEdit(studentId){
			$.ajax({
				url: "get_data.php",
				type: "POST",
				data:{id:studentId},
				success: function(res){
					console.log(res);
					var data = JSON.parse(res);
					console.log(data);
					$("#myModal").modal('show');
					$("#hidden_student_id").val(data.id);
					$("#fname").val(data.f_name);
					$("#mname").val(data.m_name);
					$("#lname").val(data.l_name);
					$("#gender").val(data.gender);
					$("#dob").val(data.dob);
					$("#email").val(data.email);
					$("#mobile").val(data.mobile);
					$("#address").val(data.address);
					$("#pcode").val(data.pin_code);
					$("#old_profile_picture").val(data.profile_pic);
					$("#display_profile_pic").attr('src','upload/'+data.profile_pic);


					$('#save').click(function(event){
						event.preventDefault();
					});
				}
			});
		}
	</script>
</body>
</html>