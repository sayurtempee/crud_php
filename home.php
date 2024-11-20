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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <!-- Data Tables -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
   <!-- Font Google -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <!-- Own CSS -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/svg+xml" href="./img_guru/logo71.png">
   <!-- icon button -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <title>Home Sekolah | SMKN 71 Jakarta</title>
   <style>
      html {
         scroll-behavior: smooth;
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

      header {
         color: red;
         padding: 5px 0;
         text-align: center;
         animation: slideIn 0.5s ease-out;
      }

      header h1 {
         margin: 0;
         animation: fadeIn 1s ease-out;
      }

      .container {
         width: 100%;
         margin: 10px auto;
         overflow: hidden;
         justify-content: space-between;
         animation: fadeIn 2s ease-out;
         color: #000;
      }

      .hero-image {
         width: 100%;
         height: auto;
         opacity: 0;
         animation: fadeIn 3s ease-out 0.5s forwards;
         border-radius: 25px;
         background:
            linear-gradient(#fff 0 0) padding-box,
            /*this is your grey background*/
            linear-gradient(to right, #09203f 0%, #537895 100%) border-box;
         color: #313149;
         border: 5px solid transparent;
         margin-top: 0px;
      }

      .section {
         background: rgba(0, 0, 0, 0.2);
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         animation: slideUp 1s ease-out;
         margin-top: 10px;
         font-family: 'Arial', Helvetica, sans-serif;
         font-size: 16px;
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

      @keyframes slideIn {
         from {
            transform: translateY(-50px);
            opacity: 0;
         }

         to {
            transform: translateY(0);
            opacity: 1;
         }
      }

      @keyframes fadeIn {
         from {
            opacity: 0;
         }

         to {
            opacity: 1;
         }
      }

      @keyframes slideUp {
         from {
            transform: translateY(30px);
            opacity: 0;
         }

         to {
            transform: translateY(0);
            opacity: 1;
         }
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
   <header>
      <h1 style="font-weight: bold;">
         <marquee scrollamount="10" hspace="200" vsapce="200" behavior="alternate" direction="right">Selamat Datang, di Situs SMKN 71 Jakarta</marquee>
      </h1>
      <h4 style="font-weight: bold; color: #007bff;">Unggul Dalam Mutu, Teladan Berperilaku.</h4>
   </header>
   <div class="container">
      <img src="./img_guru/Gedung-Sekolah-2.jpg" alt="Gambar Utama" class="hero-image">
      <section class="section">
         <h2 style="font-weight: bold;">Hello, Selamat Datang!</h2>
         <p>Kami mengundang Anda untuk menjelajahi website kami dan mengetahui lebih banyak tentang SMKN 71 Jakarta. Kami berharap Anda menikmati pengalaman Anda di sini dan menemukan semua informasi yang Anda cari. Terima kasih telah berkunjung!</p>
         <p>Jelajahi menu di atas untuk mengetahui lebih lanjut tentang apa yang kami tawarkan.</p>

         <br>

         <h2 style="font-weight: bold;">Sejarah Singkat</h2>
         <p style="text-align: justify;">SMK Negeri 71 Jakarta berlokasi di Jl Dr Radjiman Widyaningrat. Pulo Jahe Cakung Jakarta Timur. Sekolah ini merupakan salah satu Sekolah unit Baru (USB) yang memulai proses pembangunannya pada tahun 2019. Selama proses pembangunan yang memakan waktu kurang lebih 1 (satu) tahun, kegiatan belajar mengajar dilaksanakan di SMK Negei 46 Jakarta yang terletak di Jl B7 Cipinang Pulo Jakarta Timur. Ibu Oom Siti Halimah, MM adalah Plt kepala sekolah SMK Negeri 71 Jakarta yang mulai bertugas pada bulan Juli 2019 – Januari 2021. Pada di akhir bulan Januari 2021, Bapak Drs Wantarip ditunjuk sebagai Kepala Sekolah SMK Negeri 71 Jakarta untuk selama kurang lebih 1 (satu) bulan, dikarenakan beliau akan memasuki masa purnabakti.
            Di awal bulan Februari 2021, Ibu Oom Siti Halimah, MM kembali bertugas sebagai Plt. Kepala SMK Negeri 71 Jakarta selama kurang lebih 6 (enam) bulan. Diakhir bulan Agustus 2021, Bapak Drs Lambas Pakpahan,MM di tunjuk sebagai Kepala SMK Negeri 71 Jakarta sampai saat ini. SMK Negeri 71 Jakarta dengan luas bangunan 4000 m^2, memiliki 3 (tiga) Kompetensi Keahlian yaitu Kompetensi Keahlian Rekayasa Perangkat Lunak, Desain Komunikasi Visual dan Animasi serta dilengkapi dengan sarana prasarana untuk menunjang proses pembelajaran. Pada bulan Juni 2022 SMK Negeri 71 Jakarta telah menamatkan pertama kali 104 siswa pada tiga kompetensi tersebut diatas. Sebagian siswa tamatan ini telah bekerja, melanjutkan pendidikan serta berwirausaha pada sebagian siswa lainnya.</p>

         <br>

         <h2 style="font-weight: bold;">Visi & Misi</h2>
         <h4>Visi</h4>
         <p>Tewujudnya sumber daya manusia yang berprestasi, unggul, dan berdaya saing global berlandaskan iman dan taqwa.</p>

         <br>

         <h4>Misi</h4>
         <p>1. Meningkatkan iman dan taqwa terhadap Tuhan Yang Maha Esa.</p>
         <p>2. Menyelenggarakan proses pembelajaran secara profesional.</p>
         <p>3. Menumbuh kembangkan jiwa seni dalam industri kreatif pada era digital.</p>
         <p>4. Menghasilkan lulusan yang mampu mengembangkan diri terhadap ilmu pengetahuan dan teknologi informasi.</p>
         <p>5. Mampu bekerja secara profesional serta mampu bersaing secara global.</p>
      </section>
   </div>
   <!-- Close Container -->



   <!-- Footer -->
   <div class="container-fluid">
      <div class="row bg-dark text-white">
         <div class="footer-container">
            <div class="contact-info">
               <h2>Contact Us</h2>
               <p><strong>Phone :</strong><br>
                  +62 81272382192</p>
               <br>
               <p><strong>Address :</strong>
                  <br>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.497517924721!2d106.92049437934566!3d-6.197900250615102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698bd5a839a4e9%3A0x3eef143eb557e41!2sSMK%20NEGERI%2071%20Jakarta!5e0!3m2!1sid!2sid!4v1732112365510!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="social-media">
               <h2>Follow Us:</h2>
               <a href="https://github.com/sayurtempee" target="_blank"><i class="bi bi-github fs-3"></i></a>
               <a href="https://www.instagram.com/f4r1s_l1za/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
            </div>

            <section id="contact-us">
               <div class="contact-container">
                  <div class="contact-form">
                     <h2>Send Message</h2>
                     <form action="send_message.php" method="post">
                        <label for="email">Email:</label>
                        <br>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="message">Message:</label>
                        <br>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <br>
                        <button type="submit" class="btn btn-success">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                              <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                           </svg>
                           send
                        </button>
                     </form>
                  </div>
               </div>
            </section>

         </div>
      </div>
   </div>
   <!-- Close Footer -->

   <!-- <script>
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
   </script> -->

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>