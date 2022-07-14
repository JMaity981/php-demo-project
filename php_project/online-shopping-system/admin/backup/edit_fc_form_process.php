<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);

$update_query="UPDATE `fc_form` SET `registry_number` = '$registry_number',
`approval_number` = '$approval_number',
`name_address_bank` = '$name_address_bank',
`applicant_name` = '$applicant_name',
`address` = '$address',
`reg_number` = '$reg_number',
`company_reg` = '$company_reg',
`beneficiary` = '$name_beneficiary',
`address_beneficiary` = '$address_beneficiary',
`foreign_currency` = '$foreign_currency',
`exchange_contact` = '$exchange_contact',
`payment_purpose` = '$payment_purpose',
`applicant_signature` = '$applicant_signature',
`signature_date` = '$date',
`amount_transfer` = '$amount_transfer',
`foreign_currency2` = '$amount_transfer2',
`date_transferred` = '$date_transferred' WHERE `id` = '$_REQUEST[id]'";


//new update code below 

$update_query="";


$res_query=mysql_query($update_query);

header("location:../index.php?module=edit_fc_form&header=edit&msg=Update Successfully&id=$_REQUEST[id]");

?>
