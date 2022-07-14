<?php 
//$page_id=10;
include('header.php'); 

//session_start();
//error_reporting(0);


$qry=mysql_fetch_array(mysql_query("select * from users"));

$email = $_GET['user'];
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id=$qry['paypal']; //////you must create your own sandbox, replace this.///////////

$_SESSION['order_id'] = date("dmyHis", time());

if($_REQUEST['gateAdd'] == "Delivery Address")
{
	$_SESSION['deliveredTo'] = 1;
}
else
{
	$_SESSION['deliveredTo'] = 0;
}





	
	$sql_userDet = mysql_query("SELECT * FROM `tbl_registration` WHERE `id` = ".$_SESSION['user_id1']);
	$row_userDet = mysql_fetch_assoc($sql_userDet);
	
	if($_SESSION['deliveredTo'] == 1)
	{
		$delivery_cust_fname = $billing_cust_name = $row_userDet['fname'];
		$delivery_cust_lname = $billing_cust_name = $row_userDet['lname'];
		$billing_cust_address = $row_userDet['baddress'];
		$billing_cust_state = "N/A";
		$billing_cust_country = $row_userDet['bcountry'];
		$delivery_cust_tel = $billing_cust_tel = $row_userDet['mobile'];
		$billing_cust_email = $row_userDet['email'];
		$delivery_cust_address = $row_userDet['saddress'];
		$delivery_cust_state = "N/A";
		$delivery_cust_country = $row_userDet['scountry'];		
		$billing_city = $row_userDet['bcity'];
		$billing_zip = $row_userDet['bpin'];
		$delivery_city = $row_userDet['scity'];
		$delivery_zip = $row_userDet['spin'];
	}
	else
	{
		$delivery_cust_fname = $billing_cust_name = $row_userDet['fname'];
		$delivery_cust_lname = $billing_cust_name = $row_userDet['lname'];
		$delivery_cust_address = $billing_cust_address = $row_userDet['baddress'];
		$delivery_cust_state = $billing_cust_state = "N/A";
		$delivery_cust_country = $billing_cust_country = $row_userDet['bcountry'];
		$delivery_cust_tel = $billing_cust_tel = $row_userDet['mobile'];
		$billing_cust_email = $row_userDet['email'];
		$delivery_city = $billing_city = $row_userDet['bcity'];
		$delivery_zip = $billing_zip = $row_userDet['bpin'];
	}
	
	
	
$_SESSION['c_name']=$delivery_cust_fname." ".$delivery_cust_lname;
$_SESSION['c_email']=$billing_cust_email;
$_SESSION['c_address']=$delivery_cust_address;
$_SESSION['c_phone']=$delivery_cust_tel;
$_SESSION['c_country']=$delivery_cust_country;
$_SESSION['c_state']=$delivery_cust_state;
$_SESSION['c_city']=$delivery_city;
$_SESSION['c_zip']=$delivery_zip;
	

?>

<body onload="javascript: document.forms['frm'].submit();">
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
            <h3>Pay Out</h3>
        </div>
      <table  align="center" style="margin:0 0 0 30%;">
                  <tr>
                    <td width="100%" align="center">
                      <img src="images/loading.gif" width="400" height="300" /><br />
                      Pleasse wait while we are connecting with payment gateway... ...
                    </td>
                  </tr>
                </table>
<form action='<?php echo $paypal_url; ?>' method='post' name='frm'><!-- found on top -->
					
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'> <!-- found on top -->
                <input type='hidden' name='cmd' value="_xclick">
                <input type='hidden' name='image_url' value='http://websyntax.blogspot.com/skin/../images/logo.png'> <!-- logo of your website -->
                <input type="hidden" name="rm" value="2" /> <!--1-get 0-get 2-POST -->
                <input type='hidden' class="name" name='item_name' value='<?=$productname;?>'>
                    
                <input type='hidden' name='item_number' value='1'>
                <input type='hidden' class="price" name='amount' value='<?php echo $_SESSION['amount']; ?>'>
                <input type='hidden' class="price" name='quantity' value=''>
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='email' value='<?=$billing_cust_email?>'>
                <input type='hidden' name='first_name' value='<?=$delivery_cust_fname;?>'>
                <input type='hidden' name='last_name' value='<?=$delivery_cust_lname;?>'>
                <input type='hidden' name='city' value='<?=$delivery_city?>'>
                <input type='hidden' name='zip' value='<?=$delivery_zip?>'>
                <input type='hidden' name='no_note' value='1'>
                <input type='hidden' name='handling' value='0'>
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="cbt" value="Return to the hub">
                <input type="hidden" name="bn" value="PP-BuyNowBF">
                <input type='hidden' name='cancel_return' value='<?=SITEURL;?>cancel.php'>
                <input type='hidden' name='return' value='<?=SITEURL;?>successfull.php?test=ggfhvbgdghfgghbjhgthyg%nbgvgh b%456jgyug%%%%%%jhjgfbhdgfds&order_id=<?php echo $_SESSION['order_id']; ?>'>
                <input type="hidden" name="notify_url" value="" /> 
                
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <input type="hidden" name="custom" value='<?php echo $email; ?>'><!-- custom field -->
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
