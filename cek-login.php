<?php
session_start();

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    
    // Menyimpan nama pengguna ke sesi
    $_SESSION['nama'] = $nama;
    
    // Redirect ke halaman tampil.php
    header("Location: pasien/index.php");
    exit();
}
?>
