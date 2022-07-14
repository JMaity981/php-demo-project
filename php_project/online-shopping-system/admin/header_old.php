<?
$sql_inv123=mysql_query("select * from inventory");
while($res_inv123=mysql_fetch_array($sql_inv123)){

//$sql_p_item123=mysql_query("select sum(quantity) as qua1 from purchase_item where tool_name='$res_inv123[id]'");
//$res_p_item123=mysql_fetch_array($sql_p_item123);
$sqlrt1=mysql_query("select * from `return_tool` where `t_name`='$res_inv123[id]' and `insert_into_inv`='1'");
while($resrt1=mysql_fetch_array($sqlrt1))
{
$total_rt+=$resrt1[return_qnty];
}

$sql_ms123=mysql_query("select sum(t_quantity) as qua_ms from `mobile_station_tool` where t_name='$res_inv123[id]'");
$res_ms123=mysql_fetch_array($sql_ms123);
$qua_ms=$res_ms123[qua_ms];

$sql_rent123=mysql_query("select sum(tool_no) as qua2 from rental where tool_name='$res_inv123[id]'");
$res_rent123=mysql_fetch_array($sql_rent123);

$qua123=$res_rent123[qua2];

$remain123=$res_inv123[mini_no]-$qua123-$qua_ms+$total_rt;

mysql_query("update `dtl_present_qnty` set qnty='$remain123' where tool_id='$res_inv123[id]'");

//$sql_rent123=mysql_query("select sum(tool_no) as qua from rental where tool_name='$res_inv123[id]'");
//$res_rent123=mysql_fetch_array($sql_rent123);
unset($total_rt);
}

$sql_pq1234=mysql_query("select * from dtl_present_qnty");
while($res_pq1234=mysql_fetch_array($sql_pq1234)){
if($res_pq1234[qnty]<'0')
{
mysql_query("update `dtl_present_qnty` set qnty='0' where tool_id='$res_pq1234[tool_id]'");
}


}


?>
<center>
  <table class="wrapper" border="0" cellpadding="0" cellspacing="0">
    <tbody><tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td class="banner" valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><div class="user_info"> <?php echo date("l F d, Y");?> &nbsp;&nbsp;|&nbsp;&nbsp;<?
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
	
<!--	<li><a href="#" class="Parent"><span>Tool Categories</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_category&&header=Add Tool Category"><span>Add Category</span></a></li>
		<li><a href="index.php?module=category&&header=Tool Categories"><span>Manage Categories</span></a></li>
		
		</ul>
	</div>
	</li>-->
	
	
	<?
	}
	?>
	<?
	if($res_func[user_setup]=='1')
	{
	?>
	<li><a href="#" class="Parent"><span>User Setup</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=admin_user&header=Admin User Setup"><span>Manage User</span></a></li>
		
		</ul>
	</div>
	</li>
	<?
	}
	?>
	<?
	if($res_func[inventory]=='1')
	{
	?>
	<li><a href="#" class="Parent"><span>Inventory</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_inventory&&header=Inventory"><span>Add Tool</span></a></li>
		<li><a href="index.php?module=inventory&&header=Inventory"><span>Manage Inventory</span></a></li>
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		<li><a href="index.php?module=add_category&&header=Add Tool Category"><span>Add Category</span></a></li>
		<li><a href="index.php?module=category&&header=Tool Categories"><span>Manage Categories</span></a></li>
		</ul>
	</div>
	</li>
	<?
	}
	?>
	
	
	<?
	if($res_func[purchase]=='1')
	{
	?>
	
	<li><a href="#" class="Parent"><span>Orders </span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_purchase&&header=Orders"><span>New Order</span></a></li>
		<li><a href="index.php?module=purchase&&header=Orders"><span>Manage Orders</span></a></li>
		<li><a href="index.php?module=add_send_order&&header=Send Order"><span>Add Send Order</span></a></li>
		<li><a href="index.php?module=manage_send_order&&header=Send Order"><span>Manage Send Order</span></a></li>
		
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
	</div>
	</li>
	
	<?
	}
	?>
	<?
	if($res_func[customer_rentals]=='1')
	{
	?>
	
	<li><a href="#" class="Parent"><span>Customer</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_customer&&header=Add Customer"><span>Add Customer</span></a></li>
		<li><a href="index.php?module=customer&&header=Customer"><span>Manage Customer</span></a></li>
		<!--<li><a href="index.php?module=rental_history&&header=Rental history"><span>Rental history</span></a></li>-->
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
	</div>
	</li>
	<?
	}
	?>
	<?
	if($res_func[return_tool]=='1')
	{
	?>
	
	<li><a href="#" class="Parent"><span>Return Tools</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_return_tool&&header=Add Return Tools"><span>Add Return Tools</span></a></li>
		<li><a href="index.php?module=manage_return_tool&&header=Return Tools"><span>Manage Return Tools</span></a></li>
		
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
	</div>
	</li>
	
	<?
	}
	?>
	<?
	if($res_func[mobile_tool]=='1')
	{
	?>
	
	<li><a href="#" class="Parent"><span>Mobile Tools Station</span></a>
	<div>
	<ul>
		<li><a href="index.php?module=add_mobile_station&&header=Mobile Tools Station"><span>Add Mobile Tools</span></a></li>
		<li><a href="index.php?module=manage_mobile_station&&header=Mobile Tools Station"><span>Manage Mobile Tools</span></a></li>
		<li><a href="index.php?module=rented_mobile_station&&header=Rented Mobile Tools Station"><span>Rented Mobile Tools</span></a></li>
		
		<!--<li><a href="index.php?module=params&&header=Co-Scholastic Params&&type=think">Co-Scholastic Params</a></li>-->
		</ul>
	</div>
	</li>
	
	<?php
	}
	?>
	<?
	if($res_func[tax]=='1')
	{
	?>
	<li><a href="index.php?module=manage_tax&&header=Manage Tax" class="Parent"><span>Manage Tax</span></a></li>
	<?
	}
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

<!--<table celpadding="0" width="100%" border="0" cellspacing="0"><tbody><tr>
  <td class="welcome" valign="middle" width="60%"><b>Welcome to Rental Tool Admin Panel </b></td>
  <td class="version" width="40%">Version : 1.0 | Release Date : November 12, 2011</td></tr></tbody></table>-->	


<!-- 2nd main section -->

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
