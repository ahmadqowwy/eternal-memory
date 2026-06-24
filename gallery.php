<?php
include 'config.php';
include 'header.php';

 $data = mysqli_query(
    $conn,
    "SELECT * FROM memories ORDER BY id DESC"
);
?>

<!-- ================= GALLERY SECTION ================= -->

<section class="relative pt-24 pb-12 px-5 md:px-16 overflow-hidden">

    <!-- Floating Heart -->
    <div class="floating-heart top-24 left-10 text-5xl">❤</div>
    <div class="floating-heart bottom-20 right-10 text-4xl" style="animation-delay: 2s;">❤</div>

    <!-- Title -->
    <div class="text-center mb-16 relative z-10">
        <span class="font-label-caps text-secondary tracking-widest block mb-4">OUR PRECIOUS MEMORIES</span>
        <h2 class="text-5xl md:text-6xl italic text-primary font-display-md mb-4">
            The Gallery
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed font-body-lg">
            Every photo holds a memory,<br>
            every memory holds a piece of us.
        </p>
    </div>

    <!-- Gallery Grid -->
    <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 relative z-10">

        <?php while($row = mysqli_fetch_assoc($data)) : ?>

        <div class="break-inside-avoid group relative overflow-hidden rounded-3xl shadow-xl cursor-pointer"
             onclick="openLightbox('uploads/<?php echo $row['image']; ?>')">

            <img
                src="uploads/<?php echo $row['image']; ?>"
                alt="<?php echo $row['title']; ?>"
                class="w-full object-cover transition duration-700 group-hover:scale-110"
                loading="lazy">

            <!-- Overlay -->
            <div class="absolute inset-0
                        bg-gradient-to-t
                        from-black/70
                        via-black/10
                        to-transparent
                        opacity-0
                        group-hover:opacity-100
                        transition duration-500">
            </div>

            <!-- Text -->
            <div class="absolute bottom-0 left-0 p-6
                        translate-y-10
                        group-hover:translate-y-0
                        transition duration-500">

                <span class="text-pink-200 text-sm tracking-widest font-label-caps">
                    MEMORY
                </span>

                <h3 class="text-white text-2xl italic font-display-md">
                    <?php echo $row['title']; ?>
                </h3>

                <?php if (!empty($row['description'])) : ?>
                <p class="text-gray-200 text-sm mt-2 font-body-md">
                    <?php echo $row['description']; ?>
                </p>
                <?php endif; ?>

            </div>
        </div>

        <?php endwhile; ?>

    </div>

    <!-- Empty State (jika tidak ada foto dari database) -->
    <?php if (mysqli_num_rows($data) === 0) : ?>
    <div class="text-center py-20">
        <span class="material-symbols-outlined text-outline-variant/40 text-6xl">photo_library</span>
        <p class="font-display-md text-gray-400 mt-4 text-xl">Belum Ada Foto</p>
        <p class="text-gray-300 text-sm mt-2 font-body-md">Login dan mulai tambahkan kenangan berharga.</p>
        <button onclick="openLoginModal()" class="mt-4 px-6 py-2 bg-primary text-white rounded-xl text-sm font-semibold hover:bg-primary/90 transition">
            Masuk untuk Upload
        </button>
    </div>
    <?php endif; ?>

</section>

<?php include 'footer.php'; ?>