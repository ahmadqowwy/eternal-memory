<?php
require 'config.php';
require 'auth.php';

if (isset($_SESSION['admin_id'])) {
    header('Location: admin.php'); // <-- Pastikan tulisannya admin.php
    exit;
}

 $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {
        $stmt = $conn->prepare('SELECT id, username, password FROM admin WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($row = $res->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                session_regenerate_id(true);
                $_SESSION['admin_id']   = $row['id'];
                $_SESSION['admin_user'] = $row['username'];
                header('Location: admin.php');
                exit;
            }
            $error = 'Password salah, coba lagi.';
        } else {
            $error = 'Akun tidak ditemukan.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Masuk · Papan Memori</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-wrapper">
  <form class="login-card" method="post" action="">
    <h2>Halo, lagi!</h2>
    <p class="sub">Masuk dulu untuk ngelola memori kamu ✿</p>

    <?php if ($error): ?>
      <div class="alert alert-error"><?= e($error) ?></div>
    <?php endif; ?>

    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" autocomplete="username" required autofocus>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" autocomplete="current-password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Masuk →</button>
  </form>

  <script src="assets/script.js"></script>
</body>
</html>