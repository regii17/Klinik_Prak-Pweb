<?php
// Fungsi untuk menyimpan data ke dalam file
function simpanData($nama, $usia, $poli, $tanggal, $alamat) {
    // Menentukan nama file
    $namaFile = '../pendaftaran.txt';
    
    // Membuka file dengan mode append
    $file = fopen($namaFile, 'a');
    
    // Menulis data ke dalam file dengan pemisah |
    $data = "$nama|$usia|$poli|$tanggal|$alamat\n";
    fwrite($file, $data);
    
    // Menutup file
    fclose($file);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $poli = $_POST['poli'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    
    // Menyimpan data ke dalam file
    simpanData($nama, $usia, $poli, $tanggal, $alamat);
    
    echo "Data berhasil disimpan. <a href='jadwal.php'>Lihat data</a>";
}
?>
