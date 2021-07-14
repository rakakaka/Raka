<?php include 'header.php'?>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <?php if ($_SESSION['akses'] == '1') {?>
                            <button data-toggle="modal" data-target="#tambahKursus" type="button" class='btn btn-sm btn-info'"><i class="fa fa-plus"></i> Tambah Peserta</button>
                              <?php } else { ?>

                              <?php } ?>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>NAMA</th>
                                            <th>TINGKATAN</th>
                                            <th>HARI</th>
                                            <th class="text-center">JAM</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center" width="30%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
include 'koneksi.php';
$no = 1;
$invoice = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pilihan = 'bimbel' ");
while ($i = mysqli_fetch_array($invoice)) {
    ?>
                                            <tr>
                                              <td><?=$no++;?></td>
                                              <td><?=$i['kursus_cust']?></td>
                                              <td><?=$i['kursus_ptingkatan']?></td>
                                              <td><?=$i['kursus_phari']?></td>
                                              <td class="text-center"><?=$i['kursus_pjam']?> </td>
                                              <td class="text-center">
                                                <?php if ($i['kursus_status'] == 'aktif') {?>
                                                  <span class='badge bg-info text-white'><i class="fa fa-check"></i> Aktif</span>
                                                  <?php } else {?>
                                                  <span class='badge bg-danger text-white'><i class="fa fa-exclamation" aria-hidden="true"></i> Non Aktif</span>
                                                   <?php }?>
                                              </td>
                                              <td class="text-center">
                                                <?php if ($_SESSION['akses'] == '1') {?>
                                                  <button data-toggle="modal" data-target="#editKursus_<?=$i['id_kursus'];?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <button data-toggle="modal" data-target="#checkPay_<?=$i['id_kursus'];?>" type="button" class='btn btn-sm btn-warning text-white'"><i class="fa fa-money" aria-hidden="true"></i> Cek Pembayaran</button>
                                                <a data-toggle="tooltip" data-placement="top" title="Hapus Data" class='btn btn-sm btn-danger' href="deleteKursus.php?id=<?=$i['id_kursus'];?>"><i class="fa fa-trash"></i></a>
                                                <?php if ($i['kursus_status'] == 'aktif') {?>
                                                  <a data-toggle="tooltip" data-placement="top" title="Non-aktifkan Peserta" class='btn btn-sm btn-danger' href="kursusNonAktif.php?id_kursus=<?=$i['id_kursus'];?>"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
                                                  <?php } else {?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Aktifkan Peserta" class='btn btn-sm btn-info' href="kursusAktif.php?id_kursus=<?=$i['id_kursus'];?>"><i class="fa fa-check"></i></a>
                                                   <?php }?>
                                                <?php } else {?>
                                                    <?php if ($i['kursus_status'] == 'aktif') {?>
                                                  <a data-toggle="tooltip" data-placement="top" title="Non-aktifkan Peserta" class='btn btn-sm btn-danger' href="kursusNonAktif.php?id_kursus=<?=$i['id_kursus'];?>"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></a>
                                                  <?php } else {?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Aktifkan Peserta" class='btn btn-sm btn-info' href="kursusAktif.php?id_kursus=<?=$i['id_kursus'];?>"><i class="fa fa-check"></i></a>
                                                   <?php }?>
                                                <?php }?>
                                              </td>
                                            </tr>

                                            <div class="modal fade" id="editKursus_<?=$i['id_kursus'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">

                                                      <div class="modal-header">
                                                      <h4 class="modal-title">Edit Data Peserta</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>

                                                      <div class="modal-body">
                                                     <form action="editKursus.php" class="form" method="post">
                                                       <input type="hidden" value="<?=$i['id_kursus']?>" name="id_kursus">
                                                         <div class="form-group p-3">
                                                           <label for="">Nama</label>
                                                           <input type="text" class="form-control" name="kursus_cust" id="kursus_cust" aria-describedby="helpId" value="<?=$i['kursus_cust']?>">
                                                         </div>


                                                          <div class="form-group p-3">
                                                            <label for="">Pilih Tingkatan</label>
                                                            <select class="form-control" name="tingkatan" id="tingkatan">
                                                              <option value="<?=$i['kursus_ptingkatan']?>"><?=$i['kursus_ptingkatan']?></option>
                                                              <option value="x6">6 Kali Sesi</option>
                                                              <option value="x8">8 Kali Sesi</option>
                                                              <option value="x12">12 Kali Sesi</option>
                                                              <option value="x16">16 Kali Sesi</option>
                                                            </select>
                                                          </div>

                                                         <div class="form-group p-3">
                                                          <label for="">Pilih Hari</label>
                                                          <select class="form-control" name="hari">
                                                            <option value="<?=$i['kursus_phari']?>" selected><?=$i['kursus_phari']?></option>
                                                            <option value="Senin - Rabu">Senin - Rabu</option>
                                                            <option value="Selasa - Kamis">Selasa - Kamis</option>
                                                            <option value="Rabu - Jumat">Rabu - Jumat</option>
                                                            <option value="Kamis - Sabtu">Kamis - Sabtu</option>
                                                          </select>
                                                        </div>


                                                        <div class="form-group p-3">
                                                          <label for="">Pilih Jam</label>
                                                          <select class="form-control" name="jam">
                                                            <option value="<?=$i['kursus_pjam']?>"><?=$i['kursus_pjam']?></option>
                                                            <option value="<?=date("08:00")?> - <?=date("09:30")?>"><?=date("08:00")?> - <?=date("09:30")?></option>
                                                            <option value="<?=date("12:30")?> - <?=date("14:00")?>"><?=date("12:30")?> - <?=date("14:00")?></option>
                                                            <option value="<?=date("14:00")?> - <?=date("15:30")?>"><?=date("14:00")?> - <?=date("15:30")?></option>
                                                            <option value="<?=date("15:30")?> - <?=date("17:00")?>"><?=date("15:30")?> - <?=date("17:00")?></option>
                                                            <option value="<?=date("17:00")?> - <?=date("18:30")?>"><?=date("17:00")?> - <?=date("18:30")?></option>
                                                            <option value="<?=date("18:30")?> - <?=date("20:00")?>"><?=date("18:30")?> - <?=date("20:00")?></option>
                                                          </select>
                                                        </div>



                                                            </div>

                                                        <button type="submit" class="btn btn-info"><i class="fa fa-exchange" aria-hidden="true"></i> Ubah</button>

                                                     </form>

                                                    </div>
                                                  </div>
                                                </div>




                                                <div class="modal fade" id="checkPay_<?=$i['id_kursus'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">

                                                      <div class="modal-header">
                                                      <h4 class="modal-title">Cek Pembayaran</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>

                                                      <div class="modal-body">
                                                        <?php if ($i['kursus_bukti'] == null) {
        echo 'Peserta Belum melakukan Pembayaran';
    } else {?>
                                                        <center>
                                                          <img style="width: 100%;" src="../assets/images/<?=$i['kursus_bukti']?>" alt="">
                                                        </center><br>
                                                      <?php }?>
                                                      <span class="badge badge-warning badge-lg text-white">Total Pembayaran : Rp. <?=number_format($i['kursus_harga'], 0, ",", ".");?></span>
                                                      </div>


                                                    </div>
                                                  </div>
                                                </div>

                                            <?php
}
?>
                                        </tbody>
                                      </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>


        <div class="modal fade" id="tambahKursus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
              <h4 class="modal-title">Tambah Data Peserta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">
             <form action="tambahPrivat.php" class="form" method="post" enctype="multipart/form-data">

                <div class="form-group p-3">
                  <label for=""></label>
                  <select class="form-control" name="id_cust" id="tingkatan1">
                    <option value="">Pilih Customer</option>
                    <?php
include 'koneksi.php';
$invoice = mysqli_query($koneksi, "SELECT * FROM customer");
while ($f = mysqli_fetch_assoc($invoice)) {
    $ids = $f['id'];
    $nms = $f['nama'];
    ?>
                    <option value="<?=$ids;?>" id="<?=$nms;?>" selected><?=$ids?> - <?=$nms;?></option>
                  <?php }?>

                  </select>
                </div>

              <div class="form-group p-3">
                <label for="">Nama</label>
                  <input type="text" name="kursus_cust" id="kursus_cust1" class="form-control" readonly>
              </div>

                  <div class="form-group p-3">
                    <label for="">Pilih Tingkatan</label>
                    <select class="form-control" name="tingkatan">
                      <option value="" selected>-- Pilihan --</option>
                      <option value="x6">6 Kali Sesi</option>
                      <option value="x8">8 Kali Sesi</option>
                      <option value="x12">12 Kali Sesi</option>
                      <option value="x16">16 Kali Sesi</option>
                    </select>
                  </div>

                 <div class="form-group p-3">
                  <label for="">Pilih Hari</label>
                  <select class="form-control" name="hari">
                    <option value="" selected>-- Pilihan --</option>
                    <option value="Senin - Rabu">Senin - Rabu</option>
                    <option value="Selasa - Kamis">Selasa - Kamis</option>
                    <option value="Rabu - Jumat">Rabu - Jumat</option>
                    <option value="Kamis - Sabtu">Kamis - Sabtu</option>
                  </select>
                </div>


                <div class="form-group p-3">
                  <label for="">Pilih Jam</label>
                  <select class="form-control" name="jam">
                    <option value="" selected>-- Pilihan --</option>
                    <option value="<?=date("08:00")?> - <?=date("09:30")?>"><?=date("08:00")?> - <?=date("09:30")?></option>
                    <option value="<?=date("12:30")?> - <?=date("14:00")?>"><?=date("12:30")?> - <?=date("14:00")?></option>
                    <option value="<?=date("14:00")?> - <?=date("15:30")?>"><?=date("14:00")?> - <?=date("15:30")?></option>
                    <option value="<?=date("15:30")?> - <?=date("17:00")?>"><?=date("15:30")?> - <?=date("17:00")?></option>
                    <option value="<?=date("17:00")?> - <?=date("18:30")?>"><?=date("17:00")?> - <?=date("18:30")?></option>
                    <option value="<?=date("18:30")?> - <?=date("20:00")?>"><?=date("18:30")?> - <?=date("20:00")?></option>
                  </select>
                </div>

                <div class="form-group p-3">
                  <label for="">Total Transfer</label>
                    <input type="text" name="kursus_harga" id="rupiah" class="form-control">
                </div>

                <div class="form-group p-3">
                  <label for="">Bukti</label>
                    <input type="file" name="kursus_bukti" class="form-control-file" aria-describedby="fileHelpId">
                </div>

                    </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Peserta</button>

             </form>

            </div>
          </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->




     <script>
    $(document).ready(function(){
    $('#tingkatan1').on('change', function() {
      var msd = $('option:selected', this).attr('id');
      $("#kursus_cust1").val(msd);
    });
    });

    var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
     </script>


        <?php include 'footer.php'?>