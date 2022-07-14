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
                jQuery("#fc_form_edit").validationEngine();
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
							
							
							<form name="fc_form_edit" id="fc_form_edit" enctype="multipart/form-data" method="post" action="includes/edit_fc_form_process.php?id=<?=$_REQUEST[id]?>">
			 <h2 align="center" >CENTRAL BANK OF BARBADOS</h2>
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border-top:#000000 2px solid;">
<tr>

<?
   $query_sel_fc="select * from `fc_form` where id = '$_REQUEST[id]'";
   $res_sel_fc=mysql_query($query_sel_fc);
   $array_sel_fc=mysql_fetch_array($res_sel_fc)
  
   ?>






<td width="84%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" width="44%" align="center"><h3>EXCHANGE CONTROL ACT,CAP 71</h3><span class="style5">Form FC (NOT FOR IMPORTS)<br />
	<span class="style5">APPLICATION FOR PURCHASE FOREIGN CURRENCY<span class="style5"></td>
  </tr>
  </table></td>
</tr>


<tr>
  <td colspan="3"  style="border-bottom:#000000 2px solid"><span class="style5"><br />1. To
 	 <select name="dealer" id="dealer" class="validate[required]">
											 <option value="">Name of Authorized Dealer </option>
											 <?php
											 $sql_dealer=mysql_query("select * from dealer order by name");
											 while($res_dealer=mysql_fetch_array($sql_dealer))
											 {
											 ?>
											 <option value="<?=$res_dealer[id]?>" <? if($array_sel_fc[dealer]==$res_dealer[id]){?> selected="selected" <? }?>><?=$res_dealer[name]?></option>
											 <?php
											 }
											 ?>
											 </select><br /><br />
  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
  <span class="style5">(Name and address of Bank to which application is addressed)  </td>
  </tr>
  
  
  <tr>
  <td colspan="3"  style="border-bottom:#000000 2px solid"><span class="style5">2. I/We the undersigned,here by apply for permission to purchase the undermentioned foreign currency:-<br /><br />  </td>
  </tr>
  
  
  
  <tr>
  <td colspan="3"  height="30px"><span class="style5">Name of applicant</span>
  <input type="text" name="applicant_name" id="applicant_name" value="<?=$array_sel_fc[applicant_name]?>" size="70px " class="validate[required]" /><br />  </td>
  </tr>
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">Full Address</span>
  <input type="text" name="address" id="address" value="<?=$array_sel_fc[address]?>" size="90px " class="validate[required]" /><br />  </td>
  </tr>
  <script type="text/javascript">
		function check_radio(){
		//alert("kk");
		if(document.getElementById('radio7').checked==true)
		{
		//alert("kk11");
		document.getElementById('r1').style.display="";
		document.getElementById('r2').style.display="none";
		}
		
		if(document.getElementById('radio8').checked==true)
		{
		document.getElementById('r1').style.display="none";
		document.getElementById('r2').style.display="";
		}
		
		}
		
		</script>
  
  
  <tr>
  <td  height="30px"><input type="radio" name="radio7" id="radio7" value="1" onclick="check_radio()" <? if($array_sel_fc[reg_number]!=""){ ?> checked="checked"<? }?>/><span class="style5">Nation Registration Number </span>     (<span class="style5">INDIVIDUALS ONLY)</span>
  <br />  </td>
  <td colspan="2" >     </td>
    </tr> 
	
	<tr id="r1" style="display:<? if($array_sel_fc[reg_number]!=""){ ?><? }else{?>none<? }?>" >
  
  <td colspan="3" ><input type="text" name="reg_number" id="reg_number" value="<?=$array_sel_fc[reg_number]?>" size="30px " class="validate[required]" />
  <span class="style5">&nbsp;Country  </span>   
  
    <select name="countries_reg" id="countries_reg" class="validate[required]" style="width:120px">
      <option value="">Countries </option>
      <?php
											 $sql_country=mysql_query("select * from country  order by name");
											 while($res_country=mysql_fetch_array($sql_country))
											 {
											 ?>
      <option value="<?=$res_country[id]?>" <? if($array_sel_fc[countries_reg]==$res_country[id]){?> selected="selected" <? }?>>
        <?=$res_country[name]?>
        </option>
      <?php
											 }
											 ?>
    </select> <br /><br />    </td>
  
    </tr>
  
  
  <tr>
  <td  height="30px" ><input type="radio" name="radio7" id="radio8" value="1" onclick="check_radio()" <? if($array_sel_fc[company_reg]!=""){ ?> checked="checked"<? }?>/><span class="style5">Company Registration Number </span>     (<span class="style5">COMPANIES ONLY)</span>
  <br />
  (see note 2)  </td>
  
  
  
  <td colspan="2">   </td>
  </tr>
  
  <tr id="r2" style="display:<? if($array_sel_fc[company_reg]!=""){ ?><? }else{?>none<? }?>">
  
  <td colspan="3" style="border-bottom:#000000 2px solid"><input type="text" name="company_reg" id="company_reg" value="" size="30px " class="validate[required]" /><span class="style5">Country  </span>   
  
    <select name="countries_comp" id="countries_comp " class="validate[required]" style="width:120px">
      <option value="">Countries </option>
      <?php
											 $sql_country=mysql_query("select * from country  order by name");
											 while($res_country1=mysql_fetch_array($sql_country))
											 {
											 ?>
      <option value="<?=$res_country1[id]?>" <? if($array_sel_fc[countries_comp]==$res_country1[id]){?> selected="selected" <? }?>>
        <?=$res_country1[name]?>
        </option>
      <?php
											 }
											 ?>
    </select><br /><br /></td>
    </tr>
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">3. Name of Beneficiary  
    <input type="text" name="name_beneficiary" id="name_beneficiary" value="<?=$array_sel_fc[name_beneficiary]?>" size="70px " class="validate[required]" />
    <br />  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px" style="border-bottom:#000000 2px solid;"><span class="style5">Full Address    
  <input type="text" name="address_beneficiary" id="address_beneficiary" value="<?=$array_sel_fc[address_beneficiary]?>" size="90px " class="validate[required]"  /><br />  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5">4.	Name of foreign currency </span>  
  <select name="foreign_currency" id="foreign_currency"  class="validate[required]" style="width:120px">
      <option value="">currency </option>
      <?php
											 $sql_currency=mysql_query("select * from  foreign_currency  order by name");
											 while($res_currency=mysql_fetch_array( $sql_currency))
											 {
											 ?>
      <option value="<?=$res_currency[id]?>" <? if($array_sel_fc[foreign_currency]==$res_currency[id]){?> selected="selected" <? }?>>
        <?=$res_currency[name]?>
        </option>
      <?php
											 }
											 ?>
        
      
    </select><br />  </td>
  </tr>

  
  
  
  
  
  <tr>
  <td colspan="3" height="30px"><span class="style5"> Amount     
  <input type="text" name="foreign_amount" id="foreign_amount" value="<?=$array_sel_fc[foreign_amount]?>" size="40px "/><br />  </td>
  </tr>


<tr>
  <td colspan="3" height="50px" style="border-bottom:#000000 2px solid;">Detail of exchange contact    
  <select name="exchange_contact" id="exchange_contact"  class="validate[required]" style="width:120px">
      <option value="">contact </option>
      <?php
											 $sql_contact=mysql_query("select * from  exchange_contact  order by contact");
											 while($res_contact=mysql_fetch_array( $sql_contact))
											 {
											 ?>
      <option value="<?=$res_contact[id]?>" <? if($array_sel_fc[exchange_contact]==$res_contact[id]){?> selected="selected" <? }?>>
        <?=$res_contact[contact]?>
        </option>
      <?php
											 }
											 ?>
        
      
    </select><br />
 (<span class="style5">e.g.Draft,M.T,T.T, forward(stating period)or swap(stating periods and amount of purchase and sale)</span>)  </td>
  </tr>
  
  
  <tr>
  <td colspan="3" height="50px" style="border-bottom:#000000 2px solid;"><span class="style5">
    <p><span class="style5">5. Purpose of payment </span>
   <select name="purpose_payment" id="purpose_payment"  class="validate[required]" style="width:120px">
      <option value="">select </option>
      
      <option value="For Imports Only" <? if($array_sel_fc[purpose_payment]=='For Imports Only'){?> selected="selected" <? }?>>For Imports Only </option>
	   <option value="Other Purposes" <? if($array_sel_fc[purpose_payment]=='Other Purposes'){?> selected="selected" <? }?>>Other Purposes </option>
      </select><br />
      (<span class="style5">See overleaf for selection of appropriate box</span>)  </p></td>
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
    <td width="55%" height="120px" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid"><span class="style8">6. I/We declare that the above statements are true and that the foreign currency will be used solely for the purpose stated and  that any permission given on this Form will
lapse if not utilized within ten (10)working days from the date of authorization.
</span></td>
    <td width="45%" height="70px" valign="top" style="border-bottom:#000000 2px solid;"><span class="style5"><br />APPLICANT'S SIGNATURE</span> <br />
	&nbsp;<input type="text" name="applicant_signature" id="applicant_signature" value="<?=$array_sel_fc[applicant_signature] ?>" size="40px " class="validate[required]" /><br /><br />
	
	<span class="style5">Date</span><input type="text" name="date" id="date" value="<?=$array_sel_fc[date] ?>" size="40px " class="slidedoormenu2 validate[required]" />
	&nbsp;&nbsp;<a name="Button" value="Cal" class="slidedoormenu2" onclick="displayCalendar(document.getElementById('date'),'yyyy-mm-dd',this)"><img src="images/calendar.gif" style="border:none" /></a>		</td>
  </tr>
</table>
  <td width="16%" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid"></td>
  </tr>
  <!--6 no are ended-->
  
  



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




<!--begin 8 no-->
<tr>
 <td>
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="55%" height="140px"  valign="top"><br />
	<span class="style5">For Use by Members Only</span> <br /><br />
	<span class="style5">8. Amount Transferred </span>   
      <input type="text" name="amount_transfer" id="amount_transfer" value="<?=$array_sel_fc[ amount_transfer] ?>" size="40px "/><br />
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style5">Foreign currency</span><br />
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="text" name="amount_transfer2" id="amount_transfer2" value="<?=$array_sel_fc[ amount_transfer2] ?>" size="40px "/>
	  <br />
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   <span class="style5">BDSS equivalent</span><br />
	   <span class="style5">Date Transferred <input type="text" name="date_transferred" id="date_transferred" value="<?=$array_sel_fc[date_transferred] ?>" size="40px " class="slidedoormenu2 validate[required]"  />
	   &nbsp;&nbsp;<a name="Button" value="Cal" class="slidedoormenu2" onclick="displayCalendar(document.getElementById('date_transferred'),'yyyy-mm-dd',this)"><img src="images/calendar.gif" style="border:none" /><br /></a>
	   <span><br />Form Approved approved by</span><br />
	      <span><br />Authorized by Authorized Dealer – List</span><br />
	   
	   <br /><br />	  </td>
   <!--<td width="45%" valign="top" style="border-bottom:#000000 2px solid;border-right:#000000 2px solid"><B>FOR USE BY CENTRAL BANK OF BARBADOS</B></td>-->
  </tr>
</table> </td>
</tr>
<!--END 8 NO-->

<!--Radio box start here-->
<tr>
  <td colspan="3" height="30px"><span class="style5">   
  <input type="radio" name="radio" id="radio1" value="1" <? if($array_sel_fc[status]=='1') {?> checked <? }?>/> Approval Recommended  
   <input type="radio" name="radio" id="radio2" value="2" <? if($array_sel_fc[status]=='2') {?> checked <? }?>/> Approved
   <input type="radio" name="radio" id="radio3" value="3" <? if($array_sel_fc[status]=='3') {?> checked <? }?>/> Not approved 
   <input type="radio" name="radio" id="radio4" value="4" <? if($array_sel_fc[status]=='4') {?> checked <? }?>/>Information Required
  
  </td>
  </tr>


<!--Radio box end here-->

<!--security code start-->
<tr>
<td colspan="3"><br /><h3><span style="vertical-align:top">Security code</span>   <img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
											  <input name="security_code" type="text" id="security_code" size="40"  class="validate[required]"/> </h3></td>
</tr>



<!--security code end-->

 <tr>
    <td align="center"><br /><br /><input type="submit" name="submit" value="Update" class="button button-blue"/>
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


