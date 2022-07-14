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
					<td class="drawtab_header" valign="middle"><?
					if($_REQUEST[id]=="")
					{
					?>Add User<?
					}
					else
					{
					?>
					Edit User
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
									<form name="frm" id="frm" method="post" action="includes/user_add_process.php" enctype="multipart/form-data">
									<table  class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
                                        <td height="27" colspan="2" class="odd"><span class="column_heading" style="color:#FF0000">&nbsp;<?=$_REQUEST[msg]?></span></td>
                                        </tr>
										 <tr>
                                        <td height="27" colspan="2" class="subtabs"><span class="column_heading">&nbsp;</span></td>
                                        </tr>
									
                                         <tr>
                                           <td width="18%" class="odd">&nbsp;Username <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="username" type="text" id="username" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
										 
										  
										 
										 
										 <tr>
                                           <td width="18%" class="odd">&nbsp;password  <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="password" type="password" id="password" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
										 
										 
										 <tr>
                                           <td width="18%" class="odd">&nbsp;Email <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="email" type="text" id="email" class="validate[required,custom[email]]" style="width:200px" value=""/></td>
                                         </tr>
										 
										 
									<!--	
									<tr>
                                           <td width="18%" class="odd">&nbsp;Type <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd">Sale:<input type="checkbox" name="sale" id="sale" value="1"/>
Stock:<input type="checkbox" name="stock" id="stock" value="1"/>Purchase:<input type="checkbox" name="purchase" id="purchase" value="1"/>
Account<input type="checkbox" name="account" id="account" value="1"/></td>
                                         </tr>	--> 
										 
										 
										
										
										 
										
										 
										 <tr>
                                           <td width="18%" class="odd" valign="top">&nbsp;Security Code <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd" valign="top"><img src="CaptchaSecurityImages.php?width=100&height=30&characters=5" /><br /><input name="security_code" type="text" id="security_code" class="validate[required]"  /></td>
                                         </tr>
										 
									
										 
										 
										 
										 <!--<tr>
                                           <td width="18%" class="odd" align="right"><input name="checkbox1" type="checkbox" id="checkbox1"  class="validate[required] checkbox"/></td>
                                           <td width="82%" height="27" align="left" class="odd">I agree to the Terms and Conditions</a></td>
                                         </tr>
										 
										 -->
									   <tr>
                                        <td class="odd">&nbsp;</td>
                                        <td height="27" align="left" class="odd">&nbsp;<input name="Add Plan" type="submit" value="Register" onclick="return Go();" />&nbsp;<input name="Cancel" type="reset" value="Reset" />&nbsp;<input name="back" type="button" value="Back" onclick="window.location='index.php?module=user&&header=User'" /></td>
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

