<!DOCTYPE html>
<html>
<head>
  <title>Laporan Penjualan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
    <img src="../assets/images/hanyul.png" alt="">
    </div>
    <div class="col-md-4">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 text-center">华 语 培 训 中 心</div>
      <div class="col-md-12 text-center">LEMBAGA BAHASA MANDARIN</div>
      <div class="col-md-12 text-center">PONDOK UNGU PERMAI BLOK CC4 NO.18 – BEKASI</div>
      <div class="col-md-12 text-center">Telp. (021) 9128 8643 / 0813 8908 53337</div>
    </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>

<hr style="border:20px;">
<div class="container">
  <?php
include 'koneksi.php';
if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    ?>
  <br/>

  <table class="">
    <tr>
      <td width="20%">DARI TANGGAL</td>
      <td width="1%">:</td>
      <td><?php echo $tgl_dari; ?></td>
    </tr>
    <tr>
      <td>SAMPAI TANGGAL</td>
      <td>:</td>
      <td><?php echo $tgl_sampai; ?></td>
    </tr>
  </table>

  <table class="">
    <tr>
    <?php
include 'koneksi.php';
    $no = 1;
    $sql2 = mysqli_query($koneksi, "SELECT SUM(kursus_harga) AS value_sum FROM kursus WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
    $sql1 = mysqli_fetch_array($sql2);
    ?>
      <td width="20%">TOTAL PENDAPATAN</td>
      <td width="1%">:</td>
      <td>Rp <?=number_format($sql1['value_sum'], 0, ",", ".");?></td>
    </tr>
    <tr>
    <?php
include 'koneksi.php';
    $no = 1;
    $sql2 = mysqli_query($koneksi, "SELECT * FROM customer WHERE date(dibuat) >= '$tgl_dari' AND date(dibuat) <= '$tgl_sampai'");
    $sql1 = mysqli_num_rows($sql2);
    ?>
      <td>JUMLAH Pendaftar</td>
      <td>:</td>
      <td><?php echo $sql1; ?> Orang</td>
    </tr>
  </table>
</div>

  <br/>
<div class="container">
  <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>ID CUSTOMER</th>
                    <th>NAMA CUSTOMER</th>
                    <th>PROGRAM PILIHAN</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM kursus WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
    while ($i = mysqli_fetch_array($data)) {
        ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?=date('d-m-Y', strtotime($i['tanggal_dibuat']));?></td>
                      <td>CUST-00<?=$i['id_cust']?></td>
                      <td><?=$i['kursus_cust']?></td>
                      <td><?=$i['kursus_pilihan']?></td>
                      <td>
                        <?php
if ($i['kursus_status'] == 'aktif') {
            echo "<span class='badge bg-info text-white'>Aktif</span>";
        } elseif ($i['invoice_status'] == 1) {
            echo "<span class='badge bg-danger text-white'>Tidak Aktif</span>";
        }?>
                      </td>
                    </tr>
                    <?php
}
    ?>
                </tbody>
              </table>
            </div>
          </div>
<div style="text-align: right; margin-right:120px;">
<span>Bekasi, <?= date("d-m-Y") ?></span>
<br><br>
<span>Admin Hanyu</span>
<br>
<span> Nina Puspadiana</span>
</div>




<?php
} else {
    ?>

<div class="alert alert-info text-center">
  Silahkan Filter Laporan Terlebih Dulu.
</div>

<?php
}
?>
</body>


<script>
  window.print();
</script>

</html>