<?php include('header.php');
$user_id = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['user_id1']))
{
	$user_id = $_SESSION['user_id1'];
}

if(isset($_REQUEST['add']) && $_REQUEST['add'] == "10uihdgh9382hdsfhdj2839324")
{
	$dt=$f->getDate();
	$tm=$f->getTime();
	
	$id = $_GET['id'];
	//echo "ID: $id";
		
	$sql = mysql_query("SELECT * FROM `product` WHERE prod_id =$id");	
	
	$row = mysql_fetch_assoc($sql);
	
	$sql_check = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '$user_id' AND `product_id` = '$id'");
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
	}
	else
	{
		$sql = mysql_query("INSERT INTO `tbl_cart` VALUES (null, '$user_id', '$id', '$row[prod_name]', '$row[prod_image]','', '$row[prod_price]', '1', '$row[prod_price]', '$row[discount]', '$dt', '$tm')") or die(mysql_error());
	}
		
	header("Location: ".$_SERVER['PHP_SELF']);
	//exit();
}

if(isset($_REQUEST['edit']))
{
	$id = $_REQUEST['id'];
	$size = $_REQUEST['size'];
	$qtyN = $_REQUEST['qty'];
	if($qtyN == "" || $qtyN == "0")
	{
		$_SESSION['error_update'] = "Please Enter Valid Quantity To Update";
		header("Location: ".$_SERVER['PHP_SELF']);
		//exit();
	}
	
	$sql_check = mysql_query("SELECT * FROM `tbl_cart` WHERE `id` = '$id'") or die(mysql_error());
	$row_check = mysql_fetch_assoc($sql_check);
	$price = $row_check['price'];
	settype($price,"integer");
	$qty = $row_check['qty'];
	settype($qty,"integer");
	$qty = $qtyN;
	$total = $qty*$price;
	
	mysql_query("UPDATE `tbl_cart` SET `size`='$size', `qty` = '$qty', `total` = '$total' WHERE `id` = '$id'") or die(mysql_error());
	header("Location: ".$_SERVER['PHP_SELF']);
	//exit();
}

if(isset($_REQUEST['delete']))
{
	$id = $_REQUEST['id'];
	mysql_query("DELETE FROM `tbl_cart` WHERE `id` = $id");
	header("Location: ".$_SERVER['PHP_SELF']);
	//exit();
}
?>


<script type="text/javascript" language="javascript">
function checkPayment(id)
{
	var idArr = id.split("rd");
	//alert(idArr[1]);
	for(var i=1; i<=5; i++)
	{
		var divId = "tabbedPanels" + i;
		if(i == idArr[1])
		{
			document.getElementById(divId).style.display = "block";
		}
		else
		{
			document.getElementById(divId).style.display = "none";
		}
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
            <h3>My Cart</h3>
        </div>
        <div class="myCart" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="my_cart_border" align="center">
            	<tr>
                	<td height="20px">&nbsp;</td>
                </tr>
                <tr valign="middle">
                	<td valign="middle">
                    	<table border="0" cellspacing="0" cellpadding="0px" width="770px" align="center" class="cart_box">
				<?php
				$sql = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '$user_id'");
				if(mysql_num_rows($sql))
				{
				?>
                        	<tr class="my_cart_heading"  height="35px" width="100%">
								<td width="10%"><div style="padding-left:10px">Product</div></td>
                            	<td width="10%" align="center">Image</td>
                                <td width="10%" align="center">Quantity</td>
                               
                                <td width="10%" align="center">Unit Price</td>
                                <td width="10%" align="center">Total</td>
                                <td width="5%" align="center">Action</td>
                            </tr>
					<?php
					$tot_qty = 0;
					$tot_price = 0;
					$discountP = 0;
					$discount = 0;
					while($row = mysql_fetch_array($sql))
					{
					?>
							<tr valign="middle">
							<form name="action" action="" method="post">
								<td align="center" valign="middle" width="70px">
								  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
								  <div style="padding:10px; width:50px;" ><?php echo $row['product_name']; ?></div>
								</td>
                            	<td valign="middle" align="center"><div style="padding:0px; margin:5px 0 5px 0;"><img src="admin/upload/<?php echo $row['product_image']; ?>" width="50px" height="50px" border="0" /></div>
								</td>
                                <td align="center" valign="middle">
								  <div style="padding:10px">
								    <input type="text" class="inputcart" name="qty" id="qty" size="5" value="<?php echo $row['qty']; ?>" />
								  </div>
								</td>
                                
                                <td align="center" valign="middle"><div style="padding:10px"><?php echo $row['price'].".00"; ?></div></td>
                                <td align="center" valign="middle"><div style="padding:10px"><?php echo $row['total'].".00"; ?></div></td>
                                <td align="center" valign="middle">
								  <div style="padding:6px; width:65px;">
                                    <input type="submit" value=" " name="edit" class="edit" title="Click To Update Cart Quantity" style="float:left;" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="submit" value=" " name="delete" class="delete" title="Click To Delete From Cart" />
								  </div>
								</td>
							</form>
                            </tr>
                            <tr><td colspan="6"><div style="border-bottom: 1px solid #560483;"></div></td></tr>
					<?php
						$discountP = $row['discount'];
						$discount = $discount + (($row['total']*$discountP)/100);
						
						$tot_qty = $tot_qty+$row['qty'];
						$tot_price = $tot_price+$row['total'];
					}
					?>
                            <tr>
                            	<td colspan="6">
                                	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="padding:0px 10px 0px 0px;">
                                    	<tr class="my_total" height="60px">
                                       
                                        <td align="right"><strong>Total Quantity : </strong><?php echo $tot_qty; ?></td>
                                        </tr>
                                        <tr>
                                        <td align="right"><strong>Total :</strong> <?php echo $tot_price.".00"; ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr><td height="10px"></td></tr>
                            <tr><td colspan="6" align="right" style="padding:0px 10px 0px 0px;">
                            	<!--<span class="total">Your discount is :</span><span><img src="images/rupee.png" height="14px" width="12px" /></span><span class="total"><?php echo $discount.".00"; ?></span><br /><br />-->
                                <span class="total"><strong>Net Total :</strong></span><span class="total"><?php echo $tot_price-$discount.".00"; $_SESSION['amount'] = $tot_price-$discount; ?></span><br /><br />
                            </td></tr>
                            <tr><td colspan="6"><div style="border-bottom:1px solid #560483;"></div></td></tr>
				<?php
				}
				else
				{
				?>
							<tr><td colspan="6" align="center">You Have 0 Item In The Cart<br />&nbsp;</td></tr>
				<?php
				}
				?>
						<tr>
                            	<td colspan="6">
								<form name="submitOrder" action="payout.php" method="post">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            	<td >
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><div id="TabbedPanels1" class="TabbedPanels">
                                          <ul class="TabbedPanelsTabGroup">
                                            <li class="TabbedPanelsTab" tabindex="0"><input id="ctl00_ContentPlaceHolder1_rd1" type="radio" name="pay_mode" value="credit" checked="checked" onClick="return checkPayment(this.id);" /><label for="ctl00_ContentPlaceHolder1_rd1">Pay pal </label></li></ul>
                                    
                                          <div class="TabbedPanelsContentGroup">
                                            <div class="TabbedPanelsContent" id="tabbedPanels1" style="display:block;">
                                             <div class="gateway-text">
                                           <b>Following Credit Cards are supported by Online shopping System </b><br /><br /><br />
                                    Online shopping System accepts all popular credit cards. Paypal is the only 3rd party payment gateway in India to be certified by American Express globally as well as the only 3rd party payment gateway in India to be selected as MasterCard Member Service Provider for the Indian region. Online shopping System payment gateway engine is approved by Paypal.<br /><br />
                                   										
											<div align="left" style="float:left;">
											<?php
											if(isset($_SESSION['user_id1']))
											{
											?>
											<input type="submit" name="pay" id="pay" value="Order Now" class="pay" />
											<?php
											}
											else
											{
											?>
											<input type="button" name="pay" id="pay" value="Order Now" class="pay" onClick="window.location = 'login.php?con=hdsgfj13h2fdhi2800eeeer';" />
											<?php
											}
											?>	
                                           										  
											</div>
                                             <div class="link_bnt"><a href="http://www.bluedart.com/pricefinder.html" target="_blank">View Courier Services</a></div>
                                          </div>
                                        </div>
                                        </div>
                                        </div>
										</td>
                                      </tr>
									</table>
         
                                </td>
                            </tr>
							<tr><td >
                            	<table width="" height="20" cellspacing="0" cellpadding="0" border="0">
             						<tr>
                                    	
                                        <td width="868" class="padadj" style="font:normal 10px Verdana, Geneva, sans-serif; text-align:left; padding:20px 5px 20px 10px;">Please Choose Your Delivery Address (Update your Address then&nbsp;
										<?php
											if(isset($_SESSION['user_id1']))
											{
										?>
											<a href="registration.php">click here</a>
										<?php
											}
											else
											{
										?>
											<a href="javascript: void(0);" onClick="alert('Please login first to edit your profile.');">click here</a>
										<?php
											}
										?>
										)
										</td>
                                  	</tr>
           						</table>
                            </td></tr>
                            <tr><td >
                            	        <table width="760" cellspacing="0" cellpadding="0" border="0">
          									<tr>
            									
           										<td width="300" valign="top">
                                                	<table width="300" cellspacing="3" cellpadding="3" border="0" class="gateway-address">
                                                        <tr>
                                                            <td height="30" colspan="2"><span class="gateway-address1">
                                                          <input type="radio" checked="checked" value="Delivery Address" name="gateAdd" id="delv"/>
                                                          Delivery Address</span></td>
                                                      </tr>
                                                      <tr>                
                                                        <td colspan="2"></td>
                                                      </tr>            
              										</table>
              									</td>
                                                <td width="6"> </td>
                                                <td width="454" valign="top"><table width="300" cellspacing="3" cellpadding="3" border="0" class="gateway-address">
                                           <tr>
                                           		<td height="30" colspan="2"><span class="gateway-address1">
                                                  <input type="radio" value="Billing Address" name="gateAdd" id="bill"/>
                                                  Billing Address</span></td>
                                           </tr>
                                           <tr><td colspan="2"/></tr>          
                                         </table>        
                                            </td>
                                          </tr>          
                        		</table>
                            </td> </tr>
							</table>
								</form>
						   </td>
						  </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </div>
  		
        
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
