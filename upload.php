<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

if (!isset($_SESSION['em_user'])) {
    echo json_encode(['success' => false, 'message' => 'Belum login.']);
    exit;
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Tidak ada file yang diupload.']);
    exit;
}

 $file = $_FILES['image'];
 $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
if (!in_array($file['type'], $allowed)) {
    echo json_encode(['success' => false, 'message' => 'Hanya file gambar yang diperbolehkan.']);
    exit;
}
if ($file['size'] > 5 * 1024 * 1024) {
    echo json_encode(['success' => false, 'message' => 'Ukuran file maksimal 5MB.']);
    exit;
}

 $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
 $newName = 'mem_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
 $uploadPath = 'uploads/' . $newName;

if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
    echo json_encode(['success' => false, 'message' => 'Gagal menyimpan file. Pastikan folder uploads ada.']);
    exit;
}

 $title = mysqli_real_escape_string($conn, trim($_POST['title'] ?? 'Tanpa judul'));
 $desc = mysqli_real_escape_string($conn, trim($_POST['description'] ?? ''));

if (mysqli_query($conn, "INSERT INTO memories (image, title, description) VALUES ('$newName', '$title', '$desc')")) {
    echo json_encode(['success' => true, 'message' => 'Foto berhasil diupload!']);
} else {
    if (file_exists($uploadPath)) unlink($uploadPath);
    echo json_encode(['success' => false, 'message' => 'Gagal menyimpan ke database.']);
}