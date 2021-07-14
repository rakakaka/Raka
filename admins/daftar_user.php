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
                            <button data-toggle="modal" data-target="#tambahUser" type="button" class='btn btn-sm btn-info' href="transaksi_hapus.php?id=<?= $i['id']; ?>"><i class="fa fa-plus"></i> Tambah Guru</button>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                          <tr>
                                            <th width="1%">NO</th>
                                            <th>NAMA</th>
                                            <th>AKSES</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center" width="25%">OPSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          include 'koneksi.php';
                                          $no = 1;
                                          $invoice = mysqli_query($koneksi,"SELECT * FROM admin");
                                          while($i = mysqli_fetch_array($invoice)){
                                            ?>
                                            <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $i['nama_admin'] ?></td>
                                              <td>
                                                  <?php if ($i['akses'] == '1') {
                                                      echo 'Admin';
                                                  } elseif ($i['akses'] == '2'){
                                                      echo 'Guru Kursus';
                                                  } elseif ($i['akses'] == '3'){
                                                      echo 'Guru Privat';
                                                  } elseif ($i['akses'] == '4'){
                                                      echo 'Guru Bimbel';
                                                  }?>
                                                  
                                                </td>
                                              <td class="text-center">
                                              <?php if ($i['status'] == 'aktif') {?>
                                                <span class='badge bg-info text-white'><i class="fa fa-check"></i> Aktif</span>
                                                <?php  } else{ ?>
                                                <span class='badge bg-danger text-white'><i class="fa fa-exclamation" aria-hidden="true"></i> Non Aktif</span>
                                                 <?php }?>  
                                              </td>
                                              <td class="text-center">  
                                              <?php if ($i['status'] == 'aktif') {?>
                                                <a class='btn btn-sm btn-danger text-white' href="ubah-non-aktif.php?id=<?= $i['id']; ?>"><i class="fa fa-edit"></i> Non-aktif</a>
                                                <?php  } else{ ?>
                                                <a class='btn btn-sm btn-info text-white' href="ubah-aktif.php?id=<?= $i['id']; ?>"><i class="fa fa-edit"></i> Aktifkan</a>
                                                 <?php }?>  
                                                
                                                <button data-toggle="modal" data-target="#editUser_<?= $i['id']; ?>" type="button" class='btn btn-sm btn-success text-white'"><i class="fa fa-edit"></i> Edit</button>
                                                <a class='btn btn-sm btn-danger' href="deleteUser.php?id=<?= $i['id']; ?>"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>

                                            <div class="modal fade" id="editUser_<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        
                                                      <div class="modal-header">
                                                      <h4 class="modal-title">Edit Data User</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                      
                                                      <div class="modal-body">
                                                     <form action="editUser.php" class="form" method="post">
                                                       <input type="hidden" value="<?= $i['id'] ?>" name="id">
                                                       <input type="hidden" value="<?= $i['status'] ?>" name="status">
                                                         <div class="form-group p-3">
                                                           <label for="">Nama</label>
                                                           <input type="text" class="form-control" name="nama_admin" id="nama_admin" aria-describedby="helpId" value="<?= $i['nama_admin'] ?>">
                                                         </div>

                                                         <div class="form-group p-3">
                                                           <label for="">Username</label>
                                                           <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" value="<?= $i['username'] ?>">
                                                         </div>

                                                         <div class="form-group p-3">
                                                           <label for="">Password Sekarang</label>
                                                           <input type="text" class="form-control" readonly aria-describedby="helpId" value="R a h a s i a">
                                                         </div>

                                                         <div class="form-group p-3">
                                                           <label for="">Ubah Password</label>
                                                           <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId">
                                                         </div>

                                                         <div class="form-group p-3">
                                                           <label for="">Hak Ases</label>
                                                         
                                                            <select class="form-control" name="akses" id="akses">
                                                              <option value="<?= $i['akses'] ?>" selected>
                                                              <?php if ($i['akses'] == '1') {
                                                                    echo 'Admin';
                                                                } elseif ($i['akses'] == '2'){
                                                                    echo 'Guru Kursus';
                                                                } elseif ($i['akses'] == '3'){
                                                                    echo 'Guru Privat';
                                                                } elseif ($i['akses'] == '4'){
                                                                    echo 'Guru Bimbel';
                                                                }?>
                                                              </option>

                                                              <option value="2">Guru Kursus</option>

                                                              <option value="3">Guru Privat</option>

                                                              <option value="4">Guru Bimbel</option>

                                                            </select>
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


        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                
              <div class="modal-header">
              <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
             <form action="tambahUser.php" class="form" method="post">
              
              <div class="modal-body">
                 <div class="form-group p-3">
                   <label for="">Nama</label>
                   <input type="text" class="form-control" name="nama_admin" id="nama_admin" aria-describedby="helpId">
                 </div>

                 <div class="form-group p-3">
                   <label for="">Username</label>
                   <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" >
                 </div>

                 <div class="form-group p-3">
                   <label for="">Ubah Password</label>
                   <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
                 </div>

                 <div class="form-group p-3">
                   <label for="">Hak Ases</label>
                 
                    <select class="form-control" name="akses" id="akses">
                      <option selected>-- Pilihan --</option>

                      <option value="2">Guru Kursus</option>

                      <option value="3">Guru Privat</option>

                      <option value="4">Guru Bimbel</option>

                    </select>
                    </div>

                    <div class="form-group p-3">
                      <label for="">Status</label>
                    
                       <select class="form-control" name="status" id="status">
                         <option selected>-- Pilihan --</option>   
                         <option value="aktif"><span class="badge badge-info">Aktif</span></option>
                         <option value="tidak aktif"><span class="badge badge-info">Non Aktif</span></option>
   
                       </select>
                       </div>

                    </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Daftarkan</button>
              </div>
             </form>
              
            </div>
          </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
  

     
        
     
     

        <?php include 'footer.php' ?>