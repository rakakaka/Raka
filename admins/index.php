 <?php include 'header.php'?>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                <div class="col-lg-12 col-sm-6">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Hai <?= $_SESSION['nama_admin']; ?></h1><hr>
                            <p class="lead">Kamu login sebagai : <span class="badge badge-info badge-xl">
                                <?php if ($_SESSION['akses'] == '1') {
                                    echo 'Admin';
                                } elseif ($_SESSION['akses'] == '2') {
                                    echo 'Guru Kursus';
                                } elseif ($_SESSION['akses'] == '3') {
                                    echo 'Guru Privat';
                                } elseif ($_SESSION['akses'] == '4') {
                                    echo 'Guru Bimbel';
                                }?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <canvas id="myChart"></canvas>
                </div>
                <?php if ($_SESSION['akses'] == '1') {?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total User</h3>
                                <div class="d-inline-block">
                                <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql2 = mysqli_query($koneksi,"SELECT * FROM admin");
                                    $sql1 = mysqli_num_rows($sql2);
                                    ?>
                                    <h2 class="text-white"><?= $sql1 ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pendapatan</h3>
                                <div class="d-inline-block">
                                <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql2 = mysqli_query($koneksi,"SELECT SUM(kursus_harga) AS value_sum FROM kursus");
                                    $sql1 = mysqli_fetch_array($sql2);
                                    ?>
                                    <h2 class="text-white">Rp <?= number_format($sql1['value_sum'],0,",","."); ?></h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5">Rp</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Murid</h3>
                                <div class="d-inline-block">
                                <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql2 = mysqli_query($koneksi,"SELECT * FROM customer");
                                    $sql1 = mysqli_num_rows($sql2);
                                    ?>
                                    <h2 class="text-white"><?= $sql1 ?></h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                                <?php } elseif ($_SESSION['akses'] == '2') {?>
                                    <div class="col-lg-12 col-sm-6">
                                        <div class="card gradient-1">
                                            <div class="card-body">
                                                <h3 class="card-title text-white">Total Murid</h3>
                                                <div class="d-inline-block">
                                                <?php
                                                    include 'koneksi.php';
                                                    $no = 1;
                                                    $sql2 = mysqli_query($koneksi,"SELECT * FROM kursus WHERE kursus_pilihan = 'kursus'");
                                                    $sql1 = mysqli_num_rows($sql2);
                                                    ?>
                                                    <h2 class="text-white"><?= $sql1 ?></h2>
                                                </div>
                                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                                            </div>
                                        </div>
                                    </div>
                              <?php  } elseif ($_SESSION['akses'] == '3') {?>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="card gradient-1">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Total Murid</h3>
                                            <div class="d-inline-block">
                                            <?php
                                                include 'koneksi.php';
                                                $no = 1;
                                                $sql2 = mysqli_query($koneksi,"SELECT * FROM kursus WHERE kursus_pilihan = 'privat'");
                                                $sql1 = mysqli_num_rows($sql2);
                                                ?>
                                                <h2 class="text-white"><?= $sql1 ?></h2>
                                            </div>
                                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                                        </div>
                                    </div>
                                </div>
                               <?php } elseif ($_SESSION['akses'] == '4') {?>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="card gradient-1">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Total Murid</h3>
                                            <div class="d-inline-block">
                                            <?php
                                                include 'koneksi.php';
                                                $no = 1;
                                                $sql2 = mysqli_query($koneksi,"SELECT * FROM kursus WHERE kursus_pilihan = 'bimbel'");
                                                $sql1 = mysqli_num_rows($sql2);
                                                ?>
                                                <h2 class="text-white"><?= $sql1 ?></h2>
                                            </div>
                                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                    
                    
                    



                </div>

                
            </div>
            <!-- #/ container -->
        </div>
        <?php 
            include '../koneksi.php';
        ?>
        <script>
           	var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Program Bimbel", "Program Kursus", "Program Privat"],
				datasets: [{
					label: 'Jumlah Siswa Berdasarkan Program Pilihan',
					data: [
					<?php include 'koneksi.php';
					$jumlah_teknik = mysqli_query($koneksi,"SELECT * FROM kursus where kursus_pilihan='bimbel'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php include 'koneksi.php';
					$jumlah_ekonomi = mysqli_query($koneksi,"SELECT * FROM kursus where kursus_pilihan='kursus'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php include 'koneksi.php';
					$jumlah_fisip = mysqli_query($koneksi,"SELECT * FROM kursus where kursus_pilihan='privat'");
					echo mysqli_num_rows($jumlah_fisip);
					?>,
                    10],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
            </script>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include 'footer.php' ?>