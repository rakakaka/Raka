<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$password = md5($_POST['password']);
$dibuat = date("Y-m-d");

     //masukin database
    
        $mashok = "UPDATE customer SET nik = '$nik', nama = '$nama', no_hp = '$no_hp', email = '$email', tempat_lahir = '$tempat_lahir',tgl_lahir = '$tgl_lahir' WHERE id = '$id'";
        $mashok1 = "UPDATE customer SET nik = '$nik', nama = '$nama', no_hp = '$no_hp', email = '$email', tempat_lahir = '$tempat_lahir',tgl_lahir = '$tgl_lahir',password = '$password' WHERE id = '$id'";


		if ($_POST['password'] == '') {
            mysqli_query($koneksi, $mashok);
			header("location:user.php?alert=berhasil_user-edit");
			
		}else{
            mysqli_query($koneksi, $mashok1);
			header("location:user.php?alert=berhasil_user-edit");
		}
	
			
		
	


 



