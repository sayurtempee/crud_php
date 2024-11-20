<?php

session_start();
// Aktifkan tampilan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'function.php';


if (isset($_POST['register'])) {
   if ($koneksi->connect_error) {
      die("Connection failed: " . $koneksi->connect_error);
   }

   // Ambil data dari form
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $role = $_POST['role']; // Ambil role (admin/user)

   // Cek apakah email sudah terdaftar
   $sql = "SELECT * FROM user WHERE email = '$email'";
   $result = $koneksi->query($sql);

   if ($result->num_rows > 0) {
      // Jika email sudah ada
      echo '<script>alert("Email sudah terdaftar!");</script>';
   } elseif ($password != $cpassword) {
      // Jika password tidak cocok dengan konfirmasi password
      echo '<script>alert("Password dan konfirmasi password tidak cocok!");</script>';
   } else {
      // Jika email belum terdaftar dan password cocok
      // Masukkan data ke dalam database
      $sql = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

      if ($koneksi->query($sql) === TRUE) {
         echo '<script>alert("Registrasi berhasil!"); window.location.href = "login.php";</script>';
      } else {
         echo '<script>alert("Error: ' . $koneksi->error . '");</script>';
      }
   }

   // Menutup koneksi
   $koneksi->close();
}

// Menutup koneksi
$koneksi->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <!-- Tambahkan Animate.css -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->
   <!-- Font Google -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <!-- Own CSS -->
   <link rel="stylesheet" href="css/register.css">
   <link rel="icon" type="image/svg+xml" href="./img_guru/logo71.png">

   <title>Register | SMKN 71 Jakarta</title>
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
   </style>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="index.php">Register | SMKN 71 Jakarta</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="register.php">Register</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="login.php"> Login</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- Close Navbar -->

   <div class="container">
      <div class="row my-5">
         <div class="col-md-6 text-center login" style="background-color: #001F3F; border-radius: 8px;">
            <h4 class="fw-bold" style="color: #fff;">Register</h4>
            <!-- Ini Error jika tidak bisa login -->
            <?php if (isset($error)) : ?>
               <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
            <?php endif; ?>
            <form action="" method="post">
               <div class="form-group my-4 text-center">
                  <select class="form-control w-50 mx-auto" name="role" required>
                     <option value="user">User</option>
                     <option value="admin">Admin</option>
                  </select>
               </div>
               <div class="form-group my-4">
                  <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" required>
               </div>
               <div class="form-group my-4">
                  <input type="email" class="form-control w-50" placeholder="Masukkan Email" name="email" required>
               </div>

               <div class="form-group my-4">
                  <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" required>
               </div>

               <div class="form-group my-4">
                  <input type="password" class="form-control w-50" placeholder="Konfirmasi Password" name="cpassword" required>
               </div>
               <button class="btn btn-primary text-uppercase" type="submit" name="register">Register</button>
            </form>
         </div>
      </div>
   </div>
   

   <!-- autocomplete="off" = agar tidak menyimpan history -->


   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>