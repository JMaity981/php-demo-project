<?php
$country_currency=array(

"GBP"=>"Pound Sterling",
"INR"=>"Indian Rupee",
"USD"=>"US Dollar"
);
//echo $_SESSION['currency'];
?>
<div class="header">
    	<div class="logo"><a href="<?=SITEURL?>"><img src="images/logo.png" /></a></div>
  <div class="header_right">
        
            <div class="clear"></div>
            <div class="search_box">
            <form action="search.php" method="get" onsubmit="return check_val();">
                 <input name="searchkey" id="searchkey" type="text" class="email_input" size="40" onfocus="if(this.value=='Enter search keywoard here')this.value='';" onblur="if(this.value=='')this.value='Enter search keywoard here';" value= "<?php if(isset($_GET['searchkey'])) echo $_GET['searchkey']; else echo 'Enter search keywoard here';?>" />
                 <input name="" type="submit" value=" " class="search" />
                 </form>
        	</div>
            <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <!-----menu-start------>
      <div class="topnav">
      <div id="access" role="navigation">
        <div class="menu">
        <ul>
            <li><a href="<?=SITEURL?>" class="">Home</a></li>
            <li><a href="special.php">specials  </a></li>
             <li><a href="product.php">Product Gallery</a></li>
            <li><a href="contact.php">contact</a></li>
            
        </ul>
        </div>
        
        </div>
        <div class="menu_right">
        <?php 
        if(isset($_SESSION['user_id1']))
		{
			?>
        <h3>Welcome, <?=$_SESSION['user_name'];?>,| <a href="registration.php">edit Profile</a> | <a href="logout.php">Log Out</a></h3>
        <?php
		}
		else
		{
			?>
			 <h3>Welcome, Guest,| <a href="login.php">LOGIN</a> | <a href="registration.php">REGISTER</a></h3>
             <?php
		}
			    //if(!isset($_SESSION['user_id1']))
               	//echo "<a href=\"registration.php\">Register</a>";
			   	//else
			    //echo "<a href=\"logout.php\">Logout</a>";
		?>
        
        <a href="#" class="cart"><img src="images/cart_icon.png" width="29" height="30"  /></a>
         <h3><a href="my_cart.php"><strong>Cart:</strong> <span>
         <?php
				$cart = 0;
				$productname="";
				$user_id = $_SERVER['REMOTE_ADDR'];
				if(isset($_SESSION['user_id1']))
				{
					$user_id = $_SESSION['user_id1'];
				}
				$sql = mysql_query("SELECT * FROM `tbl_cart` WHERE `user_id` = '$user_id'");
				if(mysql_num_rows($sql) > 0)
				{
					while($row = mysql_fetch_array($sql))
					{
						$productname.=$row['product_name'].',';
						$_SESSION['qty']=$cart = $cart + $row['qty'];
					}
					$productname=substr($productname,0,strlen($productname)-1);
				}
				?>
                (<?php echo $cart; ?>)
                </span></a></h3>
         </div>
        
        </div>
		<!-----menu-end------>
    </div>