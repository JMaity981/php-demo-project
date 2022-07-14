<!DOCTYPE html>
<html>
<head>
	<title>
		calculation
	</title>
</head>
<body>
	<form method="POST">
		First value:
		<input type="number" name="1st_value">
		<br>Second value:
		<input type="number" name="2nd_value"><br>
		<button type="submit" name="plus">First value + Second value</button>
	</form>
	<?php
		if(isset($_POST['plus'])){
			$plus=$_POST['1st_value']+$_POST['2nd_value'];
			echo "First value + Second value=".$plus;
		}
	?>
	<form method="POST">
		Enter the value:
		<input type="number" name="value">
		<button type="submit" name="prime">Prime Or Not Prime deside</button>
	</form>
	<?php
		if (isset($_POST['prime'])) {
			$x=$_POST['value'];
			for ($i=2; $i<$x ; $i++) { 
				if ($x % $i ==0) {
					echo $x." is  not Prime number";
					break;
				}
			}
			if ($i==$x) {
				echo $x." is Prime number";
			}
		}
	?>
</body>
</html>