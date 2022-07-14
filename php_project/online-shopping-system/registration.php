<?php include('header.php'); ?>
<?php 
if(isset($_POST['update']))
{
	$dt	= $f->getDate();
	$tm	= $f->getTime();
	
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$baddress = $_POST['baddress'];
	$bcity = $_POST['bcity'];
	$bcountry = $_POST['bcountry'];
	$bpin = $_POST['bpin'];
	$saddress = $_POST['saddress'];
	$scity = $_POST['scity'];
	$scountry = $_POST['scountry'];
	$Spin = $_POST['spin'];
	$captcha = $_POST['captcha'];
	
	
		$sql = mysql_query("UPDATE `tbl_registration` SET `fname` = '$fname', `lname` = '$lname', `email` = '$email', `mobile` = '$mobile', `phone` = '$phone', `baddress` = '$baddress', `bcity` = '$bcity', `bcountry` = '$bcountry', `bpin` = '$bpin', `saddress` = '$saddress', `scity` = '$scity', `scountry` = '$scountry', `spin` = '$Spin' WHERE `id` = ".$_SESSION['user_id1']) or die(mysql_error());
		
		if($sql)
		{			
			$_SESSION['msg'] = "Profile Updated";
			header("Location: ".$_SERVER['PHP_SELF']);
			//exit();
		}
		else
		{
			$_SESSION['msg'] = "Cannot Be Update. Please Try Again.";
			header("Location: ".$_SERVER['PHP_SELF']);
			//exit();
		}
	
		
}

if(isset($_POST['register']))
{
	$dt	= $f->getDate();
	$tm	= $f->getTime();
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$mobile = $_POST['mobile'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$baddress = $_POST['baddress'];
	$bcity = $_POST['bcity'];
	$bcountry = $_POST['bcountry'];
	$bpin = $_POST['bpin'];
	$saddress = $_POST['saddress'];
	$scity = $_POST['scity'];
	$scountry = $_POST['scountry'];
	$Spin = $_POST['spin'];
	$captcha = $_POST['captcha'];
	
	
		$sql = mysql_query("INSERT INTO `tbl_registration` VALUES ('', '$fname', '$lname', '$email', '$pass', '$mobile', '$phone', '$baddress', '$bcity', '$bcountry', '$bpin', '$saddress', '$scity', '$scountry', '$Spin', '0', '$dt', '$tm')");
		
		if($sql)
		{
			$response ="
			";
		
			$headers  = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\n";
			$headers.= "From: SKY MOBILE REGISTRATION<info@skymobile.com>\r\nReply-To: info@skymobile.com\r\nX-Mailer: PHP/".phpversion();
			
			mail($email,"",$response,$headers);
			$_SESSION['msg'] = "Registration sucessfull. <a href=\"login.php\">Click here</a> to log in.";
			header("Location: ".$_SERVER['PHP_SELF']);
			//exit();
		}
		else
		{
			$_SESSION['msg'] = "Registration unsucessfull. Please try again.";
			header("Location: ".$_SERVER['PHP_SELF']);
			//exit();
		}
	
}
?>




<script type="text/javascript" src="zxml.js"></script>

<script type="text/javascript" language="javascript">
function duplicate()
{
	if(document.getElementById('sameAdd').checked == 1)
	{
		//alert("checked");
		document.getElementById('saddress').value=document.getElementById('baddress').value;
		document.getElementById('scity').value=document.getElementById('bcity').value;
		document.getElementById('scountry').value=document.getElementById('bcountry').value;
		document.getElementById('spin').value=document.getElementById('bpin').value;
		
		document.getElementById('saddress').readOnly = true;
		document.getElementById('scity').readOnly = true;
		document.getElementById('scountry').readOnly = true;
		document.getElementById('spin').readOnly = true;
	}
	if(document.getElementById('sameAdd').checked == 0)
	{
		//alert("unchecked");
		document.getElementById('saddress').value="";
		document.getElementById('scity').value="";
		document.getElementById('scountry').value="India";
		document.getElementById('spin').value="";
		
		document.getElementById('saddress').readOnly = false;
		document.getElementById('scity').readOnly = false;
		document.getElementById('scountry').readOnly = false;
		document.getElementById('spin').readOnly = false;
	}
}

function checkRePassword(repass)
{
	if(repass == "")
	{
		document.getElementById("reTypePasswordShow").innerHTML = "&nbsp;";
		document.getElementById("reTypePasswordShow").style.display = "none";
	}
	else
	{
		var length = repass.length;
		var pas = document.getElementById("pass").value;
		var pass = pas.substr(0,length);
		var result = "";
		
		if(repass == pass)
		{
			result = "<font face=\"Courier\" size=\"2\" color=\"#006600\">Correct</font>";
			document.getElementById("reTypePasswordShow").innerHTML = result;
			document.getElementById("reTypePasswordShow").style.display = "block";
		}
		else
		{
			result = "<font face=\"Courier\" size=\"2\" color=\"#FF0000\">Incorrect</font>";
			document.getElementById("reTypePasswordShow").innerHTML = result;
			document.getElementById("reTypePasswordShow").style.display = "block";
		}
	}
}

var xmlhttp1;
function checkAviability(email,id)
{
	if(email == "")
	{
		document.getElementById("availabilityShow").innerHTML = "&nbsp;";
		document.getElementById("availabilityShow").style.display = "none";
	}
	else
	{
		var url = "checkAvailability.php?email="+email+'&id='+id;
		xmlhttp1=zXmlHttp.createRequest(); 
		xmlhttp1.open("GET",url,true);
			
		xmlhttp1.onreadystatechange = function (){
			if(xmlhttp1.readyState == 4)
			{
				if(xmlhttp1.responseText == "<font face=\"Courier\" size=\"2\" color=\"#FF0000\">Not Available</font>")
				{
					document.getElementById("email").value = "";
					document.getElementById("email").focus();
				}
				document.getElementById("availabilityShow").innerHTML = xmlhttp1.responseText;
				document.getElementById("availabilityShow").style.display = "block";
			}
		};	
		xmlhttp1.send(null);
	}
}
</script>

<script type="text/javascript" language="javascript">
function checkValidation1()
{
	var email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var pin=/^[0-9]{6}$/;
    var con =/^[0-9]+$/;
   
	if(document.getElementById("email").value=="")
	{
		alert("Please Enter E-mail Id");		
		document.getElementById("email").focus();
		document.getElementById("email").style.background="#FFFFE0";
		return false;
	}
	else if(email.test(document.getElementById("email").value) == false) 
	{
	    alert('Please Enter A Valid Email Id');
		document.getElementById("email").value = "";
	    document.getElementById("email").focus();
	    document.getElementById("email").style.background="#FFFFE0";
	    return false;
	}
	else if(document.getElementById("mobile").value=="")
	{
		alert("Please Enter Mobile No");		
		document.getElementById("mobile").focus();
		document.getElementById("mobile").style.background="#FFFFE0";
		return false;
	}
	else if(con.test(document.getElementById("mobile").value) == false) 
	{
		alert('Please Enter A Valid Mobile No');
		document.getElementById("mobile").focus();
		document.getElementById("mobile").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("fname").value=="")
	{
		alert("Please Enter First Name");		
		document.getElementById("fname").focus();
		document.getElementById("fname").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("lname").value=="")
	{
		alert("Please Enter Last Name");		
		document.getElementById("lname").focus();
		document.getElementById("lname").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("phone").value=="")
	{
		alert("Please Enter Phone Number");		
		document.getElementById("phone").focus();
		document.getElementById("phone").style.background="#FFFFE0";
		return false;
	}
	else if(isNaN(document.getElementById("phone").value) == true)
	{
		alert("Please Enter Valid Phone Number");	
		document.getElementById("phone").value = "";	
		document.getElementById("phone").focus();
		document.getElementById("phone").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("baddress").value=="")
	{
		alert("Please Enter Address In Billing Detail");		
		document.getElementById("baddress").focus();
		document.getElementById("baddress").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("bcity").value=="")
	{
		alert("Please Enter City In Billing Detail");		
		document.getElementById("bcity").focus();
		document.getElementById("bcity").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("bpin").value=="")
	{
		alert("Please Enter Pin Code In Billing Detail");		
		document.getElementById("bpin").focus();
		document.getElementById("bpin").style.background="#FFFFE0";
		return false;
	}
	else if(pin.test(document.getElementById("bpin").value) == false) 
	{
		alert('Please Enter A Valid Pin Code In Billing Detail');
		document.getElementById("bpin").focus();
		document.getElementById("bpin").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("saddress").value=="")
	{
		alert("Please Enter Address In Shipping Detail");		
		document.getElementById("saddress").focus();
		document.getElementById("saddress").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("scity").value=="")
	{
		alert("Please Enter City In Shipping Detail");		
		document.getElementById("scity").focus();
		document.getElementById("scity").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("spin").value=="")
	{
		alert("Please Enter Pin Code In Shipping Detail");		
		document.getElementById("spin").focus();
		document.getElementById("spin").style.background="#FFFFE0";
		return false;
	}
	else if(pin.test(document.getElementById("spin").value) == false) 
	{
		alert('Please Enter A Valid Pin Code In Shipping Detail');
		document.getElementById("spin").focus();
		document.getElementById("spin").style.background="#FFFFE0";
		return false;
	}
	/*else if(document.getElementById("captcha").value=="")
	{
		alert("Please Enter Human Verification Code");		
		document.getElementById("captcha").focus();
		document.getElementById("captcha").style.background="#FFFFE0";
		return false;
	}*/
	else
	{
		return true;
	}
}
</script>

<script type="text/javascript" language="javascript">
function checkValidation()
{
	var email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var pin=/^[0-9]{6}$/;
    var con =/^[0-9]+$/;
   
	if(document.getElementById("email").value=="")
	{
		alert("Please Enter E-mail Id");		
		document.getElementById("email").focus();
		document.getElementById("email").style.background="#FFFFE0";
		return false;
	}
	else if(email.test(document.getElementById("email").value) == false) 
	{
	    alert('Please Enter A Valid Email Id');
		document.getElementById("email").value = "";
	    document.getElementById("email").focus();
	    document.getElementById("email").style.background="#FFFFE0";
	    return false;
	}
	else if(document.getElementById("pass").value=="")
	{
		alert("Please Enter Password");		
		document.getElementById("pass").focus();
		document.getElementById("pass").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("repass").value=="")
	{
		alert("Please Re-type Password");		
		document.getElementById("repass").focus();
		document.getElementById("repass").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("repass").value!=document.getElementById("pass").value)
	{
		alert("Wrong Password Confirmation Password");		
		document.getElementById("repass").focus();
		document.getElementById("repass").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("mobile").value=="")
	{
		alert("Please Enter Mobile No");		
		document.getElementById("mobile").focus();
		document.getElementById("mobile").style.background="#FFFFE0";
		return false;
	}
	else if(con.test(document.getElementById("mobile").value) == false) 
	{
		alert('Please Enter A Valid Mobile No');
		document.getElementById("mobile").focus();
		document.getElementById("mobile").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("fname").value=="")
	{
		alert("Please Enter First Name");		
		document.getElementById("fname").focus();
		document.getElementById("fname").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("lname").value=="")
	{
		alert("Please Enter Last Name");		
		document.getElementById("lname").focus();
		document.getElementById("lname").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("phone").value=="")
	{
		alert("Please Enter Phone Number");		
		document.getElementById("phone").focus();
		document.getElementById("phone").style.background="#FFFFE0";
		return false;
	}
	else if(isNaN(document.getElementById("phone").value) == true)
	{
		alert("Please Enter Valid Phone Number");	
		document.getElementById("phone").value = "";	
		document.getElementById("phone").focus();
		document.getElementById("phone").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("baddress").value=="")
	{
		alert("Please Enter Address In Billing Detail");		
		document.getElementById("baddress").focus();
		document.getElementById("baddress").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("bcity").value=="")
	{
		alert("Please Enter City In Billing Detail");		
		document.getElementById("bcity").focus();
		document.getElementById("bcity").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("bpin").value=="")
	{
		alert("Please Enter Pin Code In Billing Detail");		
		document.getElementById("bpin").focus();
		document.getElementById("bpin").style.background="#FFFFE0";
		return false;
	}
	else if(pin.test(document.getElementById("bpin").value) == false) 
	{
		alert('Please Enter A Valid Pin Code In Billing Detail');
		document.getElementById("bpin").focus();
		document.getElementById("bpin").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("saddress").value=="")
	{
		alert("Please Enter Address In Shipping Detail");		
		document.getElementById("saddress").focus();
		document.getElementById("saddress").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("scity").value=="")
	{
		alert("Please Enter City In Shipping Detail");		
		document.getElementById("scity").focus();
		document.getElementById("scity").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("spin").value=="")
	{
		alert("Please Enter Pin Code In Shipping Detail");		
		document.getElementById("spin").focus();
		document.getElementById("spin").style.background="#FFFFE0";
		return false;
	}
	else if(pin.test(document.getElementById("spin").value) == false) 
	{
		alert('Please Enter A Valid Pin Code In Shipping Detail');
		document.getElementById("spin").focus();
		document.getElementById("spin").style.background="#FFFFE0";
		return false;
	}
	/*else if(document.getElementById("captcha").value=="")
	{
		alert("Please Enter Human Verification Code");		
		document.getElementById("captcha").focus();
		document.getElementById("captcha").style.background="#FFFFE0";
		return false;
	}
	else if(document.getElementById("agree").checked == 0)
	{
		alert("Please Agree To Our Terms & Conditions");
		return false;
	}*/
	else
	{
		return true;
	}
}
</script>





<body>
<div class="wrap">
	<!-----header-start------>
	<?php include('top.php'); ?>
    <!-----header-end------>
    <div class="clear"></div>
    <!-----banner-start------>
    <?php include('banner.php'); ?>
    <!-----banner-end------>
    <div class="clear"></div>
    <!-----left-part-star------>
     <?php include('left_panel.php'); ?>
    <!-----left-part-end------>
    <!-----right-part-start------>
    <div class="right_panel">
    <div class="featur_box containt">
        <div class="heading">
            <h3>Registration</h3>
        </div>
        
        
        <?php
		
		if(isset($_SESSION['user_id1']))
		{
			$sql = mysql_query("SELECT * FROM `tbl_registration` WHERE `id` = ".$_SESSION['user_id1']);
			$row = mysql_fetch_assoc($sql);
		?>
		<form name="reg" action="" method="post" autocomplete="off" onSubmit="return checkValidation1();">
		<table class="generalText" width="100%">
		  <tr>
		    <td width="45%">
			  <table width="100%" align="center" border="0">
              <tr>
              	<td colspan="2">Personal Details</td>
              </tr>
			    <tr>
				  <td align="right" valign="top"><span style="color:#FF0000;">*</span>E-mail:</td>
				  <td align="left">
				    <input type="text" name="email" id="email" class="regis_text" value="<?php echo $row['email']; ?>" onBlur="return checkAviability(this.value,<?php echo $row['id']; ?>);" />
					<br />
					<div id="availabilityShow" style="display:none; text-align:left;">
					</div>
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Mobile No:</td>
				  <td align="left" >
				    <input type="text" name="mobile" class="regis_text" id="mobile" value="<?php echo $row['mobile']; ?>" />
				  </td>				  
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>First Name:</td>
				  <td align="left" >
				    <input type="text" name="fname" class="regis_text" id="fname" value="<?php echo $row['fname']; ?>" />
				  </td>				  
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Last Name:</td>
				  <td align="left" >
				    <input type="text" name="lname" class="regis_text" id="lname" value="<?php echo $row['lname']; ?>" />
				  </td>				  
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Phone No:</td>
				  <td align="left" >
				    <input type="text" name="phone" class="regis_text" id="phone" value="<?php echo $row['phone']; ?>" />
				  </td>				  
				</tr>
				<tr>
				  <td align="right" style="color:#00CCFF;">Billing Address:</td>
				  <td align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td align="right" valign="top"><span style="color:#FF0000;">*</span>Address:</td>
				  <td align="left" >
				    <textarea name="baddress" id="baddress"  class="text_area"><?php echo $row['baddress']; ?></textarea>
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>City:</td>
				  <td align="left" >
				    <input type="text" name="bcity" class="regis_text" id="bcity" value="<?php echo $row['bcity']; ?>" />
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Country:</td>
				  <td align="left" >
                      <select name="bcountry" id="bcountry"  class="regis_text" style="border:0px;">
					  	<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua">Antigua</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands, The">Canary Islands, The</option>
						<option value="Cape Verde">Cape Verde</option>					
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China, People's Republic">China, People's Republic</option>
						<option value="Colombia">Colombia</option>					
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo, The Democratic Republic of">Congo, The Democratic Republic of</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote d'Ivoire">Cote d'Ivoire</option>					
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic, The">Czech Republic, The</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Denmark">Denmark</option>					
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>					
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Falkland Islands">Falkland Islands</option>					
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>					
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>					
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea Republic">Guinea Republic</option>					
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana (British)">Guyana (British)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Iceland">Iceland</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option value="Ireland, Republic Of">Ireland, Republic Of</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>					
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, D.P.R Of">Korea, D.P.R Of</option>
						<option value="Korea, Republic Of">Korea, Republic Of</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>					
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>					
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia, Republic of (FYROM)">Macedonia, Republic of (FYROM)</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>					
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>					
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mexico">Mexico</option>
						<option value="Moldova, Republic Of">Moldova, Republic Of</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>					
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru, Republic Of">Nauru, Republic Of</option>					
						<option value="Nepal">Nepal</option>
						<option value="Netherlands, The">Netherlands, The</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>					
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norway">Norway</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Oman">Oman</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Pakistan">Pakistan</option>					
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea ">Papua New Guinea </option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines, The">Philippines, The</option>
						<option value="Poland">Poland</option>					
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Qatar">Qatar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Reunion, Island Of">Reunion, Island Of</option>
						<option value="Romania">Romania</option>
						<option value="Russian Federation, The">Russian Federation, The</option>					
						<option value="Rwanda">Rwanda</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>					
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>					
						<option value="Somalia">Somalia</option>
						<option value="Somaliland, Rep of (North Somalia)">Somaliland, Rep of (North Somalia)</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St. Barthelemy">St. Barthelemy</option>					
						<option value="St. Eustatius">St. Eustatius</option>
						<option value="St. Kitts">St. Kitts</option>
						<option value="St. Lucia">St. Lucia</option>
						<option value="St. Maarten">St. Maarten</option>
						<option value="St. Vincent">St. Vincent</option>
						<option value="Sudan">Sudan</option>					
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Tahiti">Tahiti</option>					
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tonga">Tonga</option>					
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Uganda">Uganda</option>					
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States Of America"  selected="selected">United States Of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Vanuatu">Vanuatu</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (British)">Virgin Islands (British)</option>
						<option value="Virgin Islands (US)">Virgin Islands (US)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Yemen">Yemen</option>					
						<option value="Yugoslavia">Yugoslavia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="India"  selected="selected">India</option>
					</select> 
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Postal Code:</td>
				  <td align="left" >
				    <input type="text" name="bpin" class="regis_text" id="bpin" value="<?php echo $row['bpin']; ?>" />
				  </td>
				</tr>
			  </table>
			</td>
			<td width="55%" valign="top">
			  <table width="100%" align="center">
			    <tr>
				  <td align="right" style="color:#00CCFF;">Shipping Address:</td>
				  <td align="left">
				    <input type="checkbox" name="sameAdd" id="sameAdd" value="" onClick="return duplicate();" /> Same As Billing Address
				  </td>
				</tr>
				<tr>
				  <td align="right" valign="top"><span style="color:#FF0000;">*</span>Address:</td>
				  <td align="left" >
				    <textarea name="saddress" id="saddress" class="text_area"><?php echo $row['saddress']; ?></textarea>
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>City:</td>
				  <td align="left" >
				    <input type="text" name="scity" class="regis_text" id="scity" value="<?php echo $row['scity']; ?>" />
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Country:</td>
				  <td align="left" >
				    <select name="scountry" id="scountry"  class="regis_text" style="border:0px;">
					  	<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua">Antigua</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands, The">Canary Islands, The</option>
						<option value="Cape Verde">Cape Verde</option>					
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China, People's Republic">China, People's Republic</option>
						<option value="Colombia">Colombia</option>					
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo, The Democratic Republic of">Congo, The Democratic Republic of</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote d'Ivoire">Cote d'Ivoire</option>					
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic, The">Czech Republic, The</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Denmark">Denmark</option>					
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>					
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Falkland Islands">Falkland Islands</option>					
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>					
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>					
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea Republic">Guinea Republic</option>					
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana (British)">Guyana (British)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Iceland">Iceland</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option value="Ireland, Republic Of">Ireland, Republic Of</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>					
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, D.P.R Of">Korea, D.P.R Of</option>
						<option value="Korea, Republic Of">Korea, Republic Of</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>					
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>					
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia, Republic of (FYROM)">Macedonia, Republic of (FYROM)</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>					
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>					
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mexico">Mexico</option>
						<option value="Moldova, Republic Of">Moldova, Republic Of</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>					
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru, Republic Of">Nauru, Republic Of</option>					
						<option value="Nepal">Nepal</option>
						<option value="Netherlands, The">Netherlands, The</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>					
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norway">Norway</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Oman">Oman</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Pakistan">Pakistan</option>					
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea ">Papua New Guinea </option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines, The">Philippines, The</option>
						<option value="Poland">Poland</option>					
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Qatar">Qatar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Reunion, Island Of">Reunion, Island Of</option>
						<option value="Romania">Romania</option>
						<option value="Russian Federation, The">Russian Federation, The</option>					
						<option value="Rwanda">Rwanda</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>					
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>					
						<option value="Somalia">Somalia</option>
						<option value="Somaliland, Rep of (North Somalia)">Somaliland, Rep of (North Somalia)</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St. Barthelemy">St. Barthelemy</option>					
						<option value="St. Eustatius">St. Eustatius</option>
						<option value="St. Kitts">St. Kitts</option>
						<option value="St. Lucia">St. Lucia</option>
						<option value="St. Maarten">St. Maarten</option>
						<option value="St. Vincent">St. Vincent</option>
						<option value="Sudan">Sudan</option>					
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Tahiti">Tahiti</option>					
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tonga">Tonga</option>					
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Uganda">Uganda</option>					
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States Of America"  selected="selected">United States Of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Vanuatu">Vanuatu</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (British)">Virgin Islands (British)</option>
						<option value="Virgin Islands (US)">Virgin Islands (US)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Yemen">Yemen</option>					
						<option value="Yugoslavia">Yugoslavia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="India"  selected="selected">India</option>
					</select>
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Postal Code:</td>
				  <td align="left" >
				    <input type="text" name="spin" class="regis_text" id="spin" value="<?php echo $row['spin']; ?>" />
				  </td>
				<!--</tr>
				<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left" >
				    <img src="captcha/CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
					Enter the letters shown above into box
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Human Verification:</td>
				  <td align="left" >
				    <input type="text" name="captcha" class="nofify_text" id="captcha" value="" size="4" />
				  </td>
				</tr>-->
				<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left" >&nbsp;</td>
				</tr>
				<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left" >
				    <input type="submit" name="update" value="Update" class="submit" style="border:0" />
				  </td>
				</tr>
			  </table>
			</td>		    	
		  </tr>
		</table>
		</form>
		
		<?php	
		}
		else
		{
		?>
		<form name="reg" action="" method="post" autocomplete="off" onSubmit="return checkValidation();">
		<table class="generalText" width="100%">
		  <tr>
		    <td width="49%">
			  <table width="108%" align="center" border="0" cellpadding="0" cellspacing="0" class="details_from">
              <tr><td colspan="2"><h2>Personal Details:</h2></td></tr>
			    <tr>
				  <td align="left" valign="top"><span style="color:#FF0000;">*</span>E-mail:</td>
				  <td align="left">
				    <input type="text" name="email" id="email" class="regis_text"  size="28" value="" onBlur="return checkAviability(this.value,'');" />
					<br />
					<div id="availabilityShow" style="display:none; text-align:left;">
					</div>
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Password:</td>
				  <td align="left" >
				    <input type="password" name="pass" class="regis_text" id="pass" value=""  size="28"/>
				  </td>				  
				</tr>
				<tr>
				  <td align="left"  valign="top"><span style="color:#FF0000;">*</span>Re-type Password:</td>
				  <td align="left" >
				    <input type="password" name="repass" class="regis_text" id="repass" value="" size="28" onKeyUp="return checkRePassword(this.value);" />
					<br />
					<div id="reTypePasswordShow" style="display:none; margin:-5px 0px 5px 0px; text-align:left;">
					</div>
				  </td>				  
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Mobile No:</td>
				  <td align="left" >
				    <input type="text" name="mobile" class="regis_text" id="mobile" value="" size="28" />
				  </td>				  
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>First Name:</td>
				  <td align="left" >
				    <input type="text" name="fname" class="regis_text" id="fname" value="" size="28" />
				  </td>				  
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Last Name:</td>
				  <td align="left" >
				    <input type="text" name="lname" class="regis_text" id="lname" value="" size="28" />
				  </td>				  
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Phone No:</td>
				  <td align="left" >
				    <input type="text" name="phone" class="regis_text" id="phone" value="" size="28" />
				  </td>				  
				</tr>
                <tr>
                	<td height="20px"></td>
                </tr>
				<tr>
				  <td align="left"  style="color:#00CCFF; height:40px;"><h2>Billing Address:</h2></td>
				  <td align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td align="left"  valign="top"><span style="color:#FF0000;">*</span>Address:</td>
				  <td align="left" >
				    <textarea name="baddress" id="baddress"  class="text_area" cols="22">&nbsp;</textarea>
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>City:</td>
				  <td align="left" >
				    <input type="text" name="bcity" class="regis_text" id="bcity" value="" size="28" />
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Country:</td>
				  <td align="left" >
                     <select name="bcountry" id="bcountry"  class="regis_text" style="width:209px;">
					  	<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua">Antigua</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands, The">Canary Islands, The</option>
						<option value="Cape Verde">Cape Verde</option>					
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China, People's Republic">China, People's Republic</option>
						<option value="Colombia">Colombia</option>					
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo, The Democratic Republic of">Congo, The Democratic Republic of</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote d'Ivoire">Cote d'Ivoire</option>					
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic, The">Czech Republic, The</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Denmark">Denmark</option>					
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>					
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Falkland Islands">Falkland Islands</option>					
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>					
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>					
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea Republic">Guinea Republic</option>					
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana (British)">Guyana (British)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Iceland">Iceland</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option value="Ireland, Republic Of">Ireland, Republic Of</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>					
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, D.P.R Of">Korea, D.P.R Of</option>
						<option value="Korea, Republic Of">Korea, Republic Of</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>					
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>					
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia, Republic of (FYROM)">Macedonia, Republic of (FYROM)</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>					
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>					
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mexico">Mexico</option>
						<option value="Moldova, Republic Of">Moldova, Republic Of</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>					
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru, Republic Of">Nauru, Republic Of</option>					
						<option value="Nepal">Nepal</option>
						<option value="Netherlands, The">Netherlands, The</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>					
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norway">Norway</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Oman">Oman</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Pakistan">Pakistan</option>					
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea ">Papua New Guinea </option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines, The">Philippines, The</option>
						<option value="Poland">Poland</option>					
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Qatar">Qatar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Reunion, Island Of">Reunion, Island Of</option>
						<option value="Romania">Romania</option>
						<option value="Russian Federation, The">Russian Federation, The</option>					
						<option value="Rwanda">Rwanda</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>					
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>					
						<option value="Somalia">Somalia</option>
						<option value="Somaliland, Rep of (North Somalia)">Somaliland, Rep of (North Somalia)</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St. Barthelemy">St. Barthelemy</option>					
						<option value="St. Eustatius">St. Eustatius</option>
						<option value="St. Kitts">St. Kitts</option>
						<option value="St. Lucia">St. Lucia</option>
						<option value="St. Maarten">St. Maarten</option>
						<option value="St. Vincent">St. Vincent</option>
						<option value="Sudan">Sudan</option>					
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Tahiti">Tahiti</option>					
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tonga">Tonga</option>					
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Uganda">Uganda</option>					
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States Of America"  selected="selected">United States Of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Vanuatu">Vanuatu</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (British)">Virgin Islands (British)</option>
						<option value="Virgin Islands (US)">Virgin Islands (US)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Yemen">Yemen</option>					
						<option value="Yugoslavia">Yugoslavia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="India">India</option>
					</select>
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Postal Code:</td>
				  <td align="left" >
				    <input type="text" name="bpin" class="regis_text" id="bpin" value="" size="28" />
				  </td>
				</tr>
			  </table>
			</td>
			<td width="51%" valign="top">
			  <table width="100%" align="center" cellpadding="0" cellspacing="0" class="details_from">
			    <tr>
				  <td colspan="2" align="left"  style="color:#00CCFF;"><h2>Shipping Address:</h2></td>
				  
				</tr>
                
                <tr><td align="left" colspan="2">
				    <input type="checkbox" name="sameAdd" id="sameAdd" value="" onClick="return duplicate();" /> Same As Billing Address
				  </td></tr>
                  <tr><td height="10px"></td></tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Address:</td>
				  <td align="left" >
				    <textarea name="saddress" id="saddress" class="text_area" cols="22">&nbsp;</textarea>
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>City:</td>
				  <td align="left" >
				    <input type="text" name="scity" class="regis_text" id="scity" value="" size="28" />
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Country:</td>
				  <td align="left" >
			      <select name="scountry" id="scountry"  class="regis_text" style="width:209px;">
					  	<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua">Antigua</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands, The">Canary Islands, The</option>
						<option value="Cape Verde">Cape Verde</option>					
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China, People's Republic">China, People's Republic</option>
						<option value="Colombia">Colombia</option>					
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo, The Democratic Republic of">Congo, The Democratic Republic of</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote d'Ivoire">Cote d'Ivoire</option>					
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic, The">Czech Republic, The</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Denmark">Denmark</option>					
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>					
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Falkland Islands">Falkland Islands</option>					
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>					
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>					
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea Republic">Guinea Republic</option>					
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana (British)">Guyana (British)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Iceland">Iceland</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option value="Ireland, Republic Of">Ireland, Republic Of</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>					
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, D.P.R Of">Korea, D.P.R Of</option>
						<option value="Korea, Republic Of">Korea, Republic Of</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>					
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>					
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia, Republic of (FYROM)">Macedonia, Republic of (FYROM)</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>					
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>					
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mexico">Mexico</option>
						<option value="Moldova, Republic Of">Moldova, Republic Of</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>					
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru, Republic Of">Nauru, Republic Of</option>					
						<option value="Nepal">Nepal</option>
						<option value="Netherlands, The">Netherlands, The</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>					
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norway">Norway</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Oman">Oman</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Pakistan">Pakistan</option>					
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea ">Papua New Guinea </option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines, The">Philippines, The</option>
						<option value="Poland">Poland</option>					
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Qatar">Qatar</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Reunion, Island Of">Reunion, Island Of</option>
						<option value="Romania">Romania</option>
						<option value="Russian Federation, The">Russian Federation, The</option>					
						<option value="Rwanda">Rwanda</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>					
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>					
						<option value="Somalia">Somalia</option>
						<option value="Somaliland, Rep of (North Somalia)">Somaliland, Rep of (North Somalia)</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St. Barthelemy">St. Barthelemy</option>					
						<option value="St. Eustatius">St. Eustatius</option>
						<option value="St. Kitts">St. Kitts</option>
						<option value="St. Lucia">St. Lucia</option>
						<option value="St. Maarten">St. Maarten</option>
						<option value="St. Vincent">St. Vincent</option>
						<option value="Sudan">Sudan</option>					
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Tahiti">Tahiti</option>					
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tonga">Tonga</option>					
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Uganda">Uganda</option>					
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States Of America" >United States Of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="" disabled="disabled">---------------------------------------------</option>					
						<option value="Vanuatu">Vanuatu</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (British)">Virgin Islands (British)</option>
						<option value="Virgin Islands (US)">Virgin Islands (US)</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Yemen">Yemen</option>					
						<option value="Yugoslavia">Yugoslavia</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
						<option value="" disabled="disabled">---------------------------------------------</option>
						<option value="India"  selected="selected">India</option>
					</select>
				  </td>
				</tr>
				<tr>
				  <td align="left" valign="top" ><span style="color:#FF0000;">*</span>Postal Code:</td>
				  <td align="left" >
				    <input type="text" name="spin" class="regis_text" id="spin" value="" size="28" />
				  </td>
				</tr>
				<!--<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left" >
				    <img src="captcha/CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
					Enter the letters shown above into box
				  </td>
				</tr>
				<tr>
				  <td align="right"><span style="color:#FF0000;">*</span>Human Verification:</td>
				  <td align="left" >
				    <input type="text" name="captcha" class="nofify_text" id="captcha" value="" size="4" />
				  </td>
				</tr>
				<tr>
				  <td align="right">&nbsp;</td>
				  <td align="left" >
				    <input type="checkbox" name="agree" id="agree" value="" /> I agree to SkyMobile <a href="terms_of_use.php">Terms Of Use</a> and <a href="privacy_policy.php">Privacy Policy</a>
				  </td>
				</tr>-->
				<tr>
				  <td align="left" >&nbsp;</td>
				  <td align="left" >
				    <input type="submit" name="register" value="Submit" class="pay"  />
				  </td>
				</tr>
			  </table>
			</td>		    	
		  </tr>
		</table>
		</form>
		<?php
		}
		?>
        
        
        
        
  		
        
    </div>
    </div>
    <!-----right-part-end------>
    <div class="clear"></div>
    <!-----footer-Start------>
 	<?php include('footer.php'); ?>
      <!-----footer-end------>
    

</div>
</body>
</html>
