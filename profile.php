<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('location:login.php');
   exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <!-- Bootstrap Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
   <!-- Font Google -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <!-- Own CSS -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/svg+xml" href="./img_guru/logo71.png">

   <title>Profile Sekolah | SMKN 71 Jakarta</title>
   <style>
      html {
         scroll-behavior: smooth;
      }

      .container {
         width: 100%;
         margin: 10px auto;
         overflow: hidden;
         justify-content: space-between;
         animation: fadeIn 2s ease-out;
         color: #000;
         z-index: 9999;
      }

      .card {
         overflow: hidden;
         transition: transform 0.3s ease;
      }

      .card-img-top {
         transition: transform 0.3s ease;
      }

      .card:hover .card-img-top {
         transform: scale(1.1);
         /* Zoom gambar saat hover */
      }

      .card:hover {
         transform: translateY(-10px);
         /* Sedikit mengangkat kartu saat hover */
      }

      .gallery-item {
         position: relative;
         overflow: hidden;
      }

      .gallery-item img {
         width: 100%;
         height: auto;
      }

      .gallery-item:hover .overlay {
         opacity: 1;
      }

      .overlay {
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background: rgba(0, 0, 0, 0.5);
         color: white;
         opacity: 0;
         transition: opacity 0.3s ease;
         display: flex;
         align-items: center;
         justify-content: center;
         text-align: center;
      }


      footer {
         background-color: #f8f9fa;
         padding: 20px;
         color: #343a40;
         font-family: Arial, sans-serif;
      }

      .footer-container {
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
      }

      .contact-info,
      .social-media,
      .contact-form {
         flex: 1;
         margin: 10px;
      }

      .contact-info p,
      .social-media a,
      .contact-form a {
         margin: 5px 0;
         color: #007bff;
         text-decoration: none;
      }

      .contact-info a:hover,
      .social-media a:hover,
      .contact-form a:hover {
         text-decoration: underline;
      }
   </style>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
      <div class="container">
         <a class="navbar-brand" href="index.php">SMKN 71 Jakarta</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="home.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Data Siswa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- Close Navbar -->

   <!-- Container -->
   <div class="container">
      <!-- Heading -->
      <h1 class="text-center mb-4" style="margin-top: 20px; font-weight:bold;">Struktur SMK Negeri 71 Jakarta</h1>
   </div>
   <div class="container my-5">
      <div class="row">
         <div class="col-md-4">
            <div class="card">
               <img src="./img_guru/IMG_4446.JPG" class="card-img-top" alt="Image 1">
               <div class="card-body">
                  <h5 class="card-title">LAMBAS PAKPAKHAN MM</h5>
                  <p class="card-text">Kepala Sekolah</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               <img src="https://via.placeholder.com/300" class="card-img-top" alt="Image 2">
               <div class="card-body">
                  <h5 class="card-title">JENNY VIERA</h5>
                  <p class="card-text">Wakil Kepala Sekolah</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               <img src="./img_guru/IMG_4397.JPG" class="card-img-top" alt="Image 3">
               <div class="card-body">
                  <h5 class="card-title">SUWARNI</h5>
                  <p class="card-text">Wakil Kesiswaan</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <!-- Heading -->
      <h2 class="text-center mb-4" style="margin-top: 20px; font-weight: bold;">Guru - Guru SMKN 71 Jakarta</h2>
      <div class="container my-5">
         <div class="row">
            <!-- Item 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4434.JPG" alt="Image 1" class="img-fluid">
                  <div class="overlay">
                     <h5>DWI YUNIASTUTI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4440.JPG" alt="Image 2" class="img-fluid">
                  <div class="overlay">
                     <h5>ANISHA OKTAVIANA</h5>
                  </div>
               </div>
            </div>
            <!-- Item 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4400.JPG" alt="Image 3" class="img-fluid">
                  <div class="overlay">
                     <h5>NUR MUHAMMAD SAPI'IE</h5>
                  </div>
               </div>
            </div>
            <!-- Item 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4424.JPG" alt="Image 4" class="img-fluid">
                  <div class="overlay">
                     <h5>SIGIT PRASETYO</h5>
                  </div>
               </div>
            </div>
            <!-- Item 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4388.JPG" alt="Image 5" class="img-fluid">
                  <div class="overlay">
                     <h5>SAMUEL WICAKSANA</h5>
                  </div>
               </div>
            </div>
            <!-- Item 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4392.JPG" alt="Image 6" class="img-fluid">
                  <div class="overlay">
                     <h5>FARADILLAH ARYANI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 7 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4403.JPG" alt="Image 7" class="img-fluid">
                  <div class="overlay">
                     <h5>DWIADI ELIYANTO</h5>
                  </div>
               </div>
            </div>
            <!-- Item 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_6244.JPG" alt="Image 8" class="img-fluid">
                  <div class="overlay">
                     <h5>KHAIRUL ARIFIN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 9 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4390.JPG" alt="Image 9" class="img-fluid">
                  <div class="overlay">
                     <h5>FANNY INDRIYANI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 10 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_6236.JPG" alt="Image 11" class="img-fluid">
                  <div class="overlay">
                     <h5>NURHADI YAHYA</h5>
                  </div>
               </div>
            </div>
            <!-- Item 11 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/BU-DALILAH.png" alt="Image 11" class="img-fluid">
                  <div class="overlay">
                     <h5>DALILAH</h5>
                  </div>
               </div>
            </div>
            <!-- Item 12 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/BU-MEKSI.png" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>MEKSI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 13 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4432.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>MIFTAHUL ZANNAH</h5>
                  </div>
               </div>
            </div>
            <!-- Item 14 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4438.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>ANGGI LARAS PRATIWI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 15 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3927.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>AZIZAH KHOIRO NISAH</h5>
                  </div>
               </div>
            </div>
            <!-- Item 16 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3946.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>NANDA ARSYA MURTI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 17 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3840.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>MUHAMMAD USMAN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 18 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3868.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>NURHAYATUL FADILLAH</h5>
                  </div>
               </div>
            </div>
            <!-- Item 19 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3875.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>FONNY KRISNAWULAN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 20 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/870365d3-b97a-4b40-9cf6-59325d64a553.jfif" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>RAHMAT SETIAWAN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 21 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/arif.jfif" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>ARIF RAHMADI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 22 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/comi.jpeg" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>COMI</h5>
                  </div>
               </div>
            </div>
            <!-- Item 23 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/umi.jpeg" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>UMI</h5>
                  </div>
               </div>
            </div>

            <!-- Sarana Prasarana -->
            <h2 class="text-center mb-4" style="margin-top: 20px; font-weight:bold;">SARANA PRASARANA</h2>
            <!-- Item 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_6229.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>MAULANA HIDAYAT</h5>
                  </div>
               </div>
            </div>
            <!-- Item 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4430.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>HENDRA DETHA P</h5>
                  </div>
               </div>
            </div>
            <!-- Item 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_6240.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>MASMUDIN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_4411.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>AGUSTIN</h5>
                  </div>
               </div>
            </div>
            <!-- Item 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_6224.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>ABDUL ROHMAT</h5>
                  </div>
               </div>
            </div>
            <!-- Item 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3911.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>JOANA</h5>
                  </div>
               </div>
            </div>
            <!-- Item 7 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3956.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>JOANA</h5>
                  </div>
               </div>
            </div>
            <!-- Item 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
               <div class="gallery-item">
                  <img src="./img_guru/IMG_3958.JPG" alt="Image 12" class="img-fluid">
                  <div class="overlay">
                     <h5>JOANA</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Close Container -->



   <!-- Footer -->
   <div class="container-fluid">
      <div class="row bg-dark text-white">
         <div class="footer-container">
            <div class="contact-info">
               <h2>Contact Us</h2>
               <p><strong>Address:</strong><br>
                  Jl. Dr. KRT Radjiman Widyodiningrat Jl. Kp. Pulo Jahe<br>
                  Jatinegara, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13930<br>
                  Jakarta Timur</p>
               <p><strong>Phone:</strong><br>
                  +62 81272382192</p>
            </div>

            <div class="social-media">
               <h2>Follow Us:</h2>
               <a href="https://github.com/sayurtempee" target="_blank"><i class="bi bi-github fs-3"></i></a>
               <a href="https://www.instagram.com/f4r1s_l1za/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
            </div>
         </div>
      </div>
   </div>
   <!-- Close Footer -->
   <script>
      // // Auto logout after berapa second inactivity
      // let idleTime = 0;

      // // function to reset idleTime
      // function resetidleTime() {
      //    idleTime = 0;
      // }

      // // Increment idleTime every second
      // setInterval(function() {
      //    idleTime++;
      //    if (idleTime >= 30) {
      //       window.location.href = 'logout.php';
      //    }
      // }, 1000);

      // // Reset idleTime ory activity
      // window.onload = function() {
      //    document.body.addEventListener('mousemove', resetidleTime);
      //    document.body.addEventListener('keypress', resetidleTime);
      // };
   </script>
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>