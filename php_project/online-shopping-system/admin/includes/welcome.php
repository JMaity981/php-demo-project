<style>
div.tab_icon
{
background:url(icon/panel_normal.png);
width:160px;
height:160px;
background-repeat:no-repeat;
cursor:pointer;
}
div.tab_icon:hover
{
background:url(icon/panel_hover.png);
width:160px;
height:160px;
background-repeat:no-repeat;
cursor:pointer;
}
</style>
<center>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  			$sql_mod=mysql_query("select * from dt_module where user_id='$_SESSION[user_id]'");
			$res_mod=mysql_fetch_array($sql_mod);
  
  $j=0;
  $sql_welcome=mysql_query("select * from dt_welcome order by id");
  while($res_welcome=mysql_fetch_array($sql_welcome))
  {
  $get_val=$res_welcome[chk_value];
  	if($res_mod[$get_val]=='1')
	{
	$mod[$j]=$res_welcome[id];
	$j++;
	}
  }
  
  //$num_welcome=mysql_num_rows($sql_welcome);
  
  
  $num_row=ceil(count($mod)/5);
  
  //print_r($mod);
  
  $k=0;
  for($i=1;$i<=$num_row;$i++)
  {
 
 	
  	
  ?>
  
  <tr>
<?php

	$id=$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel[chk_value];
	
	?>
    <td align="center" width="20%">
	<?php
	if($res_wel[id]!='')
	{
	?>
	<div class="tab_icon"  id="t1" onmousedown="document.getElementById('t1').style.backgroundImage='url(icon/panel_down.png)'" onclick="window.location='<?=$res_wel[url]?>'">
	<table width="90%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="111" align="center" valign="middle"><img src="icon/<?=$res_wel[icon]?>" width="83" height="80" /></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle" height="35" style="font-size:12px; font-weight:bold;"><?=$res_wel[title]?> </td>
      </tr>
    </table>
	</div>	
	<?php
	}
	?>
	</td>
	
  <?php
   $id=$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel[chk_value];
	?>
    <td align="center" width="20%">
	
	<?php
	if($res_wel[id]!='')
	{
	?>
	<div class="tab_icon"  id="t1" onmousedown="document.getElementById('t1').style.backgroundImage='url(icon/panel_down.png)'" onclick="window.location='<?=$res_wel[url]?>'">
	<table width="90%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="111" align="center" valign="middle"><img src="icon/<?=$res_wel[icon]?>" width="83" height="80" /></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle" height="35" style="font-size:12px; font-weight:bold;"><?=$res_wel[title]?> </td>
      </tr>
    </table>
	</div>	
	<?php
	}
	?>	

	</td>
	<?php
	$id=$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel[chk_value];
	?>
    <td align="center" width="20%">
	<?php
	if($res_wel[id]!='')
	{
	?>
	<div class="tab_icon"  id="t1" onmousedown="document.getElementById('t1').style.backgroundImage='url(icon/panel_down.png)'" onclick="window.location='<?=$res_wel[url]?>'">
	<table width="90%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="111" align="center" valign="middle"><img src="icon/<?=$res_wel[icon]?>" width="83" height="80" /></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle" height="35" style="font-size:12px; font-weight:bold;"><?=$res_wel[title]?> </td>
      </tr>
    </table>
	</div>	
	<?php
	}
	?>
	</td>
	<?php
	$id=$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel[chk_value];
	?>
    <td align="center" width="20%">
	
	<?php
	if($res_wel[id]!='')
	{
	?>
	<div class="tab_icon"  id="t1" onmousedown="document.getElementById('t1').style.backgroundImage='url(icon/panel_down.png)'" onclick="window.location='<?=$res_wel[url]?>'">
	<table width="90%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="111" align="center" valign="middle"><img src="icon/<?=$res_wel[icon]?>" width="83" height="80" /></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle" height="35" style="font-size:12px; font-weight:bold;"><?=$res_wel[title]?> </td>
      </tr>
    </table>
	</div>	
	<?php
	}
	?>	

	</td>
	<?php
	$id=$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel[chk_value];
	?>
    <td align="center" width="20%">
	
	<?php
	if($res_wel[id]!='')
	{
	?>
	<div class="tab_icon"  id="t1" onmousedown="document.getElementById('t1').style.backgroundImage='url(icon/panel_down.png)'" onclick="window.location='<?=$res_wel[url]?>'">
	<table width="90%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="111" align="center" valign="middle"><img src="icon/<?=$res_wel[icon]?>" width="83" height="80" /></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle" height="35" style="font-size:12px; font-weight:bold;"><?=$res_wel[title]?> </td>
      </tr>
    </table>
	</div>	
	<?php
	}
	?>	

	</td>
	
  </tr>
    <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
</table>


</center>
