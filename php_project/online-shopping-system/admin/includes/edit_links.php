<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<script type="text/JavaScript">

 //alert("kk");
  function valid_user(a)
{

//var m=<?=$_REQUEST[memb]?> ;
//alert(m);
//alert(a);
var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		var c = ajaxRequest.responseText;
		//alert(c);
		document.getElementById("txtHint").innerHTML=ajaxRequest.responseText;	
		}
	}
	var u_name = document.getElementById('t_name').value;
	//alert(u_name);
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcat_uname.php?un=" + a+"&u_name="+u_name, true);
	ajaxRequest.send(null); 
	

}



function show_field()
{
checked=false;
if(document.getElementById("other_company").checked)
{
checked=true;
}
else
{
checked=false;
}
if(checked==false)
{

document.getElementById("txtHint_show").innerHTML="";
}
if(checked==true)
{

return show_field_dtl();
}			
}
</script>

<script type="text/JavaScript">
 function show_field_dtl()
{

var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		var c = ajaxRequest.responseText;
		document.getElementById("txtHint_show").innerHTML=ajaxRequest.responseText;	
		}
		
	}
	//var id = document.getElementById('state').value;
	//alert(id);	
	ajaxRequest.open("GET", "includes/show_field.php", true);
	ajaxRequest.send(null); 
	

}  
</script>

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
					<td class="drawtab_header" valign="middle">Add Links
					</td>
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
			<?
			 $query_sel_links1="select * from `links` where id='$_REQUEST[id]'";
										
						$res_sel_links1=mysql_query($query_sel_links1);
																
						$array_sel_links1=mysql_fetch_array($res_sel_links1);
					
                               ?>  
					
                                  
                                  <tr>
                                    <td width="50%" align="left" valign="top">
									<form name="frm" id="frm" method="post" action="includes/edit_links_process.php?id=<?=$_REQUEST[id]?>" >
									<table  class="grid" width="100%" align="center" cellpadding="6" cellspacing="1">
                                      <tr>
                                        <td height="27" colspan="2" class="odd"><span class="column_heading" style="color:#FF0000">&nbsp;<?=$_REQUEST[msg1]?></span></td>
                                        </tr>
										 <tr>
                                        <td height="27" colspan="2" class="subtabs"><span class="column_heading">&nbsp;</span></td>
                                        </tr>
										
										
										 <tr>
                                           <td class="odd" colspan="2">&nbsp;Title <font color="#FF0000">*</font>:</td>
                                           
                                         </tr>
										 <tr>
                                           
                                           <td height="27" align="left" class="odd" colspan="2" >
										   
										   <input type="text" name="title" id="title" value="<?=$array_sel_links1[title]?>" class="validate[required]" style="width:400px">
										   </td>
                                         </tr>
										 
									
                                         
										
										 <tr>
                                           <td class="odd" colspan="2">&nbsp;Description <font color="#FF0000">*</font>:</td>
                                           
                                         </tr>
										 <tr>
                                           
                                           <td height="27" align="left" class="odd" colspan="2"><textarea class="validate[required] ckeditor" rows="10" cols="50" id="description" name="description"><?=stripslashes($array_sel_links1[description])?></textarea></td>
                                         </tr>
										 
										 
										 <tr>
                                           <td class="odd" colspan="2">&nbsp;Url <font color="#FF0000"></font>:</td>
                                           
                                         </tr>
										 <tr>
                                           
                                           <td height="27" align="left" class="odd" colspan="2" >
										   
										   <input type="text" name="url" id="url" value="<?=$array_sel_links1[url]?>"  style="width:400px">
										   </td>
                                         </tr>
										 
										 
                                      
									   <tr>
                                        <td class="odd">&nbsp;</td>
                                        <td height="27" align="left" class="odd">&nbsp;<input name="Add Plan" type="submit" value="Save" onclick="return Go();" />&nbsp;<input name="Cancel" type="reset" value="Reset" />&nbsp;</td>
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
	var name 			= document.getElementById("txt_name").value;

	
	if(isWhitespace(name))
	{
		alert("Category must be provided !");
		document.getElementById('txt_name').focus();
		return false;
	}
	
	return true;	
}
</script>

