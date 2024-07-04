<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?pesan=Le8ZIG5RppyvHSPqfgjUvQ");
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
    <link rel="stylesheet" href="assets/css/style-m.css">
    <title>Home - Mind Well</title>
</head>
<body >
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
    <article>
        <div class="form">
        <h2>Selamat Datang, <?php echo $namaPengguna; ?></h2>
            <p>Selamat datang kembali. Terus semangat dan tetaplah berhati hati demi kesehatan bangsa dan negara</p>
            <br>
            <br>
            <section class="info-umum">
                <h3>Informasi Umum</h3>
                <p>Selamat!! Anda telah menyelesaikan 2000 jam pekerjaan</p>
            </section>
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
