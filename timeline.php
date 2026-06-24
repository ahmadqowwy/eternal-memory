<?php include 'header.php'; ?>

<!-- Khusus CSS Timeline (Agar layout garis tengahnya rapi) -->
<style>
    .timeline-line {
        background: linear-gradient(to bottom, transparent, #ffe088 15%, #ffe088 85%, transparent);
    }
    .organic-glow {
        box-shadow: 0 20px 50px rgba(250, 218, 221, 0.4);
    }
</style>

<div class="max-w-5xl mx-auto px-5 md:px-16 py-16">
    <section class="mb-16 text-center">
        <span class="font-label-caps text-secondary tracking-widest block mb-4">OUR JOURNEY TOGETHER</span>
        <h1 class="font-display-md text-primary mb-8" style="font-family: 'Playfair Display'; font-size: 48px;">Every moment is a <br/><span class="italic font-normal">cherished chapter.</span></h1>
    </section>

    <!-- Container Timeline -->
    <div class="relative">
        <!-- Garis Tengah (Vertical Line) -->
        <div class="absolute left-1/2 transform -translate-x-1/2 w-[2px] h-full timeline-line z-0 hidden md:block"></div>

        <!-- EVENT 1: First Meet -->
        <section class="relative z-10 mb-20 flex flex-col md:flex-row items-center justify-between gap-12">
            <!-- Teks di Kiri -->
            <div class="w-full md:w-[45%] order-2 md:order-1 text-left">
                <span class="font-label-caps text-secondary block mb-2">SEPTEMBER 14, 2020</span>
                <h2 class="font-display-md text-primary mb-6" style="font-family: 'Playfair Display'; font-size: 32px;">First Meet</h2>
                <p class="font-body-lg text-on-surface-variant mb-8 leading-relaxed">I forgot exactly when we first met, but every time I saw you, my heart always beat so fast. Since then, I kept hoping to meet you again. Every Saturday after school at MIN, I even chose the longer way home just so I could pass by your house and see you, even for a momen</p>
                <div class="font-headline-lg italic text-secondary border-b border-secondary w-max">— The beginning of us.</div>
            </div>

            <!-- Titik Tengah -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-primary-container border-2 border-secondary rounded-full z-20 hidden md:block"></div>

            <!-- Gambar di Kanan -->
            <div class="w-full md:w-[45%] order-1 md:order-2">
                <div class="organic-glow rounded-xl overflow-hidden group">
                    <!-- GAMBAR 1: Ganti SRC di bawah -->
                    <img class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105" 
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZGjv-RGGYWYNIjiFLVhTl8DzZwUKTNmRBIlX8tXOtMOJrTK64DYoU3RlL1ay5wlhYlLyC2wkxCwXv2Ijo9x4YS13mqZHWejl23_KcnD4vjQbxqRgjRHk5DJiN3xv-82ctMRTXOft53e4LYrGSSE4fIqdA5sUIwDGVQ3-irqGIaB6kFBnymieVMzNdrzDq2g8EwDaoWLrX81BGs2aDqYkVgZHBHuVOiDrzlDqzduNYm3ulOG0nBVvGDYl0o9633A15XvUDDhncJiE" 
                         alt="First Meet">
                </div>
            </div>
        </section>

        <!-- EVENT 2: First Date -->
        <section class="relative z-10 mb-20 flex flex-col md:flex-row items-center justify-between gap-12">
            <!-- Teks di Kanan -->
            <div class="w-full md:w-[45%] text-right order-1">
                <span class="font-label-caps text-secondary block mb-2">OCTOBER 02, 2020</span>
                <h2 class="font-display-md text-primary mb-6" style="font-family: 'Playfair Display'; font-size: 32px;">Our First Date</h2>
                <p class="font-body-lg text-on-surface-variant mb-8 leading-relaxed">I forgot exactly when we first met, but every time I saw you, my heart always beat so fast. Since then, I kept hoping to meet you again. Every Saturday after school at MIN, I even chose the longer way home just so I could pass by your house and see you, even for a momen.</p>
                <div class="font-headline-lg italic text-secondary border-b border-secondary w-max ml-auto">— A night of magic.</div>
            </div>

            <!-- Titik Tengah -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-primary-container border-2 border-secondary rounded-full z-20 hidden md:block"></div>

            <!-- Gambar di Kiri -->
            <div class="w-full md:w-[45%] order-2">
                <div class="organic-glow rounded-xl overflow-hidden group">
                    <!-- GAMBAR 2: Ganti SRC di bawah -->
                    <img class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105" 
                         src="image/5.jpeg"
                </div>
            </div>
        </section>
    </div>
</div>

<?php include 'footer.php'; ?>