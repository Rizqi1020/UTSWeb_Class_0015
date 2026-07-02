<?php
session_start();
// if (isset($_SESSION['user_login'])) {
//     header("Location: index.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | MadNeighbour</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #111; }
        .login-card { width: 100%; max-width: 400px; padding: 2rem; border: 2px solid #0dcaf0; background: #000; box-shadow: 0 0 15px rgba(13, 202, 240, 0.2); }
    </style>
</head>
<body class="text-light">
    <div class="crt-overlay"></div>

    <div class="login-card retro-card">
        <h2 class="text-warning text-center mb-4" style="font-family: 'VT323', monospace; font-size: 2.5rem;">> SYSTEM_LOGIN</h2>
        
        <form action="auth.php" method="POST">
            <div class="mb-3">
                <label class="text-info" style="font-family: 'VT323', monospace; font-size: 1.2rem;">USERNAME</label>
                <input type="text" name="username" class="form-control bg-dark text-light border-secondary rounded-0" required>
            </div>
            <div class="mb-4">
                <label class="text-info" style="font-family: 'VT323', monospace; font-size: 1.2rem;">PASSWORD</label>
                <input type="password" name="password" class="form-control bg-dark text-light border-secondary rounded-0" required>
            </div>
            <button type="submit" class="btn btn-outline-warning w-100 retro-btn" style="font-family: 'VT323', monospace; font-size: 1.5rem;">> ACCESS_SYSTEM</button>
        </form>
        
        <div class="mt-3 text-center">
            <a href="index.php" class="text-secondary text-decoration-none" style="font-family: 'VT323', monospace;">[ BACK_TO_HOME ]</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>