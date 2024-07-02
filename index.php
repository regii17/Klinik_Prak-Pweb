<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/s.css">
    <title>RS</title>
</head>
<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "logout") {
            echo"<script>alert('Berhasil Logout !!!')</script>
            ";
        }
        else if ($_GET['pesan'] == "belumlogin") {
            echo"<script>alert('Silahkan Login Terlebih Dahulu')</script>
            ";
        }
    }
    ?>
 <nav>
    <div class="logo">
        <img id = "bg" src="assets/img/rs.jpeg" alt="" srcset="">
        <img id="logo" src="assets/img/logo.png" alt="Logo">
        <h2>MIND WELL</h2>
        <div class="gradien">
        </div>
    </div>
</nav>
    <div class="container">
        <div class="login">
            <div class="form">
                <h1>LOGIN</h1>
                <form method="post" action="cek-login.php">
                    <h5>Username</h5>
                    <input type="text" name="nama" placeholder="Username" required>
                    <h5>Password</h5>
                    <input type="password" name="password" placeholder="Password" required>
                    <button name="btn" type="submit">LOGIN</button>
                </form>
                <p>Belum memiliki akun? <a href="register.php">Registrasi</a></p>
            </div>
        </div>
        <div class="contens">
            <div class="conten">
                <h2>Dokter Spesialis</h2>
                <p>Terdapat berbagai dokter spesialis yang telah profesional</p>
            </div><br>
            <div class="conten">
                <h2>Fasilitas Kesehatan</h2>
                <p>Memiliki fasilitas kesehatan yang lengkap dan dibekali dengan teknologi terbaru</p>
            </div><br>
            <div class="conten">
                <h2>Layanan BPJS</h2>
                <p>Tersedia layanan BPJS untuk menunjang kesehatan anda</p>
            </div><br>
        </div>
    </div>
    <footer>
        <br>
        <strong>Copyright &copy; 2024 <a href="#">Regii</a>.</strong>
         All rights reserved.
         <div class="footer-right">
            <b>Version</b> 0.0.1
         </div>
    </footer>
</body>
</html>
