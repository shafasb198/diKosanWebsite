<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='../loginreg/login.php';</script>";
        exit;
    }

    $id_pengguna = $_SESSION['id_pengguna'];
    $nama = $_SESSION['nama'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $level = $_SESSION['level'];

	  include "../../koneksi.php";
	  $query = "SELECT * FROM tb_kos";
    $sql = mysqli_query($conn, $query);
    $row = mysqli_num_rows($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>diKosan - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-3" href="../index.php"><img src="../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php echo "<img src='../pengguna/".$foto."' alt='profile'/>" ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="loginreg/logout.php" class="dropdown-item">
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php
          if($level=="pemilik"){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="kosan.php">
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
            <a class="nav-link" href="admin-kosan.php">
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
            <a class="nav-link" href="pemilik-kos.php">
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
            <a class="nav-link" href="penghuni.php">
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
            <a class="nav-link" href="admin.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Admin</span>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="transaksi.php">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $nama ?>!</h3>
                </div>
                
              </div>
            </div>
          </div>
      <!-- partial -->
      <?php
          
          include "../../koneksi.php";
          $getkosan = "SELECT tb_kos.*, tb_pemilik.* FROM tb_pemilik JOIN tb_kos ON 
                        tb_pemilik.id_pemilik=tb_kos.id_pemilik";
          $eks = mysqli_query($conn, $getkosan);
          $hasil = mysqli_num_rows($eks);
          
          ?>
      <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Data Kosan</p>                                                    
                    <table style="width: 100%;">
                    <tr>
                        <th style="float:left"></a>
                            </th>
                        <th><form method="post" style="float:right;">
                                <input type="text" class="search-box" name="cari" placeholder="Cari Kosan...">&ensp;
                                <button class="btn-small" name="btn_cari">Cari</button>
                            </form></th>
                    </tr>
                </table>
                  <br><br>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Id Kos</th>
                              <th>Nama Kos</th>
                              <th>Nama Pemilik</th>
                              <th>Alamat</th>
                              <th>Harga</th>
                              <th>Status</th>
                              <th>Foto</th>
                              <th>Aksi</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            if(isset($_POST['btn_cari'])){
                              if($_POST['cari']!=""){
                                $spec = "%".$_POST['cari']."%";
                                $query = "SELECT tb_kos.id_kos, tb_kos.nama_kos, tb_pemilik.nama, tb_kos.alamat, tb_kos.harga, tb_kos.status_kosan, tb_kos.foto_kosan
                                FROM tb_kos JOIN tb_pemilik ON tb_pemilik.id_pemilik=tb_kos.id_pemilik WHERE tb_kos.id_kos LIKE '%".$_POST['cari']."%'
                                OR tb_kos.nama_kos LIKE '%".$_POST['cari']."%' OR tb_pemilik.nama LIKE '%".$_POST['cari']."%' OR tb_kos.alamat LIKE '%".$_POST['cari']."%' OR tb_kos.harga LIKE '%".$_POST['cari']."%' 
                                OR tb_kos.status_kosan LIKE '%".$_POST['cari']."%' order by tb_kos.id_kos";
                                $eks = mysqli_query($conn, $query);
                                $hasil = mysqli_num_rows($eks);
                              }
                            }

                            if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                    echo "<tr>";
                                    echo "<td>".$data['id_kos']."</td>";
                                    echo "<td>".$data['nama_kos']."</td>";
                                    echo "<td>".$data['nama']."</td>";
                                    echo "<td>".$data['alamat']."</td>";
                                    echo "<td>".$data['harga']."</td>";
                                    if($data['status_kosan']=="Diajukan"){
                                        ?>
                                            <td class="font-weight-medium"><div class="badge badge-danger">Diajukan</div></td>
                                        <?php
                                    }else if($data['status_kosan']=="Terdaftar"){
                                        ?>
                                            <td class="font-weight-medium"><div class="badge badge-success">Terdaftar</div></td>
                                        <?php
                                    }
                                    echo "<td width='20%'> <img src='../images/".$data['foto_kosan']."' width='100px' height='100px'></td>";
                                    echo "<td><a href ='admin-kosan-detail.php?id_kos=".$data['id_kos']."' name='edit'><button class='btn btn-inverse-success btn-sm'>Detail</button></a>&nbsp;
                                    </td>";
                                }
                            }else{
                                echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
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
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
