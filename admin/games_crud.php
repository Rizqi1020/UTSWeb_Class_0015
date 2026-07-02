<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// LOGIKA 1: PROSES TAMBAH DATA (CREATE)
if (isset($_POST['add_game'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $steam_link = trim($_POST['steam_link']);
    $image_url = trim($_POST['image_url']);

    if(empty($image_url)) {
        $image_url = 'https://via.placeholder.com/300x200/000000/0dcaf0?text=GAME+POSTER';
    }

    $stmt = $conn->prepare("INSERT INTO games (title, description, steam_link, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $steam_link, $image_url);
    $stmt->execute();
    header("Location: games_crud.php");
    exit;
}

// LOGIKA 2: PROSES HAPUS DATA (DELETE)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM games WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: games_crud.php");
    exit;
}

// LOGIKA 3: AMBIL DATA UNTUK DITAMPILKAN (READ)
$result = mysqli_query($conn, "SELECT * FROM games ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manage Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body class="bg-dark text-light" style="font-family: 'VT323', monospace; font-size: 1.2rem;">
    <div class="container py-5">
        <div class="mb-4">
            <a href="dashboard.php" class="text-info text-decoration-none">&lt; BACK_TO_DASHBOARD</a>
        </div>

        <div class="p-4 border border-secondary bg-black mb-5">
            <h3 class="text-warning mb-4">> ADD_NEW_GAME_DATA</h3>
            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">GAME TITLE</label>
                        <input type="text" name="title" class="form-control bg-dark text-white border-secondary rounded-0" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">STEAM LINK URL</label>
                        <input type="url" name="steam_link" class="form-control bg-dark text-white border-secondary rounded-0" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">IMAGE POSTER URL</label>
                        <input type="url" name="image_url" class="form-control bg-dark text-white border-secondary rounded-0" placeholder="Kosongkan untuk default placeholder">
                    </div>
                    <div class="col-12">
                        <label class="form-label">GAME DESCRIPTION</label>
                        <textarea name="description" rows="3" class="form-control bg-dark text-white border-secondary rounded-0" required></textarea>
                    </div>
                </div>
                <button type="submit" name="add_game" class="btn btn-outline-warning mt-4 rounded-0">[ COMMIT_TO_DATABASE ]</button>
            </form>
        </div>

        <div class="p-4 border border-secondary bg-black">
            <h3 class="text-info mb-4">> CURRENT_DATABASE_ENTRIES</h3>
            <table class="table table-dark table-bordered border-secondary align-middle">
                <thead>
                    <tr class="text-warning">
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th style="width: 150px;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="text-info"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td class="text-white-50"><?php echo htmlspecialchars($row['description']); ?></td>
                                <td>
                                    <a href="games_crud.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Hapus game ini?')" class="btn btn-sm btn-outline-danger rounded-0 w-100">[ WIPE_DATA ]</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Data kosong. Silakan tambahkan game di atas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>