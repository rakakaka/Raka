<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "UPDATE admin SET status = 'aktif' WHERE id = '$id'");
header("location:daftar_user.php?alert=berhasil_status");
?>