<?php 
    $current_page = basename($_SERVER['PHP_SELF']); 
?>
<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Eternal Memory</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                "colors": {
                    "primary": "#70585b",
                    "secondary": "#735c00",
                    "surface": "#fbf9f5",
                    "on-surface": "#1b1c1a",
                    "primary-container": "#fadadd",
                    "on-primary-container": "#765e61",
                    "outline-variant": "#d2c3c4"
                },
                "spacing": {
                    "margin-mobile": "20px",
                    "margin-desktop": "64px",
                    "section-gap": "120px"
                },
                "fontFamily": {
                    "headline-lg": ["Playfair Display"],
                    "body-lg": ["Inter"],
                    "label-caps": ["Inter"],
                    "display-lg": ["Playfair Display"],
                    "body-md": ["Inter"]
                }
            },
        },
    }
    </script>
    <style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL'0, 'wght'400, 'GRAD'0, 'opsz'24;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
    }

    .floating-heart {
        position: absolute;
        pointer-events: none;
        color: #fadadd;
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .masonry-grid {
        column-count: 1;
        column-gap: 24px;
    }

    @media (min-width: 768px) {
        .masonry-grid {
            column-count: 2;
        }
    }

    @media (min-width: 1024px) {
        .masonry-grid {
            column-count: 3;
        }
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 24px;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
        transition: 0.3s;
    }
    </style>
</head>

<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">

    <!-- NAVBAR -->
    <nav
        class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-xl border-b border-outline-variant/20 shadow-sm flex justify-between items-center px-5 md:px-16 py-4">
        <div class="font-headline-lg text-primary italic text-xl">
            <a href="index.php" class="hover:opacity-80 transition">Eternal Memory</a>
        </div>

        <div class="hidden md:flex gap-8">
            <a href="index.php"
                class="<?= $current_page == 'index.php' ? 'text-primary font-bold border-b-2 border-secondary' : 'text-on-surface-variant/70 hover:text-primary' ?> transition-all">Our
                Story</a>
            <a href="gallery.php"
                class="<?= $current_page == 'gallery.php' ? 'text-primary font-bold border-b-2 border-secondary' : 'text-on-surface-variant/70 hover:text-primary' ?> transition-all">The
                Gallery</a>
            <a href="wishes.php"
                class="<?= $current_page == 'wishes.php' ? 'text-primary font-bold border-b-2 border-secondary' : 'text-on-surface-variant/70 hover:text-primary' ?> transition-all">Wishes</a>
            <a href="timeline.php"
                class="<?= $current_page == 'timeline.php' ? 'text-primary font-bold border-b-2 border-secondary' : 'text-on-surface-variant/70 hover:text-primary' ?> transition-all">Timeline</a>
        </div>

        <div class="flex gap-4">
            <span class="material-symbols-outlined text-primary">favorite</span>
            <span class="material-symbols-outlined text-primary">auto_stories</span>
        </div>
    </nav>

     <main id="app-content" class="pt-20">

        <!-- ==================== AUDIO PLAYER SYSTEM ==================== -->
        <audio id="bg-music" loop>
            <source src="assets/love.mp3" type="audio/mpeg">
        </audio>

        <div class="fixed bottom-24 right-6 z-[100] transition-all duration-300">
            <div class="glass-card p-3 rounded-full flex items-center gap-3 shadow-xl border border-white/50 px-5">
                <span class="font-bold text-primary text-sm hidden md:block">Now Playing</span>
                <button id="music-btn" onclick="toggleMusic()"
                    class="text-primary hover:text-secondary transition-colors focus:outline-none p-1 rounded-full hover:bg-white/20">
                    <span id="music-icon" class="material-symbols-outlined">play_arrow</span>
                </button>
            </div>
        </div>

            <script>
        var audio = document.getElementById("bg-music");
        var musicBtn = document.getElementById("music-btn");
        var musicIcon = document.getElementById("music-icon");
        var isPlaying = false;

        function updateIcon() {
            if (isPlaying) {
                musicIcon.innerText = "pause"; 
                musicBtn.classList.remove("text-primary");
                musicBtn.classList.add("text-secondary");
            } else {
                musicIcon.innerText = "play_arrow"; 
                musicBtn.classList.remove("text-secondary");
                musicBtn.classList.add("text-primary");
            }
        }

        function toggleMusic() {
            if (isPlaying) {
                audio.pause();
                isPlaying = false;
            } else {
                audio.play().then(() => { isPlaying = true; }).catch(e => { isPlaying = false; });
            }
            updateIcon();
        }

        // ==========================================
        // CHEAT CODE: ANTI-RELOAD NAVIGATION (AJAX)
        // ==========================================
        document.addEventListener('click', function(e) {
            // Tangkap setiap klik link
            var link = e.target.closest('a');
            if (!link) return;
            
            var href = link.getAttribute('href');
            
            // Hanya proses link yang mengarah ke file .php
            if (href && href.endsWith('.php')) {
                e.preventDefault(); // CAUGHT! Cegah browser reload!
                
                // Ambil konten halaman tujuan di belakang layar
                fetch(href)
                    .then(response => response.text())
                    .then(html => {
                        // Ambil elemen <main> dari halaman tujuan
                        var parser = new DOMParser();
                        var doc = parser.parseFromString(html, "text/html");
                        var newContent = doc.getElementById('app-content').innerHTML;
                        
                        // Ganti konten lama dengan yang baru (TANPA RELOAD)
                        document.getElementById('app-content').innerHTML = newContent;
                        
                        // Ubah URL di address bar agar user tidak bingung
                        window.history.pushState({}, '', href);
                        
                        // Update highlight menu navbar
                        updateNavbar(href);
                        
                        // Scroll ke atas
                        window.scrollTo(0, 0);
                    })
                    .catch(err => {
                        // Jika gagal, paksa buka normal (fallback)
                        window.location.href = href;
                    });
            }
        });

        // Fungsi untuk mengubah warna menu yang sedang aktif
        function updateNavbar(url) {
            var page = url.split('/').pop();
            document.querySelectorAll('nav a[href$=".php"]').forEach(function(a) {
                if (a.getAttribute('href') === page) {
                    a.className = "text-primary font-bold border-b-2 border-secondary transition-all";
                } else {
                    a.className = "text-on-surface-variant/70 hover:text-primary transition-all";
                }
            });
        }

        // Handle tombol Back/Forward di browser
        window.addEventListener('popstate', function() {
            window.location.reload();
        });

        // Coba putar otomatis saat pertama kali buka
        window.addEventListener('DOMContentLoaded', function() {
            updateIcon();
            audio.play().then(() => { 
                isPlaying = true; 
                updateIcon();
            }).catch(e => { 
                // Autoplay diblokir, user harus klik manual
            });
        });
    </script>