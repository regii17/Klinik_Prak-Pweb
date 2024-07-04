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
        if ($_GET['pesan'] == "OGE3dzQwrzt1hTeMYQJTrw") {
            echo"<script>alert('Pendaftaran Anda Berhasil Disimpan')</script>
            ";
        }
    }
    ?>
    <div class="form">
        <center>
            <h1>Jadwal Konsultasi Anda</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Usia</th>
                        <th>Poli Klinik</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Alamat</th>
                        <th>Nomor Antrian</th>
                        <th colspan="2">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="jobOffers">
                <?php
                $namaFile = '../pendaftaran.txt';
                if (file_exists($namaFile)) {
                    $file = fopen($namaFile, 'r');
                    $adaData = false;
                    $no = 1;
                    while (($line = fgets($file)) !== false) {
                        $data = explode('|', $line);
                        if (count($data) == 6) {
                            $nama = htmlspecialchars(trim($data[0]));
                            if ($nama == $namaPengguna) {
                                $adaData = true;
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $nama . "</td>";
                                echo "<td>" . htmlspecialchars(trim($data[1])) . "</td>";
                                echo "<td>" . htmlspecialchars(trim($data[2])) . "</td>";
                                echo "<td>" . htmlspecialchars(trim($data[3])) . "</td>";
                                echo "<td>" . htmlspecialchars(trim($data[4])) . "</td>";
                                echo "<td>" . htmlspecialchars(trim($data[5])) . "</td>";
                                echo "<td><center><button class='cetak'>Cetak</button></center></td>";
                                echo "</tr>";
                                $no++;
                            }
                        }
                    }
                    fclose($file);
                    if (!$adaData) {
                        echo "<tr><td colspan='8'><center>Anda belum memiliki riwayat pendaftaran.</center></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'><center>Tidak ada data pendaftaran.</center></td></tr>";
                }
                ?>
                </tbody>
            </table>
        </center>
    </div>
</article>
<?php include 'footer.php'; ?>
<script src="assets/js/script.js"></script>  
</body>
</html>
