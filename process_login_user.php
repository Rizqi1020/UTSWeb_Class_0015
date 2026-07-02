<?php
session_start();
require_once 'config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Simpan info ke session
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // Kita simpan role-nya
    $_SESSION['login'] = true;

    // Arahkan berdasarkan role
    if ($user['role'] == 'admin') {
        header("Location: admin/index.php"); // Pindah ke dashboard admin
    } else {
        header("Location: index.php"); // Pindah ke halaman user biasa
    }
} else {
    echo "Login Gagal!";
}
?>