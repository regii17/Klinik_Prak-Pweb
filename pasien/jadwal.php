<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: ../index.php?pesan=belumlogin");
    exit();
}

// Mendapatkan nama pengguna dari sesi
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
        // Menentukan nama file
        $namaFile = 'pendaftaran.txt';
        
        // Memeriksa apakah file ada
        if (file_exists($namaFile)) {
            // Membuka file dengan mode read
            $file = fopen($namaFile, 'r');
            
            // Membaca isi file baris per baris
            $no=1;
            while (($line = fgets($file)) !== false) {
                // Memecah data berdasarkan |
                $data = explode('|', $line);
                
                // Memastikan jumlah elemen dalam data sesuai
                if (count($data) == 5) {
                    $nama = htmlspecialchars(trim($data[0]));
                    if ($nama == $namaPengguna) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $nama . "</td>";
                        echo "<td>" . htmlspecialchars(trim($data[1])) . "</td>";
                        echo "<td>" . htmlspecialchars(trim($data[2])) . "</td>";
                        echo "<td>" . htmlspecialchars(trim($data[3])) . "</td>";
                        echo "<td>" . htmlspecialchars(trim($data[4])) . "</td>";
                        echo "<td><center>" . $no . "</center></td>";
                        echo"<td><center><button class='cetak'>Cetak</button></center></td>";
                        echo "</tr>";
                    }
                }
                $no++;
            }
            
            // Menutup file
            fclose($file);
        } else {
            echo "<tr><td colspan='4'>Tidak ada data pendaftaran.</td></tr>";
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