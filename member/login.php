<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'functions.php';

if (isset($_POST["submit"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users where NAME = '$username' AND STATUS_ID = 2");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["PASSWORD"])) {
            $_SESSION["login"] = true;
            header("Location: index.php?name=$username");
            exit;
        }
    }
    $error = true;
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
    <title>Login Member - SIKOMEDI</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="background : #E74926">
    <div class="container p-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7" style="background : #FADBD5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4">Sistem Kontrol <br>
                                            Media Informasi <br> Fakultas Ilmu Komputer</h1>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <p style="font-size:100px" class="mb-0"><i class="bi bi-instagram"></i></p>
                                        <p class="h1 text-gray mb-2" style="font-weight:800">SIKOMEDI</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="col d-flex justify-content-start pt-4 ps-4 pe-4">
                                    <a href="../index.php"><button type="button" class="btn" style="background : #FADBD5; color : #010B13"><i class="bi bi-back"></i> Kembali</button></a>
                                </div>
                                <div class="pb-5 ps-4 pe-4">
                                    <hr>
                                    <div class="text-center">
                                        <p class="h4 text-gray-900 mb-1" style="font-weight:700">Selamat Datang</p>
                                        <p class="text-gray-900 mb-4">Silahkan Login dengan Akun Member</p>
                                    </div>
                                    <?php if (isset($error)) : ?>
                                        <div class="row text-center mb-1">
                                            <div class="col pt-1">
                                                <p style="color : red;">Username/Password salah!!</p>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-user btn-block" style="background : #E74926; color:white;"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                                    </form>
                                    <hr>
                                    <p class="text-center">Belum Punya Akun? <a href="register.php">Daftar</a></p>
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