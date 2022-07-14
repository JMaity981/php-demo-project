<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>




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
					<td class="drawtab_header" valign="middle">
					<?
					if($_REQUEST['id']=="")
					{
					?>Add  Color<?
					}
					else
					{
					?>
					Edit Color
					<?
					}
					?> </td>
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
                                    <td width="50%" align="left" valign="top">
									<form name="frm" id="frm" method="post" action="includes/add_color_process.php?security_code=<?=$_SESSION['security_code'];?>" enctype="multipart/form-data">
									<table  class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
                                        <td height="27" colspan="2" class="odd"><span class="column_heading" style="color:#FF0000">&nbsp;<?=$_REQUEST[msg]?></span></td>
                                        </tr>
										 <tr>
                                        <td height="27" colspan="2" class="subtabs"><span class="column_heading">&nbsp;</span></td>
                                        </tr>

										  <tr>
                                           <td width="18%" class="odd">&nbsp;Color Name<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="clour_name" type="text" id="clour_name" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
                                          <tr>
                                           <td width="18%" class="odd" style="vertical-align:top">&nbsp;Color Image(25*20)<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="image1" type="file" id="image1"  style="width:200px" value=""  class="validate[required]"/></td>
										 </tr>
                                         								   <tr>
                                        <td class="odd">&nbsp;</td>
                                        <td height="27" align="left" class="odd">&nbsp;<input name="Add Plan" type="submit" value="submit" onclick="return Go();" />&nbsp;<input name="Cancel" type="reset" value="Reset" />&nbsp;<input name="back" type="button" value="Back" onclick="window.location='index.php?module=add_color&&header=Color'" /></td>
                                      </tr>
                                      <tr>
                                        <td height="27" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="grid">
                                          <tr>
                                            <td width="67%">&nbsp;</td>
                                            <td width="7%">&nbsp;</td>
                                          </tr>
                                        </table></td>
                                        </tr>
                                    </table>
									</form>
									</td>
                                  </tr>
								   <tr>
                                    <td align="left" valign="top">&nbsp;</td>
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


</center>
<script src="js/FormChek.js"></script>
<script type="text/javascript">
function Go()
{
var emailExp = /^\d\d*$/;
var mail=document.frm.sc.value;
var mail1=document.frm.gc.value;

if(!mail.match(emailExp))
	{
	alert("Enter positive integer, No Space");
	document.frm.sc.focus();
	return false;
	}
	
	if(!mail1.match(emailExp))
	{
	alert("Enter positive integer, No Space");
	document.frm.gc.focus();
	return false;
	}
	
	
}
</script>


