<?php
	require_once 'db/connection.php';
	
	$location = site_url().'login.php';
	session_start();
	session_unset(); 
	session_destroy(); 
	
	header("Location:".$location);


