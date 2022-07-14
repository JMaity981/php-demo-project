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
		
		
		
		<script type="text/javascript">
		function valid_zip()
		{
		var regzipusa=/^\d{5}(-\d{4})?$/;
		
		var canZipRegEx1 = /^([0-9A-Za-z]{3}[\\s-][0-9A-Za-z]{3})$/;
var canZipRegEx2 = /^([0-9A-Za-z]{6})$/;

var givencode=document.getElementById("code").value;

if(!givencode.match(regzipusa))
	{
	alert("Zip code is not valid");
	return false;
	}	
		
		}
		</script>
		
<center>

<table width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="9px"></td>
					<td class="block_stroke" align="left">
					<table class="tab_header_bg_active" align="left" border="0" cellpadding="0" cellspacing="0">  <tbody><tr class="tab_header_bg_active" id="tab[]">    <td class="tab_header_left_active"></td>
					<td class="drawtab_header" valign="middle">Manage Account </td>
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
                                  <?php
								  if($_REQUEST[id]!="")
								  {
								    $query_up_mem="select * from `users` where id='$_REQUEST[id]'";
									$res_up_mem=mysql_query($query_up_mem);
									$array_up_mem=mysql_fetch_array($res_up_mem);
									
									/*$sql_func=mysql_query("select * from dt_module where user_id='$_REQUEST[id]'") or die(mysql_error());
									$res_func=mysql_fetch_array($sql_func);
									
									$sql_func1=mysql_query("select * from add_module where user_id='$_REQUEST[id]'") or die(mysql_error());
									$res_func1=mysql_fetch_array($sql_func1);
									
									$sql_func2=mysql_query("select * from edit_module where user_id='$_REQUEST[id]'") or die(mysql_error());
									$res_func2=mysql_fetch_array($sql_func2);
									
									$sql_func3=mysql_query("select * from delete_module where user_id='$_REQUEST[id]'") or die(mysql_error());
									$res_func3=mysql_fetch_array($sql_func3);*/
								  }
								  ?>
                                  <tr>
                                    <td width="50%" align="left" valign="top">
									<form name="frm" id="frm" method="post" action="includes/add_user_process.php?id=<?=$_REQUEST[id]?>" enctype="multipart/form-data">
									<table  class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
                                        <td height="27" colspan="6" class="odd"><span class="column_heading">&nbsp;<?=$_REQUEST[msg]?></span></td>
                                        </tr>
										 <tr>
                                        <td height="27" colspan="6" class="subtabs"><span class="column_heading"> </span></td>
                                        </tr>
									
                                         <tr>
                                              <td width="32%" align="left" class="odd">&nbsp;User Name <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"><label>
                                               <input type="text" value="<?=$array_up_mem[uname];?>" class="validate[required]" name="f_name" id="f_name"> 
                                           </label></td>
                                      </tr>
											
											
											<tr>
                                              
                                              <td width="32%" align="left" class="odd">&nbsp;Password  <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"> <input type="password" name="password" id="password" class="validate[required]"></td>
                                            </tr>
											
											<tr>
                                              
                                              <td width="32%" align="left" class="odd">&nbsp;First Name  <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"> <input type="text" name="fname" id="fname" class="validate[required]" value="<?=$array_up_mem[fname];?>"></td>
                                            </tr>
											
											<tr>
                                              
                                              <td width="32%" align="left" class="odd">&nbsp;Last Name  <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"> <input type="text" name="lname" id="lname" class="validate[required]" value="<?=$array_up_mem[lname];?>"></td>
                                            </tr>
											
											<tr>
                                              
                                              <td width="32%" align="left" class="odd">&nbsp;Email  <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"> <input type="text" name="email" id="email" class="validate[required,custom[email]]" value="<?=$array_up_mem[email];?>"></td>
                                            </tr>
											
											
											
											<tr>
                                              
                                              <td width="32%" align="left" class="odd">&nbsp;Paypal Account  <font color="#FF0000">*</font>: </td>
                                              <td align="left" class="odd" colspan="4"> <input type="text" name="paypal" id="paypal" class="validate[required]" value="<?=$array_up_mem['paypal'];?>"></td>
                                            </tr>
											
										 <tr>
                                           <td class="odd">&nbsp;</td>
                                           <td height="27" align="left" class="odd" colspan="4">&nbsp;</td>
                                         </tr>
                                      
									   <tr>
                                        <td class="odd">&nbsp;</td>
                                        <td height="27" align="left" class="odd" colspan="4">&nbsp;

<input name="Add Plan" type="submit" value="Save"/>



&nbsp;<input name="Cancel" type="reset" value="Reset" />&nbsp;
                                         </td>
                                      </tr>
                                      <tr>
                                        <td height="27" colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="grid">
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
	var fname= document.getElementById("f_name").value;


var pass= document.getElementById("password").value;

	
	if(isWhitespace(fname))
	{
		alert("Enter User Name !");
		document.getElementById('f_name').focus();
		return false;
	}

	
	if(isWhitespace(pass))
	{
		alert("Enter Password !");
		document.getElementById('password').focus();
		return false;
	}
	
	return true;	
}
</script>
