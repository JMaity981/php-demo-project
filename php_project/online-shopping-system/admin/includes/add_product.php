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
					if($_REQUEST['prod_id']=="")
					{
					?>Add product<?
					}
					else
					{
					?>
					Edit product
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
									<form name="frm" id="frm" method="post" action="includes/product_add_process.php" enctype="multipart/form-data">
									<table  class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
                                        <td height="27" colspan="2" class="odd"><span class="column_heading" style="color:#FF0000">&nbsp;<?=$_REQUEST[msg]?></span></td>
                                        </tr>
										 <tr>
                                        <td height="27" colspan="2" class="subtabs"><span class="column_heading">&nbsp;</span></td>
                                        </tr>
										
									 
										  <tr>
                                           <td width="18%" class="odd">&nbsp;Category Name<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><select name="cat_id" type="text" id="id" class="validate[required]" style="width:200px" value=""/>
                                           
                                           <option value=""> ---select--</option>
                                           <?php $var=mysql_query("Select * from category where status=1"); 
											while($row=mysql_fetch_array($var))
											{
												?>
												 <option value="<?=$row['cat_id']?>"><?=$row['cat_name']?></option>
												<?
											}
									 ?>
                                           </select>
                                           </td>
                                         </tr>
								  <tr>
                                           <td width="18%" class="odd">&nbsp;Product Name<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="prod_name" type="text" id="prod_name" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
										 
									  <tr>
                                           <td width="18%" class="odd">&nbsp;Details <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><textarea name="prod_details" type="text" id="prod_details" class="validate[required] ckeditor" style="width:200px" value=""/></textarea></td>
                                         </tr>
                                         
										  <tr>
                                           <td width="18%" class="odd">&nbsp;Price <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="prod_price" type="text" id="prod_price" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
                                          <tr>
                                           <td width="18%" class="odd">&nbsp;Product Color <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd">
                                           <select name="prod_color" type="text" id="prod_color" class="validate[required]" style="width:200px" value=""/>
                                           
                                           <option value=""> ---select--</option>
                                           <?php $var=mysql_query("Select * from color where status=1"); 
											while($row=mysql_fetch_array($var))
											{
												?>
												 <option value="<?=$row['id']?>"><?=$row['clour_name']?></option>
												<?
											}
									 		?>
                                           </select></td>
                                         </tr>
                                         <tr>
                                           <td width="18%" class="odd">&nbsp;Available Color:<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd">
                                          
                                           
                                           <?php $var=mysql_query("Select * from color where status=1"); 
											while($row=mysql_fetch_array($var))
											{
												?>
												<input type="checkbox" name="avai_color[]" value="<?php echo $row['id'] ?>" /><?php echo $row['clour_name'] ?>
												<?
											}
									 		?>
                                          </td>
                                         </tr>
										  <tr>
                                           <td width="18%" class="odd">&nbsp;Image(350*300)<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="imgfile" type="file" id="imgfile" class="validate[required]" style="width:200px" value=""/></td>
                                         </tr>
                                        <!-- <tr>
                                           <td width="18%" class="odd">&nbsp;Image<font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="gal_image[]" type="file" id="gal_image[]"  style="width:200px" multiple value=""/></td>
                                         </tr>-->
                                          <tr>
                                           <td width="18%" class="odd">&nbsp;Feature Product:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="fet_prod" type="checkbox" id="fet_prod" value="1"/></td>
                                         </tr>
                                          <tr>
                                           <td width="18%" class="odd">&nbsp;Special Product:</td>
                                           <td width="82%" height="27" align="left" class="odd"><input name="spe_prod" type="checkbox" id="spe_prod" value="1"/></td>
                                         </tr>
										 <!--<tr>
                                           <td width="18%" class="odd" valign="top">&nbsp;Security Code <font color="#FF0000">*</font>:</td>
                                           <td width="82%" height="27" align="left" class="odd" valign="top"><img src="CaptchaSecurityImages.php?width=100&height=30&characters=5" /><br /><input name="security_code" type="text" id="security_code" class="validate[required]"  /></td>
                                         </tr>-->
									   <tr>
                                        <td class="odd">&nbsp;</td>
                                        <td height="27" align="left" class="odd">&nbsp;<input name="Add Plan" type="submit" value="submit" onclick="return Go();" />&nbsp;<input name="Cancel" type="reset" value="Reset" />&nbsp;<input name="back" type="button" value="Back" onclick="window.location='index.php?module=product&&header=product'" /></td>
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
