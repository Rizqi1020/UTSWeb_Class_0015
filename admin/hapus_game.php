<?php
session_start();
require_once '../config/db.php';
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit(); }

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM games WHERE id = '$id'");
header("Location: list_game.php");
?>