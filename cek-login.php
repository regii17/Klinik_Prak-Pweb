<?php
session_start();

// Fungsi untuk memeriksa username dan password dari file user.txt
function cekLogin($username, $password) {
    $file = fopen("user.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $credentials = explode("|", trim($line));
            if ($credentials[0] == $username && $credentials[1] == $password) {
                fclose($file);
                return true;
            }
        }
        fclose($file);
    }
    return false;
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Memeriksa username dan password
    if (cekLogin($username, $password)) {
        // Menyimpan nama pengguna ke sesi
        $_SESSION['username'] = $username;
        
        // Redirect ke halaman pasien/index.php
        header("Location: pasien/index.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }
}
?>
