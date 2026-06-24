<?php
 $current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eternal Memory<?php echo $current_page !== 'index.php' ? ' — ' . ucfirst(str_replace('.php', '', $current_page)) : ''; ?></title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Material Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
          rel="stylesheet">

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#70585b",
                        secondary: "#735c00",
                        surface: "#fbf9f5",
                        "surface-container-low": "#f5f0e8",
                        "on-surface": "#1b1c1a",
                        "on-surface-variant": "#44483f",
                        "primary-container": "#fadadd",
                        "outline-variant": "#d2c3c4",
                        danger: "#b5342e",
                        success: "#3a7d44"
                    },
                    fontFamily: {
                        headline: ["Playfair Display"],
                        body: ["Inter"]
                    }
                }
            }
        }
    </script>

    <style>
        body { overflow-x: hidden; }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Floating Heart */
        .floating-heart {
            position: absolute;
            pointer-events: none;
            color: #fadadd;
            opacity: 0.5;
            animation: float 6s ease-in-out infinite;
            z-index: 0;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(5deg); }
        }

        /* Glass Effect */
        .glass-panel {
            background: rgba(251, 249, 245, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Font Utilities */
        .font-label-caps {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
        }
        .font-display-md {
            font-family: 'Playfair Display', serif;
        }
        .font-headline-lg {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
        }
        .font-body-lg {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
        }
        .font-body-md {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }

        /* Organic Glow */
        .organic-glow {
            box-shadow: 0 20px 50px rgba(250, 218, 221, 0.25);
        }

        /* Nav Link */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #70585b;
            border-radius: 99px;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active {
            color: #70585b !important;
            font-weight: 600;
        }

        /* Modal */
        .modal-overlay {
            background: rgba(27,28,26,0.5);
            backdrop-filter: blur(6px);
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay.hidden-modal { opacity: 0; visibility: hidden; pointer-events: none; }
        .modal-overlay.visible-modal { opacity: 1; visibility: visible; pointer-events: auto; }
        .modal-box {
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), opacity 0.3s ease;
        }
        .hidden-modal .modal-box { transform: scale(0.9) translateY(20px); opacity: 0; }
        .visible-modal .modal-box { transform: scale(1) translateY(0); opacity: 1; }

        /* Admin Panel */
        .admin-panel {
            transform: translateX(100%);
            transition: transform 0.45s cubic-bezier(0.22,1,0.36,1);
        }
        .admin-panel.open { transform: translateX(0); }
        .admin-panel::-webkit-scrollbar { width: 4px; }
        .admin-panel::-webkit-scrollbar-thumb { background: #d2c3c4; border-radius: 99px; }

        /* Toast */
        .toast-container {
            position: fixed; top: 80px; right: 20px; z-index: 9999;
            display: flex; flex-direction: column; gap: 8px;
        }
        .toast-item {
            padding: 12px 20px; border-radius: 12px; font-size: 14px; font-weight: 500;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            animation: toastIn 0.4s cubic-bezier(0.34,1.56,0.64,1), toastOut 0.3s ease 2.7s forwards;
            display: flex; align-items: center; gap: 8px;
        }
        @keyframes toastIn { from { transform: translateX(120%); opacity:0; } to { transform: translateX(0); opacity:1; } }
        @keyframes toastOut { from { transform: translateX(0); opacity:1; } to { transform: translateX(120%); opacity:0; } }

        /* Upload Zone */
        .upload-zone { border: 2px dashed #d2c3c4; transition: all 0.3s ease; }
        .upload-zone:hover, .upload-zone.drag-over { border-color: #70585b; background: rgba(250,218,221,0.2); }

        /* Input */
        .input-field { transition: border-color 0.2s ease, box-shadow 0.2s ease; }
        .input-field:focus { border-color: #70585b; box-shadow: 0 0 0 3px rgba(112,88,91,0.15); outline: none; }

        .pw-toggle {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            cursor: pointer; color: #999; transition: color 0.2s;
        }
        .pw-toggle:hover { color: #70585b; }

        /* Lightbox */
        .lightbox-overlay {
            position: fixed; inset: 0; z-index: 200; background: rgba(0,0,0,0.92);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden; transition: all 0.3s ease;
        }
        .lightbox-overlay.active { opacity: 1; visibility: visible; }
        .lightbox-overlay img { max-width: 90vw; max-height: 85vh; border-radius: 12px; object-fit: contain; }

        /* Badge */
        .badge-count {
            font-size: 10px; min-width: 18px; height: 18px;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 99px; padding: 0 5px;
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body">

<!-- ================= TOAST ================= -->
<div class="toast-container" id="toast-container"></div>

<!-- ================= LIGHTBOX ================= -->
<div class="lightbox-overlay" id="lightbox" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white/70 hover:text-white transition">
        <span class="material-symbols-outlined" style="font-size:32px;">close</span>
    </button>
    <img id="lightbox-img" src="" alt="Preview">
    <p id="lightbox-caption" class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/80 font-body text-sm text-center max-w-md px-4"></p>
</div>

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-xl border-b border-outline-variant/20 shadow-sm flex justify-between items-center px-5 md:px-16 py-3">

    <!-- Logo -->
    <a href="index.php" class="font-display-md italic text-2xl text-primary hover:opacity-80 transition">
        Eternal Memory
    </a>

    <!-- Desktop Menu -->
    <div class="hidden md:flex gap-8">
        <a href="index.php" class="nav-link text-gray-600 hover:text-primary transition duration-300 <?php echo $current_page === 'index.php' ? 'active' : ''; ?>">Our Story</a>
        <a href="gallery.php" class="nav-link text-gray-600 hover:text-primary transition duration-300 <?php echo $current_page === 'gallery.php' ? 'active' : ''; ?>">The Gallery</a>
        <a href="wishes.php" class="nav-link text-gray-600 hover:text-primary transition duration-300 <?php echo $current_page === 'wishes.php' ? 'active' : ''; ?>">Wishes</a>
        <a href="timeline.php" class="nav-link text-gray-600 hover:text-primary transition duration-300 <?php echo $current_page === 'timeline.php' ? 'active' : ''; ?>">Timeline</a>
    </div>

    <!-- Right Icons -->
    <div class="flex gap-3 items-center">
        <!-- Mobile Menu Toggle -->
        <button class="md:hidden text-primary" onclick="toggleMobileMenu()">
            <span class="material-symbols-outlined" id="mobile-menu-icon">menu</span>
        </button>

        <span class="material-symbols-outlined text-primary cursor-default hidden md:inline">favorite</span>
        <span class="material-symbols-outlined text-primary cursor-default hidden md:inline">auto_stories</span>
        
        <!-- Auth Area -->
        <div id="auth-area" class="ml-1"></div>
    </div>
</nav>

<!-- ================= MOBILE MENU ================= -->
<div class="fixed top-[57px] left-0 w-full z-40 bg-surface/95 backdrop-blur-xl border-b border-outline-variant/20 shadow-lg transform -translate-y-full opacity-0 transition-all duration-300" id="mobile-menu">
    <div class="flex flex-col p-4 gap-1">
        <a href="index.php" class="mobile-nav-link px-4 py-3 rounded-xl text-gray-600 hover:bg-primary-container/50 hover:text-primary transition font-medium <?php echo $current_page === 'index.php' ? 'bg-primary-container/50 text-primary' : ''; ?>">Our Story</a>
        <a href="gallery.php" class="mobile-nav-link px-4 py-3 rounded-xl text-gray-600 hover:bg-primary-container/50 hover:text-primary transition font-medium <?php echo $current_page === 'gallery.php' ? 'bg-primary-container/50 text-primary' : ''; ?>">The Gallery</a>
        <a href="wishes.php" class="mobile-nav-link px-4 py-3 rounded-xl text-gray-600 hover:bg-primary-container/50 hover:text-primary transition font-medium <?php echo $current_page === 'wishes.php' ? 'bg-primary-container/50 text-primary' : ''; ?>">Wishes</a>
        <a href="timeline.php" class="mobile-nav-link px-4 py-3 rounded-xl text-gray-600 hover:bg-primary-container/50 hover:text-primary transition font-medium <?php echo $current_page === 'timeline.php' ? 'bg-primary-container/50 text-primary' : ''; ?>">Timeline</a>
    </div>
</div>

<!-- ================= LOGIN MODAL ================= -->
<div class="modal-overlay hidden-modal fixed inset-0 z-[100] flex items-center justify-center p-4" id="login-modal">
    <div class="modal-box bg-surface rounded-2xl shadow-2xl w-full max-w-md overflow-hidden relative">

        <!-- Header Modal -->
        <div class="p-6 pb-0 text-center">
            <div class="w-14 h-14 rounded-full bg-primary-container mx-auto flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-primary" style="font-size:28px;">lock</span>
            </div>
            <h3 class="font-display-md text-xl text-primary">Masuk ke Admin</h3>
            <p class="text-xs text-gray-400 mt-1">Upload dan kelola foto kenangan</p>
        </div>

        <!-- Form Login -->
        <form id="form-login" class="p-6 space-y-4" onsubmit="handleLogin(event)">
            <div>
                <label class="font-label-caps text-on-surface-variant/60 block mb-2">USERNAME</label>
                <input type="text" id="login-user" required placeholder="Masukkan username" class="input-field w-full px-4 py-2.5 rounded-xl border border-outline-variant/40 bg-white text-sm">
            </div>
            <div>
                <label class="font-label-caps text-on-surface-variant/60 block mb-2">PASSWORD</label>
                <div class="relative">
                    <input type="password" id="login-pass" required placeholder="Masukkan password" class="input-field w-full px-4 py-2.5 rounded-xl border border-outline-variant/40 bg-white text-sm pr-10">
                    <span class="pw-toggle material-symbols-outlined" style="font-size:20px;" onclick="togglePw('login-pass', this)">visibility_off</span>
                </div>
            </div>
            <p id="login-error" class="text-danger text-xs hidden"></p>
            <button type="submit" class="w-full py-2.5 bg-primary text-white rounded-xl text-sm font-semibold hover:bg-primary/90 transition shadow-md shadow-primary/20">Masuk</button>
        </form>

        <!-- Close -->
        <button onclick="closeLoginModal()" class="absolute top-3 right-3 text-gray-400 hover:text-primary transition">
            <span class="material-symbols-outlined" style="font-size:22px;">close</span>
        </button>
    </div>
</div>

<!-- ================= ADMIN PANEL ================= -->
<div class="admin-panel fixed top-0 right-0 h-full w-full md:w-[440px] z-[90] bg-surface shadow-2xl overflow-y-auto" id="admin-panel">
    <div class="p-6 pt-20">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="font-display-md text-xl text-primary">Kelola Foto</h2>
                <p class="text-xs text-gray-400 mt-0.5" id="admin-greeting">Selamat datang</p>
            </div>
            <button onclick="closeAdminPanel()" class="text-gray-400 hover:text-primary transition">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <div class="mb-6">
            <label class="font-label-caps text-on-surface-variant/60 block mb-2">TAMBAH FOTO BARU</label>
            <div class="upload-zone rounded-xl p-6 text-center cursor-pointer relative" id="upload-zone" onclick="document.getElementById('file-input').click()">
                <input type="file" id="file-input" accept="image/*" class="hidden" onchange="handleFileSelect(event)">
                <div id="upload-placeholder">
                    <span class="material-symbols-outlined text-outline-variant text-4xl">add_photo_alternate</span>
                    <p class="text-sm text-gray-400 mt-2">Klik atau seret foto ke sini</p>
                    <p class="text-xs text-gray-300 mt-1">JPG, PNG, WebP — Maks 5MB</p>
                </div>
                <div id="upload-preview" class="hidden">
                    <img id="preview-img" src="" alt="Preview" class="max-h-40 mx-auto rounded-lg object-cover">
                    <p id="preview-name" class="text-xs text-gray-500 mt-2 truncate"></p>
                    <button type="button" onclick="event.stopPropagation(); clearUpload()" class="text-xs text-danger hover:underline mt-1">Hapus & pilih ulang</button>
                </div>
            </div>
            <input type="text" id="photo-caption" placeholder="Judul foto" class="input-field w-full mt-3 px-4 py-2.5 rounded-xl border border-outline-variant/40 bg-white text-sm">
            <textarea id="photo-description" rows="2" placeholder="Keterangan foto (opsional)" class="input-field w-full mt-2 px-4 py-2.5 rounded-xl border border-outline-variant/40 bg-white text-sm resize-none"></textarea>
            <select id="photo-category" class="input-field w-full mt-2 px-4 py-2.5 rounded-xl border border-outline-variant/40 bg-white text-sm text-gray-600">
                <option value="moment">Momen Bersama</option>
                <option value="travel">Perjalanan</option>
                <option value="celebration">Perayaan</option>
                <option value="daily">Sehari-hari</option>
                <option value="other">Lainnya</option>
            </select>
            <button onclick="uploadPhoto()" id="btn-upload" class="w-full mt-3 py-2.5 bg-primary text-white rounded-xl text-sm font-semibold hover:bg-primary/90 transition shadow-md shadow-primary/20 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined" style="font-size:18px;">cloud_upload</span>
                Upload Foto
            </button>
        </div>

        <div class="border-t border-outline-variant/30 my-5"></div>

        <div class="flex items-center gap-2 mb-4">
            <div class="relative flex-1">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-300" style="font-size:18px;">search</span>
                <input type="text" id="search-photos" placeholder="Cari foto..." class="input-field w-full pl-9 pr-4 py-2 rounded-xl border border-outline-variant/40 bg-white text-sm" oninput="renderAdminPhotos()">
            </div>
            <span class="badge-count bg-primary-container text-primary font-bold" id="photo-count">0</span>
        </div>

        <div id="admin-photo-list" class="space-y-3"></div>
        <div id="admin-empty" class="text-center py-10">
            <span class="material-symbols-outlined text-outline-variant/50 text-5xl">photo_library</span>
            <p class="text-sm text-gray-400 mt-3">Belum ada foto di database</p>
            <p class="text-xs text-gray-300 mt-1">Upload foto pertamamu di atas</p>
        </div>

        <div class="border-t border-outline-variant/30 mt-8 pt-4">
            <button onclick="handleLogout()" class="w-full py-2.5 border border-danger/30 text-danger rounded-xl text-sm font-semibold hover:bg-danger/5 transition flex items-center justify-center gap-2">
                <span class="material-symbols-outlined" style="font-size:18px;">logout</span>
                Keluar
            </button>
        </div>
    </div>
</div>
<div class="fixed inset-0 bg-black/30 z-[85] hidden" id="admin-overlay" onclick="closeAdminPanel()"></div>

<!-- ================= MUSIC PLAYER ================= -->
<div class="fixed bottom-6 right-6 z-50">
    <div class="glass-panel px-5 py-3 rounded-full flex items-center gap-3 shadow-xl border border-white/50">
        <span class="font-bold text-primary text-sm hidden md:block">Now Playing</span>
        <button id="music-btn" onclick="toggleMusic()" class="text-primary hover:text-secondary transition">
            <span id="music-icon" class="material-symbols-outlined">play_arrow</span>
        </button>
    </div>
</div>


<!-- ================= GLOBAL SCRIPTS ================= -->
<script>

// ================= UTILITAS =================
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-success/95 text-white' : type === 'error' ? 'bg-danger/95 text-white' : 'bg-primary text-white';
    const icon = type === 'success' ? 'check_circle' : type === 'error' ? 'error' : 'info';
    toast.className = `toast-item ${bgColor}`;
    toast.innerHTML = `<span class="material-symbols-outlined" style="font-size:18px;">${icon}</span>${message}`;
    container.appendChild(toast);
    setTimeout(() => toast.remove(), 3200);
}

// ================= MOBILE MENU =================
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('mobile-menu-icon');
    const isOpen = !menu.classList.contains('-translate-y-full');
    if (isOpen) {
        menu.classList.add('-translate-y-full', 'opacity-0');
        menu.classList.remove('translate-y-0', 'opacity-100');
        icon.textContent = 'menu';
    } else {
        menu.classList.remove('-translate-y-full', 'opacity-0');
        menu.classList.add('translate-y-0', 'opacity-100');
        icon.textContent = 'close';
    }
}

// ================= SESSION (PHP, bukan localStorage) =================
let currentUser = null;

async function checkSession() {
    try {
        const res = await fetch('auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=check'
        });
        const data = await res.json();
        currentUser = data.success ? data.user : null;
    } catch(e) {
        currentUser = null;
    }
    renderAuthArea();
}

// ================= AUTH AREA =================
function renderAuthArea() {
    const area = document.getElementById('auth-area');
    if (currentUser) {
        area.innerHTML = `
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center cursor-pointer" onclick="openAdminPanel()">
                    <span class="text-primary text-xs font-bold uppercase">${currentUser.name.charAt(0)}</span>
                </div>
                <button onclick="openAdminPanel()" class="hidden md:flex items-center gap-1 text-xs text-gray-500 hover:text-primary transition font-medium">
                    ${currentUser.name}
                    <span class="material-symbols-outlined" style="font-size:14px;">chevron_right</span>
                </button>
            </div>`;
    } else {
        area.innerHTML = `
            <button onclick="openLoginModal()" class="flex items-center gap-1.5 px-4 py-1.5 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary/90 transition shadow-sm shadow-primary/20">
                <span class="material-symbols-outlined" style="font-size:16px;">person</span>
                <span class="hidden md:inline">Masuk</span>
            </button>`;
    }
}

// ================= LOGIN MODAL =================
function openLoginModal() {
    document.getElementById('login-error').classList.add('hidden');
    const m = document.getElementById('login-modal');
    m.classList.remove('hidden-modal');
    m.classList.add('visible-modal');
}
function closeLoginModal() {
    const m = document.getElementById('login-modal');
    m.classList.remove('visible-modal');
    m.classList.add('hidden-modal');
}

function showLoginError(msg) {
    const el = document.getElementById('login-error');
    el.textContent = msg;
    el.classList.remove('hidden');
}

// ================= LOGIN (ke database) =================
async function handleLogin(e) {
    e.preventDefault();
    document.getElementById('login-error').classList.add('hidden');

    const username = document.getElementById('login-user').value.trim();
    const password = document.getElementById('login-pass').value;

    try {
        const formData = new FormData();
        formData.append('action', 'login');
        formData.append('username', username);
        formData.append('password', password);

        const res = await fetch('auth.php', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
            currentUser = data.user;
            closeLoginModal();
            renderAuthArea();
            showToast('Login berhasil! Selamat datang.');
            document.getElementById('form-login').reset();
        } else {
            showLoginError(data.message);
        }
    } catch(err) {
        showLoginError('Gagal terhubung ke server.');
    }
}

// ================= LOGOUT (ke database) =================
async function handleLogout() {
    try {
        const formData = new FormData();
        formData.append('action', 'logout');
        await fetch('auth.php', { method: 'POST', body: formData });
    } catch(e) {}
    currentUser = null;
    closeAdminPanel();
    renderAuthArea();
    showToast('Berhasil keluar.', 'info');
}

function togglePw(id, icon) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
    icon.textContent = input.type === 'password' ? 'visibility_off' : 'visibility';
}

document.getElementById('login-modal').addEventListener('click', function(e) {
    if (e.target === this) closeLoginModal();
});

// ================= ADMIN PANEL =================
let pendingFile = null;

function openAdminPanel() {
    if (!currentUser) { openLoginModal(); return; }
    document.getElementById('admin-greeting').textContent = `Halo, ${currentUser.name}`;
    document.getElementById('admin-panel').classList.add('open');
    document.getElementById('admin-overlay').classList.remove('hidden');
    renderAdminPhotos();
}
function closeAdminPanel() {
    document.getElementById('admin-panel').classList.remove('open');
    document.getElementById('admin-overlay').classList.add('hidden');
}

// Drag & Drop
const uploadZone = document.getElementById('upload-zone');
uploadZone.addEventListener('dragover', e => { e.preventDefault(); uploadZone.classList.add('drag-over'); });
uploadZone.addEventListener('dragleave', () => uploadZone.classList.remove('drag-over'));
uploadZone.addEventListener('drop', e => {
    e.preventDefault();
    uploadZone.classList.remove('drag-over');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) processFile(file);
    else showToast('Hanya file gambar yang diperbolehkan.', 'error');
});

function handleFileSelect(e) { if (e.target.files[0]) processFile(e.target.files[0]); }

function processFile(file) {
    if (file.size > 5 * 1024 * 1024) { showToast('Ukuran file maksimal 5MB.', 'error'); return; }
    pendingFile = file;
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('preview-img').src = e.target.result;
        document.getElementById('preview-name').textContent = file.name;
        document.getElementById('upload-placeholder').classList.add('hidden');
        document.getElementById('upload-preview').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

function clearUpload() {
    pendingFile = null;
    document.getElementById('file-input').value = '';
    document.getElementById('upload-placeholder').classList.remove('hidden');
    document.getElementById('upload-preview').classList.add('hidden');
}

// ================= UPLOAD KE DATABASE =================
async function uploadPhoto() {
    if (!currentUser) { openLoginModal(); return; }
    if (!pendingFile) { showToast('Pilih foto terlebih dahulu.', 'error'); return; }

    const btn = document.getElementById('btn-upload');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined animate-spin" style="font-size:18px;">progress_activity</span> Mengupload...';

    try {
        const formData = new FormData();
        formData.append('image', pendingFile);
        formData.append('title', document.getElementById('photo-caption').value.trim() || 'Tanpa judul');
        formData.append('description', document.getElementById('photo-description').value.trim() || '');

        const res = await fetch('upload.php', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
            clearUpload();
            document.getElementById('photo-caption').value = '';
            document.getElementById('photo-description').value = '';
            document.getElementById('photo-category').value = 'moment';
            renderAdminPhotos();
            showToast('Foto berhasil diupload ke database!');
        } else {
            showToast(data.message, 'error');
        }
    } catch(err) {
        showToast('Gagal terhubung ke server.', 'error');
    }

    btn.disabled = false;
    btn.innerHTML = '<span class="material-symbols-outlined" style="font-size:18px;">cloud_upload</span> Upload Foto';
}

// ================= LOAD FOTO DARI DATABASE =================
async function renderAdminPhotos() {
    const list = document.getElementById('admin-photo-list');
    const empty = document.getElementById('admin-empty');
    const count = document.getElementById('photo-count');
    const search = (document.getElementById('search-photos')?.value || '').toLowerCase();

    try {
        const res = await fetch('get_photos.php');
        const data = await res.json();
        let photos = data.photos || [];

        if (search) {
            photos = photos.filter(p =>
                (p.title || '').toLowerCase().includes(search) ||
                (p.description || '').toLowerCase().includes(search)
            );
        }

        count.textContent = photos.length;

        if (photos.length === 0) {
            list.innerHTML = '';
            empty.classList.remove('hidden');
            return;
        }

        empty.classList.add('hidden');

        list.innerHTML = photos.map(p => `
            <div class="flex gap-3 p-3 bg-white rounded-xl border border-outline-variant/20 shadow-sm hover:shadow-md transition group">
                <img src="uploads/${p.image}" alt="${p.title}"
                     class="w-16 h-16 rounded-lg object-cover flex-shrink-0 cursor-pointer"
                     onclick="openLightbox('uploads/${p.image}')"
                     onerror="this.style.background='#eee'">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-on-surface truncate">${p.title}</p>
                    <p class="text-xs text-gray-400 mt-0.5 truncate">${p.description || 'Tanpa keterangan'}</p>
                </div>
                <button onclick="deletePhoto(${p.id})" class="self-center opacity-0 group-hover:opacity-100 text-gray-300 hover:text-danger transition flex-shrink-0" title="Hapus">
                    <span class="material-symbols-outlined" style="font-size:20px;">delete</span>
                </button>
            </div>
        `).join('');

    } catch(err) {
        list.innerHTML = '<p class="text-center text-sm text-gray-400 py-4">Gagal memuat foto dari server.</p>';
    }
}

// ================= HAPUS FOTO DARI DATABASE =================
async function deletePhoto(id) {
    if (!confirm('Yakin ingin menghapus foto ini?')) return;

    try {
        const formData = new FormData();
        formData.append('id', id);
        const res = await fetch('delete_photo.php', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
            renderAdminPhotos();
            showToast('Foto berhasil dihapus.', 'info');
        } else {
            showToast(data.message, 'error');
        }
    } catch(err) {
        showToast('Gagal terhubung ke server.', 'error');
    }
}

// ================= LIGHTBOX =================
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = '';
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}

// ================= AUDIO =================
let audio = document.getElementById("global-audio");
if (!audio) {
    audio = document.createElement("audio");
    audio.id = "global-audio";
    audio.src = "asset/love.mp3";
    audio.loop = true;
    document.body.appendChild(audio);
}

let isPlaying = localStorage.getItem("musicState") === "playing";
let savedTime = localStorage.getItem("musicTime");
if (savedTime) audio.currentTime = savedTime;
setInterval(() => localStorage.setItem("musicTime", audio.currentTime), 1000);

function updateMusicUI() {
    const icon = document.getElementById("music-icon");
    const btn = document.getElementById("music-btn");
    if (!icon || !btn) return;
    if (isPlaying) {
        icon.innerText = "pause";
        btn.className = "text-secondary hover:text-primary transition";
    } else {
        icon.innerText = "play_arrow";
        btn.className = "text-primary hover:text-secondary transition";
    }
}

window.toggleMusic = function() {
    if (isPlaying) { audio.pause(); isPlaying = false; localStorage.setItem("musicState","paused"); }
    else { audio.play(); isPlaying = true; localStorage.setItem("musicState","playing"); }
    updateMusicUI();
};

function startMusicOnce() {
    if (!isPlaying) {
        audio.play().then(() => { isPlaying = true; localStorage.setItem("musicState","playing"); updateMusicUI(); }).catch(()=>{});
    }
    document.removeEventListener("click", startMusicOnce);
}
document.addEventListener("click", startMusicOnce);
if (isPlaying) audio.play().catch(()=>{});

// ================= KEYBOARD =================
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') { closeLightbox(); closeLoginModal(); closeAdminPanel(); }
});

// ================= INIT =================
window.addEventListener("DOMContentLoaded", () => {
    updateMusicUI();
    checkSession();
});

</script>