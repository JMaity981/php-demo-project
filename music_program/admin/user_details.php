<?php
	include('../config.php');
	if(!isset($_SESSION['admin_id'])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ALL User Details</title>
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
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1 style="text-align: center;"><u>ALL User Details</u></h1>
			<table style="width: 100%" class="table">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Profile Picture</th>
					<th>Date of birth</th>
					<th>State</th>
					<th>District</th>
					<th>Pin-code</th>
					<th>Mobile no.</th>
					<th>Email id</th>
					<th>Created at</th>
					<th>updated at</th>
					<th>Delete User</th>
				</tr>
				<?php
				$qry = mysqli_query($con, "SELECT * FROM `sign_up_user`");
				while($data = mysqli_fetch_assoc($qry)){
				?>
				<tr>
					<td><?=$data["id"];?></td>
					<td><?=$data["name"];?></td>
					<td><?=$data["gender"];?></td>
					<td><img src="../upload/<?=$data["profile_pic"];?>" style="height: 50px;"></td>
					<td><?=$data["dob"];?></td>
					<td>
					<?php
						$state_qry = mysqli_query($con, "SELECT * FROM `states` WHERE id = '".$data['state']."'");
						if(!empty($state = mysqli_fetch_assoc($state_qry))){
							echo $state["state_name"];
						}
					?>
					</td>
					<td>
					<?php
						$dist_qry = mysqli_query($con, "SELECT * FROM `districts` WHERE id = '".$data['district']."'");
						if(!empty($district = mysqli_fetch_assoc($dist_qry))){
							echo $district["district_name"];
						}
					?>
					</td>
					<td><?=$data["pin_code"];?></td>
					<td><?=$data["mobile"];?></td>
					<td><?=$data["email"];?></td>
					<td><?=$data["created_at"];?></td>
					<td><?=$data["updated_at"];?></td>
					<td><button type="button" class="btn btn-danger" onclick="userDel('<?=$data["id"]?>')">DELETE</button></td>
				</tr>	
				<?php
				}
				?>
			</table>
		</div>
		<div class="col-md-1"></div>
	</div>				
	<script>
		function userDel(userId){
			if(confirm("Are you sure to delete?")){
				window.location.href="delete_user.php?user_id="+userId;
			}
		}
	</script>
</body>
</html>
