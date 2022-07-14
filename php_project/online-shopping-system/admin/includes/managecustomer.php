
<?php 
error_reporting(0);
ob_start();
session_start();
include '../config.php';
?>


<STYLE TYPE="text/css">
<!--
#dek {POSITION:absolute;VISIBILITY:hidden;Z-INDEX:200;}
//-->
</STYLE>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="css/template.css" type="text/css"/>
        <script src="js/jquery-1.6.min.js" type="text/javascript">
        </script>
        <script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#frm").validationEngine();
            });
            
        </script>
		<center>
        <?php
		
		$sqlqry="select * from tbl_registration where id=".$_GET['id'];
			$res=mysql_query($sqlqry);
			$row=mysql_fetch_array($res); 
		?>
        

<table width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="9px"></td>
					<td class="block_stroke" align="left">
					<table class="tab_header_bg_active" align="left" border="0" cellpadding="0" cellspacing="0">  <tbody><tr class="tab_header_bg_active" id="tab[]">    <td class="tab_header_left_active"></td>
					<td class="drawtab_header" valign="middle">Manage Customer</td>
					<td class="tab_header_right_active"></td>  </tr></tbody></table>
	</td><td></td></tr><tr>
			<td class="block_topleft_corner"></td>
			<td class="block_topmiddle"></td>
			<td class="block_topright_corner"></td>
		</tr>
			<tr>
			<td class="block_left" rowspan="2"></td>
			<td class="block_bg"></td>
			<td class="block_right" rowspan="2"></td>
		</tr>
		<tr>
		  	<td>
            <div style=" width:850px; overflow-x:scroll;">
			<table width="100%" border="0" cellspacing="4" cellpadding="0">
                                  
                                  <tr>
                                    <td width="100%" colspan="2" align="left" valign="top"><table class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
										<td class="subtabs" align="center"><a href="#" class="column_heading">Email</a></td>
										<td class="subtabs" align="center"><a href="#" class="column_heading">Password</a></td>
										<td class="subtabs" align="center"><a href="#" class="column_heading"> Mobile</a></td>
                                        <td class="subtabs" align="center"><a href="#" class="column_heading">First Name</a></td>
                                         <td class="subtabs" align="center"><a href="#" class="column_heading">Last Name</a></td>
                                          <td class="subtabs" align="center"><a href="#" class="column_heading">Phone</a></td>
                                          <td class="subtabs" align="center"><a href="#" class="column_heading">Billing Address </a></td>
                                           <td class="subtabs" align="center"><a href="#" class="column_heading">Billing City</a></td>
                                            <td class="subtabs" align="center"><a href="#" class="column_heading">Billing Country</a></td>
                                             <td class="subtabs" align="center"><a href="#" class="column_heading">Billing PIN</a></td>
                                              <td class="subtabs" align="center"><a href="#" class="column_heading">Shipping Address</a></td>
                                               <td class="subtabs" align="center"><a href="#" class="column_heading">Shipping City</a></td>
                                                <td class="subtabs" align="center"><a href="#" class="column_heading">Shipping Country</a></td>
                                               
                                                <td class="subtabs" align="center"><a href="#" class="column_heading">Shipping PIN</a></td>
                                                 <td class="subtabs" align="center"><a href="#" class="column_heading">User Delete Status</a></td>
                                                  <td class="subtabs" align="center"><a href="#" class="column_heading">Date</a></td>
                                                   <td class="subtabs" align="center"><a href="#" class="column_heading">Time</a></td>
                                                    
                                        
                                        <td colspan="5" class="subtabs" align="center"><a href="#" class="column_heading">Action</a>&nbsp;&nbsp;&nbsp;</td>
                                      </tr>
										<? 
										//$s_value=htmlentities($_REQUEST[s_value]);
										$i=1;
										$rowsPerPage =10;
										
										$pageNum = 1;
										
										if(isset($_GET['page']))
										{
										$pageNum = $_GET['page'];
										}
										$offset = ($pageNum - 1) * $rowsPerPage;
										
										$query_sel_u="select * from `tbl_registration` order by `id` desc LIMIT $offset, $rowsPerPage";
										
										$res_sel_u=mysql_query($query_sel_u);
										$row=mysql_num_rows($res_sel_u);
										if($row>0){
										
										while($array_sel_u=mysql_fetch_array($res_sel_u)){
										?>
                                      <tr>
										 
										<td width="16%" align="center" class="odd"><?=$array_sel_u['email'];?></td>
										
										<td width="16%" align="center" class="odd"><?=$array_sel_u['password'];?></td>
										<td width="9%" align="center" class="odd"><?=$array_sel_u['mobile']?></td>
	                                    <td width="9%" align="center" class="odd"><?=$array_sel_u['fname']?></td>
                                         <td width="9%" align="center" class="odd"><?=$array_sel_u['lname']?></td>
                                          <td width="9%" align="center" class="odd"><?=$array_sel_u['phone']?></td>
                                           <td width="9%" align="center" class="odd"><?=$array_sel_u['baddress']?></td>
                                            <td width="9%" align="center" class="odd"><?=$array_sel_u['bcity']?></td>
                                             <td width="9%" align="center" class="odd"><?=$array_sel_u['bcountry']?></td>
                                              <td width="9%" align="center" class="odd"><?=$array_sel_u['bpin']?></td>
        	 	                                       <td width="9%" align="center" class="odd"><?=$array_sel_u['saddress']?></td>
                                                <td width="9%" align="center" class="odd"><?=$array_sel_u['scity']?></td>
                                                 <td width="9%" align="center" class="odd"><?=$array_sel_u['scountry']?></td>
                                                  <td width="9%" align="center" class="odd"><?=$array_sel_u['spin']?></td> 
                                                   <td width="9%" align="center" class="odd">
												   
												   <?php
						if($array_sel_u['del_status'] == 1)
						{
							echo "Profile Deleted By The User";
						}
						else
						{
							echo "Profile Alive";
						}						
					?>
												   
												 </td> 
                                                      <td width="9%" align="center" class="odd"><?=$array_sel_u['date']?></td>
                                                       <td width="9%" align="center" class="odd"><?=$array_sel_u['time']?></td>
                                                       
	
								
										<!--<td width="11%" height="27" align="center" valign="middle" class="odd"><? if($array_sel_u[status]=='0'){?><a href="includes/active_product.php?prod_id=<?=$array_sel_u['prod_id'];?>&&action=active" title="Click to active"><img src="images/active_off.gif" alt="Edit" width="16" height="16" border="0" /></a><? } else { ?><a href="includes/active_product.php?prod_id=<?=$array_sel_u['prod_id'];?>&&action=inactive" title="Click to Inactive"><img src="images/active_on.gif" alt="Edit" width="16" height="16" border="0" /></a>
									    <? }?></td>-->
                                        <!--<td width="4%" height="27" align="center" valign="middle" class="odd"><a href="index.php?module=edit_product&header=Edit&prod_id=<?=$array_sel_u['prod_id']?>"><img src="images/edit.gif" title="Edit" width="16" height="16" border="0" /></a></td>-->
                                        <td width="7%" align="center" valign="middle" class="odd"><a href="#" onClick="javascript:if(confirm('Do you want to delete?')){window.location='includes/delete_customer.php?id=<?=$array_sel_u['id'];?>'}"><img src="images/delete.gif" title="Delete" width="16" height="16" border="0" /></a></td>
                                      </tr>
									  <?
									  $i++; } ?>
									  <? 
									  
										$query="select * from `tbl_registration`";
										
										
									   
										$result  = mysql_query($query);
										$numrows = mysql_num_rows($result);
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = $_SERVER['PHP_SELF'];
										$nav = '';
										for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= " $page "; 
												  
											}
											else
											{
												$nav .= " <a href=\"$self?page=$page&module=category&header=Category\">$page</a> ";
											}		
										}
									
									if ($pageNum > 1)
									{
										$page = $pageNum - 1;
										$prev = " <a href=\"$self?page=$page&module=managecustomer&&header=managecustomer\" class=\"style1\"><< Back</a> ";
										
										$first = " <a href=\"$self?page=1&module=news&&header=News Management\">[First Page]</a> ";
									} 
									else
									{
										$prev  = '<< Back'; 
										$first = '&nbsp;'; 
									}
									
									if ($pageNum < $maxPage)
									{
										$page = $pageNum + 1;
										$next = " <a href=\"$self?page=$page&module=managecustomer&&header=managecustomer\" class=\"style1\">Next >></a> ";
										
										$last = " <a href=\"$self?page=$maxPage&module=news&&header=News Management\">[Last Page]</a> ";
									} 
									else
									{
										$next = 'Next >>';
										$last = '&nbsp;'; 
									}
									//////////////////Pagination Ends Here////////////////////////
									 ?> 
									 
									 <? }else{?>


 <tr>
                                        <td height="27" colspan="13" align="center" valign="middle"  class="odd"><label class="style2">No Users are available ..! </label></td>
                                        </tr>
									  
									  <? }?>
                                      <tr class="subtabs">
                                        <td height="27" colspan="13"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="12%" class="style2" style="color:#6C6C6C;">&nbsp;<?=$pageNum; ?> Of <?=$maxPage;?> Pages</td>
                                            <td width="14%" class="style2" style="color:#6C6C6C; font-style:normal;"><? echo $prev;?>  <? echo $next;?>&nbsp;</td>
                                            <td width="67%">&nbsp;</td>
                                            <td width="7%">&nbsp;</td>
                                          </tr>
                                        </table></td>
                                        </tr>
                                    </table></td>
                                  </tr>
								   <tr>
                                    <td colspan="2" align="left" valign="top">&nbsp;</td>
                                  </tr>
                                </table>
              </div>
			</td>
           
		</tr>
		<tr>
			<td class="block_left_corner"></td>
			<td class="block_middle"></td>
			<td class="block_right_corner"></td>
		</tr>
		<tr><td colspan="3" class="clear"></td></tr>
		</tbody></table>

<DIV ID="dek"></DIV>

<SCRIPT TYPE="text/javascript">

Xoffset=-60; // modify these values to ...
Yoffset= 20; // change the popup position.

var old,skn,iex=(document.all),yyy=-1000;

var ns4=document.layers
var ns6=document.getElementById&&!document.all
var ie4=document.all

if (ns4)
skn=document.dek
else if (ns6)
skn=document.getElementById("dek").style
else if (ie4)
skn=document.all.dek.style
if(ns4)document.captureEvents(Event.MOUSEMOVE);
else{
skn.visibility="visible"
skn.display="none"
}
document.onmousemove=get_mouse;

function popup(msg,bak){
var content="<TABLE BORDER=1 BORDERCOLOR=black CELLPADDING=2 CELLSPACING=0 "+
"BGCOLOR="+bak+"><TD ALIGN=center><FONT COLOR=black SIZE=2><img src='"+msg+"' /></FONT></TD></TABLE>";
yyy=Yoffset;
if(ns4){skn.document.write(content);skn.document.close();skn.visibility="visible"}
if(ns6){document.getElementById("dek").innerHTML=content;skn.display=''}
if(ie4){document.all("dek").innerHTML=content;skn.display=''}
}

function get_mouse(e){
var x=(ns4||ns6)?e.pageX:event.x+document.body.scrollLeft;
skn.left=x+Xoffset;
var y=(ns4||ns6)?e.pageY:event.y+document.body.scrollTop;
skn.top=y+yyy;
}

function kill(){
yyy=-1000;
if(ns4){skn.visibility="hidden";}
else if (ns6||ie4)
skn.display="none"
}

</SCRIPT>
</center>
