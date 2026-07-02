<?php
session_start();
// Satpam: Admin harus login dan role-nya harus admin
if (!isset($_SESSION['user_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin System | MadNeighbour</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> 
</head>
<body class="bg-dark text-light">
    <div class="crt-overlay"></div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning mb-5">
    <div class="container">
        <a class="navbar-brand text-warning blink-text" href="index.php" style="font-family: 'VT323', monospace; font-size: 1.8rem;">> ADMIN_CONSOLE</a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" style="font-family: 'VT323', monospace; font-size: 1.3rem;">
                <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container py-5">
        <h1 class="text-warning mb-4" style="font-family: 'VT323', monospace;">> SYSTEM_ACCESS_GRANTED</h1>
        <p class="text-white-50">Selamat datang, System Architect. Anda memiliki akses penuh untuk mengelola database game.</p>

        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="p-4 border border-info bg-black retro-card h-100">
                    <h3 class="text-info">> UPLOAD_NEW_GAME</h3>
                    <p class="text-white-50">Menambahkan entri game baru ke dalam database sistem.</p>
                    <a href="tambah_game.php" class="btn btn-outline-info retro-btn w-100">RUN_ACTION</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="p-4 border border-warning bg-black retro-card h-100">
                    <h3 class="text-warning">> MANAGE_EXISTING</h3>
                    <p class="text-white-50">Mengedit atau menghapus data game yang sudah terdaftar.</p>
                    <a href="list_game.php" class="btn btn-outline-warning retro-btn w-100">VIEW_RECORDS</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-5 mt-5 border-top border-secondary text-white-50">
        <p>MadNeighbour System v2.0 | Administrator Access Only</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>