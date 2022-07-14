<?php include('header.php');
$dt=$f->getDate();
$tm=$f->getTime();
$user_id = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
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
		$qry=mysql_query("select * from cancel where id=1");
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
