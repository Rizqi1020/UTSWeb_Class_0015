<?php
session_start();
require_once '../config/db.php';

if ($_SESSION['role'] !== 'admin') { exit("Akses Ditolak"); }

$title = $_POST['title'];
$desc = $_POST['description'];
$img = $_POST['image_url'];
$link = $_POST['steam_link'];

$query = "INSERT INTO games (title, description, image_url, steam_link) VALUES ('$title', '$desc', '$img', '$link')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Game berhasil ditambah!'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>