<?php
session_start();

error_reporting(1);
if(!isset($_SESSION['currency'])){ $_SESSION['currency']='INR';}
if($_SESSION['currency']=='USD')
$cur_sign="&#36;";
if($_SESSION['currency']=='GBP')
$cur_sign="&pound;";
if($_SESSION['currency']=='INR')
$cur_sign="&#x20B9;";



include('admin/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online shopping system</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="js/jquery_3.js"></script>-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Selectyze.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		
		$('.selectyze2').Selectyze({
			theme : 'mac'
		});
		
	});
</script>
<!------gallery---->
<link rel="stylesheet" href="galary/gallery.css" type="text/css">

<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="galary/jquery-1.js"></script>-->
<script type="text/javascript" src="galary/jcarousellite_1.js"></script>
<script type="text/javascript" src="galary/global.js"></script>

<!------gallery---->


<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
   
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });


function currency_change(code)
{
	$.ajax({
		
        url:"ajax_currency.php",
        type: "post",
        data: 'code='+code,
		cache: false,
		success: function(html) 
		{ 
		//alert(html);
		location.reload()
		}
    });
}

function gotocat(id)
{
	window.location='category.php?cat_id='+id;
}
function gotocat_color(color,id)
{
	window.location='category.php?cat_id='+id+'&color='+color;
}
function show_val(id)
{
	alert(id);
}
</script>




<?php
function converter($amt,$from,$to){
return $amt;

}
?>



<script src='jquery.elevatezoom.js'></script>


<!--<script type="text/javascript" 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js">
</script>-->
<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="css/jquery.simplyscroll.css" media="all" type="text/css">

<script type="text/javascript">
(function($) {
	$(function() { //on DOM ready
		$("#scroller").simplyScroll({
			customClass: 'custom',
			direction: 'forwards',
			pauseOnHover: true,
			frameRate: 20,
			speed: 2
		});
	});
})(jQuery);
</script>

</head>