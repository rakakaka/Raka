<?php 
include 'koneksi.php';
$sql1 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '08:00 - 09:30'");
$sql2 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '12:30 - 14:00'");
$sql3 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '14:00 - 15:30'");
$sql4 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '15:30 - 17:00'");
$sql5 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '17:00 - 18:30'");
$sql6 = mysqli_query($koneksi, "SELECT * FROM kursus WHERE kursus_pjam = '18:30 - 20:00'");

$gas1 = mysqli_num_rows($sql1);
$gas2 = mysqli_num_rows($sql2);
$gas3 = mysqli_num_rows($sql3);
$gas4 = mysqli_num_rows($sql4);
$gas5 = mysqli_num_rows($sql5);
$gas6 = mysqli_num_rows($sql6);
?>

<div class="col-md-12">
<div class="form-group p-3">
<label for="">Pilih Jam</label>
<select class="form-control" name="jam">
<option value="">-- Pilihan --</option>
<option value="<?= date("08:00") ?> - <?= date("09:30") ?>"><?= date("08:00") ?> - <?= date("09:30") ?></option>
<option value="<?= date("12:30") ?> - <?= date("14:00") ?>"><?= date("12:30") ?> - <?= date("14:00") ?></option>
<option value="<?= date("14:00") ?> - <?= date("15:30") ?>"><?= date("14:00") ?> - <?= date("15:30") ?></option>
<option value="<?= date("15:30") ?> - <?= date("17:00") ?>"><?= date("15:30") ?> - <?= date("17:00") ?></option>
<option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php if ($gas1 > 10) { ?>
<option value="<?= date("12:30") ?> - <?= date("14:00") ?>"><?= date("12:30") ?> - <?= date("14:00") ?></option>
<option value="<?= date("14:00") ?> - <?= date("15:30") ?>"><?= date("14:00") ?> - <?= date("15:30") ?></option>
<option value="<?= date("15:30") ?> - <?= date("17:00") ?>"><?= date("15:30") ?> - <?= date("17:00") ?></option>
<option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php } elseif ($gas1 > 10 && $gas2 > 10) { ?>
<option value="<?= date("14:00") ?> - <?= date("15:30") ?>"><?= date("14:00") ?> - <?= date("15:30") ?></option>
<option value="<?= date("15:30") ?> - <?= date("17:00") ?>"><?= date("15:30") ?> - <?= date("17:00") ?></option>
<option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php } elseif ($gas1 > 10 && $gas2 > 10 && $gas3 > 10) { ?>
<option value="<?= date("15:30") ?> - <?= date("17:00") ?>"><?= date("15:30") ?> - <?= date("17:00") ?></option>
<option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php } elseif ($gas1 > 10 && $gas2 > 10 && $gas3 > 10 && $gas4 > 10) { ?>
<option value="<?= date("17:00") ?> - <?= date("18:30") ?>"><?= date("17:00") ?> - <?= date("18:30") ?></option>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php } elseif ($gas1 > 10 && $gas2 > 10 && $gas3 > 10 && $gas4 > 10 && $gas5 > 10) { ?>
<option value="<?= date("18:30") ?> - <?= date("20:00") ?>"><?= date("18:30") ?> - <?= date("20:00") ?></option>
<?php } elseif ($gas1 > 10 && $gas2 > 10 && $gas3 > 10 && $gas4 > 10 && $gas5 > 10 && $gas6 > 10) { ?>
<option value="">Kelas Penuh, Silahkan Pilih Sesi Lain</option>
<?php } ?>



</select>
</div>
</div>