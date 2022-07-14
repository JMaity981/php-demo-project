<div class="right_panel">
    <div class="featur_box">
        <div class="heading">
            <h3>Featured products</h3>
        </div>
        
    	
		<div id="scroller">
			
            <?php
			$f_pro=mysql_query("select * from product where status=1 and feature_prod=1");
			while($row_pro=mysql_fetch_array($f_pro))
			{
			?>
            	
					<div class="product_box section ">
                        <div class="product hp-highlight"><a href="product_details.php?id=<?=$row_pro['prod_id'];?>"><img src="admin/upload/<?=$row_pro['prod_image'];?>" width="151" height="133" /></a></div>
                        <p><a href="product_details.php?id=<?=$row_pro['prod_id'];?>"><?=$row_pro['prod_name'];?></a></p>
                         <h5><?=$cur_sign;?> <? echo converter($row_pro['prod_price'],'INR',$_SESSION['currency']);?></h5>
                        <!-- <h5>$ <?=$row_pro['prod_price'];?></h5>-->
                         <div class="button1"><a href="my_cart.php?id=<?php echo $row_pro['prod_id']; ?>&amp;add=10uihdgh9382hdsfhdj2839324">Add to Cart</a></div>
                    </div>	
                    
                   				
				
             <?php
			} 
			?>
                

				
            
	  	</div>
    </div>
    <div class="featur_box right">
        <div class="heading">
            <h3>Specials</h3>
        </div>
  		<div class="feat_sites">
        <div style="overflow: hidden; visibility: visible; width: 58px !important;" class="feat_list">
        	
        			<ul id="box">
            <?php
			$f_pro=mysql_query("select * from product where status=1 and special_prod=1");
			while($row_pro=mysql_fetch_array($f_pro))
			{
			?>
            	<li class="image_area">
					<div class="product_box">
                        <div class="product"><a href="product_details.php?id=<?=$row_pro['prod_id'];?>"><img src="admin/upload/<?=$row_pro['prod_image'];?>" width="151" height="133" /></a></div>
                        <p><a href="product_details.php?id=<?=$row_pro['prod_id'];?>"><?=$row_pro['prod_name'];?></a></p>
                         <h5><?=$cur_sign;?> <? echo converter($row_pro['prod_price'],'INR',$_SESSION['currency']);?></h5>
                        <!-- <h5>$ <?=$row_pro['prod_price'];?></h5>-->
                         <div class="button1"><a href="my_cart.php?id=<?php echo $row_pro['prod_id']; ?>&amp;add=10uihdgh9382hdsfhdj2839324">Add to Cart</a></div>
                    </div>	
                    
                   				
				</li>
             <?php
			} 
			?>
                

				
             </ul>
            
            </div>
             <div class="clear"></div>
        <div class="arrow">
        <div id="right"><img src="images/left_arrow.png" class="prev" alt="previous"></div>
        <div id="left"><img src="images/right_arrow.png" class="next" alt="next"></div>
        </div>
        </div>
        
    </div>
    <div class="clear"></div>
    <div class="featur_box newproduct">
        <div class="heading">
            <h3>New products</h3>
        </div>
  		<div class="product_area">
        <ul id="carousel1" class="elastislide-list gallery">
        	<?php
			$s_pro=mysql_query("select * from product where status=1 and special_prod!=1 and feature_prod!=1");
			while($row_s_pro=mysql_fetch_array($s_pro))
			{
				?>
        	<li>
        			<div class="product_box">
                        <div class="product"><a href="product_details.php?id=<?=$row_s_pro['prod_id'];?>"><img src="admin/upload/<?=$row_s_pro['prod_image'];?>" width="151" height="133" /></a></div>
                        <p><a href="product_details.php?id=<?=$row_s_pro['prod_id'];?>"><?=$row_s_pro['prod_name'];?></a></p>
                        <h5><?=$cur_sign;?> <? echo converter($row_s_pro['prod_price'],'INR',$_SESSION['currency']);?></h5>
                        <!-- <h5>$ <?=$row_s_pro['prod_price'];?></h5>-->
                         <div class="button1"><a href="my_cart.php?id=<?php echo $row_s_pro['prod_id']; ?>&amp;add=10uihdgh9382hdsfhdj2839324">Add to Cart</a></div>
                    </div>
            </li>
			<?php
			}
			?>
            <!--<li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product6.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product7.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
            <div class="product_box new">
            	<div class="product"><img src="images/product8.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
             <li>
        	<div class="product_box new">
            	<div class="product"><img src="images/product5.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product6.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product7.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
            <div class="product_box new">
            	<div class="product"><img src="images/product8.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
              <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product6.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product7.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
            <div class="product_box new">
            	<div class="product"><img src="images/product8.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
             <li>
        	<div class="product_box new">
            	<div class="product"><img src="images/product5.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product6.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
  			<div class="product_box new">
            	<div class="product"><img src="images/product7.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>
            <li>
            <div class="product_box new">
            	<div class="product"><img src="images/product8.png" width="151" height="133" /></div>
                <p>Lorem ipsum dolor sit amet</p>
                <h5>$137.75</h5>
                 <div class="button1"><a href="#">Add to Cart</a></div>
            </div>
            </li>-->
            </ul>
        </div>
        <div class="clear"></div>
       <!-- <div class="arrow" style="margin-right:10px;"><a href="#"><img src="images/left_arrow.png" width="17" height="16" /></a> <a href="#"><img src="images/right_arrow.png" width="17" height="16" /></a></div>-->
    </div>
    </div>