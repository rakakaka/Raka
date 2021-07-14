<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($koneksi,"UPDATE kursus SET status = 'tidak aktif' WHERE id_cust='$id'");
mysqli_query($koneksi,"DELETE FROM customer WHERE id='$id'");



// mengalihkan halaman kembali ke index.php
header("location:daftar_cust.php?alert=berhasi_hapus");

?>