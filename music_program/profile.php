<?php
	include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  	<style type="text/css">
  		.error{
  			color:red;
  		}
  	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h1 style="text-align: center;"><u>Your Details</u></h1>
				<?php
					$qry = mysqli_query($con, "SELECT * FROM `sign_up_user` WHERE id='".$_SESSION['user_id']."'");
					$data = mysqli_fetch_assoc($qry);
				?>
				<table class="table table-bordered" width="100%">
					<tr>
						<th>Name:</th>
						<td><?=$data["name"];?></td>
						<td rowspan="3"><img src="upload/<?=$data["profile_pic"];?>" style="height: 138px;"></td>
					</tr>
					<tr>
						<th>Gender:</th>
						<td><?=$data["gender"];?></td>
					</tr>
					<tr>
						<th>Date of Birth:</th>
						<td><?=$data["dob"];?></td>
					</tr>
					<tr>
						<th>Mobile no.:</th>
						<td style="padding:0"><input type="text" value="<?=$data["mobile"];?>" style="background: #fff;height: 48px;width: 100%;border: 0;text-align: center;" id="mobile_no_id" disabled></td>
						<td>
							<div id="mobDivId">
								<button type="button" class="btn btn-warning" onclick="chngMobile('<?=$data["id"]?>')">Change Your Mobile No</button>
							</div>
							<!--  -->
						</td>
					</tr>
					<tr>
						<th>Email Id:</th>
						<td style="padding:0"><input type="text" value="<?=$data["email"];?>" style="background: #fff;height: 48px;width: 100%;border: 0;text-align: center" id="email_id" disabled></td>
						<td>
							<div id="emailDivId">
								<button type="button" class="btn btn-warning" onclick="chngEmail('<?=$data["id"]?>')">Change Your Email Id</button>
							</div>
						</td>
					</tr>
					<tr>
						<th rowspan="3">Address:</th>
						<th>State:</th>
						<td>
							<?php
								$state_qry = mysqli_query($con, "SELECT * FROM `states` WHERE id = '".$data['state']."'");
								if(!empty($state = mysqli_fetch_assoc($state_qry))){
									echo $state["state_name"];
								}
							?>
						</td>
					</tr>
					<tr>
						<th>District:</th>
						<td>
							<?php
								$dist_qry = mysqli_query($con, "SELECT * FROM `districts` WHERE id = '".$data['district']."'");
								if(!empty($district = mysqli_fetch_assoc($dist_qry))){
									echo $district["district_name"];
								}
							?>
						</td>
					</tr>
					<tr>
						<th>Pin-code</th>
						<td><?=$data["pin_code"];?></td>
					</tr>
				</table>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#chngPsw" >Change Your Password</button>
			</div>
		</div>
	</div>
	<div id="chngPsw" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
      				<h4 class="modal-title" class="text-align" style="text-align: center;">Change Password</h4>
		      	</div>
		      	<form id="MyForm" method="POST" action="user_login_password_action.php">
		      		<div class="modal-body">
						<input type="hidden" name="hidden_user_id" id="hidden_user_id" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>">
		        		<label for="old_psw">Old Password</label>
		        		<input type="password" class="form-control" id="old_psw" name="old_psw" placeholder="Enter Your Old Password"required="required">
		        		<label for="new_psw">New Password</label>
		        		<input type="password" class="form-control" id="new_psw" name="new_psw" placeholder="Enter Your New Password">
		        		<label for="con_new_psw">Confirm New Password</label>
		        		<input type="text" class="form-control" id="con_new_psw" name="con_new_psw" placeholder="Enter Your Confirm New Password">
    				</div>
		        	<div class="modal-footer">
	    				<input type="submit" class="form-control btn btn-primary" value="Save" name="save">
	      			</div>
	      		</form>
			</div>
		</div>
	</div>
	<script>
		function chngMobile(){
			$('#mobile_no_id').prop("disabled", false);
			//$('#mobile_btn_id').prop("value="save"",false);;
			$('#mobDivId').html('');
			$('#mobDivId').append('<input type="submit" value="save" class="btn btn-info" onclick="Mobilesave()">');
		}
		function chngEmail(){
			$('#email_id').prop("disabled",false);
			$('#emailDivId').html('');
			$('#emailDivId').append('<input type="submit" value="save" class="btn btn-info" onclick="Emailsave()">');
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/lib/jquery.js"></script>
  	<script src="js/dist/jquery.validate.js"></script>
  	<script type="text/javascript">
		$.validator.setDefaults({
		});
		$().ready(function() {
			$("#MyForm").validate({
				rules: {
					old_psw: "required",
					new_psw: {
						required: true,
						minlength: 8
					},
					con_new_psw: {
						required: true,
						minlength: 8,
						equalTo: "#new_psw"
					}
				},
				messages: {
					old_psw: "Please provide your password",
					new_psw: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long"
					},
					con_new_psw: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long",
						equalTo: "Please enter the same password as above"
					}
				}
			});
		});
	</script>
	<script type="text/javascript">
		function Mobilesave(){
			var mobile_no=$('#mobile_no_id').val();
			$.ajax({
				url: "mobile_save.php",
				type: "post",
				data:{mobile_no:mobile_no},
				success: function(res){
					console.log(res);
					if(res=="success"){
						window.location.reload();
					}else{
						alert("Something is wrong, please try again");
					}
				}
			});
		}
	</script>
</body>
</html>