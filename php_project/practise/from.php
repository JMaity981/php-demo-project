<!DOCTYPE HTML>
<html>  
<body>
<?php
		//var_dump($_POST);
		if(isset($_POST['submit'])){
			$name = $_POST['username'];
			$email= $_POST['email'];
			$mobile= $_POST['mobile'];
			$password=$_POST['password'];
			$gender=$_POST['gender'];
			$cars=$_POST['cars'];

			echo $name;
			echo "$email";
			echo "$mobile";
			echo "$password";
			echo "$gender";
			echo "$cars";

		}
?>
	<form action="#" method="POST">
	    Name: <input type="text" name="username" value="   Jayanta Maity">
		<br>
		<br>
		E-mail: <input type="text" name="email">
		<br>
		<br>
		Mobile No:<input type="number" name="mobile">
		<br>
		<br>
		password:<input type="password" name="password">
		<br>
		<br>
		<fieldset>
			<legend>SEX:</legend>
		    gender:
		    <input type="radio" name="gender" value="male" checked> Male
		    <input type="radio" name="gender" value="female"> Female
		    <input type="radio" name="gender" value="other"> Other
	    </fieldset>
	    <br>
	    <br>
	    cars:
	    <select name="cars">
	    	<option value=""> Select</option>
	    	<option value="volvo">Volvo</option>
	    	<option value="saab">Saab</option>
	    	<option value="fiat">Fiat</option>
	    	<option value="audi">Audi</option>
        </select>
		<br>
		<br>  
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>