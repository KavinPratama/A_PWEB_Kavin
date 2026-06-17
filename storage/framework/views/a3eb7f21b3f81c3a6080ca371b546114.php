<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Jokss Cihuyy'); ?></title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>
</head>
<body class="bg-[#121316] text-gray-200 min-h-screen">

    <div class="flex h-screen w-full">
        <!-- Kolom Kiri: Auth Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-[#121316] p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- Kolom Kanan: Dekorasi -->
        <div class="hidden lg:flex w-1/2 bg-[#1f2125] border-l border-gray-800 items-center justify-center p-12">
            <div class="text-center">
                <i class="fa-solid fa-gamepad text-[#5bcfe6] text-8xl mb-6"></i>
                <h1 class="text-4xl font-black text-white mb-4">Jokss Cihuyy</h1>
                <p class="text-gray-400">Siap push rank jadi Mythic?</p>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/layouts/auth-split.blade.php ENDPATH**/ ?>