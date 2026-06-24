document.addEventListener('DOMContentLoaded', () => {

  // 1) Preview foto sebelum upload
  const fotoInput = document.getElementById('foto');
  const preview   = document.getElementById('preview');
  if (fotoInput && preview) {
    fotoInput.addEventListener('change', e => {
      const file = e.target.files[0];
      if (!file) { preview.style.display = 'none'; return; }
      const reader = new FileReader();
      reader.onload = ev => {
        preview.src = ev.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });
  }

  // 2) Auto-hide alert setelah 4 detik
  document.querySelectorAll('.alert').forEach(el => {
    setTimeout(() => {
      el.style.transition = 'opacity .6s ease, transform .4s ease';
      el.style.opacity = '0';
      el.style.transform = 'translateY(-6px)';
      setTimeout(() => el.remove(), 700);
    }, 4000);
  });

  // 3) Sedikit "goyang" extra saat polaroid pertama kali muncul
  //    (CSS animation sudah menangani entrance, ini cuma sentuhan ekstra)
  document.querySelectorAll('.polaroid').forEach((p, i) => {
    p.addEventListener('animationend', () => {
      p.style.animation = 'none';
    }, { once: true });
  });

  // 4) Keyboard shortcut: tekan "N" di admin → tambah memori
  document.addEventListener('keydown', e => {
    const tag = (e.target.tagName || '').toLowerCase();
    if (tag === 'input' || tag === 'textarea') return;
    if (e.key.toLowerCase() === 'n' && document.querySelector('.scrapbook, .empty-state')) {
      window.location.href = 'upload.php';
    }
  });

});