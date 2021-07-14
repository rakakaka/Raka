<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Hanyu</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>
<?php
include 'koneksi.php';

session_start();

$file = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['customer_status'])){

	// halaman yg dilindungi jika customer belum login
	$lindungi = array('user.php','logout.php','form_sudah_login.php','form_sudah_privat.php','form_sudah_bimbel.php');

	// periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
	if(in_array($file, $lindungi)){
		header("location:login.php?alert=harus_login");
	}

	if($file == "checkout.php"){
		header("location:masuk.php?alert=login-dulu");
	}

}else{

	// halaman yg tidak boleh diakses jika customer sudah login
	$lindungi = array('login.php','daftar.php');
	$lindungi1 = array('form_kursus.php');

    // periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
    if(in_array($file, $lindungi1)){
        header("location:form_sudah_login.php");
    }

	// periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
	if(in_array($file, $lindungi)){
		header("location:user.php?alert=sudah_login");
	}

}



if($file == "checkout.php"){


	if(!isset($_SESSION['keranjang']) || count($_SESSION['keranjang']) == 0){

		header("location:keranjang.php?alert=keranjang_kosong");

	}
}



?>
  
    <!--====== HEADER ONE PART START ======-->

    <header class="header-area">

        <div class="navbar-area navbar-one navbar-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand text-white" href="#">
                                <!-- <img src="assets/images/logo.svg" alt="Logo"> -->
                                Lembaga HANYU 
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll" href="index.php">Beranda</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="tentang.php">Tentang Kami</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="daftar_harga.php">Daftar Harga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="kontak.php">Kontak Kami</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <ul>
                                <?php 
                                    if(isset($_SESSION['customer_status'])){
                                        $id_customer = $_SESSION['id'];
                                        $customer = mysqli_query($koneksi,"SELECT * FROM customer WHERE id='$id_customer'");
                                        $c = mysqli_fetch_assoc($customer);
                                        ?>
                                            <li><a class="light" href="user.php"><i class="fa fa-user" aria-hidden="true"></i> <?= $c['nama']; ?></a></li>
                                            <li><a class="light" href="logout.php"><i class="fa fa-user" aria-hidden="true"></i> Logout</a></li>
                                       <?php } else {?>
                                        <li><a class="light" href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login / Daftar</a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
