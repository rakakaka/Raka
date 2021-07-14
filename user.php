<?php include 'header.php' ?>
<?php  
include 'koneksi.php'
?>   
<section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Daftar Program</h4>
                        <p class="text">Berikut daftar Program yang tersedia</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            
            <div class="row justify-content-center">
            <div class="col-md-12">
                        <?php include 'login_alert.php' ?>
            
            </div>
                <div class="col-lg-12 col-md-7 col-sm-9">
                    <div class="pricing mt-40">
                        <div class="pricing-baloon">
                            <img src="assets/images/3.svg" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">Profile </h5>
                        </div>
                        <div class="pricing-list">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Program Belajar</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Edit Profile</a>
                               <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="tab-content" id="v-pills-tabContent">

                                     <!-- Profile Seciton -->
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <?php 
                                                    $id = $_SESSION['id'];
                                                    $customer = mysqli_query($koneksi,"SELECT * FROM customer WHERE id='$id'");
                                                    while($i = mysqli_fetch_array($customer)){
                                                        ?>
                                                        <tr>
                                                            <th width="20%">Nama</th>	
                                                            <td><?= $i['nama'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="20%">Email</th>	
                                                            <td><?= $i['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>HP</th>	
                                                            <td><?= $i['no_hp'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Username</th>	
                                                            <td><?= $i['username'] ?></td>
                                                        </tr>
                                                        <?php 
                                                    }
                                                    ?>           
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                            
                                    <!-- Profile -->

                                     <!-- Program Belajar Section -->
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <table class="table table-bordered">
                                            <thead>
                                                    <th>No</th>
                                                    <th>Detail</th>
                                                    <th>Jadwal Hari</th>
                                                    <th>Jadwal Jam</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Invoice</th>
                                                        
                                            </thead>
                                                <tbody>
                                                <?php 
                                                    $id = $_SESSION['id'];
                                                    $no = 1;
                                                    $customer = mysqli_query($koneksi,"SELECT * FROM kursus WHERE id_cust='$id'");
                                                    while($z = mysqli_fetch_array($customer)){
                                                    ?> 
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><b><?= $z['kursus_ptingkatan'] ?></b></td>
                                                            <td><?= $z['kursus_phari'] ?></td>
                                                            <td><?= $z['kursus_pjam'] ?></td>
                                                            <td> <?= $z['tanggal_dibuat']; ?> </td>
                                                            <td><a target="_blank" class="btn btn-info" href="invoiceprint.php?id=<?= $z['id_kursus'] ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Invoice</a></td>
                                                            
                                                        </tr>
                                                <?php } ?>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- Prgoram Belajar -->
                                     
                                     <!-- Tagihan Section -->
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <form action="editUser.php" method="POST" class="form">
                                        <?php 
                                            $id = $_SESSION['id'];
                                            $customer = mysqli_query($koneksi,"SELECT * FROM customer WHERE id='$id'");
                                            $iz = mysqli_fetch_array($customer)
                                        ?>
                                        <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Nama</label>
                                                    <input value="<?= $iz['nama'] ?>" type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Nik</label>
                                                    <input value="<?= $iz['nik'] ?>" type="text" class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Nomor Hp</label>
                                                    <input value="<?= $iz['no_hp'] ?>" type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Email</label>
                                                    <input value="<?= $iz['email'] ?>" type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Tempat Lahir</label>
                                                    <input value="<?= $iz['tempat_lahir'] ?>" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input value="<?= $iz['tgl_lahir'] ?>" type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">email</label>
                                                    <input value="<?= $iz['email'] ?>" type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group p-3">
                                                    <label for="">Ubah Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Kosongkan Jika tidak ingin mengubah">
                                                </div>
                                            </div>
                                        </div>

                                            

                                            

                                            <div class="form-group p-3">
                                                <button class="btn btn-block btn-info text-white"><i class="fa fa-paper-plane" aria-hidden="true"></i> Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                     <!-- Tagihan -->

                                    <!-- Settings Section -->
                                  <!--    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                    </div> -->
                                     <!-- Setting -->

                                  </div>
                            </div>

                            </div>
                       

                        </div>
                        <!-- <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="kursus.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Lebih Lanjut</a>
                        </div> -->
                       
                    </div> <!-- single pricing -->
                </div>       

            </div> <!-- row -->
        </div> <!-- container -->
    </section>


<?php include 'footer.php' ?>   