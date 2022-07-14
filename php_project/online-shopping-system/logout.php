<?php
session_start();
unset($_SESSION['user_id1']);
unset($_SESSION['user_name']);
header('location:login.php');
?>