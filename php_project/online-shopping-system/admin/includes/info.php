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

<table width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="9px"></td>
					<td class="block_stroke" align="left">
					<table class="tab_header_bg_active" align="left" border="0" cellpadding="0" cellspacing="0">  <tbody><tr class="tab_header_bg_active" id="tab[]">    <td class="tab_header_left_active"></td>
					<td class="drawtab_header" valign="middle">Manage Information</td>
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
			<table width="100%" border="0" cellspacing="4" cellpadding="0">
                                  
                                  <tr>
                                    <td width="100%" colspan="2" align="left" valign="top"><table class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
									
                                      <tr>
                                        
										<td class="subtabs" align="center"><a href="#" class="column_heading"> Title </a></td>
										<!--<td class="subtabs" align="center"><a href="#" class="column_heading">Description</a></td>-->
										
										<td class="subtabs" align="center"><a href="#" class="column_heading">Added On</a></td>
									
										
										
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
										
										$query_sel_info="select * from `useful_info` order by `id` desc LIMIT $offset, $rowsPerPage";
										
										$res_sel_info=mysql_query($query_sel_info);
										$row_info=mysql_num_rows($res_sel_info);
										if($row_info >0){
										
										while($array_sel_info=mysql_fetch_array($res_sel_info)){
										
										?>
										
                                      <tr>
                                       
										
										<td width="49%" align="center" class="odd"><?=$array_sel_info[title] ?></td>
										
										<!--<td width="37%" align="center" class="odd"><?=substr(stripslashes($array_sel_info[description]),0,200)?></td>-->
										
	<td width="26%" align="center" class="odd"><?=$array_sel_info[added_on] ?></td>
	

										
										
										
										
										<td width="9%" height="27" align="center" valign="middle" class="odd"><? if($array_sel_info[status]=='0'){?><a href="includes/active_info.php?id=<?=$array_sel_info[id];?>&&action=active" title="Click to active"><img src="images/active_off.gif" alt="Edit" width="16" height="16" border="0" /></a><? } else { ?><a href="includes/active_info.php?id=<?=$array_sel_info[id];?>&&action=inactive" title="Click to Inactive"><img src="images/active_on.gif" alt="Edit" width="16" height="16" border="0" /></a>
									    <? }?></td>
										
										
                                        <td width="7%" height="27" align="center" valign="middle" class="odd"><a href="index.php?module=edit_info&header=Information&id=<?=$array_sel_info[id]?>"><img src="images/edit.gif" title="Edit" width="16" height="16" border="0" /></a></td>
                                        <td width="9%" align="center" valign="middle" class="odd"><a href="#" onclick="javascript:if(confirm('Do you want to delete?')){window.location='includes/delete_info.php?id=<?=$array_sel_info[id];?>'}"><img src="images/delete.gif" title="Delete" width="16" height="16" border="0" /></a></td>
                                      </tr>
									  <?
									  $i++; } ?>
									  <? 
									  
										$query="select * from `useful_info`";
										
										
									   
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
										$prev = " <a href=\"$self?page=$page&module=info&&header=Information\" class=\"style1\"><< Back</a> ";
										
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
										$next = " <a href=\"$self?page=$page&module=info&&header=Information\" class=\"style1\">Next >></a> ";
										
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
                                        <td height="27" colspan="13" align="center" valign="middle"  class="odd"><label class="style2">No Informations available ..! </label></td>
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
<!--

//Pop up information box II (Mike McGrath (mike_mcgrath@lineone.net, http://website.lineone.net/~mike_mcgrath))
//Permission granted to Dynamicdrive.com to include script in archive
//For this and 100's more DHTML scripts, visit http://dynamicdrive.com

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

//-->
</SCRIPT>
</center>

