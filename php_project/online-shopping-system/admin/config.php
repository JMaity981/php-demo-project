<?php
$username="root";
$pssword= "";
$db_name="onlineshop";
$host="localhost";


define("SITEURL","http://localhost/online-shopping-system");

$dbConn = mysql_connect($host,$username,$pssword);
if(!$dbConn)
die("<b>NOT ABLE TO CONNECT HOST</b>.");
@mysql_select_db($db_name) or die("<b>NOT ABLE TO CONNECT DATABASE</b>.");
$levels = array(1=>"Admin", 2=>"Employee");
$inpage = 20;


include('function.inc.php');
?>
