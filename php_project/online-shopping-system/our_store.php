<?php include('header.php'); ?>

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
            <h3>Our Stores</h3>
        </div>
        <?php
		$qry=mysql_query("select * from content where id=6");
		$row=mysql_fetch_array($qry);
		
		?>
        
  		<p><? echo $row['description']; ?></p>
        
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
