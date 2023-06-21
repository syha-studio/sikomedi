<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../../login.php");
    exit;
}
require '../../functions.php';

$id = $_GET["ID"];
$ganti  = query("SELECT * FROM instagram WHERE ID = $id")[0];

if (isset($_POST["submit"])) {
    if (updatelatestpost($_POST) > 0) {
        echo "
        <script>
          alert('Latest Post Berhasil di-Update!');
          document.location.href = 'Cpost.php';
        </script>
      ";
    } else {
        echo "
        <script>
          alert('Latest Post Gagal di-Update!');
          document.location.href = 'Cpost.php';
        </script>
      ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Latest Post Control - SIKOMEDI</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a41efb1c83.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-database-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3 pt-2"><sup>SI</sup>KOMEDI</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <!-- Nav Item - Charts Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts1" aria-expanded="true" aria-controls="collapseCharts1">
                    <i class="bi bi-toggles"></i>
                    <span>Control Area</span>
                </a>
                <div id="collapseCharts1" class="collapse" aria-labelledby="headingCharts" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Control Area :</h6>
                        <a class="collapse-item" href="..\..\control\content\Ccontent.php">Content</a>
                        <a class="collapse-item" href="..\..\control\member\Cmember.php">Member</a>
                        <a class="collapse-item" href="..\..\control\latestpost\Cpost.php">Latest Post</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts2" aria-expanded="true" aria-controls="collapseCharts2">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Report Area</span>
                </a>
                <div id="collapseCharts2" class="collapse" aria-labelledby="headingCharts" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Report Area :</h6>
                        <a class="collapse-item" href="..\..\Rchart.php">Chart</a>
                        <a class="collapse-item" href="..\..\Rtable.php">Table</a>
                    </div>
                </div>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                    <div class="d-flex justify-content-start pb-3">
                        <a href="Cpost.php"><button type="button" class="btn btn-light"><i class="bi bi-back"></i> Kembali</button></a>
                    </div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Latest Post</h1>
                    </div>
                    <!-- Content Row -->
                    <!-- Formulir -->
                    <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                        <input type="hidden" name="id" value="<?= $ganti["ID"] ?>">
                        <input type="hidden" name="gambarLama" value="<?= $ganti["SOURCE"] ?>">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input class="form-control" type="text" name="url" id="url" value="<?= $ganti["URL"] ?>" required autocomplete="off">
                            </div>
                            <div class="col mb-2">
                                <label for="judul" class="form-label">Judul Postingan</label>
                                <input class="form-control" type="text" name="judul" id="judul" value="<?= $ganti["JUDULPOSTINGAN"] ?>" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="gambar" class="form-label">Gambar (recommended size: 1080x720)</label>
                                <div class="p-2 m-2 border">
                                    <img src="..\..\..\assets\img\<?= $ganti["SOURCE"] ?>" alt="<?= $ganti["SOURCE"] ?>" width="100vh">
                                </div>
                                <input class="form-control" type="file" id="gambar" name="gambar">
                            </div>
                            <div class="col mb-2">
                                <label for="caption">Caption Singkat</label>
                                <textarea class="form-control" name="caption" id="caption" style="height: 8.5rem" required><?= $ganti["CAPTION"] ?></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button type="submit" name="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                    <!-- Akhir Formulir -->
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-dark" href="../../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Script Default -->
        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin-2.min.js"></script>
</body>

</html>