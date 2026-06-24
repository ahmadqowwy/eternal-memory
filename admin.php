<?php
// Kode Baru: Pakai auth.php yang benar
require 'auth.php';
cek_login(); // Ini akan cek session admin_id

// Sesuaikan lokasi config.php kamu (kalau di dalam folder admin, pakai ../config.php)
require 'config.php'; 

 $data = mysqli_query($conn, "SELECT * FROM memories ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Memory Board Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
* { margin:0; padding:0; box-sizing:border-box; }
body {
    background: linear-gradient(rgba(255,245,247,.9), rgba(255,245,247,.9)),
                url('https://www.transparenttextures.com/patterns/paper-fibers.png');
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    padding:40px;
}
.header {
    display:flex; justify-content:space-between; align-items:center;
    margin-bottom:40px; flex-wrap:wrap; gap:15px;
}
.title { font-family:'Caveat',cursive; font-size:60px; color:#d63384; }
.actions { display:flex; gap:12px; }
.btn {
    text-decoration:none; padding:12px 20px; border-radius:12px;
    color:white; font-weight:500; transition:.3s;
}
.btn:hover { transform:translateY(-3px); }
.add { background:#ff5d8f; }
.logout { background:#555; }
.board {
    display:grid;
    grid-template-columns: repeat(auto-fill,minmax(260px,1fr));
    gap:40px;
}
.polaroid {
    background:white; padding:15px 15px 25px;
    box-shadow:0 10px 25px rgba(0,0,0,.15); border-radius:8px;
    position:relative; transition:.4s; transform-style: preserve-3d;
}
.polaroid:nth-child(odd) { transform:rotate(-2deg); }
.polaroid:nth-child(even) { transform:rotate(2deg); }
.polaroid:hover { z-index:10; }
.pin {
    width:18px; height:18px; background:#ff5d8f; border-radius:50%;
    position:absolute; top:-8px; left:50%; transform:translateX(-50%);
    box-shadow: 0 2px 4px rgba(0,0,0,.3);
}
.polaroid img { width:100%; height:250px; object-fit:cover; border-radius:5px; }
.caption { margin-top:15px; text-align:center; }
.caption h3 { font-family:'Caveat',cursive; font-size:32px; color:#444; }
.caption p { color:#777; margin-top:8px; font-size:14px; }
.card-actions { margin-top:15px; display:flex; justify-content:center; gap:10px; }
.edit, .delete {
    text-decoration:none; padding:8px 14px; border-radius:10px;
    color:white; font-size:14px; border:none; cursor:pointer;
}
.edit { background:#0d6efd; }
.delete { background:#dc3545; }
.empty { text-align:center; font-size:20px; color:#999; margin-top:50px; }
</style>
</head>
<body>

<div class="header">
    <h1 class="title">📸 Memory Board</h1>
    <div class="actions">
        <a href="upload.php" class="btn add">+ Tambah Memory</a>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</div>

<?php if(mysqli_num_rows($data) > 0): ?>
<div class="board">
<?php while($row = mysqli_fetch_assoc($data)): ?>
<div class="polaroid">
    <div class="pin"></div>
    <img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="">
    <div class="caption">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <div class="card-actions">
            <a class="edit" href="edit.php?id=<?php echo $row['id']; ?>">✏ Edit</a>
            
            <!-- Tombol Hapus pakai POST biar aman dari CSRF -->
            <form method="post" action="hapus.php" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus memory ini?')">
                <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" class="delete">🗑 Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php endwhile; ?>
</div>
<?php else: ?>
<div class="empty">Belum ada memory yang tersimpan 📷</div>
<?php endif; ?>

<script>
document.querySelectorAll('.polaroid').forEach(card => {
    card.addEventListener('mousemove', e => {
        let rect = card.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;
        let rotateY = (x - rect.width/2)/20;
        let rotateX = -(y - rect.height/2)/20;
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
    });
    card.addEventListener('mouseleave', () => {
        // Kembalikan ke rotasi awal sesuai ganjil/genap
        const index = Array.from(card.parentNode.children).indexOf(card);
        card.style.transform = index % 2 === 0 ? 'rotate(-2deg)' : 'rotate(2deg)';
    });
});
</script>
</body>
</html>