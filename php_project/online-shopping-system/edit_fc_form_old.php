<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<script type="text/JavaScript">

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
		document.getElementById("txtHintuser").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcat.php?un=" + a, true);
	ajaxRequest.send(null); 
	

}
 

 function valid_user1(a)
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
		document.getElementById("txtHintuser").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcat1.php?un=" + a+"&id=<?=$_REQUEST[id]?>", true);
	ajaxRequest.send(null); 
	

}


 function valid_email(a)
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
		document.getElementById("txtHintemail").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcatemail.php?un=" + a, true);
	ajaxRequest.send(null); 
	

}
 

 function valid_email1(a)
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
		document.getElementById("txtHintemail").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcatemail1.php?un=" + a+"&id=<?=$_REQUEST[id]?>", true);
	ajaxRequest.send(null); 
	

}


 function valid_f(a)
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
		document.getElementById("txtHintf").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcatf.php?un=" + a, true);
	ajaxRequest.send(null); 
	

}
 

 function valid_f1(a)
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
		document.getElementById("txtHintf").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/value_subcatf1.php?un=" + a+"&id=<?=$_REQUEST[id]?>", true);
	ajaxRequest.send(null); 
	

}

 function city_sel(a)
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
		document.getElementById("txtHint_city").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('state').value;
	//alert(id);	
	ajaxRequest.open("GET", "includes/city.php?un=" + a, true);
	ajaxRequest.send(null); 
	

}

</script>

<script type="text/javascript">
		function valid_zip()
		{
		var regzipusa=/^\d{5}(-\d{4})?$/;
		
		var canZipRegEx1 = /^([0-9A-Za-z]{3}[\\s-][0-9A-Za-z]{3})$/;
var canZipRegEx2 = /^([0-9A-Za-z]{6})$/;

var givencode=document.getElementById("zip").value;

if(!givencode.match(regzipusa))
	{
	
	document.getElementById("zip").value="";
	return false;
	}	
		
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
            
			 jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#corr_form").validationEngine();
            });
           
        </script>

<center>

<table width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="9px"></td>
					<td class="block_stroke" align="left">
					<table class="tab_header_bg_active" align="left" border="0" cellpadding="0" cellspacing="0">  <tbody><tr class="tab_header_bg_active" id="tab[]">    <td class="tab_header_left_active"></td>
					<td class="drawtab_header" valign="middle">Edit</td>
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
									
									
									<!--code added here-->
									
							
							<span style="color:#FF0000"><?=$_REQUEST['msg'] ?></span>
							
							
							<form name="fc_form" id="fc_form" enctype="multipart/form-data" method="post" action="includes/edit_fc_form_process.php?id=<?=$_REQUEST[id]?>">
			 <h2 align="center" >CENTRAL BANK OF BARBADOS</h2>
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border-top:#000000 2px solid;">
<tr>

  <?
   $query_sel_fc="select * from `fc_form` where id = '$_REQUEST[id]'";
   $res_sel_fc=mysql_query($query_sel_fc);
   $array_sel_fc=mysql_fetch_array($res_sel_fc)
  
   ?>



<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%"><h3>EXCHANGE CONTROL ACT,CAP 71</h3><span class="style5">Form FC (NOT FOR IMPORTS)<br />
	<span class="style5">APPLICATION FOR PURCHASE FOREIGN CURRENCY<span class="style5"></td>
    <td width="30%" valign="top" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid;border-left:#000000 2px solid"><span class="style5">&nbsp;Registry Number<span class="style5"><br /><br />
      &nbsp;
	<input type="text" name="registry_number" id="registry_number" value="<?=$array_sel_fc[registry_number]?>" size="25px" class="validate[required]" />	</td>
    <td width="26%" valign="top" style="border-bottom:#000000 2px solid;border-left:#000000 2px solid"><span class="style5">Approval Number<br /><br />
	&nbsp;&nbsp;<input type="text" name="approval_number" id="approval_number" value="<?=$array_sel_fc[approval_number]?>" size="20px " class="validate[required]" /><br /><br />
	<span class="style5"> &nbsp;FC<br />	</td>
  </tr>
  </table></td>
</tr>


<tr>
  <td colspan="3"  style="border-bottom:#000000 2px solid"><span class="style5"><br />1. To
  <input type="text" name="name_address_bank" id="name_address_bank" value="<?=$array_sel_fc[name_address_bank]?>" size="80px "/><br /><br />
  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
  <span class="style5">(Name and address of Bank to which appli8cation is addressed)  </td>
  </tr>
  
  
  <tr>
  <td colspan="3"  style="border-bottom:#000000 2px solid"><span class="style5">2. I/We the undersigned,here by apply for permission to purchase the undermentioned foreign currency:-<br /><br />  </td>
  </tr>
  
  
  
  <tr>
  <td colspan="3"  height="30px"><span class="style5">Name of applicant
  <input type="text" name="applicant_name" id="applicant_name" value="<?=$array_sel_fc[applicant_name]?>" size="70px " class="validate[required]" /><br />  </td>
  </tr>
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">Full Address
  <input type="text" name="address" id="address" value="<?=$array_sel_fc[address]?>" size="90px " class="validate[required]" /><br />  </td>
  </tr>
  
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">Nation Registration Number      (<span class="style5">INDIVIDUALS ONLY)
  <input type="text" name="reg_number" id="reg_number" value="<?=$array_sel_fc[reg_number]?>" size="70px " class="validate[required]" /><br />  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px" style="border-bottom:#000000 2px solid"><span class="style5">Company Registration Number      (<span class="style5">COMPANIES ONLY)
    <input type="text" name="company_reg" id="company_reg" value="<?=$array_sel_fc[company_reg]?>" size="40px " class="validate[required]" />
    <br />
  (see note 2)  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">3. Name of Beneficiary      
  <input type="text" name="name_beneficiary" id="name_beneficiary" value="<?=$array_sel_fc[	beneficiary]?>" size="70px " class="validate[required]" /><br />  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px" style="border-bottom:#000000 2px solid;"><span class="style5">Full Address    
  <input type="text" name="address_beneficiary" id="address_beneficiary" value="<?=$array_sel_fc[address_beneficiary]?>" size="90px " class="validate[required]"  /><br />  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">4. Name and amount of foreign currency    
  <input type="text" name="foreign_currency" id="foreign_currency" value="<?=$array_sel_fc[foreign_currency]?>" size="40px "/><br />  </td>
  </tr>


<tr>
  <td colspan="3" height="50px" style="border-bottom:#000000 2px solid;">Detail of exchange contact    
  <input type="text" name="exchange_contact" id="exchange_contact" value="<?=$array_sel_fc[exchange_contact]?>" size="40px "/><br />
 (<span class="style5">e.g.Draft,M.T,T.T, forward(stating period)or swap(stating periods and amount of purchase and sale)</span>)  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="50px" style="border-bottom:#000000 2px solid;"><span class="style5"><span class="style5">5. Purpose of payment </span>   
  <input type="text" name="payment_purpose" id="payment_purpose" value="<?=$array_sel_fc[payment_purpose]?>" style="width:450px"/><br />
 (<span class="style5">See overleaf for selection of appropriate box</span>)  </td>
  </tr>
  
  
 <!--<tr>
  <td  height="50px" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid" >6. I/We declare that the above statements are true and that the <br />foreign currency will be used solely for the purpose stated and <br />I/We knowledge that any permission given on this Form will<br />lapse if not utilized
  within 30 days from the date of authorization.
  
 
    
  </td>
  
  
  
  </tr>-->
  
  <!--6 no are begin-->
  <tr>
  <td>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" height="120px" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid"><span class="style8">6. I/We declare that the above statements are true and that the <br />
      foreign currency will be used solely for the purpose stated and <br />I/We knowledge that any permission given on this Form will<br />lapse if not utilized
  within 30 days from the date of authorization.</span></td>
    <td width="50%" height="70px" valign="top" style="border-bottom:#000000 2px solid;"><span class="style5">APPLICANT'S SIGNATURE</span> <br />
	&nbsp;<input type="text" name="applicant_signature" id="applicant_signature" value="<?=$array_sel_fc[applicant_signature]?>" size="40px " class="validate[required]" /><br /><br />
	
	<span class="style5">Date</span><input type="text" name="date" id="date" value="<?=$array_sel_fc[signature_date]?>" size="40px " class="slidedoormenu2 validate[required]" />
	&nbsp;&nbsp;<a name="Button" value="Cal" class="slidedoormenu2" onclick="displayCalendar(document.getElementById('date'),'yyyy-mm-dd',this)"><img src="images/calendar.gif" style="border:none" /></a>		</td>
  </tr>
</table>
  <td>  </tr>
  <!--6 no are ended-->
  
  <!--begin 7 no-->
  <tr>
   <td>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="34%" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid" height="150px" valign="top"><span class="style8">7. Stamp of Bank verifying the applicant's<br />
      signature and vouching for the accuracy<br />of the statements</span></td>
    <td width="31%" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid" height="150px" valign="top"><span class="style5">Approved by the central Bank of Barbados</span></td>
    <td width="35%" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid" height="150px" valign="top"><span class="style5">Stamp of  Bank executing the <br />transfer</span></td>
  </tr>
</table>   </td>
  </tr>
<!--7 no end-->

<!--begin 8 no-->
<tr>
 <td>
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="53%" height="140px" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid" valign="top"><br /><span class="style5">8. Amount Transferred    
      <input type="text" name="amount_transfer" id="amount_transfer" value="<?=$array_sel_fc[amount_transfer]?>" size="40px "/><br />
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style5">Foreign currency</span><br />
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="text" name="amount_transfer2" id="amount_transfer2" value="<?=$array_sel_fc[foreign_currency2]?>" size="40px "/>
	  <br />
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   <span class="style5">BDSS equivalent</span><br />
	   <span class="style5">Date Transferred <input type="text" name="date_transferred" id="date_transferred" value="<?=$array_sel_fc[date_transferred]?>" size="40px " class="slidedoormenu2 validate[required]"  />
	   &nbsp;&nbsp;<a name="Button" value="Cal" class="slidedoormenu2" onclick="displayCalendar(document.getElementById('date_transferred'),'yyyy-mm-dd',this)"><img src="images/calendar.gif" style="border:none" /></a>
	   
	   
	   <br />	  </td>
    <td width="47%" valign="top" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid"><B>FOR USE BY CENTRAL BANK OF BARBADOS</B></td>
  </tr>
</table> </td>
</tr>
<!--END 8 NO-->

<!--Download link code here start-->

<tr>
<td colspan="3" ><br /><h2>Download Files :</h2></td>
</tr>

<?
if($array_sel_fc['file1'] !="")
{
?>
<tr>
<td colspan="3" ><a href="includes/download.php?filename=<?=$array_sel_fc['file1']?>" ><h2 style="color:#0000FF"> 1. <?=$array_sel_fc[file1]?></h2> </a></td>
</tr>
<?
}
if($array_sel_fc['file2'] !="")
{
?>
<tr>
<td colspan="3" ><a href="includes/download.php?filename=<?=$array_sel_fc['file2']?>" ><h2 style="color:#0000FF"> 2. <?=$array_sel_fc[file2]?></h2> </a></td>
</tr>
<?
}
if($array_sel_fc['file3'] !="")
{
?>

<tr>
<td colspan="3" ><a href="includes/download.php?filename=<?=$array_sel_fc['file3']?>" ><h2 style="color:#0000FF"> 3. <?=$array_sel_fc[file3]?></h2> </a></td>
</tr>
<?
}
?>

<!--link code here end-->

<tr>
<td colspan="3"><span class="style8">N.B. Banks should lodge the forms with the <span class="style5">CENTRAL BANK OF BARBADOSas soon as possible after completion of the transfer <br /><span class="style5">CENTRAL BANK OF BARBADOS cannot undertake to return documents attached to form loged with them after execution</span><br /><br /><br /></td>
</tr>


 <tr>
    <td align="center"><input type="submit" name="submit" value="Update" class="button button-blue"/>
     <input type="reset" value="Reset" name="reset" class="button button-blue"/></td>
    <td >&nbsp;</td>
 </tr>
</table>

</form>	  
									
									
									
									
									
									<!--code end-->
									
									
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
<script type="text/javascript">
 function show_files()
{


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
		document.getElementById("show_files").innerHTML=ajaxRequest.responseText;	
		}
	}
	//var id = document.getElementById('txt_group').value;
	//alert(name)	
	ajaxRequest.open("GET", "includes/show_files.php?id=<?=$array_sel_u[id]?>", true);
	ajaxRequest.send(null); 
	

}
</script>


