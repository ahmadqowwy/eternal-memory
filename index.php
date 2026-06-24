<?php include 'header.php'; ?>

<!-- HALAMAN HOME -->
<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover filter blur-[3px] brightness-90" src="image/foto1.jpeg"/>
        <div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent"></div>
    </div>
    
    <div class="absolute inset-0 z-1 pointer-events-none opacity-40">
        <span class="material-symbols-outlined floating-heart text-3xl" style="top: 20%; left: 10%;">favorite</span>
        <span class="material-symbols-outlined floating-heart text-2xl" style="top: 70%; left: 85%;">favorite</span>
    </div>

    <div class="relative z-10 text-center px-6 max-w-3xl">
        <h1 class="font-display-lg text-primary mb-6 drop-shadow-md" style="font-family: 'Playfair Display'; font-size: 3.5rem; line-height: 1.1;">Happy Birthday,<br>My Love ❤️</h1>
        <p class="font-body-lg text-on-surface-variant mb-10 text-lg">To the woman who fills every moment of my life with light and grace.</p>
        <a href="gallery.php" class="inline-block px-10 py-4 bg-primary-container text-primary rounded-full font-bold shadow-lg hover:scale-105 transition-transform flex items-center gap-2 mx-auto">
            <span class="material-symbols-outlined">auto_awesome</span> Open Memories
        </a>
    </div>
</div>
<?php include 'gallery.php'; ?>
<?php include 'wishes.php'; ?>
<?php include 'timeline.php'; ?>
<?php include 'footer.php'; ?>