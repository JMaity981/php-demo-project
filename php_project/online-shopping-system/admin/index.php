<?php
error_reporting(0);
session_start();
if(!session_is_registered("username"))
$page = "login";
else
$page = ($_REQUEST["module"]) ? $_REQUEST["module"] : "home";
$action = $_REQUEST["action"];
//Config Setting here
require('config.php'); 
//logout script
if($page == "logout")
include("logout.php");

if($page == "login" && $action == "login")
include("loginCheck.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN">
<html>
<head>
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html;  charset=ISO-8859-1">
<title>Control Panel</title>
<link href="client/fileuploader.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" type="text/css" href="css/jqueryslidemenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu.js"></script>-->

	<link rel="stylesheet" href="js_color_picker_v2/js_color_picker_v2.css" media="screen">
	<script src="js_color_picker_v2/color_functions.js"></script>		
	<script type="text/javascript" src="js_color_picker_v2/js_color_picker_v2.js"></script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/sample.js" type="text/javascript"></script>
	<link href="ckeditor/sample.css" rel="stylesheet" type="text/css" />

<link type="text/css" href="menu/menu.css" rel="stylesheet" />
<script type="text/javascript" src="menu/jquery.js"></script>
<script type="text/javascript" src="menu/menu.js"></script>
<script type="text/javascript">
function start()
{
//check_dis();

show_field();
}
</script>

<!--<script language="JavaScript" type="text/javascript" src="js/jquery-1.4.4.min.js"></script>-->
</head>
<body style="padding:0; margin:0;" onLoad="start()">
<?php
if ($page != "login")
{
?>
	<link rel="stylesheet" type="text/css" href="themes/Blue/Blue.css">
	<?php
	include("header.php");
	if(file_exists("includes/".$page.".php"))
	include("includes/".$page.".php");
	else
	include("404.php");

	include("footer.php");

}
else
{
	echo '<link rel="stylesheet" type="text/css" href="css/login.css">';
	include("includes/login.php");
}
?>
</body>
</html>