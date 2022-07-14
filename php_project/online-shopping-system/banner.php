<div class="banner_panel">
  <div class="cat_panel">
        	<a href="product.php"><h3>Categories</h3></a>
    		<ul class="cat_list">
            <?php
			$qry_cat=mysql_query("select * from category where status=1");
			while($row_cat=mysql_fetch_array($qry_cat))
			{
			?>
          
            	<li><a href="category.php?cat_id=<?=$row_cat['cat_id'];?>" class="selected"><?=$row_cat['cat_name'];?></a></li>
             <?php
			}
			?>
            </ul>
        </div>
      
        
        <section class="slider banner1">
        <div class="flexslider">
          <ul class="slides" id="slides">
          <?php
			$qry_banner1=mysql_query("select * from banner where status=1");
			while($row_banner1=mysql_fetch_array($qry_banner1))
			{
			?>
            	<li>
  	    	    <img src="admin/upload/<?=$row_banner1['image1'];?>"/>
                <?php
				if($row_banner1['text']!="")
				{
				?>
                 	<h2><?=$row_banner1['text'];?></h2>
                    <?php
				}
				?>
  	    		</li>
                <?php
			}
			?>
  	    		
  	    		
          </ul>
        </div>
      	</section>
        <section class="slider banner2">
        <div class="flexslider">
          <ul class="slides" id="slides">
           <?php
			$qry_banner2=mysql_query("select * from banner where status=1");
			while($row_banner2=mysql_fetch_array($qry_banner2))
			{
			?>
            	<li>
  	    	    <img src="admin/upload/<?=$row_banner2['image2'];?>"/>
  	    		</li>
                <?php
			}
			?>
            	
  	    		
          </ul>
        </div>
      	</section>
        
        
       
    	</div>