<?php
// Konfigurasi database
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'crud_db'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = 'mii123'; // Ganti dengan password database Anda

// Buat koneksi
$conn = new mysqli($host, $username, $password, $dbname);
 
// Periksa koneksi
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Periksa apakah formulir telah dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Ambil dan bersihkan data dari formulir
   $email = $conn->real_escape_string(trim($_POST['email']));
   $message = $conn->real_escape_string(trim($_POST['message']));

   // Query untuk menyimpan pesan ke database
   $sql = "INSERT INTO messages (email, message) VALUES ('$email', '$message')";

   if ($conn->query($sql) === TRUE) {
      echo "<script>
      alert('Terima kasih atas pesan Anda. Kami akan segera menghubungi Anda.');
      document.location.href = 'home.php';
      </script>";
   } else {
      echo "<p>Sorry, there was a problem sending your message. Please try again later.</p>";
   }

   // Tutup koneksi
   $conn->close();
} else {
   echo "<p>Invalid request.</p>";
}
