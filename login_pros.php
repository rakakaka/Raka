<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM customer WHERE username='$username' AND password='$password' AND token='1'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);

	// hapus session yg lain, agar tidak bentrok dengan session customer
	unset($_SESSION['id']);
	unset($_SESSION['nama']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);
	unset($_SESSION['pilihan']);

	// buat session customer
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['pilihan'] = $data['pilihan'];
	$_SESSION['customer_status'] = "login";
	header("location:user.php?alert=berhasil_login");
}else{
	header("location:login.php?alert=gagal_aja");
}
