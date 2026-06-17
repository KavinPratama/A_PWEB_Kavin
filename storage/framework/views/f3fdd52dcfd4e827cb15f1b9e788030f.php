<?php if(Auth::user()->role === 'admin'): ?>
<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class', }</script>
</head>
<body class="bg-gray-100 dark:bg-[#121316] text-gray-800 dark:text-gray-200 min-h-screen font-sans transition-colors duration-300">

    <header class="bg-red-700 dark:bg-red-900 py-4 border-b border-red-800 sticky top-0 z-50 text-white">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-bold flex items-center gap-2">
                <i class="fa-solid fa-user-shield text-yellow-400"></i>
                Admin Panel - Jokss
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold">Halo, <?php echo e(Auth::user()->username ?? Auth::user()->name); ?>!</span>
                <button onclick="toggleTheme()" class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40">
                    <i id="theme-icon-admin" class="fa-solid fa-moon"></i>
                </button>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-black/50 hover:bg-black text-white px-4 py-2 rounded-lg text-sm font-bold transition">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 pt-8 pb-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-black text-gray-900 dark:text-white drop-shadow-md">Kelola Pesanan Joki</h1>
            <div class="flex flex-wrap items-center gap-3">
                <a href="<?php echo e(route('worker.index')); ?>" class="bg-purple-700 hover:bg-purple-600 text-white px-4 py-2 rounded-lg font-bold border border-purple-500 transition shadow-[0_0_15px_rgba(147,51,234,0.3)] flex items-center gap-2">
                    <i class="fa-solid fa-users-gear"></i> Kelola Penjoki
                </a>
                <div class="bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-300 px-4 py-2 rounded-lg font-bold border border-blue-300 dark:border-blue-700">
                    Total Pesanan Masuk: <?php echo e(isset($semua_order) ? $semua_order->count() : 0); ?>

                </div>
            </div>
        </div>

        <?php
            $ordersGendong = collect();
            $ordersHero = collect();
            $ordersRank = collect();

            if(isset($semua_order)) {
                $ordersGendong = $semua_order->filter(fn($o) => str_contains($o->paket, 'gendong'));
                $ordersHero = $semua_order->filter(fn($o) => in_array($o->paket, ['classic_wr', 'ranked_mmr']));
                $ordersRank = $semua_order->reject(fn($o) => str_contains($o->paket, 'gendong') || in_array($o->paket, ['classic_wr', 'ranked_mmr']));
            }
        ?>

        
        <section class="mb-10">
            <h2 class="text-xl font-bold text-[#f59e0b] mb-4 flex items-center gap-2">
                <i class="fa-solid fa-people-group"></i> Joki Gendong VIP
            </h2>
            <div class="bg-white dark:bg-[#1f2125] rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-100 dark:bg-[#2d2f36] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="p-4">Invoice & Harga</th>
                            <th class="p-4">Target Tier</th>
                            <th class="p-4">Data Player (Tanpa Pass)</th>
                            <th class="p-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <?php $__empty_1 = true; $__currentLoopData = $ordersGendong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr onclick="window.location='<?php echo e(route('admin.order.show', $order->id)); ?>'" class="hover:bg-amber-50 dark:hover:bg-amber-500/10 cursor-pointer transition">
                                <td class="p-4">
                                    <span class="font-bold text-[#f59e0b] block"><?php echo e($order->invoice_number); ?></span>
                                    <span class="text-green-600 dark:text-green-400 font-semibold">Rp <?php echo e(number_format($order->total_harga, 0, ',', '.')); ?></span>
                                    <p class="text-[10px] text-gray-400 mt-1 uppercase"><?php echo e($order->payment_method); ?></p>
                                </td>
                                <td class="p-4">
                                    <span class="font-bold text-gray-900 dark:text-white uppercase"><?php echo e(str_replace('_', ' ', $order->paket)); ?></span>
                                    <p class="text-yellow-500 font-semibold text-xs"><i class="fa-solid fa-star"></i> <?php echo e($order->jumlah_bintang); ?> Win</p>
                                </td>
                                <td class="p-4 text-xs space-y-1">
                                    <p><span class="text-gray-400">Nick:</span> <span class="font-bold text-gray-900 dark:text-white"><?php echo e($order->nickname); ?></span></p>
                                    <p><span class="text-gray-400">ID Game:</span> <span class="text-cyan-600 dark:text-cyan-400"><?php echo e($order->request_hero); ?></span></p>
                                    <p><span class="text-gray-400">Jadwal/Role:</span> <span class="italic text-yellow-600 dark:text-yellow-300"><?php echo e($order->catatan); ?></span></p>
                                </td>
                                <td class="p-4 text-right">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold
                                        <?php if($order->status == 'Pending'): ?> bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-400
                                        <?php elseif($order->status == 'Proses Joki'): ?> bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-400
                                        <?php else: ?> bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-400 <?php endif; ?>">
                                        <?php echo e($order->status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="p-6 text-center text-gray-400 italic">Belum ada antrean Gendong Mabar.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        
        <section class="mb-10">
            <h2 class="text-xl font-bold text-[#5bcfe6] mb-4 flex items-center gap-2">
                <i class="fa-solid fa-khanda"></i> Joki Joki Hero / MMR
            </h2>
            <div class="bg-white dark:bg-[#1f2125] rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-100 dark:bg-[#2d2f36] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="p-4">Invoice & Harga</th>
                            <th class="p-4">Target Mode</th>
                            <th class="p-4">Data Akun & Hero</th>
                            <th class="p-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <?php $__empty_1 = true; $__currentLoopData = $ordersHero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr onclick="window.location='<?php echo e(route('admin.order.show', $order->id)); ?>'" class="hover:bg-cyan-50 dark:hover:bg-cyan-500/10 cursor-pointer transition">
                                <td class="p-4">
                                    <span class="font-bold text-[#5bcfe6] block"><?php echo e($order->invoice_number); ?></span>
                                    <span class="text-green-600 dark:text-green-400 font-semibold">Rp <?php echo e(number_format($order->total_harga, 0, ',', '.')); ?></span>
                                    <p class="text-[10px] text-gray-400 mt-1 uppercase"><?php echo e($order->payment_method); ?></p>
                                </td>
                                <td class="p-4">
                                    <span class="font-bold text-gray-900 dark:text-white uppercase"><?php echo e(str_replace('_', ' ', $order->paket)); ?></span>
                                    <p class="text-yellow-500 font-semibold text-xs"><i class="fa-solid fa-star"></i> <?php echo e($order->jumlah_bintang); ?> Win</p>
                                </td>
                                <td class="p-4 text-xs space-y-1">
                                    <p><span class="text-gray-400">Nick:</span> <span class="font-bold text-gray-900 dark:text-white"><?php echo e($order->nickname); ?></span> (<?php echo e($order->login_via); ?>)</p>
                                    <p><span class="text-gray-400">Email:</span> <span class="text-gray-700 dark:text-gray-300"><?php echo e($order->email_game); ?></span></p>
                                </td>
                                <td class="p-4 text-right">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold
                                        <?php if($order->status == 'Pending'): ?> bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-400
                                        <?php elseif($order->status == 'Proses Joki'): ?> bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-400
                                        <?php else: ?> bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-400 <?php endif; ?>">
                                        <?php echo e($order->status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="p-6 text-center text-gray-400 italic">Belum ada antrean Joki Hero.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        
        <section class="mb-10">
            <h2 class="text-xl font-bold text-green-500 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shield-cat"></i> Joki Joki Rank
            </h2>
            <div class="bg-white dark:bg-[#1f2125] rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-100 dark:bg-[#2d2f36] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="p-4">Invoice & Harga</th>
                            <th class="p-4">Target Rank</th>
                            <th class="p-4">Data Akun Game</th>
                            <th class="p-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <?php $__empty_1 = true; $__currentLoopData = $ordersRank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr onclick="window.location='<?php echo e(route('admin.order.show', $order->id)); ?>'" class="hover:bg-green-50 dark:hover:bg-green-500/10 cursor-pointer transition">
                                <td class="p-4">
                                    <span class="font-bold text-[#cda06b] block"><?php echo e($order->invoice_number); ?></span>
                                    <span class="text-green-600 dark:text-green-400 font-semibold">Rp <?php echo e(number_format($order->total_harga, 0, ',', '.')); ?></span>
                                    <p class="text-[10px] text-gray-400 mt-1 uppercase"><?php echo e($order->payment_method); ?></p>
                                </td>
                                <td class="p-4">
                                    <span class="font-bold text-gray-900 dark:text-white uppercase"><?php echo e(str_replace('_', ' ', $order->paket)); ?></span>
                                    <p class="text-yellow-500 font-semibold text-xs"><i class="fa-solid fa-star"></i> <?php echo e($order->jumlah_bintang); ?> Bintang</p>
                                </td>
                                <td class="p-4 text-xs space-y-1">
                                    <p><span class="text-gray-400">Nick:</span> <span class="font-bold text-gray-900 dark:text-white"><?php echo e($order->nickname); ?></span> (<?php echo e($order->login_via); ?>)</p>
                                    <p><span class="text-gray-400">Email:</span> <span class="text-gray-700 dark:text-gray-300"><?php echo e($order->email_game); ?></span></p>
                                </td>
                                <td class="p-4 text-right">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold
                                        <?php if($order->status == 'Pending'): ?> bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-400
                                        <?php elseif($order->status == 'Proses Joki'): ?> bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-400
                                        <?php else: ?> bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-400 <?php endif; ?>">
                                        <?php echo e($order->status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="p-6 text-center text-gray-400 italic">Belum ada antrean Joki Rank.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <script>
        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;
        }

        function applyTheme(theme) {
            const icon = document.getElementById('theme-icon-admin');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                if (icon) icon.className = 'fa-solid fa-sun';
            } else {
                document.documentElement.classList.remove('dark');
                if (icon) icon.className = 'fa-solid fa-moon';
            }
        }

        const savedTheme = getCookie('theme') || 'dark';
        applyTheme(savedTheme);

        function toggleTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';
            applyTheme(newTheme);
            document.cookie = "theme=" + newTheme + "; max-age=31536000; path=/";
        }
    </script>
</body>
</html>

<?php else: ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Member - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 dark:bg-[#121316] text-gray-800 dark:text-gray-200 min-h-screen font-sans transition-colors duration-300">

    <header class="bg-white dark:bg-[#1f2125] border-b border-gray-200 dark:border-gray-800 py-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">

            <div class="text-2xl font-black text-gray-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-gamepad text-[#5bcfe6]"></i>
                Jokss<span class="text-[#5bcfe6]">id</span>
            </div>

            <div class="flex items-center gap-4">

                <div class="hidden md:flex items-center gap-2 text-gray-800 dark:text-white font-semibold">
                    <i class="fa-solid fa-circle-user text-[#5bcfe6] text-xl"></i>
                    Halo, <?php echo e(Auth::user()->username ?? Auth::user()->name); ?>!
                </div>

                <button onclick="toggleTheme()"
                    class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-yellow-400 w-10 h-10 rounded-full flex items-center justify-center transition hover:scale-110">
                    <i id="theme-icon" class="fa-solid fa-moon"></i>
                </button>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <nav class="bg-white dark:bg-[#121316] border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 flex gap-6 pt-4">

            <a href="#"
                class="text-gray-900 dark:text-white font-bold pb-3 border-b-2 border-[#5bcfe6]">
                <i class="fa-solid fa-bolt text-[#5bcfe6]"></i>
                Layanan Joki
            </a>

            <a href="<?php echo e(route('transaksi.index')); ?>"
                class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition pb-3">
                <i class="fa-solid fa-receipt"></i>
                Cek Transaksi
            </a>

        </div>
    </nav>

    <main class="main-container max-w-7xl mx-auto px-4 pt-8">
        <div
    class="mb-10 p-6 lg:p-8 bg-gradient-to-r from-cyan-50 dark:from-[#1f2125] to-white dark:to-[#121316] border border-cyan-100 dark:border-gray-700 rounded-2xl shadow-xl flex items-center gap-6">

    <div
        class="h-20 w-20 bg-white dark:bg-[#2d2f36] rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-600 shadow-lg">

        <img src="<?php echo e(asset('images/globalhero.png')); ?>"
            class="w-12 h-12 object-contain">

    </div>

    <div>
        <h2 class="text-2xl lg:text-3xl font-black text-gray-900 dark:text-white">
            Joki Mobile Legends
        </h2>

        <p class="text-gray-600 dark:text-gray-400 font-medium mt-1">
            Jokss Cihuyy Official Store
        </p>
    </div>

</div>
        <section class="popular-section mb-12">
            <div class="section-header mb-6">
                <h2 class="text-2xl font-black text-white drop-shadow-md">🔥 POPULER SEKARANG!</h2>
                <p class="text-gray-300">Mau push rank ke Mythic hari ini? Pilih layanannya sekarang.</p>
            </div>

            <div class="popular-grid grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="<?php echo e(route('paket.create', ['type' => 'rank'])); ?>" class="pop-card bg-[#2b1854] border border-[#5e20b3] hover:border-[#5bcfe6] rounded-xl overflow-hidden shadow-xl transition transform hover:-translate-y-1 block">
                    <div class="h-40 w-full bg-[#1c0f38] flex items-center justify-center p-4">
                        <img src="<?php echo e(asset('images/roaster.png')); ?>" alt="Joki Rank" class="h-full object-contain drop-shadow-2xl">
                    </div>
                    <div class="pop-info p-5 bg-gradient-to-t from-[#1c0f38] to-[#2b1854]">
                        <h4 class="text-lg font-bold text-white mb-1">Joki Rank MLBB</h4>
                        <p class="text-sm text-[#5bcfe6] font-semibold">Jokss Cihuyy</p>
                    </div>
                </a>

                <a href="<?php echo e(route('paket.create', ['type' => 'hero'])); ?>" class="pop-card bg-[#2b1854] border border-[#5e20b3] hover:border-[#5bcfe6] rounded-xl overflow-hidden shadow-xl transition transform hover:-translate-y-1 block">
                    <div class="h-40 w-full bg-[#1c0f38] flex items-center justify-center p-4">
                        <img src="<?php echo e(asset('images/globalhero.png')); ?>" alt="Joki Hero" class="h-full object-contain drop-shadow-2xl">
                    </div>
                    <div class="pop-info p-5 bg-gradient-to-t from-[#1c0f38] to-[#2b1854]">
                        <h4 class="text-lg font-bold text-white mb-1">Joki Hero / MMR</h4>
                        <p class="text-sm text-[#5bcfe6] font-semibold">Jokss Cihuyy</p>
                    </div>
                </a>

                <a href="<?php echo e(route('paket.create', ['type' => 'gendong'])); ?>" class="pop-card bg-[#2b1854] border border-[#5e20b3] hover:border-[#5bcfe6] rounded-xl overflow-hidden shadow-xl transition transform hover:-translate-y-1 block">
                    <div class="h-40 w-full bg-[#1c0f38] flex items-center justify-center p-4">
                        <img src="<?php echo e(asset('images/epic.png')); ?>" alt="Joki Gendong" class="h-full object-contain drop-shadow-2xl">
                    </div>
                    <div class="pop-info p-5 bg-gradient-to-t from-[#1c0f38] to-[#2b1854]">
                        <h4 class="text-lg font-bold text-white mb-1">Joki Gendong VIP</h4>
                        <p class="text-sm text-[#5bcfe6] font-semibold">Jokss Cihuyy</p>
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
</body>
</html>
<?php endif; ?>
<?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/dashboard.blade.php ENDPATH**/ ?>