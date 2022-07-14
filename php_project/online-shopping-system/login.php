<?php 
//$page_id=10;
include('header.php'); 
if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$sql = mysql_query("SELECT * FROM `tbl_registration` WHERE `email` = '$email' AND `password` = '$pass' AND `del_status` = '0'");
	if(mysql_num_rows($sql) > 0)
	{	
		$row = mysql_fetch_array($sql);
		$_SESSION['user_id1'] = $row['id'];
		$_SESSION['user_name'] = $row['fname'];
		
		$sql = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '".$_SERVER['REMOTE_ADDR']."'");
		while($row = mysql_fetch_array($sql))
		{
			$sql_check = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '".$_SESSION['user_id1']."' AND `product_id` = '$row[product_id]'");
			if(mysql_num_rows($sql_check)>0)
			{
				$row_check = mysql_fetch_assoc($sql_check);
				$price = $row_check['price'];
				settype($price,"integer");
				$qty = $row_check['qty'];
				settype($qty,"integer");
				$qty = $qty+1;
				$total = $qty*$price;
				
				mysql_query("UPDATE `tbl_cart` SET `qty` = '$qty', `total` = '$total' WHERE `id` = '$row_check[id]'");
				mysql_query("DELETE FROM `tbl_cart` WHERE `id` = $row[id]");
			}
			else
			{
				mysql_query("UPDATE `tbl_cart` SET `user_id` = '".$_SESSION['user_id1']."' WHERE `id` = '$row[id]'");
			}
		}
		
		if((isset($_REQUEST['con'])) && ($_REQUEST['con'] == "hdsgfj13h2fdhi2800eeeer"))
		{
			?>
            <script>window.location='my_cart.php';</script>
            <?php 
			//header("Location: my_cart.php");
			//exit();
		}
		else if(isset($_GET['page']))
		{
			?>
            <script>window.location='product.php';</script>
            <?php 
			//header("Location: product.php");
			//exit();
		}
		else 
		{
			?>
            <script>window.location='index.php';</script>
            <?php 
			//header("Location: index.php");
			//exit();
		}
	}
	else
	{
		$_SESSION['msg'] = "Wrong E-mail Id Or Password.";
		if((isset($_REQUEST['con'])) && ($_REQUEST['con'] == "hdsgfj13h2fdhi2800eeeer"))
		{
			?>
            <script>window.location='login.php?con=hdsgfj13h2fdhi2800eeeer';</script>
            <?php 
			//header("Location: ".$_SERVER['PHP_SELF']."?con=hdsgfj13h2fdhi2800eeeer");
			//exit();
		}
		else
		{
			?>
            <script>window.location='login.php';</script>
            <?php 
			//header("Location: ".$_SERVER['PHP_SELF']);
			//exit();
		}
	}
}


?>
<script type="text/javascript" language="javascript">
function checkValidation()
{
	var email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    
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
            <h3>Log In</h3>
        </div>
       <div style="font-family:'Verdana', Arial, Helvetica, sans-serif; font-size:12px; color:#993300; text-align:center;">
		  <?php
		  if(isset($_SESSION['msg']))
		  {
		  	echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		  }
		  ?>
		</div>
        <form name="log" action="<?php if((isset($_REQUEST['con'])) && ($_REQUEST['con'] == "hdsgfj13h2fdhi2800eeeer")){echo $_SERVER['PHP_SELF']."?con=hdsgfj13h2fdhi2800eeeer";} else if(isset($_GET['page'])){ echo $_SERVER['PHP_SELF']."?page=product";} else{echo $_SERVER['PHP_SELF'];} ?>" method="post" autocomplete="off" onSubmit="return checkValidation();">
		<table  width="100%"  cellpadding="0" cellspacing="0" class="generalText" >
		  <tr>
		    <td>
			  <table width="400" class="from"  border="0" style="margin:10px 0px 0px 20px;">
			    <tr>
				  <td align="left" valign="top" class="name">E-mail:</td>
				  <td align="left"><input type="text" name="email" id="email" size="28" value="" class="regis_text" /></td>
				</tr>
				
				<tr>
				  <td align="left" class="name">Password:</td>
				  <td align="left" ><input type="password" name="pass" id="pass" size="28" value="" class="regis_text" /></td>				  
				</tr>
				<tr height="2"><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td colspan="2" align="left" class="name">
				    Not Registered Yet! Please <a href="registration.php"><strong>Click Here</strong></a> To Register Now.
				  </td> 
				</tr>
				<tr height="15">
					<td colspan="2"></td>
				</tr>
				<tr>
				  <td colspan="2" align="left"><input type="submit" name="login" value="Login" class="pay" /></td>	
				</tr>
			  </table>
			</td>    	
		  </tr>
		</table>
		</form>
  		
        
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
