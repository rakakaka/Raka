<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password' AND status='aktif'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);

    if ($data['status'] == 'tidak aktif') {
        header("location:index.php?alert=gagal_gaktif");

    } else {

	// hapus session yg lain, agar tidak bentrok dengan session customer
	unset($_SESSION['id']);
	unset($_SESSION['nama_admin']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);
	unset($_SESSION['akses']);

	// buat session customer
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama_admin'] = $data['nama_admin'];
	$_SESSION['akses'] = $data['akses'];
	$_SESSION['admin_status'] = "login";
	header("location:index.php?alert=berhasil_login");
}

}else{
	header("location:login.php?alert=gagal_login");
}