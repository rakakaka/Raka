<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id = $_POST['id_kursus'];
$kursus_cust = $_POST['kursus_cust'];
$kursus_ptingkatan = $_POST['tingkatan'];
$kursus_phari = $_POST['hari'];
$kursus_pjam = $_POST['jam'];
$dibuat = date("Y-m-d");

     //masukin database
    
        $mashok = "UPDATE kursus SET kursus_cust = '$kursus_cust', kursus_ptingkatan = '$kursus_ptingkatan', kursus_phari = '$kursus_phari', kursus_pjam = '$kursus_pjam', tanggal_diupdate = '$dibuat' WHERE id_kursus = '$id'";


		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:peserta_kursus.php?alert=berhasil_user-edit");
			
		}else{
			header("location:peserta_kursus.php?alert=gagal_user-edit");
		}
	
			
		
	


 



