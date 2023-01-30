<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='pages/loginreg/login.php';</script>";
        exit;
    }

    $id_pengguna = $_SESSION['id_pengguna'];
    $nama = $_SESSION['nama'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $level = $_SESSION['level'];
    if($level=="pemilik"){
    $idpem = $_SESSION['id_pemilik'];}
    
    include "../koneksi.php";
    $getidpemilik = "SELECT tb_pemilik.id_pemilik FROM tb_pengguna JOIN tb_pemilik
    ON tb_pemilik.id_pengguna=tb_pengguna.id_pengguna
    JOIN tb_kos ON tb_pemilik.id_pemilik=tb_kos.id_pemilik
    WHERE tb_pengguna.id_pengguna='$id_pengguna'";
    $hasil = mysqli_query($conn, $getidpemilik);
    $idpemilik = mysqli_num_rows($hasil);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>diKosan - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-3" href="index.php"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php echo "<img src='pengguna/".$foto."' alt='profile'/>" ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="pages/loginreg/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php
          if($level=="pemilik"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/kosan.php">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Data Kosan</span>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($level=="admin"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/admin-kosan.php">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Data Kosan</span>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($level=="admin"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/pemilik-kos.php">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Data Pemilik</span>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($level=="pemilik" || $level=="admin"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/penghuni.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Data Penghuni</span>
            </a>
          </li>
          <?php
          }
          ?>
          <?php
          if($level=="admin"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/admin.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Admin</span>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/transaksi.php">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <?php
        if($level=="pemilik"){
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $nama ?>!</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Data Kos</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Pendapatan Anda</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT SUM(jumlah) as pendapatan FROM tb_transaksi WHERE tb_transaksi.id_pemilik='$idpem'";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);

                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo "Rp. ";
                                echo $data['pendapatan'];
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?>  
                      </h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Penghuni Kosan Anda</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT COUNT(*) as jumlah_penghuni FROM tb_penghuni JOIN tb_kos 
                      ON tb_penghuni.id_kos=tb_kos.id_kos
                      WHERE tb_kos.id_kos='$idpemilik'";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);
                      
                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo $data['jumlah_penghuni'];
                                echo " penghuni";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
                      </h3>
                    </div>
                  </div>
                                  </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                
                <?php
                      $getdaftar = "SELECT COUNT(*) as calon_penghuni FROM tb_penghuni JOIN tb_kos 
                      ON tb_penghuni.id_kos=tb_kos.id_kos
                      WHERE tb_penghuni.status_penghuni='Diajukan'
                      AND tb_kos.id_kos='$idpemilik'";
                      $daftar = mysqli_query($conn, $getdaftar);
                      $daftarpenghuni = mysqli_num_rows($daftar);
                      
                        if($daftarpenghuni>0){
                            while($data = mysqli_fetch_array($daftar)){
                              echo "<div class='col-md-12 mb-4 stretch-card transparent'>";
                              echo "<div class='card card-tale'>";
                              echo "<div class='card-body'>";
                                echo "<p class='mb-4'>Pendaftar Penghuni Baru</p>";
                                echo "<p class='fs-30 mb-2'>".$data['calon_penghuni']." Pendaftar</p>";
                                echo "<p>Lakukan tindakan untuk pendaftar penghuni kosan anda!</p>";
                                echo "<a href='pages/penghuni.php'><button type='button' class='btn btn-light'>Lihat Pendaftar Kosan</button></a>";
                              echo "</div>";
                              echo "</div>";
                              echo "</div>";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
              </div>
              
            </div>
          <?php
          }?>
          <?php
        if($level=="admin"){
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $nama ?>!</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Data Kos</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Pendapatan Seluruh Kosan</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT SUM(jumlah) as pendapatan FROM tb_transaksi";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);

                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo "Rp. ";
                                echo $data['pendapatan'];
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?>  
                      </h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Penghuni Seluruh Kosan</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT COUNT(*) as jumlah_penghuni FROM tb_penghuni JOIN tb_kos 
                      ON tb_penghuni.id_kos=tb_kos.id_kos";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);
                      
                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo $data['jumlah_penghuni'];
                                echo " penghuni";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
                      </h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Jumlah Pemilik Kosan</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT COUNT(*) as jumlah_pemilik FROM tb_pemilik";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);
                      
                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo $data['jumlah_pemilik'];
                                echo " pemilik";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
                      </h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Jumlah Seluruh Kosan</p>
                      <h3 class="text-primary fs-30 font-weight-medium">
                      <?php
                      $getpendapatan = "SELECT COUNT(*) as jumlah_kosan FROM tb_kos";
                      $pend = mysqli_query($conn, $getpendapatan);
                      $pendapatan = mysqli_num_rows($pend);
                      
                        if($pendapatan>0){
                            while($data = mysqli_fetch_array($pend)){
                                echo $data['jumlah_kosan'];
                                echo " kosan";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
                      </h3>
                    </div>
                  </div>
                                  </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                
                <?php
                      $getdaftar = "SELECT COUNT(*) as pendaftar_pemilik FROM tb_pemilik WHERE tb_pemilik.status='Diajukan'";
                      $daftar = mysqli_query($conn, $getdaftar);
                      $daftarpenghuni = mysqli_num_rows($daftar);
                      
                        if($daftarpenghuni>0){
                            while($data = mysqli_fetch_array($daftar)){
                              echo "<div class='col-md-12 mb-4 stretch-card transparent'>";
                              echo "<div class='card card-tale'>";
                              echo "<div class='card-body'>";
                                echo "<p class='mb-4'>Pendaftar Kosan Baru</p>";
                                echo "<p class='fs-30 mb-2'>".$data['pendaftar_pemilik']." Pemilik Kosan</p>";
                                echo "<p>Lakukan tindakan untuk pendaftar kosan anda!</p>";
                                echo "<a href='pages/pemilik-kos.php'><button type='button' class='btn btn-light'>Lihat Pendaftar Kosan</button></a>";
                              echo "</div>";
                              echo "</div>";
                              echo "</div>";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                        
                        ?> 
              </div>
              
            </div>
          <?php
          }?>
          </div>                          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. diKosan</span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

