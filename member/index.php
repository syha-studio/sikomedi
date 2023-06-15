<?php
session_start();
if (!isset($_SESSION["login"])){
  header ("Location: login.php");
  exit;
}
require 'functions.php';
$name = $_GET["name"];
// Query
    $postqueue = query("SELECT count(k.ID) a FROM konten_history k JOIN users u ON (k.USER_ID = u.ID) WHERE `NAME`='$name'");
    $konten = query("SELECT u.NAME user, m.NAMA media, k.TANGGALPOSTING tanggal, k.JUDULPOSTING judul FROM konten_history k
                        JOIN users u ON (k.USER_ID = u.ID) JOIN media m ON (k.MEDIA_ID = m.ID)
                        WHERE k.STATUS_ID = 1 AND `NAME`='$name' ORDER BY tanggal");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Member - SIKOMEDI</title>
    <!-- Custom fonts for this template-->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a41efb1c83.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style = "background : #E74926" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?name=<?=$name?>">
                <div class="sidebar-brand-icon">
                  <i class="bi bi-database-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3 pt-2"><sup>SI</sup>KOMEDI</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?name=<?=$name?>">
                  <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="submission.php?name=<?=$name?>">
                    <i class="bi bi-file-earmark-plus"></i>
                    <span>Submissions</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 pt-4 ps-2">SISTEM KONTROL MEDIA INFORMASI FASILKOM</h1>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
            <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Summary</h1>
                    </div>
                <!-- Content Row -->
                    <div class="row">
                    <!-- Total Post Requested -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Total Post Requested</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($postqueue[0]["a"], 0, ',', ' ')?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-images text-gray-300" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- Content Row -->
                    <div class="row">
                    <!-- Table Summary -->
                        <div class="col-xl-12 col-lg-10">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Posts Requests</h6>
                                </div>
                                <div class="d-flex justify-content-center p-2 pb-2 overflow-y-scroll" style="max-height: 30rem;">
                                    <table class="table align-middle">
                                        <tr>
                                            <th>No.</th>
                                            <th>User</th>
                                            <th>Media</th>
                                            <th>Tanggal Posting</th>
                                            <th>Judul Postingan</th>
                                        </tr>
                                    <?php $i=1; if($konten==null){echo "<tr class=\"text-center\"><td colspan=\"5\">Empty</td></tr>";}else{ foreach ($konten as $row) : ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?= $row["user"]?></td>
                                        <td><?= $row["media"]?></td>
                                        <td><?= $row["tanggal"]?></td>
                                        <td><?= $row["judul"]?></td>
                                    </tr>
                                    <?php $i++; endforeach; }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIKOMEDI 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- Script Default -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>