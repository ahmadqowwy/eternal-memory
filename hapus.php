<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

if (!isset($_SESSION['em_user'])) {
    echo json_encode(['success' => false, 'message' => 'Belum login.']);
    exit;
}

 $id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'ID tidak valid.']);
    exit;
}

 $fetch = mysqli_query($conn, "SELECT image FROM memories WHERE id = $id");
if ($row = mysqli_fetch_assoc($fetch)) {
    if (mysqli_query($conn, "DELETE FROM memories WHERE id = $id")) {
        $filePath = 'uploads/' . $row['image'];
        if (file_exists($filePath)) unlink($filePath);
        echo json_encode(['success' => true, 'message' => 'Foto berhasil dihapus.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Foto tidak ditemukan.']);
}