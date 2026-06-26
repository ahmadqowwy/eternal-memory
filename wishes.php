<?php include 'header.php'; ?>

<!-- Khusus CSS Wishes -->
<style>
    .glass-panel {
        background: rgba(251, 249, 245, 0.75);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }
    .organic-glow {
        box-shadow: 0 20px 50px rgba(250, 218, 221, 0.25);
    }
</style>

<div class="max-w-5xl mx-auto px-5 md:px-16 pt-8">
    
    <!-- Hero Wishes -->
    <section class="pt-10 pb-16">
        <div class="relative w-full max-w-4xl mx-auto aspect-[16/9] md:aspect-[21/9] flex items-center justify-center p-8 rounded-xl overflow-hidden organic-glow">
            <div class="absolute inset-0 z-0">
                <!-- GAMBAR BACKGROUND UTAMA: Ganti SRC di bawah -->
                <img class="w-full h-full object-cover brightness-90 contrast-75" 
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuCbFTtV4j1MIWuJHgDY62nZL4TA_ouA6cLnxqqTrxm7mdMgX1mHCnjoDknhAwjJVWohogpZi1qQRwZIqg-QrH095POv0byId-zXtykqKL4DHj3NDc05eg_go0P8UFopXVV7cIX26B1DN_qN4RDV1dgNu5wP-G5ouqaVgja5Vr5ePAtRYVQbCJnI3G-MQgSeBwYENNqSGS4FVSFOcnjJ33M7KfQ26NTY3O76IM5YIF4eE5MvXMIPr7MAEiSUviNzz0QC8-9fe3scsTE" 
                     alt="Background">
                <div class="absolute inset-0 bg-gradient-to-t from-surface/60 to-transparent"></div>
            </div>
            <div class="relative z-10 text-center glass-panel p-10 rounded-xl border border-white/40 max-w-2xl">
                <span class="font-label-caps text-secondary mb-4 block tracking-widest">A SPECIAL MILESTONE</span>
                <h1 class="font-display-md text-primary mb-6 leading-tight" style="font-family: 'Playfair Display'; font-size: 48px;">Happy Birthday, <span class="italic">Devita</span>.</h1>
            </div>
        </div>
    </section>

    <!-- Daftar Ucapan -->
    <section class="py-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-16">
            <!-- Kartu Ucapan 1 -->
            <div class="md:col-span-7 glass-panel p-8 rounded-xl border border-primary-container/20 organic-glow">
                <div class="flex items-center gap-4 mb-6">
                    <!-- GAMBAR AVATAR PENGGUNA 1: Ganti SRC di bawah -->
                    <img class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-sm" 
                         src="image/foto2.jpeg" 
                         alt="Elena">
                    <div>
                        <p class="font-headline-lg text-primary italic">Elena Vance</p>
                        <p class="font-label-caps text-on-surface-variant/60">COLLEGE FRIEND</p>
                    </div>
                </div>
                <p class="font-body-lg text-on-surface-variant leading-relaxed mb-4 italic">""Devita, looking back at our photos, I'm reminded of how your laughter could light up even the rainiest streets."</p>
                <div class="font-label-caps text-secondary text-xs">JULY 26, 2026</div>
            </div>
            
            <!-- Kartu Ucapan 2 -->
            <div class="md:col-span-5 bg-surface-container-low p-8 rounded-xl flex flex-col justify-center relative overflow-hidden">
                <p class="font-body-md text-on-surface-variant mb-6 leading-relaxed">"To many more years of deep conversations, and being there for each other."</p>
                <div class="mt-auto"><p class="font-headline-lg text-primary italic text-xl">Julian S.</p></div>
            </div>
        </div>
    </section>

 

</div>

