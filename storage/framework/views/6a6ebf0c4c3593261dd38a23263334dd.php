<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokss Cihuyy - Pusat Joki & Top Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Pake Tailwind biar elegan dan gampang ngaturnya -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-[#121316] text-gray-800 dark:text-gray-200 min-h-screen font-sans pb-20 relative transition-colors duration-300">

    <!-- NAVBAR ATAS (Logo & Pencarian) -->
    <header class="bg-white dark:bg-[#1f2125] border-b border-gray-200 dark:border-gray-800 py-4 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center gap-4">

            <div class="text-2xl font-black text-gray-900 dark:text-white flex items-center gap-2 shrink-0">
                <i class="fa-solid fa-gamepad text-[#5bcfe6]"></i>
                Jokss<span class="text-[#5bcfe6]">id</span>
            </div>

        </div>
    </header>

    <!-- NAVBAR BAWAH (Menu Link) -->
    <nav class="bg-white dark:bg-[#121316] border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">

            <div class="flex gap-6 pt-4">
                <a href="#" class="text-gray-900 dark:text-white font-bold pb-3 border-b-2 border-[#5bcfe6]">
                    <i class="fa-solid fa-bolt text-[#5bcfe6]"></i> Layanan Joki
                </a>
                <a href="<?php echo e(route('transaksi.index')); ?>" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition pb-3">
                    <i class="fa-solid fa-receipt"></i> Cek Transaksi
                </a>
            </div>

            <div class="flex gap-3 pb-2">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="bg-[#5bcfe6]/20 hover:bg-[#5bcfe6]/30 text-[#5bcfe6] px-4 py-1.5 rounded-lg text-sm font-bold border border-[#5bcfe6]/50 transition flex items-center gap-2">
                        <i class="fa-solid fa-user"></i> Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white text-sm font-bold px-3 py-1.5 transition flex items-center gap-2">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black px-4 py-1.5 rounded-lg text-sm font-bold transition shadow-[0_0_10px_rgba(91,207,230,0.3)] flex items-center gap-2">
                        <i class="fa-solid fa-user-plus"></i> Daftar
                    </a>
                    <!-- tombollll -->
                    <button onclick="toggleTheme()" class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-yellow-400 w-10 h-10 rounded-full flex items-center justify-center transition shadow-md hover:scale-110 ml-2">
                        <i id="theme-icon" class="fa-solid fa-moon"></i>
                    </button>
                <?php endif; ?>
            </div>

        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="max-w-7xl mx-auto px-4 pt-8">

        <!-- HERO BANNER BESAR -->
        <div class="mb-10 p-6 lg:p-8 bg-gradient-to-r from-cyan-50 dark:from-[#1f2125] to-white dark:to-[#121316] border border-cyan-100 dark:border-gray-700 rounded-2xl shadow-xl dark:shadow-2xl flex items-center gap-6 transition-colors duration-300">
            <div class="h-20 w-20 bg-white dark:bg-[#2d2f36] rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-600 shadow-lg shrink-0 transition-colors duration-300">
                <img src="<?php echo e(asset('images/globalhero.png')); ?>" alt="Jokss" class="w-12 h-12 object-contain drop-shadow-lg">
            </div>
            <div>
                <h2 class="text-2xl lg:text-3xl font-black text-gray-900 dark:text-white drop-shadow-sm dark:drop-shadow-md">Joki Mobile Legends</h2>
                <p class="text-gray-600 dark:text-gray-400 font-medium mt-1">Jokss Cihuyy Official Store</p>
            </div>
        </div>

        <!-- SECTION: POPULER SEKARANG -->
        <section class="mb-12">
            <div class="mb-6">
                <h2 class="text-2xl font-black text-gray-900 dark:text-white drop-shadow-sm dark:drop-shadow-md flex items-center gap-2">
                    🔥 POPULER SEKARANG!
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm md:text-base">Berikut adalah beberapa produk joki yang paling populer saat ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Card 1: Joki Rank -->
                <a href="<?php echo e(route('paket.create', ['type' => 'rank'])); ?>" class="group bg-white dark:bg-[#1f2125] border border-gray-200 dark:border-gray-700 hover:border-[#cda06b] dark:hover:border-[#cda06b] rounded-2xl overflow-hidden shadow-lg dark:shadow-xl transition transform hover:-translate-y-1 block relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#cda06b]/5 dark:from-[#cda06b]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="h-44 w-full bg-gray-50 dark:bg-[#121316] flex items-center justify-center p-6 border-b border-gray-100 dark:border-gray-800 transition-colors duration-300">
                        <img src="<?php echo e(asset('images/roaster.png')); ?>" alt="Joki Rank" class="h-full object-contain drop-shadow-[0_5px_15px_rgba(205,160,107,0.3)] group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-5">
                        <h4 class="text-xl font-black text-gray-900 dark:text-white mb-1">Joki Rank</h4>
                        <p class="text-sm text-[#cda06b] font-bold">Jokss Cihuyy</p>
                    </div>
                </a>

                <!-- Card 2: Joki Hero -->
                <a href="<?php echo e(route('paket.create', ['type' => 'hero'])); ?>" class="group bg-white dark:bg-[#1f2125] border border-gray-200 dark:border-gray-700 hover:border-[#5bcfe6] dark:hover:border-[#5bcfe6] rounded-2xl overflow-hidden shadow-lg dark:shadow-xl transition transform hover:-translate-y-1 block relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#5bcfe6]/5 dark:from-[#5bcfe6]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="h-44 w-full bg-gray-50 dark:bg-[#121316] flex items-center justify-center p-6 border-b border-gray-100 dark:border-gray-800 transition-colors duration-300">
                        <img src="<?php echo e(asset('images/globalhero.png')); ?>" alt="Joki Hero" class="h-full object-contain drop-shadow-[0_5px_15px_rgba(91,207,230,0.3)] group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-5">
                        <h4 class="text-xl font-black text-gray-900 dark:text-white mb-1">Joki Hero / MMR</h4>
                        <p class="text-sm text-[#5bcfe6] font-bold">Jokss Cihuyy</p>
                    </div>
                </a>

                <!-- Card 3: Joki Gendong -->
                <a href="<?php echo e(route('paket.create', ['type' => 'gendong'])); ?>" class="group bg-white dark:bg-[#1f2125] border border-gray-200 dark:border-gray-700 hover:border-[#f59e0b] dark:hover:border-[#f59e0b] rounded-2xl overflow-hidden shadow-lg dark:shadow-xl transition transform hover:-translate-y-1 block relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#f59e0b]/5 dark:from-[#f59e0b]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="h-44 w-full bg-gray-50 dark:bg-[#121316] flex items-center justify-center p-6 border-b border-gray-100 dark:border-gray-800 transition-colors duration-300">
                        <img src="<?php echo e(asset('images/epic.png')); ?>" alt="Joki Gendong" class="h-full object-contain drop-shadow-[0_5px_15px_rgba(245,158,11,0.3)] group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-5">
                        <h4 class="text-xl font-black text-gray-900 dark:text-white mb-1">Joki Gendong VIP</h4>
                        <p class="text-sm text-[#f59e0b] font-bold">Jokss Cihuyy</p>
                    </div>
                </a>

            </div>
        </section>

    </main>

    <!-- ========================================== -->
    <!-- FOOTER KEREN ALA WEB PROFESIONAL           -->
    <!-- ========================================== -->
    <footer class="bg-gray-100 dark:bg-[#0b0c10] border-t border-gray-200 dark:border-gray-800 pt-16 pb-8 mt-20 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-8 mb-12">

                <!-- Kolom 1: Brand & Deskripsi -->
                <div class="md:col-span-2">
                    <div class="text-2xl font-black text-gray-900 dark:text-white flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-gamepad text-[#5bcfe6]"></i>
                        Jokss<span class="text-[#5bcfe6]">id</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6 max-w-sm">
                        Platform penyedia layanan Joki Mobile Legends terpercaya sejak 2026. Proses instan, aman, 24 jam nonstop dengan harga terbaik untuk para gamers.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="#" class="bg-white dark:bg-[#1f2125] border border-gray-300 dark:border-gray-800 hover:border-[#5bcfe6] hover:bg-gray-50 dark:hover:bg-[#2d2f36] transition rounded-lg px-4 py-2 flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <i class="fa-brands fa-facebook text-blue-500"></i> Facebook
                        </a>
                        <a href="#" class="bg-white dark:bg-[#1f2125] border border-gray-300 dark:border-gray-800 hover:border-[#5bcfe6] hover:bg-gray-50 dark:hover:bg-[#2d2f36] transition rounded-lg px-4 py-2 flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <i class="fa-brands fa-instagram text-pink-500"></i> Instagram
                        </a>
                        <a href="#" class="bg-white dark:bg-[#1f2125] border border-gray-300 dark:border-gray-800 hover:border-[#5bcfe6] hover:bg-gray-50 dark:hover:bg-[#2d2f36] transition rounded-lg px-4 py-2 flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <i class="fa-brands fa-twitter text-blue-400"></i> Twitter
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Tautan Cepat -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold mb-6 uppercase tracking-wider text-sm">Tautan Cepat</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-[#5bcfe6] transition text-sm flex items-center gap-3"><i class="fa-solid fa-house text-orange-400 w-4"></i> Beranda</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-[#5bcfe6] transition text-sm flex items-center gap-3"><i class="fa-solid fa-gift text-red-500 w-4"></i> Promo</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-[#5bcfe6] transition text-sm flex items-center gap-3"><i class="fa-solid fa-gem text-blue-400 w-4"></i> Top Up</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Hubungi Kami -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold mb-6 uppercase tracking-wider text-sm">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li class="text-gray-600 dark:text-gray-400 text-sm flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-pink-500 mt-1 w-4"></i>
                            Jl.Kebersamaan
                        </li>
                        <li class="text-gray-600 dark:text-gray-400 text-sm flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-blue-300 w-4"></i> jokscihuy@gmail.com
                        </li>
                        <li class="text-gray-600 dark:text-gray-400 text-sm flex items-center gap-3">
                            <i class="fa-solid fa-phone text-green-400 w-4"></i> +62 823-3391-5217
                        </li>
                        <li class="text-gray-600 dark:text-gray-400 text-sm flex items-center gap-3">
                            <i class="fa-solid fa-clock text-gray-400 dark:text-gray-300 w-4"></i> Jam Layanan CS: 08.00 - 22.00 WIB
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright Bawah -->
            <div class="border-t border-gray-300 dark:border-gray-800 pt-8 flex justify-center items-center text-center">
                <p class="text-gray-500 text-xs">
                    &copy; 2026 Jokss Cihuyy - Bukan afiliasi resmi Moonton.
                </p>
            </div>
        </div>
    </footer>

    <!-- FLOATING BUTTON (Hubungi CS) -->
    <a href="#" class="fixed bottom-6 right-6 bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black px-5 py-3 rounded-full font-black text-sm shadow-[0_0_20px_rgba(91,207,230,0.4)] transition hover:-translate-y-1 flex items-center gap-2 z-50">
        <i class="fa-solid fa-headset text-lg"></i> HUBUNGI CS
    </a>

    <script>
        const themeIcon = document.getElementById('theme-icon');

        // 1. Fungsi Cek Cookie pas web pertama dibuka
        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            if (match) return match[2];
            return null;
        }

        // Default ke Dark kalau cookie 'dark', atau kalau belum ada cookie tapi laptopnya mode gelap
        if (getCookie('theme') === 'dark' || (!getCookie('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        } else {
            document.documentElement.classList.remove('dark');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
        }

        // 2. Fungsi Eksekusi pas tombol diklik (Set Cookie)
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                // Ubah ke Mode Terang
                document.documentElement.classList.remove('dark');
                document.cookie = "theme=light; max-age=31536000; path=/"; // Simpan cookie 1 tahun
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                // Ubah ke Mode Gelap
                document.documentElement.classList.add('dark');
                document.cookie = "theme=dark; max-age=31536000; path=/"; // Simpan cookie 1 tahun
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        }
    </script>

</body>
</html>
<?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/welcome.blade.php ENDPATH**/ ?>