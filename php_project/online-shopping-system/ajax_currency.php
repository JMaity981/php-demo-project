<?php
session_start();
//if(!isset($_SESSION['currency'])){ $_SESSION['currency']='USD';}
include('admin/config.php');
$code=$_POST['code'];
$_SESSION['currency']=$code;

?>