<?php
session_start();
if (!isset($_SESSION['user_login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Tambah Game | MadNeighbour</title>
</head>
<body class="bg-dark text-light">
    <div class="container py-5">
        <h2 class="text-warning mb-4" style="font-family: 'VT323', monospace;">> ADD_NEW_GAME</h2>
        <div class="p-4 border border-info bg-black retro-card">
            <form action="proses_tambah.php" method="POST">
                <div class="mb-3">
                    <label class="text-info">Judul Game</label>
                    <input type="text" name="title" class="form-control bg-dark text-light border-secondary" required>
                </div>
                <div class="mb-3">
                    <label class="text-info">Deskripsi</label>
                    <textarea name="description" class="form-control bg-dark text-light border-secondary" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="text-info">Link Gambar (URL)</label>
                    <input type="text" name="image_url" class="form-control bg-dark text-light border-secondary" required>
                </div>
                <div class="mb-4">
                    <label class="text-info">Link Steam</label>
                    <input type="text" name="steam_link" class="form-control bg-dark text-light border-secondary" required>
                </div>
                <button type="submit" class="btn btn-outline-info w-100">SUBMIT_TO_DATABASE</button>
            </form>
        </div>
            <div class="mt-4 text-center">
                <a href="index.php" class="text-secondary text-decoration-none" style="font-family: 'VT323', monospace; font-size: 1.2rem;">[ << BACK_TO_DASHBOARD ]</a>
    </div>
    </div>
</body>
</html>