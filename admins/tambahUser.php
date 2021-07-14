<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$nama_admin = $_POST['nama_admin'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$akses = $_POST['akses'];
$status = $_POST['status'];
$dibuat = date("Y-m-d");

     //masukin database

		$mashok = "INSERT INTO admin VALUES(NULL,'$nama_admin','$username','$password','$akses','$status','$dibuat','$dibuat')";

		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:daftar_user.php?alert=berhasil_user");
			
		}else{
			header("location:daftar_user.php?alert=gagal_user");
		}
	
			
		
	


 



