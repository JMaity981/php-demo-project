<?php include('header.php');

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
     <?php include('left_panel_category.php'); ?>
    <!-----left-part-end------>
    <!-----right-part-start------>
    <div class="right_panel">
    <div class="featur_box containt">
        <div class="heading">
        <?php 
		if(@$_GET['r_productno'])
		{
			$paging = "r_productno=".$_GET['r_productno'];
		}
		else
		{
			$paging = "r_productno=1";	
		}
		
		$productno=1;
		if(isset($_REQUEST['r_productno']))
		{
			$productno=$_REQUEST['r_productno'];
		}
		$start=($productno-1)*8;
		
		$cat_id=$_GET['cat_id'];
		//$cat_name=mysql_fetch_array(mysql_query("select cat_name from category where cat_id=".$cat_id));
		?>
            <h3>New Product</h3>
        </div>
        
        <div class="product_area">
        <?php
		$i=1;
		$qry="select * from product where status=1 and feature_prod!=1 and special_prod!=1";
		$qry.=" limit $start,8";
		$qrycat=mysql_query($qry);
		while($rowcat=mysql_fetch_array($qrycat))
		{
		?>
        	<div class="product_box new">
            	<div class="product">
               <img src="admin/upload/<?=$rowcat['prod_image'];?>" id="zoom_<?=$i?>" data-zoom-image="admin/upload/<?=$rowcat['prod_image'];?>" width="151" height="133"/></div>
                <p><a href="product_details.php?id=<?=$rowcat['prod_id'];?>"><?=$rowcat['prod_name'];?></a></p>
                <h5><?=$cur_sign;?> <? echo converter($rowcat['prod_price'],'INR',$_SESSION['currency']);?></h5>
                 <div class="button1"><a href="my_cart.php?id=<?php echo $rowcat['prod_id']; ?>&amp;add=10uihdgh9382hdsfhdj2839324">Add to Cart</a></div>
            </div>
           
            <?php
			if($i%4==0) echo "<div class=\"clear\"></div>";
			$i++;
		}
		?>
		<input type="hidden" name="prod_count" id="prod_count" value="<?=$i-1;?>"	 />
            
        </div>
       <!--pagination-->
       <div class="clear"></div>
       <div class="pagination">
       <?php 
	   				
					
					$qry_pagi="select * from product where status=1 and special_prod=1";
					
	   				$res=@mysql_query($qry_pagi);
					$row=@mysql_num_rows($res);
					$val= $row/8;
					settype($val, "integer"); 
					$mul=$val*8;
					if($mul!=$row)
					{
						$val++;
					}
					$start=$start+8;
					$productno=$productno+1;
					?>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
					<td align="left" colspan="2">Total: <?php echo $val;?>&nbsp;Pages</td>
					<td colspan="7"  height="40"  align="right">
					<?php
					if(($productno-1) > 1 && $val > 7)
					{
						$prev = $productno-2;
					?>
					  <a href="<?php echo $_SERVER['PHP_SELF'];?>?r_productno=<?php echo $prev;?>" style="text-decoration:none"><b><&nbsp;Prev</b></a>
					<?php
					}
					else if($val > 7)
					{
					?>
					  <a  style="text-decoration:none"><b><&nbsp;Prev</b></a>
					<?php
					}
					if($val > 7)
					{
						if(($productno-1) > 7 && ($productno-1) < ($val-6))
						{
							$s = ($productno - 1)-6;
						}
						else if(($productno-1) >= ($val-6))
						{
							$s = $val - 6;
						}
						else
						{
							$s = 1;
						}
					}
					else
					{
						$s = 1;	
					}
					
					for($i=$s;$i<=($s+6) && $i<=$val;$i++)
					{
						if(isset($_GET['r_productno']) && ($_GET['r_productno']==$i))
						{
					?>
					  <a href="<?php echo $_SERVER['PHP_SELF'];?>?r_productno=<?php echo $i;?>" style="text-decoration:none"><b><font size="+2"><?php echo $i;?> </font></b></a>
					<?php
						}
						else if((!isset($_GET['r_productno'])) && ($i==1))
						{
					?>
					  <a href="<?php echo $_SERVER['PHP_SELF'];?>?r_productno=<?php echo $i;?>" style="text-decoration:none"><b><font size="+2"><?php echo $i;?> </font></b></a>
					<?php
						}
						else
						{
					?>
					  <a href="<?php echo $_SERVER['PHP_SELF'];?>?r_productno=<?php echo $i;?>" style="text-decoration:none"><?php echo $i;?></a>
					<?php
						}
					}
					
					if(($productno-1) < $val && $val > 7)
					{
						$next = $productno;
					?>
					  <a href="<?php echo $_SERVER['PHP_SELF'];?>?r_productno=<?php echo $next;?>" style="text-decoration:none"><b>Next&nbsp;></b></a>
					<?php
					}
					else if($val > 7)
					{
					?>
					  <a  style="text-decoration:none"><b>Next&nbsp;></b></a>
					<?php
					}
					?>	
					</td>
					<td align="right">	
					  <!--<table cellpadding="0" cellspacing="0" border="0">
						<tr>
						  <td>Go:</td>
						  <td>&nbsp;<input type="text" value="" name="r_productno" class="ttr" id="pno"/></td>
						  <td>&nbsp;<input type="submit" value="Ok" name="Ok" class="tts"  onclick="return productcheck('<?php echo $val;?>');"/></td>
						</tr>
					  </table>-->
					</td>
					</form>
					</tr>
				  </table>
		</div>
        <!--pagination-->
       
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
<script>
var count=document.getElementById('prod_count').value;
for(i=1;i<=count;i++)
{
    $('#zoom_'+i).elevateZoom({
     zoomType				: "lens",
  lensShape : "round",
  lensSize    : 100
   });
}
</script>