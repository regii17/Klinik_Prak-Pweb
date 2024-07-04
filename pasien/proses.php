<?php
function getNomorUrutTerakhir($tanggal, $poli) {
    $namaFile = '../pendaftaran.txt';
    $nomorUrut = 0;
    if (file_exists($namaFile)) {
        $file = fopen($namaFile, 'r');
        while (($line = fgets($file)) !== false) {
            $data = explode('|', $line);
            if (count($data) == 6 && trim($data[3]) == $tanggal && trim($data[2]) == $poli) {
                $nomorUrut = (int)trim($data[5]);
            }
        }
        fclose($file);
    }
    return $nomorUrut;
}

function simpanData($nama, $usia, $poli, $tanggal, $alamat) {
    $namaFile = '../pendaftaran.txt';
    $nomorUrutTerakhir = getNomorUrutTerakhir($tanggal, $poli);
    $nomorUrutBaru = $nomorUrutTerakhir + 1;
    $file = fopen($namaFile, 'a');
    $data = "$nama|$usia|$poli|$tanggal|$alamat|$nomorUrutBaru\n";
    fwrite($file, $data);
    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $poli = $_POST['poli'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    simpanData($nama, $usia, $poli, $tanggal, $alamat);
    
    header("Location: jadwal.php?pesan=t57aPuE/IDtiFa6ie/S+hQ==");
}
?>
