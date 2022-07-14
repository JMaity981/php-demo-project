<?php
include "config.php";
$sec_qry=mysqli_query($con,"SELECT * FROM `districts` WHERE `fk_state_id`='".$_POST['s_id']."'");
$var="";
while($row=mysqli_fetch_assoc($sec_qry)){
	$var=$var.'<option value="'.$row["id"].'">'.$row["district_name"].'</option>';
}
echo $var;
?>