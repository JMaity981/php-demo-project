<?php
include("config.php");
if(isset($_GET["student_id"])){
	$x=$_GET["student_id"];
	$del="DELETE FROM students WHERE id=$x";
	if ($con->query($del)==TRUE){
		header("Location:all_student.php");
	}else{
		echo "Error deleting student:".$con->error;
	}
	$con->close();
}
?>