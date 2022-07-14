<?php
// username and password sent from form
	$username = stripslashes($_POST['txt_username']);
	$password = stripslashes($_POST['txt_password']); 
	
	//echo md5($password);
		//exit;
	if($username &&  $password)
	{
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		//echo md5($password);die;
		$sql="SELECT uname,role_id,id FROM users WHERE uname='".$username."' and pass='".md5($password)."' and inactive='0'";
		$result = mysql_query($sql);
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		// If result matched $username and $password, table row must be 1 row

		if($count==1){
		$loginResult = mysql_fetch_array($result);
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		session_register("username");
		session_register("password");
		$_SESSION["username"] = $loginResult["uname"];
		//$_SESSION[school_id]=$_REQUEST[txt_school];
		$_SESSION[role_id]=$loginResult[role_id];
		$_SESSION[user_id]=$loginResult[id];
		/*header("location: index.php?module=home");*/
		
		header("location: index.php?module=welcome&header=Welcome To Control Panel");
		}
		else {
		$msg =  "Invalid login. Please try again with correct username and password.";
		}
	}
	else
	{
		$msg = "All fields marked with * are mandatory";
	}

	?>