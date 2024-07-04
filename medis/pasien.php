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
<body>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
    <article>
        <div class="form">
        <center>
        <h1>Jadwal Konsultasi Anda</h1>
        </center>
            <div class="select-wrapper">
                <label for="poliFilter">Pilih Poli Klinik:</label>
                <select id="poliFilter" onchange="filterAndSortData()">
                    <option value="">Semua</option>
                    <option value="Dalam">Dalam</option>
                    <option value="Bedah">Bedah</option>
                    <option value="Anak">Anak</option>
                    <option value="Kandungan">Kandungan</option>
                    <option value="THT">THT</option>
                    <option value="Mata">Mata</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label for="sortOrder">Urut Berdasarkan:</label>
                <select id="sortOrder" onchange="filterAndSortData()">
                    <option value="tanggal">Tanggal</option>
                    <option value="nama">Nama</option>
                </select>
            </div>
            <center><br>
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
                    </tr>
                </thead>
                <tbody id="jobOffers">
                </tbody>
            </table>
            </center>
        </div>
    </article>
    <?php include 'footer.php'; ?>
    <script>
        const data = [];
    <?php
        $namaFile = '../pendaftaran.txt';
        
        if (file_exists($namaFile)) {
            $file = fopen($namaFile, 'r');
            $no = 1;

            while (($line = fgets($file)) !== false) {
                $data = explode('|', $line);
                if (count($data) == 6) {
                    echo 'data.push({';
                    echo 'nama: "' . htmlspecialchars(trim($data[0])) . '",';
                    echo 'usia: "' . htmlspecialchars(trim($data[1])) . '",';
                    echo 'poli: "' . htmlspecialchars(trim($data[2])) . '",';
                    echo 'tanggal: "' . htmlspecialchars(trim($data[3])) . '",';
                    echo 'alamat: "' . htmlspecialchars(trim($data[4])) . '",';
                    echo 'antrian: "' . htmlspecialchars(trim($data[5])) . '",';
                    echo '});';
                }
                $no++;
            }
            fclose($file);
        }
        else {
            echo 'document.getElementById("jobOffers").innerHTML = "<tr><td colspan=\'7\'>Tidak ada data pendaftaran.</td></tr>";';
        }
    ?>
    </script>
    <script src="assets/js/script.js"></script>  
</body>
</html>
