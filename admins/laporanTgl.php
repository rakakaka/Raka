<?php include 'header.php'; ?>

<div class="content-body">
<div class="container-fluid">
    <div class="row">
    <section class="col-lg-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Filter Laporan</h3>
        </div>
        <div class="box-body">
          <form method="get" action="">
            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>Mulai Tanggal</label>
                  <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <br/>
                  <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-primary">
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Laporan Pendaftaran Customer</h3>
        </div>
        <div class="box-body">

          <?php 
          if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
            $tgl_dari = $_GET['tanggal_dari'];
            $tgl_sampai = $_GET['tanggal_sampai'];
            include 'koneksi.php';
            $sql2 = mysqli_query($koneksi,"SELECT SUM(kursus_harga) AS value_sum FROM kursus WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
            $sql1 = mysqli_fetch_array($sql2);
            $sql3 = mysqli_query($koneksi,"SELECT * FROM customer WHERE date(dibuat) >= '$tgl_dari' AND date(dibuat) <= '$tgl_sampai'");
            $sql4 = mysqli_num_rows($sql3);
    
            ?>

            <div class="row">
              <div class="col-lg-6">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">DARI TANGGAL</th>
                    <th width="1%">:</th>
                    <td><?php echo $tgl_dari; ?></td>
                  </tr>
                  <tr>
                    <th>SAMPAI TANGGAL</th>
                    <th>:</th>
                    <td><?php echo $tgl_sampai; ?></td>
                  </tr>
                </table>
                
              </div>

              <div class="col-lg-6">
                <table class="table table-bordered">
                  <tr>
                    <th width="36%">TOTAL PENDAPATAN</th>
                    <th width="1%">:</th>
                    <td><b class="text-danger">Rp <?= number_format($sql1['value_sum'],0,",","."); ?></b></td>
                  </tr>
                  <tr>
                    <th>TOTAL PENDAFTAR</th>
                    <th>:</th>
                    <td><b class="text-danger"><?php echo $sql4; ?> Orang</b></td>
                  </tr>
                </table>
                
              </div>
            </div>

            <a href="laporanPdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="text-white btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
            <a href="laporanPrint.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
            
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>ID CUSTOMER</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>NAMA CUSTOMER</th>
                    <th>PROGRAM PILIHAN</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM kursus WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
                  while($i = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>CUST-00<?= $i['id_cust'] ?></td>
                      <td><?= date('d-m-Y', strtotime($i['tanggal_dibuat'])); ?></td>
                      <td><?= $i['kursus_cust'] ?></td>
                      <td><?= $i['kursus_pilihan'] ?></td>
                      <td>
                        <?php 
                        if($i['kursus_status'] == 'aktif'){
                            echo "<span class='badge bg-info text-white'>Aktif</span>";
                        }elseif($i['invoice_status'] == 1){
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

            <?php 
          }else{
            ?>

            <div class="alert alert-info text-center">
              Silahkan Filter Laporan Terlebih Dulu.
            </div>

            <?php
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>