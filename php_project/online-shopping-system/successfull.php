<?php include('header.php');
$dt=$f->getDate();
$tm=$f->getTime();
$user_id = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['user_id1']))
{
	$user_id = $_SESSION['user_id1'];
}
if($_GET['order_id']==$_SESSION['order_id'])
{
$qry_cart=mysql_query("select * from tbl_cart where user_id=".$user_id);
while($row_cart=mysql_fetch_array($qry_cart))
{
	
$qry=mysql_query("insert into payment_details values (
'',
'$user_id',
'".$_SESSION['order_id']."',
'".$_SESSION['c_name']."',
'".$_SESSION['c_email']."',
'".$_SESSION['c_address']."',
'".$_SESSION['c_phone']."',
'".$_SESSION['c_country']."',
'".$_SESSION['c_state']."',
'".$_SESSION['c_city']."',
'".$_SESSION['c_zip']."',
'".$row_cart['product_id']."',
'".$row_cart['product_name']."',
'".$row_cart['product_image']."',
'".$row_cart['size']."',
'".$row_cart['price']."',
'".$row_cart['qty']."',
'".$row_cart['total']."',
'0',
'$dt',
'$tm')");
}
$del_qry=mysql_query('delete from tbl_cart where user_id='.$_SESSION['user_id1']);


$admin_email=mysql_query('select * from contact_details');
$row_ad_email=mysql_fetch_array($admin_email);
//mail to admin
$to=$row_ad_email['email'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: <'.$_SESSION['c_email'].'>' . "\r\n";
$message=$row_cart['product_name']." purches by ".$_SESSION['c_name'];
mail($to,'product sell',$message,$headers);

//mail to coustomer

$to=$_SESSION['c_email'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: <'.$row_ad_email['email'].'>' . "\r\n";
$message="Thank you for buying our product. we will contact soon. ";
mail($to,'Manchester',$message,$headers);

}

?>
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
            <h3>Successfull Payment</h3>
        </div>
        <?php
		$qry=mysql_query("select * from succesfull where id=1");
		$row=mysql_fetch_array($qry);
		
		?>
        
  		<p><? echo $row['message']; ?></p>
        
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
