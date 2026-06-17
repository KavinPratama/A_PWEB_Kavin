<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1f2125] text-gray-200 min-h-screen pb-12 font-sans">

    <header class="bg-[#18191c] py-4 border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-moon text-yellow-500"></i>
                Jokss Cihuyy
            </div>
            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-400 hover:text-white transition text-sm font-semibold">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 pt-8">

        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white mb-2">Riwayat Transaksi & Tracking</h1>
            <p class="text-sm text-gray-400">Pantau status pengerjaan joki akun kamu di sini.</p>
        </div>

        <?php if($orders->isEmpty()): ?>
            <div class="bg-[#2d2f36] rounded-xl border border-gray-700 p-12 text-center shadow-lg">
                <i class="fa-solid fa-box-open text-6xl text-gray-600 mb-4"></i>
                <h3 class="text-lg font-bold text-white mb-2">Belum ada pesanan nih!</h3>
                <p class="text-sm text-gray-400 mb-6">Kamu belum pernah memesan layanan joki di Jokss Cihuyy.</p>
                <a href="<?php echo e(route('dashboard')); ?>" class="inline-block bg-[#cda06b] hover:bg-[#b58856] text-black font-extrabold py-3 px-6 rounded-lg shadow-lg transition">
                    Pesan Joki Sekarang
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700 transition hover:border-[#cda06b]">
                    <div class="bg-[#3a3d46] px-5 py-4 flex justify-between items-center border-b border-gray-700">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-file-invoice text-[#cda06b]"></i>
                            <span class="font-bold text-white text-sm"><?php echo e($order->invoice_number); ?></span>
                        </div>

                        <?php if($order->status == 'Pending'): ?>
                            <span class="bg-yellow-500/20 text-yellow-500 border border-yellow-500/50 text-[10px] px-2 py-1 rounded font-bold uppercase tracking-wider">
                                <i class="fa-solid fa-clock mr-1"></i> Menunggu
                            </span>
                        <?php elseif($order->status == 'Proses Joki'): ?>
                            <span class="bg-blue-500/20 text-blue-400 border border-blue-500/50 text-[10px] px-2 py-1 rounded font-bold uppercase tracking-wider animate-pulse">
                                <i class="fa-solid fa-gamepad mr-1"></i> Dikerjakan
                            </span>
                        <?php else: ?>
                            <span class="bg-green-500/20 text-green-400 border border-green-500/50 text-[10px] px-2 py-1 rounded font-bold uppercase tracking-wider">
                                <i class="fa-solid fa-check mr-1"></i> Selesai
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="p-5 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-[#cda06b] mb-1">
                                    <?php echo e(ucwords(str_replace('_', ' ', $order->paket))); ?>

                                </h3>
                                <p class="text-xs text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-star text-yellow-500"></i> Target: <?php echo e($order->jumlah_bintang); ?> Bintang
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400 mb-1">Total Pembayaran</p>
                                <p class="font-bold text-white">Rp <?php echo e(number_format($order->total_harga, 0, ',', '.')); ?></p>
                            </div>
                        </div>

                        <div class="bg-[#1f2125] rounded-lg p-4 border border-gray-700 text-sm">
                            <div class="grid grid-cols-2 gap-y-3">
                                <div>
                                    <p class="text-gray-500 text-[11px] uppercase tracking-wider font-bold mb-1">Nickname</p>
                                    <p class="text-gray-200 font-semibold truncate"><?php echo e($order->nickname); ?></p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-[11px] uppercase tracking-wider font-bold mb-1">Login Via</p>
                                    <p class="text-gray-200 font-semibold uppercase"><?php echo e($order->login_via); ?></p>
                                </div>
                                <div class="col-span-2 border-t border-gray-700 pt-3 mt-1">
                                    <p class="text-gray-500 text-[11px] uppercase tracking-wider font-bold mb-1">Tracking Info</p>

                                    <?php if($order->worker_id): ?>
                                        <p class="text-[#5bcfe6] font-semibold flex items-center gap-2">
                                            <i class="fa-solid fa-user-ninja"></i> Dikerjakan oleh: Joki Internal
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">Estimasi Selesai: <?php echo e($order->estimasi_hari ?? '-'); ?> Hari</p>
                                    <?php else: ?>
                                        <p class="text-gray-400 italic text-xs">Sedang mencarikan penjoki terbaik untuk pesananmu...</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endif; ?>
    </main>

</body>
</html>
<?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/paket/transaksi.blade.php ENDPATH**/ ?>