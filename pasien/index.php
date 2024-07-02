<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: ../index.php?pesan=belumlogin");
    exit();
}

$namaPengguna = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/zz.css">
    <title>Home - Mind Well</title>
</head>
<body style = "height : 550px">
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
    <article>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "succesUpcv") {
            echo"<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Menyimpan CV',
                text: 'Anda telah berhasil menyimpan CV anda.',
            });</script>
            ";
        }
    }
    ?>
        <div class="form">

        </div>
    </article>
    <?php include 'footer.php'; ?>
    <script src="assets/js/script.js"></script>  
</body>
</html>