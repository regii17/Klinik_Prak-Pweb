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
    <link rel="stylesheet" href="assets/css/style-p.css">
    <title>Home - Mind Well</title>
</head>
<body>
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
        <div class="form-container">
            <center>
                <br>
                <h2>Daftar Konsultasi Online</h2>
                <br>
                <hr>
            </center>
                <br>
            <form action="proses.php" method = "post">
                <div class="form-group">
                    <label for="nama-pekerjan">Nama Pasien:</label>
                    <input type="text" name="name-view" value="<?php echo $namaPengguna ?>" disabled>
                    <input type="hidden" name="nama" value="<?php echo $namaPengguna ?>">
                </div>
                <div class="form-group">
                    <label for="jenis-pekerjaan">Usia :</label>
                    <input type="number" id="usia" name="usia" placeholder="Usia" required>
                </div>
                <div class="form-group">
                    <label for="nama-perusahaan">Poli Klinik :</label>
                    <select id="poli" name="poli" required>
                        <option value="" selected>Pilih Poli Klinik...</option>
                        <option value="Dalam">Dalam</option>
                        <option value="Bedah">Bedah</option>
                        <option value="Anak">Anak</option>
                        <option value="Kandungan">Kandungan</option>
                        <option value="THT">THT</option>
                        <option value="Mata">Mata</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="persyaratan">Tanggal Konsultasi :</label>
                    <input type="date" name="tanggal" id="tanggal" placeholder="Tanggal Konsultasi">
                </div>
                <div class="form-group">
                    <label for="persyaratan">Alamat Pasien :</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal" required>
                </div>
                <div class="btn-group">
                    <button type="submit" id="kirim">Kirim</button>
                    <button type="reset" id="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</article>
<?php include 'footer.php'; ?>
<script src="assets/js/script.js"></script>  
</body>
</html>