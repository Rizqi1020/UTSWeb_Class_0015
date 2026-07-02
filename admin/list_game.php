<?php
session_start();
// Cek Login & Role
if (!isset($_SESSION['user_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
require_once '../config/db.php';

// Ambil data game
$query = mysqli_query($conn, "SELECT * FROM games ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Manage Records | Admin</title>
</head>
<body class="bg-dark text-light">
    <div class="container py-5">
        <h2 class="text-warning mb-4" style="font-family: 'VT323', monospace;">> DATA_RECORDS</h2>
        <div class="table-responsive p-3 border border-warning bg-black retro-card">
            <table class="table table-dark table-hover text-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td>
                            <a href="hapus_game.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">DELETE</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <a href="index.php" class="text-secondary">[ BACK_TO_DASHBOARD ]</a>
        </div>
    </div>
</body>
</html>