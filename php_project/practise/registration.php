<!DOCTYPE html>
<html>
<head>
	<title>
		REGISTRATION Your Details
	</title>
	<style type="text/css">
		input[type="text"], input[type="number"],input[type="password"],input[type="email"]{
			width: 200px;
			height: 45px;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center;">
		<u>Describe Your Details</u>
	</h1>
	<form action="reg.php" method="POST">
		<fieldset>
			<legend>
				<h4>
					NAME
			    </h4>
		    </legend>
		    First Name:&nbsp;
		    <input type="text" name="fname">
		    &nbsp;&nbsp;Middle Name:&nbsp;
		    <input type="text" name="mname">
		    &nbsp;&nbsp;Last Name:&nbsp;
		    <input type="text" name="lname">
		</fieldset>
		<br>
		Gender:&nbsp;
		<select name="gender">
			<option value="">Select</option>
		    <option value="male">Male</option>
		    <option value="female">Female</option>
		    <option value="others">Others</option>
		</select>
		<br>
		<br>
		Email Id:&nbsp;
		<input type="email" name="email">
		<br>
		<br>
		Mobile No:&nbsp;
		<input type="number" name="mobile" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
		<br>
		<br>
		ADDRESS:&nbsp;
		<textarea name="address" rows="5" cols="20">
		</textarea>
		&nbsp;Pin-code:
		<input type="number" name="pcode">
		<br>
		<br>
		<p id="error_msg" style="color: red"></p>
		<br>
		Enter Password:&nbsp;
		<input type="password" name="password">
		<br>
		<br>
		Enter Confirm Password:&nbsp;
		<input type="password" name="con_password">
		<br>
		<br>
		<div style="text-align: center;">
				<input type="submit" name="submit" value="REGISTER">
		</div>
    </form>
</body>
</html>