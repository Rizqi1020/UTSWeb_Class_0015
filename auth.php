<?php
session_start();
require_once 'config/db.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
    
    if ($password == $user['password']) {
        $_SESSION['user_login'] = true;
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
}
?>