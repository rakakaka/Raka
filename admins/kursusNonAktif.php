<?php
include 'koneksi.php';
$id = $_GET['id_kursus'];
mysqli_query($koneksi, "UPDATE kursus SET kursus_status = 'tidak aktif' WHERE id_kursus = '$id'");
header("location:peserta_kursus.php?alert=berhasil_status");
?>