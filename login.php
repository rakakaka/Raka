<?php include 'header.php' ?>   
<section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Login / Daftar</h4><br>
                        <?php include 'login_alert.php' ?>

                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            
            <div class="row justify-content-center">            

                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing mt-40">
                      
                        <div class="pricing-header mb-3">
                            <h5 class="sub-title">Login</h5>
                        </div>
                      
                        <form action="login_pros.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="1">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                  <label for=""><b>Username</b></label>
                                  <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                                  <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for=""><b>Password</b></label>
                                  <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                                   <!--<small id="helpId" class="form-text text-muted">Help text</small> -->
                                </div>
                            </div>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <button type="submit" class="main-btn rounded-one" href=""><i class="fa fa-hourglass-end" aria-hidden="true"></i> Login</button>
                        </div>
                    </form>
                        <div class="bottom-shape">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g><g data-name="Group 747"><path data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>

                <div class="col-lg-8 col-md-7 col-sm-9">
                    <div class="pricing mt-40">
                        <div class="pricing-baloon">
                            <img src="assets/images/3.svg" alt="baloon">
                        </div>
                        <div class="pricing-header mb-3">
                            <h5 class="sub-title">Daftar</h5>
                        </div>
                        <form action="daftar_pros.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                      <label for=""><b>Nama</b></label>
                                      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                      <label for=""><b>Email</b></label>
                                      <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                                      <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                    </div>
                                </div>
    
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                      <label for=""><b>Username</b></label>
                                      <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                                       <!--<small id="helpId" class="form-text text-muted">Help text</small> -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for=""><b>Password</b></label>
                                      <input type="password" class="form-control" name="password" id="password">
                                       <!--<small id="helpId" class="form-text text-muted">Help text</small> -->
                                    </div>
                                </div>

                            </div>
                            <div class="pricing-btn rounded-buttons text-center">
                                <button type="submit" class="main-btn btn-block rounded-one" href=""><i class="fa fa-hourglass-end" aria-hidden="true"></i> Daftar</button>
                            </div>
                        </form>
                       
                    </div> <!-- single pricing -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

<?php include 'footer.php' ?>   