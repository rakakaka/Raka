<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id = $_POST['id'];
$nama_admin = $_POST['nama_admin'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$akses = $_POST['akses'];
$status = $_POST['status'];
$dibuat = date("Y-m-d");

     //masukin database
     if ($_POST['password'] == '') {
        $mashok = "UPDATE admin SET nama_admin = '$nama_admin', username = '$username', akses = '$akses', status = '$status', tanggal_diupdate = '$dibuat' WHERE id = '$id'";

     } else {
		$mashok = "UPDATE admin SET nama_admin = '$nama_admin', username = '$username', password = '$password', akses = '$akses', status = '$status', tanggal_diupdate = '$dibuat' WHERE id = '$id'";

     }


		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:daftar_user.php?alert=berhasil_user-edit");
			
		}else{
			header("location:daftar_user.php?alert=gagal_user-edit");
		}
	
			
		
	


 



