<?php
session_start();
require_once 'config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah data yang dikirim masuk
if (empty($username) || empty($password)) {
    die("Username atau password tidak boleh kosong.");
}

// Lakukan query
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // DEBUG: Cek isi database
    echo "Username ditemukan di database!<br>";
    echo "Password di database: " . $user['password'] . "<br>";
    echo "Password yang kamu ketik: " . $password . "<br>";

    // Bandingkan
    if ($password == $user['password']) {
        echo "Password cocok! Sedang mengarahkan... ";
        $_SESSION['user_login'] = true;
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<b style='color:red;'>Password SALAH!</b>";
    }
} else {
    echo "<b style='color:red;'>Username TIDAK DITEMUKAN di database!</b>";
}
?>