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
            <h3>Product Detais</h3>
        </div>
        <?php /*?><?php
		$qry=mysql_query("select * from content where id=5");
		$row=mysql_fetch_array($qry);
		
		?><?php */?>
         <?php
		$qry=mysql_query("select * from product where prod_id=".$_GET['id']);
		$row_p=mysql_fetch_array($qry);
		?>
      <div class="pro_detailbox">
        <div class="detail_img"><img src="admin/upload/<?=$row_p['prod_image'];?>" width="350" height="300"/></div>
      <div class="pro_detail">
        	<h2><?=$row_p['prod_name'];?></h2>
          <p> <?=$row_p['prod_details'];?></p>
          	<div class="avail_color">
            	<h3>Available Color:</h3>
                
                <?php $qry_color=mysql_fetch_array(mysql_query("select * from color where id=".$row_p['prod_color']));
				?> <span><img src="admin/upload/<?php echo $qry_color['color_image']; ?>" title="<?php echo $qry_color['clour_name']; ?>" width="15" height="15" /></span><?php
				$avai_color=explode(",",$row_p['available_color']);
					foreach($avai_color as $available)
					{
						
						if($available!="")
						{
							$qry_color=mysql_fetch_array(mysql_query("select * from color where id=".$available));
							?><span><img src="admin/upload/<?php echo $qry_color['color_image']; ?>" width="15" height="15" title="<?php echo $qry_color['clour_name']; ?>" /></span><?php
						}
					}
				 ?>
            		          </div>
          <div class="clear"></div>     
      <h3>Price:</h3><span><?=$cur_sign;?> <? echo converter($row_p['prod_price'],'INR',$_SESSION['currency']);?></span>
            <div class="clear"></div>
            <div class="link_bnt" style="margin-left:0px;"><a href="my_cart.php?id=<?php echo $row_p['prod_id']; ?>&amp;add=10uihdgh9382hdsfhdj2839324"> <img src="images/cart_icon1.png" width="34" height="22" style="float:left;
             margin:-1px 8px -3px 0px;" /><strong>Add to Cart</strong></a></div>
        </div>
        	
        </div>
        
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
