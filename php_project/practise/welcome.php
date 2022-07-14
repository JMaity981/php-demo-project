<?php
$name=""; //initializing name
$email="";//initializing email
$mobile="";//initializing mobile

		if(isset($_POST['submit'])){//submit condition chaqe
             global  $name;//global value declare
             global $email;//global value declare 
             global $mobile;//global value declare
			 $name = $_POST['username'];//variable data accses
			$email= $_POST['email'];//variable data accses
			$mobile= $_POST['mobile'];//variable data accses


	}	
?>

<?php
    //echo "My name $name";
    //echo "my email-id $email";
    //echo "mobile no. $mobile";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>

<h3>My name is <?php echo "$name"; ?></h3><!--varable value print-->
		<h3>My email-id <?php echo "$email"; ?></h3><!--varable value print-->
		<h4>Mobile No- <?php echo "$mobile";?></h4><!--varable value print-->

<?php
$file=fopen("form.php", "r") or die("unable to open file!");
echo fread($file,filesize("form.php"));
fclose($file);
echo readfile("file.txt")
?>
</body>
</html>