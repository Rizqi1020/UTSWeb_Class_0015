<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body class="bg-dark text-light" style="font-family: 'VT323', monospace; font-size: 1.2rem;">
    <div class="container py-5">
        <div class="p-5 border border-secondary bg-black">
            <h1 class="text-warning mb-4">> WELCOME_ADMIN: <?php echo htmlspecialchars(strtoupper($_SESSION['admin_username'])); ?>_</h1>
            <p class="text-white-50 mb-5">Sistem kendali basis data komponen dinamis MadNeighbour Games siap digunakan.</p>
            <div class="d-flex gap-3">
                <a href="games_crud.php" class="btn btn-outline-info px-4 py-2 rounded-0" style="font-size: 1.3rem;">[ MANAGE GAMES DATA ]</a>
                <a href="logout.php" class="btn btn-outline-danger px-4 py-2 rounded-0" style="font-size: 1.3rem;">[ LOGOUT SYSTEM ]</a>
            </div>
        </div>
    </div>
</body>
</html>