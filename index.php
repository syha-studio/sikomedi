<?php
require 'functions.php';
// query
$latestpost = query("SELECT * FROM instagram");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home - SIKOMEDI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SIKOMEDI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#instagram">Instagram</a></li>
          <li><a class="nav-link scrollto" href="#latestpost">Latest Post</a></li>
          <li><a class="nav-link scrollto" href="#guides">Guides</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="member\index.php" class="get-started-btn">Member</a>
      <a href="admin\index.php" class="get-started-btn">Admin</a>


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to Sikomedi,<br>Fasilkom</h1>
      <h2>Sistem Informasi Kontrol Media Sosial</h2>
      <a href="#guides" class="btn-get-started">How to Submit</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container pt-5 mt-1" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>SIKOMEDI</p>
        </div>


        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content text-center">
            <p class="fst-italic">
              Sistem Informasi Kontrol Media Sosial
            </p>
            <p>
              "SIKOMEDI merupakan sebuah sistem informasi yang dirancang dan digunakan
              untuk mengelola dan mengontrol aktivitas media sosial, khususnya instagram, yang terkait dengan fakultas
              dan program studi yang ada di fakultas ilmu komputer."<br>
              <br>Sikomedi dikembangkan dengan tujuan untuk membantu fakultas dalam mengelola dan mengawasi kegiatan
              yang terkait dengan media sosial, <br>seperti mengelola postingan, memantau interaksi pengguna,
              merencanakan dan menjalankan kampanye di media sosial, serta menganalisis kinerja dan dampak dari aktivitas
              media sosial yang dilakukan.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Instagram Section ======= -->
    <section id="instagram" class="instagram">
      <div class="container pt-5 mt-5" data-aos="fade-up">

        <div class="section-title pt-3">
          <h2>Media</h2>
          <p>Our Instagram</p>
        </div>

        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4 mt-4 mt-md-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/fasilkom.upnvjatim">Fasilkom</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/informatika.upnvjatim">Teknik Informatika</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/sisfo_upnjatim">Sistem Informasi</a></h3>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/sada.upnjatim">Sains Data</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/bisdi.upnvjatim">Bisnis Digital</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <h3><a href="https://www.instagram.com/mti.upnjatim">Magister Teknik Informatika</a></h3>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Instagram Section -->

    <!-- ======= Latest Post Section ======= -->
    <section id="latestpost" class="latestpost">
      <div class="container pt-5 mt-1" data-aos="fade-up">
        <div class="section-title">
          <h2>Instagram</h2>
          <p>Latest Post</p>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php foreach ($latestpost as $row) : ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <a href="<?= $row["URL"] ?>"><img src="assets\img\<?= $row["SOURCE"] ?>" class="img-fluid" alt="..."></a>
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?= $row["MEDIA"] ?></h4>
                    <p class="instagram">@<?= $row["IG"] ?></p>
                  </div>
                  <h3><a href="<?= $row["URL"] ?>"><?= $row["JUDULPOSTINGAN"] ?></a></h3>
                  <p><?= $row["CAPTION"] ?></p>
                </div>
              </div>
            </div> <!-- End Latest Post Item-->
          <?php endforeach ?>


          <!-- ======= Guides Section ======= -->
          <section id="guides">
            <div class="container pt-5 mt-1" data-aos="fade-up">

              <div class="section-title">
                <h2>Guides</h2>
                <p>SIKOMEDI Guides</p>
              </div>
              <div class="accordion pt-0" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Registration & Login for Members
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>
                        1. Pilih opsi "Member" pada navbar yang terletak di bagian kanan atas. <br>
                        2. Jika belum terdaftar sebagai member, pilih "Daftar". <br>
                        3. Isi dan submit data pada formulir registrasi, termasuk username, email, nomor HP, dan password. <br>
                        4. Admin akan melakukan verifikasi dan validasi data tersebut. <br>
                        5. Pemberitahuan aktivasi akun akan dikirimkan melalui email. <br>
                        6. Lakukan login ke akun dengan memasukkan username dan password. <br>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Content Submissions
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>
                        7. Setelah berhasil login, member dapat mengakses dashboard dan memilih opsi "Submission" dari menu. <br>
                        8. Pilih opsi "Buat Permintaan" untuk mengajukan permintaan upload konten.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </section><!-- End Guides Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SIKOMEDI</h3>
            <p>
              Information Systems <br>
              Website Programming<br>
              Parallel-A <br><br>
              <strong>Syauqillah Hadie Ahsa</strong> 21082010042<br>
              <strong>Alya Fatin Fadhiyah </strong> 21082010027<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#abut">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#instagram">Instagram</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#latestpost">Latest Post</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#guides">Guides</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="member/index.php">Member</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="admin/index.php">Admin</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Media</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/fasilkom.upnvjatim">Fasilkom</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/informatika.upnvjatim">Teknik Informatika</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/sisfo_upnjatim">Sistem Informasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/sada.upnjatim">Sains Data</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/bisdi.upnvjatim">Bisnis Digital</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/mti.upnjatim">Magister Teknik Informatika</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>SIKOMEDI</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>