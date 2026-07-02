<?php
// admin/fix_password.php
require_once '../config/db.php';

$username = 'admin';
$password = 'password123';

// Membuat hash password baru yang dijamin valid oleh sistem PHP kamu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 1. Kosongkan tabel admins terlebih dahulu untuk menghindari duplikasi data
mysqli_query($conn, "TRUNCATE TABLE admins");

// 2. Masukkan data admin dengan hash yang baru dan segar
$stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "<h2 style='color: green; font-family: monospace;'>[ SUCCESS ] Akun admin berhasil diperbarui!</h2>";
    echo "<p style='font-family: monospace;'>Username: <b>admin</b><br>Password: <b>password123</b></p>";
    echo "<p style='color: red; font-family: monospace;'>*PENTING: Segera hapus file 'fix_password.php' ini demi keamanan setelah login berhasil.</p>";
} else {
    echo "<h2 style='color: red; font-family: monospace;'>[ ERROR ] Gagal memperbarui database: " . $conn->error . "</h2>";
}
?>