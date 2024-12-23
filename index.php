<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit();
}



// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$siswa = query("SELECT * FROM siswa ORDER BY nis DESC");
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

    <title>Data Siswa | SMKN 71 Jakarta</title>
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
                    <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Close Navbar -->

<!-- Container -->
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <h3 class="text-center fw-bold text-uppercase">Data Siswa</h3>
            <hr>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            <a href="export.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['jekel']; ?></td>
                            <?php
                            $now = time();
                            $timeTahun = strtotime($row['tgl_Lahir']);
                            $setahun = 31536000;
                            $hitung = ($now - $timeTahun) / $setahun;
                            ?>
                            <td><?= floor($hitung); ?> Tahun</td>
                            <td><?= $row['jurusan']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['nis']; ?>" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |

                                <a href="ubah.php?nis=<?= $row['nis']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                <a href="hapus.php?nis=<?= $row['nis']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Close Container -->

<!-- Modal Detail Data -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="detail-siswa">
            </div>
        </div>
    </div>
</div>
<!-- Close Modal Detail Data -->

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

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table

        // Fungsi Detail
        $('.detail').click(function() {
            var dataSiswa = $(this).attr("data-id");
            $.ajax({
                url: "detail.php",
                method: "post",
                data: {
                    dataSiswa,
                    dataSiswa
                },
                success: function(data) {
                    $('#detail-siswa').html(data);
                    $('#detail').modal("show");
                }
            });
        });
        // Fungsi Detail
    });

    // // Auto logout after berapa second inactivity
    // let idleTime = 0;

    // // function to reset idleTime
    // function resetidleTime(){
    //     idleTime = 0;
    // }

    // // Increment idleTime every second
    // setInterval(function() {
    //     idleTime++;
    //     if (idleTime >= 30){
    //         window.location.href = 'logout.php';
    //     }
    // }, 1000);

    // // Reset idleTime ory activity
    // window.onload = function(){
    //     document.body.addEventListener('mousemove', resetidleTime);
    //     document.body.addEventListener('keypress', resetidleTime);
    // };
</script>
</body>

</html>