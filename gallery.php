<?php include 'header.php'; ?>

<div class="px-5 md:px-16 py-16 max-w-6xl mx-auto">
    <div class="text-center mb-16">
        <h1 class="font-display-lg text-primary mb-4 italic" style="font-family: 'Playfair Display';">The Gallery</h1>
        <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto italic">Every photo holds a memory, every memory holds a piece of us.</p>
    </div>

    <div class="masonry-grid">
        <!-- Foto 1 (Ditampilkan langsung) -->
        <div class="masonry-item group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="image/foto1.jpeg" alt="Memory 1">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">SEASON 2026</span>
                <p class="font-body-md italic text-on-surface-variant">Afternoon light.</p>
            </div>
        </div>
        <div class="masonry-item group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="image/6.jpeg" alt="Memory 1">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">SUMMER 2026</span>
                <p class="font-body-md italic text-on-surface-variant">Bali with your beauty.</p>
            </div>
        </div>

        <!-- Foto 2 (Ditampilkan langsung) -->
        <div class="masonry-item group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="image/foto2.jpeg" alt="Memory 2">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">YOUR GOOD GUY </span>
                <p class="font-body-md italic text-on-surface-variant">Before the world woke up.</p>
            </div>
        </div>
    
        <!-- Foto 3 (DITAMBAHKAN CLASS hidden-card) -->
        <div class="masonry-item hidden-card group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="image/kelas.jpeg" alt="Memory 3">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">VERY SWEET</span>
                <p class="font-body-md italic text-on-surface-variant">enthusiasm for college.</p>
            </div>
        </div>

        <!-- Foto 4 (DITAMBAHKAN CLASS hidden-card) -->
        <div class="masonry-item hidden-card group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="image/pap.jpeg" alt="Memory 4">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">PURE JOY</span>
                <p class="font-body-md italic text-on-surface-variant">first pap of you.</p>
            </div>
        </div>

        <!-- Foto 5 (DITAMBAHKAN CLASS hidden-card) -->
        <div class="masonry-item hidden-card group rounded-xl overflow-hidden glass-card hover-lift shadow-md">
            <img class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
             src="image/123.jpeg" alt="Memory 5">
            <div class="p-4">
                <span class="font-label-caps text-secondary text-xs block">Your JAMESS????</span>
                <p class="font-body-md italic text-on-surface-variant">This YOur BOYS.</p>
            </div>
        </div>
    </div>
    
    <!-- Tombol View More / Show Less -->
    <div class="text-center mt-12">
        <button id="viewMoreBtn" class="gallery-btn">
            View More
        </button>
    </div>
</div>

<!-- Style Khusus Gallery (Ditaruh di bawah agar tidak mengganggu file lain) -->
<style>
    /* 1. Class untuk menyembunyikan card */
    .hidden-card {
        display: none;
    }

    /* 2. Animasi saat card muncul */
    .show-card {
        animation: fadeSlideIn 0.6s ease forwards;
    }

    @keyframes fadeSlideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 3. Style Tombol (Disesuaikan dengan tema Eternal Memory) */
    .gallery-btn {
        background: #fadadd; /* Warna primary-container pink lembut */
        color: #765e61; /* Warna on-primary-container */
        border: 2px solid transparent;
        padding: 12px 35px;
        border-radius: 9999px; /* Rounded full */
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.05em;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(250, 218, 221, 0.4); /* Efek glow pink */
        cursor: pointer;
    }

    .gallery-btn:hover {
        background: transparent;
        color: #70585b; /* Warna primary */
        border-color: #70585b;
    }
</style>

<!-- Script Logika Show More / Show Less -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengambil tombol berdasarkan ID
        const viewMoreBtn = document.getElementById("viewMoreBtn");
        
        // Mengambil seluruh card yang memiliki class 'hidden-card'
        const hiddenCards = document.querySelectorAll(".hidden-card");
        
        // Status tombol (false = sedang tertutup, true = sedang terbuka)
        let isExpanded = false;

        // Menjalankan kode ketika tombol diklik
        viewMoreBtn.addEventListener("click", function() {
            if (!isExpanded) {
                // Tampilkan card yang tersembunyi
                hiddenCards.forEach(card => {
                    card.style.display = "block"; // Tampilkan
                    card.classList.add("show-card"); // Tambah animasi
                });
                
                // Ganti teks tombol
                viewMoreBtn.innerText = "Show Less";
                isExpanded = true;
                
            } else {
                // Sembunyikan kembali card
                hiddenCards.forEach(card => {
                    card.style.display = "none"; // Sembunyikan
                    card.classList.remove("show-card"); // Hapus animasi
                });
                
                // Kembalikan teks tombol
                viewMoreBtn.innerText = "View More";
                isExpanded = false;
            }
        });
    });
</script>
