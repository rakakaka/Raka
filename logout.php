<?php 

include 'koneksi.php';

session_start();

unset($_SESSION['id']);
unset($_SESSION['customer_status']);


header("location:login.php");
?>