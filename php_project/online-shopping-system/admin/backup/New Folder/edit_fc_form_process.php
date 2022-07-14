<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);


//new update code below 

if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
{

$update_query="UPDATE `fc_form` SET `dealer` = '$dealer',
`applicant_name` = '$applicant_name',
`address` = '$address',
`reg_number` = '$reg_number',
`countries_reg` = '$countries_reg',
`company_reg` = '$company_reg',
`countries_comp` = '$countries_comp',
`name_beneficiary` = '$name_beneficiary',
`address_beneficiary` = '$address_beneficiary',
`foreign_currency` = '$foreign_currency',
`foreign_amount` = '$foreign_amount',
`exchange_contact` = '$exchange_contact',
`purpose_payment` = '$purpose_payment',
`applicant_signature` = '$applicant_signature',
`date` = '$date',
`amount_transfer` = '$amount_transfer',
`amount_transfer2` = '$amount_transfer2',
`date_transferred` = '$date_transferred',
`status` = '$radio'
 WHERE `id` ='$_REQUEST[id]'";


$res_query=mysql_query($update_query);

// code for approve

 $sql_pro2="select * from fc_form where id='$_REQUEST[id]'";
$query_pro2 = mysql_query($sql_pro2);
$res_pro2=mysql_fetch_array($query_pro2);

 $sql_pro="select * from user where id='$res_pro2[user_id]'";
$query_pro = mysql_query($sql_pro);
$res_pro=mysql_fetch_array($query_pro);

 $sql_pro1="select * from users where id='1'";
$query_pro1 = mysql_query($sql_pro1);
$res_pro1=mysql_fetch_array($query_pro1);

if($_REQUEST[radio]=='2')
{

//Mail code below



$mail_to=$res_pro[email];


									$mail_from=$res_pro1[email];
									
									//$mail_to=$res_course[email];
									$mail_sub="Feecd:FC Form";
									
									$mail_mesg = '';
									$mail_mesg .="FC Form is approved";
									
									
									$mail_mesg .="\n";
									
									$headers = "MIME-Version: 1.0\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\n";
									$headers .= "From: Feecd <".$mail_from.">". "\r\n";		
									
							    	mail($mail_to,$mail_sub,$mail_mesg,$headers);


}



// code for Not approved 

if($_REQUEST[radio]=='3')
{

//Mail code below


$mail_to=$res_pro[email];


									$mail_from=$res_pro1[email];
									
									//$mail_to=$res_course[email];
									$mail_sub="Feecd:FC Form";
									
									$mail_mesg = '';
									$mail_mesg .="FC Form is Not approved ";
									
									
									$mail_mesg .="\n";
									
									$headers = "MIME-Version: 1.0\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\n";
									$headers .= "From: Feecd <".$mail_from.">". "\r\n";		
									
							    	mail($mail_to,$mail_sub,$mail_mesg,$headers);


}



// code for Information Required

if($_REQUEST[radio]=='4')
{

//Mail code below


$mail_to=$res_pro[email];


									$mail_from=$res_pro1[email];
									
									//$mail_to=$res_course[email];
									$mail_sub="Feecd:FC Form";
									
									$mail_mesg = '';
									$mail_mesg .="FC Form is Information Required ";
									
									
									$mail_mesg .="\n";
									
									$headers = "MIME-Version: 1.0\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\n";
									$headers .= "From: Feecd <".$mail_from.">". "\r\n";		
									
							    	mail($mail_to,$mail_sub,$mail_mesg,$headers);


}




header("location:../index.php?module=edit_fc_form&header=edit&msg=Update Successfully&id=$_REQUEST[id]");
}
?>
