<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Hanyu</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    
</head>

<body>
<?php
include 'koneksi.php';

session_start();

$file = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['admin_status'])){

	// halaman yg dilindungi jika customer belum login
	$lindungi = array('index.php','peserta_bimbel.php','peserta_kursus.php','peserta_privat.php','form_sudah_bimbel.php','');

	// periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
	if(in_array($file, $lindungi)){
		header("location:login.php?alert=harus_login");
	}

	if($file == "checkout.php"){
		header("location:masuk.php?alert=login-dulu");
	}

}else{

	// halaman yg tidak boleh diakses jika customer sudah login
	$lindungi = array('login.php');
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

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <h3 class="text-white">Admin Page</h3>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="index.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Daftar Konten</li>
                    <?php 
                    if(isset($_SESSION['admin_status'])){
                        $id_customer = $_SESSION['id'];
                        $akses = $_SESSION['akses'];
                        ?>

                        <?php if ($akses == '1') {?>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Kursus</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="peserta_kursus.php">Peserta Kursus</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Privat</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="peserta_privat.php">Peserta Privat</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Bimbel</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="peserta_bimbel.php">Peserta Bimbel</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Laporan</li>
                    <li>
                        <a href="daftar_user.php" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Daftar Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="daftar_cust.php" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Daftar Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="laporanTgl.php" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Laporan Per tanggal</span>
                        </a>
                    </li>
                                       <?php }elseif ($akses == '2'){?>
                                        <li>
                                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                                <i class="icon-graph menu-icon"></i> <span class="nav-text">Kursus</span>
                                            </a>
                                            <ul aria-expanded="false">
                                                <li><a href="peserta_kursus.php">Peserta Kursus</a></li>
                                            </ul>
                                        </li>
                                      <?php }elseif ($akses == '3') {?>
                                        <li>
                                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                                <i class="icon-graph menu-icon"></i> <span class="nav-text">Privat</span>
                                            </a>
                                            <ul aria-expanded="false">
                                                <li><a href="peserta_privat.php">Peserta Privat</a></li>
                                            </ul>
                                        </li>
                                        <?php }elseif ($akses == '4'){ ?>
                                            <li>
                                                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                                    <i class="icon-graph menu-icon"></i> <span class="nav-text">Bimbel</span>
                                                </a>
                                                <ul aria-expanded="false">
                                                    <li><a href="peserta_bimbel.php">Peserta Bimbel</a></li>
                                                </ul>
                                            </li>
                                        <?php }} ?>
                    
                   
                  
                
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->