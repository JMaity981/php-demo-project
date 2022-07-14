<?php
     if(isset($_POST['submit'])){
     	$p=$_POST['password'];
     	$cp=$_POST['con_password'];
     	if($p==$cp){
     		echo "NAME- ".$_POST['fname']." ". $_POST['mname']. " " .$_POST['lname']."<br>Gender: ".$_POST['gender']."<br>Email Id-".$_POST['email']."<br>Mobile No-".$_POST['mobile']."<br>Address: ".$_POST['address']."&nbsp; Pin-code:".$_POST['pcode'];
     	}
     	else{
     		echo "YOUR PASSWORD AND CONFIRM PASSWORD ARE NOT MATCHED";
     	}
     }
?>