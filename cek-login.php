<?php
session_start();

// Fungsi untuk memeriksa username dan password dari file user.txt
function cekLoginUser($username, $password) {
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

function cekLoginStaf($username, $password) {
    $file = fopen("staff.txt", "r");
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (cekLoginUser($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: pasien/index.php");
        exit();
    }
    elseif (cekLoginStaf($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: medis/index.php");
        exit();
    }
    else {
        header("Location: index.php?pesan=qk8YK03x0xXDJcdbOS5dBw");
    }
}
?>
