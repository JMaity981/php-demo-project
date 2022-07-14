<div class="left_part">
    	<div class="left_box">
        	<div class="heading">
            	<h3>Manufacturers</h3>
            </div>
            <select name="" class="select_box" onchange="gotocat(this.value);">
            <option value="">SELECT</option>
            	<?php
				$qry_cat=mysql_query("select * from category where status=1");
				while($row_cat=mysql_fetch_array($qry_cat))
				{
				?>
            	<option value="<?=$row_cat['cat_id'];?>" <?php if($row_cat['cat_id']==$_GET['cat_id']) echo "selected";?>><?=$row_cat['cat_name'];?></option>
                <?php 
				} ?>
            </select>
        </div>
        
        
        
        <div class="clear"></div>
        <div class="left_box">
        	<div class="heading">
            	<h3>Cart</h3>
            </div>
            <div class="cat_box">
            <?php
			$total=0;
            $sql = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '$user_id'");
				if(mysql_num_rows($sql))
				{ 
				while($row = mysql_fetch_array($sql))
					{
						$total=$total+$row['total'];
				?>
                <p><?php echo $row['product_name']; ?> </p>
				<?php
					}
					
				}
				else
				{
			?>
            <p>No products</p>
           <?php
            }
			?>
           <!-- <div class="shiping">
             Shipping<span>$0.00</span>
            </div>-->
             <div class="shiping">
             Total<span> <?=$cur_sign;?> <? echo converter($total,'INR',$_SESSION['currency']);?></span>
            </div>
            <div class="price">Prices are tax included
           	  <div class="button"><a href="my_cart.php">Cart</a></div>
              <div class="button1"><a href="my_cart.php">Check Out</a></div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <?php
        $sql_ad = mysql_query("SELECT * FROM `advertisement` WHERE `id` ='1'");
		$row_ad=mysql_fetch_array($sql_ad);
		
		?>
   	    <img src="admin/upload/<?=$row_ad['image'];?>" width="193" height="337" />
    </div>