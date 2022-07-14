<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="add_districts_action.php">
		<?php
			$qry = mysqli_query($con,"SELECT * FROM states");
		?>
		<select name="state">
			<?php
			while ($data = mysqli_fetch_assoc($qry)) {
			?>
			<option value="<?php echo $data['id'];?>"><?php echo $data['state_name'];?></option>
			<?php
			}
			?>
		</select>
		<input type="text" name="dist_name">
		<input type="submit" value="Submit" name="submit">
	</form>
</body>
</html>