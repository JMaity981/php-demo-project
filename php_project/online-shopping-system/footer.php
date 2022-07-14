<div class="footer">
     	<div class="card"><a href="#"><img src="images/paypal.png" /></a> <a href="#"><img src="images/visa.png"  /></a> <a href="#"><img src="images/mastcard.png"  /></a></div>
        
        	<ul class="footer_menu">
           	 <li><a href="special.php">Specials</a></li>
             <li>|</li>
             <li><a href="new.php">New products</a></li>
             
             <li>|</li>
            <!-- <li><a href="our_store.php">Our stores</a></li>
             <li>|</li>-->
             <li><a href="terms.php">Terms and conditions of use</a></li>
             <li>|</li>
             <li><a href="aboutus.php">About us</a></li>
             
            </ul>
            <div class="clear"></div>
            <p>©<?=date(Y)?> | Online Shopping System<br />

     Powered by  :VMM Part-III Students  </p>
        
  </div>
  
  <!-- carausal -->
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
<script type="text/javascript" src="js/jquery.elastislide.js"></script>
<script type="text/javascript">
			
			$( '#carousel' ).elastislide();
			$( '#carousel1' ).elastislide();
			
</script>


<script>
function check_val()
{
	if(document.getElementById('searchkey').value=="" || document.getElementById('searchkey').value=="Enter search keywoard here")
	{
		alert("Please Enter any keyword");
		return false;
	}
}
</script>

<!-- carausal -->