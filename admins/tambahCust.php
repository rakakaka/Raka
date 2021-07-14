<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id_cust = $_POST['id_cust'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$token = '1';
$dibuat = date("Y-m-d");



		$mashok = "INSERT INTO customer VALUES(NULL,'$nik','$nama','$no_hp','$email','$tempat_lahir','$tgl_lahir','$username','$password','$token','$dibuat')";
		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:daftar_cust.php?alert=berhasil_daftar_cust");
		}
			
		
	



 



