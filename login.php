<?php
session_start();
require "function.php";
// Jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengambil data dari user berdasarkan username
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Periksa password
        if ($user['password'] === $password) {
            // Jika password benar, set session dan redirect ke home.php
            $_SESSION['login'] = true;
            header('location:home.php');
            exit;
        } else {
            // Jika password salah
            $error = "Password salah.";
        }
    } else {
        // Jika username tidak ditemukan
        $error = "Username tidak ditemukan.";
    }
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/svg+xml" href="./img_guru/logo71.png">

    <title>Login | SMKN 71 Jakarta</title>
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

        footer {
            background-color: red;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Login | SMKN 71 Jakarta</a>
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
                <h4 class="fw-bold" style="color: #fff;">Login</h4>
                <!-- Ini Error jika tidak bisa login -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group my-4">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" required>
                    </div>
                    <div class="form-group my-4">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" id="input-password" autocomplete="off" required>
                        <label for="show-password" style="color: #fff;">
                            <input type="checkbox" name="show-password" id="show-password">
                            tampilkan password
                        </label>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit" name="login">Login</button>
                </form>
                <button class="btn btn-danger" style="margin-top:10px;">
                    <a href="forget.php" style="color: #000;">Forget Password?</a>
                </button>
            </div>
        </div>
    </div>

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
            </div>
        </div>
    </div>
    <!-- Close Footer -->
    <script>
        // Logika untuk melihat password
        const inputPassword = document.getElementById("input-password");
        const showPassword = document.getElementById("show-password");

        showPassword.addEventListener("input", (e) => {
            if (e.target.checked) {
                inputPassword.setAttribute("type", "text");
            } else {
                inputPassword.setAttribute("type", "password");
            }
        });
    </script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>