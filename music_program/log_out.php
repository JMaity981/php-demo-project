<?php
	include("config.php");
	unset($_SESSION['username']);
	header("location:index.php");
?>