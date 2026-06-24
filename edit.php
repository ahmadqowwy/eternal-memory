<?php
require 'auth.php';
cek_login();
require 'db.php';

 $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: admin.php'); exit; }

 $stmt = $conn->prepare('SELECT id, judul, deskripsi, foto, tanggal FROM memories WHERE id = ?');
 $stmt->bind_param('i', $id);
 $stmt->execute();
 $data = $stmt->get_result()->fetch_assoc();
 $stmt->close();

if (!$data) { header('Location: admin.php'); exit; }

 $pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $judul     = trim($_POST['judul'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $tanggal   = $_POST['tanggal'] ?? date('Y-m-d');
    $namaFile  = $data['foto'];

    if ($judul === '') {
        $pesan = 'Judul wajib diisi.';
    } else {
        // Ganti foto kalau diunggah ulang
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
            $finfo   = new finfo(FILEINFO_MIME_TYPE);
            $mime    = $finfo->file($_FILES['foto']['tmp_name']);

            if (array_key_exists($mime, $allowed) && $_FILES['foto']['size'] <= 5 * 1024 * 1024) {
                $namaBaru = 'memori_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $allowed[$mime];
                if (move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $namaBaru)) {
                    if (!empty($data['foto']) && is_file('uploads/' . $data['foto'])) {
                        unlink('uploads/' . $data['foto']);
                    }
                    $namaFile = $namaBaru;
                    $data['foto'] = $namaBaru;
                }
            } else {
                $pesan = 'Format/ukuran foto baru tidak valid.';
            }
        }

        if ($pesan === '') {
            $stmt = $conn->prepare('UPDATE memories SET judul=?, deskripsi=?, foto=?, tanggal=? WHERE id=?');
            $stmt->bind_param('ssssi', $judul, $deskripsi, $namaFile, $tanggal, $id);
            if ($stmt->execute()) {
                header('Location: admin.php?status=updated');
                exit;
            }
            $pesan = 'Gagal menyimpan perubahan.';
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Memori</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="board">
  <div class="form-card">
    <h2>Edit Memori</h2>

    <?php if ($pesan): ?>
      <div class="alert alert-error"><?= e($pesan) ?></div>
    <?php endif; ?>

    <form method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

      <img src="uploads/<?= e($data['foto']) ?>" class="preview-img" alt="">

      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" maxlength="120" required
               value="<?= e($_POST['judul'] ?? $data['judul']) ?>">
      </div>

      <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal"
               value="<?= e($_POST['tanggal'] ?? $data['tanggal']) ?>">
      </div>

      <div class="form-group">
        <label for="deskripsi">Cerita</label>
        <textarea id="deskripsi" name="deskripsi" rows="3"><?= e($_POST['deskripsi'] ?? $data['deskripsi']) ?></textarea>
      </div>

      <div class="form-group">
        <label for="foto">Ganti Foto (kosongkan jika tetap)</label>
        <input type="file" id="foto" name="foto" accept="image/jpeg,image/png,image/webp">
        <img id="preview" class="preview-img" alt="" style="display:none;">
      </div>

      <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
      <a href="admin.php" class="btn btn-block" style="margin-top:8px;">Batal</a>
    </form>
  </div>
</div>
<script src="assets/script.js"></script>
</body>
</html>