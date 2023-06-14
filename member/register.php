<?php 
session_start();
if (isset($_SESSION["login"])){
  header ("Location: index.php");
  exit;
}
require 'functions.php';

if ( isset($_POST["submit"])){
    if (register($_POST) > 0){
      echo "
        <script>
          alert('Pendaftaran Berhasil! Silahkan tunggu verifikasi dari admin.');
          document.location.href = 'login.php';
        </script>
      ";
    }else {
      echo "
        <script>
          alert('Pendaftaran Gagal!');
          document.location.href = 'login.php';
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
    <title>Register Member - SIKOMEDI</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container p-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row p-1" style="background-color : #ADD8E6">
                            <div class="col d-flex justify-content-start pt-3 ps-4 pe-4" >
                                <a href="login.php"><button type="button" class="btn btn-light"><i class="bi bi-back"></i> Kembali</button></a>
                            </div>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col" style="background-color : #ADD8E6">
                                <div class="pt-3 pb-4 ps-4 pe-4">
                                    <div class="text-center">
                                        <p class="h3 text-gray-900 mb-4"  style="font-weight:800">Sistem Kontrol  Media Informasi - Fasilkom</p>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <p class="h3 text-gray mb-0" style="font-weight:700">Member Registration</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="pb-5 ps-4 pe-4">
                                    <hr>
                                    <div class="text-center">
                                        <p class="text-gray-900 mb-5">Silahkan Isi Formulir Registrasi berikut</p>
                                    </div>
                                    <!-- Formulir -->
                                        <form action="" method ="post" enctype="multipart/form-data" class="row g-3">
                                            <input type="text" hidden name="jenis" value="2">
                                            <input type="text" hidden name="status" value="3">
                                            <div class="row">
                                                <div class="col-lg-4 mb-2">
                                                    <label for="name" class="form-label">Username</label>
                                                    <input class="form-control" type="text" name="name" id="name" required autocomplete ="off">  
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="text" name="email" id="email" required autocomplete ="off">  
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <label for="nohp" class="form-label">No HP</label>
                                                    <input class="form-control" type="text" placeholder="e.g.: 087677878876" name="nohp" id="nohp" required autocomplete ="off">  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <label for="sandi" class="form-label">Password</label>
                                                    <input class="form-control" type="password" name="sandi" id="sandi" required autocomplete ="off">  
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label for="sandi2" class="form-label">Konfirmasi Password</label>
                                                    <input class="form-control" type="password" name="sandi2" id="sandi2" required autocomplete ="off">  
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" name="submit" class="btn btn-secondary">Register</button>
                                            </div>
                                        </form>
                                        <!-- Akhir Formulir -->
                                        <hr>
                                        <p class="text-center">Sudah Punya Akun? <a href="login.php">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
