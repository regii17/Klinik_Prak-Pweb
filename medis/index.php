<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?pesan=belumlogin");
    exit();
}

$namaPengguna = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home - Mind Well</title>
</head>
<body >
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
    <article>
        <div class="form">
        <h2>Selamat Datang, <?php echo $namaPengguna; ?></h2>
            <p>Selamat datang di aplikasi klinik kesehatan kami. Di sini Anda bisa melakukan berbagai hal seperti melihat jadwal janji temu, memeriksa riwayat medis, dan melihat informasi dokter.</p>
            <br>
            <br>
            <!-- Informasi Umum -->
            <section class="info-umum">
                <h3>Informasi Umum</h3>
                <p>Aplikasi klinik kesehatan kami membantu Anda untuk mengelola kesehatan dengan lebih baik. Anda dapat membuat janji temu dengan dokter, melihat riwayat medis, dan mendapatkan informasi kesehatan terbaru.</p>
            </section>

            <!-- Gambar Klinik -->
            <section class="gambar-klinik">
                <h3>Gambar Klinik</h3>
                <img src="assets/img/rs.jpeg" alt="Gambar Klinik 1">
                <img src="assets/img/rs.jpeg" alt="Gambar Klinik 2">
            </section>

            <!-- Link ke Fitur-Fitur -->
            <section class="link-fitur">
                <h3>Jelajahi Fitur Kami</h3>
                <ul>
                    <li><a href="jadwal.php">Lihat Jadwal Janji Temu</a></li>
                    <li><a href="dafar.php">Pendaftaran Online</a></li>
                    <li><a href="#">Informasi Dokter</a></li>
                </ul>
            </section>
            
        </div>
    </article>
    <?php include 'footer.php'; ?>
    <script src="assets/js/script.js"></script>  
</body>
</html>
