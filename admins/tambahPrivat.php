<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id_cust = $_POST['id_cust'];
$kursus_cust = $_POST['kursus_cust'];
$kursus_pilihan = 'privat';
$kursus_ptingkatan = $_POST['tingkatan'];
$kursus_phari = $_POST['hari'];
$kursus_pjam = $_POST['jam'];
$kursus_pharga = str_replace(["Rp.","."],"",$_POST['kursus_harga']);
$kursus_bukti = $_POST['kursus_bukti'];
$dibuat = date("Y-m-d");
$kursus_status = 'aktif';

$rand = $dibuat;
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['kursus_bukti']['name'];
$ukuran = $_FILES['kursus_bukti']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
   //masukin database
   if(!in_array($ext,$ekstensi) ) {
	header("location:peserta_kursus.php?alert=gagal_ekstensi");
}else{

	if($ukuran < 1044070){		

     //masukin database
        $kursus_bukti = $rand.'_'.$filename;
        move_uploaded_file($_FILES['kursus_bukti']['tmp_name'], '../assets/images/'.$kursus_bukti);
        $mashok = "INSERT INTO kursus VALUES (NULL, '$id_cust','$kursus_cust','$kursus_pilihan','$kursus_ptingkatan','$kursus_phari','$kursus_pjam','$kursus_pharga','$kursus_bukti','$dibuat','$dibuat','$kursus_status')";


		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:peserta_privat.php?alert=berhasil_user-edit");
			
		}else{
			header("location:peserta_privat.php?alert=gagal_user-edit");
		}
    }
}		
		
	


 



