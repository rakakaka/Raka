<?php include 'header.php'?>
 

  

 
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
                            <button data-toggle="modal" data-target="#tambahUser" type="button" class='btn btn-sm btn-info' href="transaksi_hapus.php?id=<?= $i['id']; ?>"><i class="fa fa-plus"></i> Tambah Customer</button>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>NIk</th>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th class="text-center">NO_HP</th>
                                            <th class="text-center">TANGGAL DAFTAR</th>
                                            <th class="text-center" width="15%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM customer");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['nik'] ?></td>
                                              <td><?= $i['nama'] ?></td>
                                              <td><?= $i['email'] ?></td>
                                              <td class="text-center"><?= $i['no_hp'] ?></td>
                                              <td class="text-center"><?= $i['dibuat'] ?></td>
                                              <td class="text-center">  
                                                
                                                <button data-toggle="modal" data-target="#editUser_<?= $i['id']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a class='btn btn-sm btn-danger' href="deleteCust.php?id=<?= $i['id']; ?>"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>

                                            <div class="modal fade " id="editUser_<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        
                                                      <div class="modal-header">
                                                      <h4 class="modal-title">Edit Data User</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                      
                                                      <div class="modal-body">
                                                     <form action="editUser.php" class="form" method="post">
                                                       <input type="hidden" value="<?= $i['id'] ?>" name="id">
                                                       <input type="hidden" value="<?= $i['status'] ?>" name="status">
                                                       <div class="row">
                                                       <div class="col-md-6">
                                                       <div class="form-group p-3">
                                                           <label for="">Nik</label>
                                                           <input type="text" class="form-control" name="nik" id="nik" aria-describedby="helpId" value="<?= $i['nik'] ?>">
                                                         </div>
                                                       </div>

                                                       <div class="col-md-6">
                                                        <div class="form-group p-3">
                                                            <label for="">Nama</label>
                                                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $i['nama'] ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                          <div class="form-group p-3">
                                                              <label for="">Nomor Hp</label>
                                                              <input type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="helpId" value="<?= $i['no_hp'] ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-6">
                                                            <div class="form-group p-3">
                                                                <label for="">Email</label>
                                                                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" value="<?= $i['email'] ?>">
                                                              </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                              <div class="form-group p-3">
                                                                  <label for="">Tempat Lahir</label>
                                                                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="helpId" value="<?= $i['tempat_lahir'] ?>">
                                                                </div>
                                                              </div>

                                                              <div class="col-md-6">
                                                                <div class="form-group p-3">
                                                                    <label for="">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="helpId" value="<?= $i['tgl_lahir'] ?>">
                                                                  </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                  <div class="form-group p-3">
                                                                    <label for="">Username</label>
                                                                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" value="<?= $i['username'] ?>">
                                                                  </div>
                                                                  </div>

                                                                  <div class="col-md-4">
                                                                    <div class="form-group p-3">
                                                                      <label for="">Password Sekarang</label>
                                                                      <input type="text" class="form-control" readonly aria-describedby="helpId" value="R a h a s i a">
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                      <div class="form-group p-3">
                                                                        <label for="">Ubah Password</label>
                                                                        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
                                                                      </div>
                                                                      </div>
                                                       </div>

                                                            </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info">Ubah</button>
                                                      </div>
                                                     </form>
                                                      
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


        <div class="modal fade " id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="tambahCust.php" method="POST">
              <div class="modal-header">
              <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              
              <div class="modal-body">
             <form action="editUser.php" class="form" method="post">
               <div class="row">
               <div class="col-md-6">
               <div class="form-group p-3">
                   <label for="">Nik</label>
                   <input type="text" class="form-control" name="nik" id="nik" aria-describedby="helpId" >
                 </div>
               </div>

               <div class="col-md-6">
                <div class="form-group p-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group p-3">
                      <label for="">Nomor Hp</label>
                      <input type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="helpId" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group p-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" >
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group p-3">
                          <label for="">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="helpId" >
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group p-3">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="helpId" >
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group p-3">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" >
                          </div>
                          </div>


                            <div class="col-md-6">
                              <div class="form-group p-3">
                                <label for="">Ubah Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
                              </div>
                              </div>
               </div>

                    </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
              </div>
             </form>
              
            </div>
          </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
  

     
        
     
     

        <?php include 'footer.php' ?>