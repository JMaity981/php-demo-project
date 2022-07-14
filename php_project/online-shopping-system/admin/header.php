<center>
  <table class="wrapper" border="0" cellpadding="0" cellspacing="0">
    <tbody><tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td class="banner" valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><div class="user_info"> <?php echo date("l F d, Y");?><?
				  $sql_ad=mysql_query("select * from `users` where id='$_SESSION[user_id]'");
$res_ad=mysql_fetch_array($sql_ad);
echo $res_ad[fname]." ".$res_ad[lname];
?> <!--Administrator--> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="index.php?module=logout" class="logout">Log Out</a></div></td></tr>
						
						</tbody>
			</table></td></tr>

<tr>
            <td class="content">
			
			<?php
			$sql_role=mysql_query("select * from dt_role where id='$_SESSION[role_id]'");
			$res_role=mysql_fetch_array($sql_role);
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td align="center"><table class="content_wrapper" width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                        <td align="left" style="padding-right:2px;">
<div id="menu">
    <ul class="menu">
	<li><a href="index.php?module=welcome&&header=Welcome To Admin Panel"><span>Home</span></a></li>
	<?php
	if($_SESSION[role_id]=='1')
	{
	?>
	<?
	
	$sql_func=mysql_query("select * from dt_module where user_id='$_SESSION[user_id]'") or die(mysql_error());
	$res_func=mysql_fetch_array($sql_func);
	?>
	<?
	if($res_func[category]=='1')
	{
	?>

	
	<?
	}
	?>
	
	<li><a href="#" class="Parent"><span>Content</span></a>
	<div>
	<ul>
		
		
		<li><a href="index.php?module=content&&header=Content&&id=3"><span>Home</span></a></li>
		<li><a href="index.php?module=content&&header=Content&&id=4"><span>Contact Us</span></a></li>
		<li><a href="index.php?module=content&&header=Content&&id=5"><span>About Us</span></a></li>
        <li><a href="index.php?module=content&&header=Content&&id=6"><span>Our Store</span></a></li>
        <li><a href="index.php?module=content&&header=Content&&id=7"><span> Term And Condition</span></a></li>
        
		
		</ul>
	</div>
	
	</li>
	
	<!--<li><a href="#" class="Parent"><span>User </span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_user&&header=User"><span>Add User</span></a></li>
		<li><a href="index.php?module=user&&header=User"><span>Manage User</span></a></li>
		
		</ul>
		
		</div>
		
		</li>-->
	
	<li><a href="#" class="Parent"><span>Category </span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_cat&&header=Category"><span>Add Category</span></a></li>
		<li><a href="index.php?module=Category&&header=Category"><span>Manage Category</span></a></li>
        <li><a href="index.php?module=add_advertisement&&header=Advertisement"><span>Add Advertisement Picture</span></a></li>
        <li><a href="index.php?module=add_color&&header=Color"><span>Add Color </span></a></li>
          <li><a href="index.php?module=color&&header=Color"><span>Manage Color </span></a></li>
        
		
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
		
		</div>
		
		</li>		
	<li><a href="#" class="Parent"><span>Product</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_product&&header=product"><span>Add Product</span></a></li>
		<li><a href="index.php?module=product&&header=product"><span>Manage Product</span></a></li>
        <li><a href="index.php?module=add_banner&&header=Banner"><span>Add Banner</span></a></li>
        <li><a href="index.php?module=banner&&header=Banner"><span>Manage Banner</span></a></li>
        
		
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
		
		</div>
		
		</li>		
        <li><a href="#" class="Parent"><span>Payment</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=payment&&header=payment"><span>Payment</span></a></li>
		<li><a href="index.php?module=managecustomer&&header=managecustomer"><span>Manage customer</span></a></li>
        <li><a href="index.php?module=successfull&&header=successfull"><span>Succuessfull Payment Message</span></a></li>
	 <li><a href="index.php?module=cancel&&header=cancel"><span>Cancel Payment Message</span></a></li>
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
		
		</div>
		
		</li>		
	
		<li><a href="index.php?module=add_admin_user&header=Admin Account Settings&id=1" class="Parent"><span>Settings</span></a>
	
	</li>
	
	<?
	}
	?>
	</ul>

</div>
</td></tr>
	<tr>
<td class="submenubar_bg">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                              <td class="submenubar" style="padding-left: 10px; padding-right: 10px;"><div id="submenu_1" style="display: block;">

<tr>
	<td class="pageheading_bg">
	<div class="heading">
	
	
	<table width="100%" cellpadding="0" cellspacing="0"><tbody>
	<tr><td valign="top">
	<div class="page_heading_breadcrumb">
		<label id="header" name="header">
		<?php
		if($_REQUEST['header']!='')
		{
		echo $_REQUEST['header'];
		}
		else
		{
		echo "Faculty";
		}
		?>
		</label>&nbsp;</div></td>
		<td><!-- <div id="showhelp" style="padding-top: 33px;"><a href="javascript:void(0);" onclick="inter=setInterval('ShowBox(helpdiv, 380, 499, 499, 211, showhelp)',1);return false;"><b>Help</b></a></div> -->
		</td>
		</tr></tbody>
		</table>

</div></td>
                      </tr>
<tr>
                        <td class="txt_container_bg" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                              <td class="txt_bg">
							  


<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="txt_container" valign="top">



<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
		<td class="txt_padding">

<!-- start content section from here -->
