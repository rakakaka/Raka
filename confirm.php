<?php
include 'koneksi.php';
$token = $_GET['token'];
$email = $_GET['email'];
mysqli_query($koneksi, "UPDATE customer SET token = '1' WHERE email = '$email'");
header("location:login.php?alert=berhasil_confirm");
?>