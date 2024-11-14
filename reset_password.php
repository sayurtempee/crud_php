<!-- reset_password.php -->
<?php
session_start();
require "function.php";

if (!isset($_SESSION['email'])) {
   // Jika email tidak ada di sesi, arahkan kembali ke halaman form lupa password
   header("Location: forget.php");
   exit;
}

// Ambil email dari sesi
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $new_password = $_POST['password'];

   // Update password di tabel user
   $stmt = $koneksi->prepare("UPDATE user SET password = ? WHERE email = ?");
   $stmt->bind_param("ss", $new_password, $email);
   $stmt->execute();

   // Hapus sesi email setelah proses selesai
   unset($_SESSION['email']);

   echo "<script>
   alert('Password Berhasil Di Ubah');
   window.location.href = 'login.php';
 </script>";
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
   <!-- Font Google -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <!-- Own CSS -->
   <link rel="stylesheet" href="css/login.css">
   <link rel="icon" type="image/svg+xml" href="./img_guru/logo71.png">

   <title>Forget | SMKN 71 Jakarta</title>
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

      h2 {
         text-align: center;
         color: #333;
      }

      label {
         display: block;
         margin-bottom: 8px;
      }

      input[type="email"] {
         width: 100%;
         padding: 10px;
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      button {
         width: 100%;
         padding: 10px;
         background-color: #28a745;
         color: white;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      button:hover {
         background-color: #218838;
      }
   </style>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="index.php">Forget | SMKN 71 Jakarta</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="register.php">Register</a>
               </li>
               <li class="nav-item" style="color: white;">
                  <a class="nav-link"> | </a>
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
      <form method="POST" action="">
         <label for="password">Password Baru:</label>
         <input type="password" name="password" required>
         <input type="submit" value="Atur Ulang Password">
      </form>
   </div>


   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>