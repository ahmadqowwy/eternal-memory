<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method tidak diizinkan.']);
    exit;
}

 $action = $_POST['action'] ?? '';

if ($action === 'login') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Username dan password wajib diisi.']);
        exit;
    }

    $user_safe = mysqli_real_escape_string($conn, $username);
    $query = "SELECT * FROM admin WHERE username = '$user_safe' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // === PILIH SATU: sesuaikan dengan metode hash kamu ===

        // Jika password plain text (tidak di-hash):
if ($password === $row['password']) {
            $_SESSION['em_user'] = [
                'id' => $row['id'],
                'name' => $row['username'],
                'username' => $row['username']
            ];
            echo json_encode(['success' => true, 'message' => 'Login berhasil!', 'user' => $_SESSION['em_user']]);
        }
        // Jika password di-hash pakai password_hash() (panjang 60 karakter, mulai $2y$):
        // elseif (password_verify($password, $row['password'])) {
        //     $_SESSION['em_user'] = [
        //         'id' => $row['id'],
        //         'name' => $row['username'],
        //         'username' => $row['username']
        //     ];
        //     echo json_encode(['success' => true, 'message' => 'Login berhasil!', 'user' => $_SESSION['em_user']]);
        // }
        // Jika password plain text (tidak di-hash):
        // elseif ($password === $row['password']) {
        //     $_SESSION['em_user'] = [
        //         'id' => $row['id'],
        //         'name' => $row['username'],
        //         'username' => $row['username']
        //     ];
        //     echo json_encode(['success' => true, 'message' => 'Login berhasil!', 'user' => $_SESSION['em_user']]);
        // }
        else {
            echo json_encode(['success' => false, 'message' => 'Username atau password salah.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Username atau password salah.']);
    }
    exit;
}

if ($action === 'logout') {
    unset($_SESSION['em_user']);
    echo json_encode(['success' => true, 'message' => 'Berhasil keluar.']);
    exit;
}

if ($action === 'check') {
    if (isset($_SESSION['em_user'])) {
        echo json_encode(['success' => true, 'user' => $_SESSION['em_user']]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Action tidak dikenali.']);