<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Joki Hero / MMR - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1f2125] text-gray-200 min-h-screen pb-12 font-sans">

    <!-- NAVBAR SIMPLE -->
    <header class="bg-[#18191c] py-4 border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-bold text-[#5bcfe6] flex items-center gap-2">
                <i class="fa-solid fa-khanda"></i>
                Jokss Cihuyy - Divisi Hero
            </div>
            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-400 hover:text-white transition text-sm font-semibold">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 pt-8">

        <div class="mb-6">
            <h1 class="text-2xl font-black text-white">🔥 Form Joki Hero / MMR</h1>
            <p class="text-gray-400 text-sm">Naikkan Win Rate dan MMR Hero favoritmu ke Top Global!</p>
        </div>

        <form action="<?php echo e(route('paket.store')); ?>" method="POST" id="order-form">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- KOLOM KIRI -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- SECTION 1: DATA AKUN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#5bcfe6] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">1</span>
                            <h2 class="text-lg font-semibold text-white">Data Akun & Hero</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Email Game</label>
                                    <input type="text" name="email_game" placeholder="Masukkan Email" required class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:outline-none placeholder-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Password Game</label>
                                    <input type="password" name="password_game" placeholder="Masukkan Password" required class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:outline-none placeholder-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Login Via</label>
                                    <select name="login_via" required class="w-full bg-[#121316] text-gray-400 border border-gray-700 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:outline-none">
                                        <option value="">Pilih Login Via</option>
                                        <option value="moonton">Moonton</option>
                                        <option value="vk">VK</option>
                                        <option value="tiktok">TikTok</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Nickname</label>
                                    <input type="text" name="nickname" placeholder="Masukkan Nickname" required class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:outline-none placeholder-gray-600">
                                </div>

                                <!-- REQUEST HERO WAJIB DIISI -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold mb-1 text-[#5bcfe6]">Target Hero (WAJIB) <i class="fa-solid fa-star text-xs"></i></label>
                                    <input type="text" name="request_hero" placeholder="Contoh: Fanny, Ling, Gusion (Pisahkan dengan koma)" required class="w-full bg-[#121316] text-white border border-[#5bcfe6]/50 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:ring-1 focus:ring-[#5bcfe6] focus:outline-none placeholder-gray-600">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Catatan Tambahan</label>
                                    <input type="text" name="catatan" placeholder="Contoh: Settingan emblem jangan diubah" class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-[#5bcfe6] focus:outline-none placeholder-gray-600">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: PILIH LAYANAN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#5bcfe6] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">2</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Mode Joki Hero</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="classic_wr" data-price="4000" data-name="Classic (Win Rate)" class="peer sr-only">
                                    <div class="bg-[#121316] border border-gray-600 rounded-xl p-5 peer-checked:border-[#5bcfe6] peer-checked:bg-[#5bcfe6]/10 hover:border-gray-400 transition h-full flex flex-col justify-between">
                                        <div>
                                            <div class="text-md font-bold text-white mb-1"><i class="fa-solid fa-shield-halved text-gray-400 mr-1"></i> Classic Mode</div>
                                            <p class="text-xs text-gray-400 mb-3">Fokus naikkan Win Rate hero dengan cepat.</p>
                                        </div>
                                        <div class="text-[#5bcfe6] font-extrabold text-xl">Rp 4.000 <span class="text-xs text-gray-400 font-normal">/ Win</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="ranked_mmr" data-price="7000" data-name="Ranked (Push MMR)" class="peer sr-only">
                                    <div class="bg-[#121316] border border-gray-600 rounded-xl p-5 peer-checked:border-[#5bcfe6] peer-checked:bg-[#5bcfe6]/10 hover:border-gray-400 transition h-full flex flex-col justify-between">
                                        <div>
                                            <div class="text-md font-bold text-white mb-1"><i class="fa-solid fa-trophy text-yellow-500 mr-1"></i> Ranked Mode</div>
                                            <p class="text-xs text-gray-400 mb-3">Fokus push MMR (Power) hero masuk Leaderboard.</p>
                                        </div>
                                        <div class="text-[#5bcfe6] font-extrabold text-xl">Rp 7.000 <span class="text-xs text-gray-400 font-normal">/ Win</span></div>
                                    </div>
                                </label>

                            </div>

                            <!-- Input Jumlah Win -->
                            <div class="mt-6 bg-[#1f2125] p-5 rounded-xl border border-gray-700 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <label class="block text-md font-bold text-white">Target Kemenangan</label>
                                    <p class="text-xs text-gray-400">Mau pesan berapa win?</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button type="button" id="btn-minus" class="bg-[#2d2f36] hover:bg-[#5bcfe6] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-minus"></i></button>

                                    <input type="number" id="star-qty" name="jumlah_bintang" min="1" max="200" value="5" class="w-20 bg-[#121316] text-white border border-[#5bcfe6] rounded-lg px-2 py-2 text-center font-bold focus:outline-none pointer-events-none">

                                    <button type="button" id="btn-plus" class="bg-[#2d2f36] hover:bg-[#5bcfe6] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: PILIH PEMBAYARAN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#5bcfe6] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">3</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Pembayaran</h2>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment_method" value="qris" data-pay="QRIS" class="peer sr-only" checked>
                                <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#5bcfe6] peer-checked:bg-[#5bcfe6]/10 hover:border-gray-400 transition font-bold text-white text-center">
                                    <i class="fa-solid fa-qrcode text-[#5bcfe6] mr-2"></i> QRIS
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment_method" value="bca" data-pay="BCA Virtual Account" class="peer sr-only">
                                <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#5bcfe6] peer-checked:bg-[#5bcfe6]/10 hover:border-gray-400 transition font-bold text-white text-center">
                                    <i class="fa-solid fa-building-columns text-[#5bcfe6] mr-2"></i> Bank Transfer
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN (Sidebar Detail) -->
                <div class="space-y-4">
                    <div class="bg-[#212328] rounded-xl shadow-lg border border-gray-700 p-6 sticky top-24">
                        <h3 class="text-sm font-bold text-white mb-4 border-b border-gray-700 pb-2">Ringkasan Pesanan Hero</h3>
                        <div class="space-y-3 text-sm text-gray-300 mb-6">
                            <div class="flex justify-between">
                                <span>Layanan:</span>
                                <span class="font-bold text-[#5bcfe6]">Joki Hero / MMR</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span>Target:</span>
                                <span id="summary-target" class="font-bold text-white text-right max-w-[150px] leading-tight">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total Win:</span>
                                <span id="summary-qty" class="font-bold text-yellow-500">5 Win</span>
                            </div>
                            <div class="flex justify-between border-t border-gray-700 pt-3">
                                <span>Pembayaran:</span>
                                <span id="summary-payment" class="font-bold text-white">QRIS</span>
                            </div>
                        </div>
                        <div class="bg-[#121316] p-4 rounded-lg border border-[#5bcfe6]/30 mb-6">
                            <span class="text-xs font-bold text-gray-400 block mb-1">Total Bayar:</span>
                            <span id="summary-total" class="text-2xl font-black text-[#5bcfe6]">Rp 0</span>
                        </div>

                        <button type="submit" class="w-full bg-[#5bcfe6] hover:bg-[#46b3ca] text-black font-extrabold py-3 rounded-lg shadow-[0_0_15px_rgba(91,207,230,0.4)] transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bolt"></i> Gaskan Joki Hero!
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="paket"]');
            const payRadios = document.querySelectorAll('input[name="payment_method"]');
            const qtyInput = document.getElementById('star-qty');
            const btnMinus = document.getElementById('btn-minus');
            const btnPlus = document.getElementById('btn-plus');

            const summaryTarget = document.getElementById('summary-target');
            const summaryQty = document.getElementById('summary-qty');
            const summaryTotal = document.getElementById('summary-total');
            const summaryPayment = document.getElementById('summary-payment');

            function hitungTotal() {
                let selectedPaket = document.querySelector('input[name="paket"]:checked');
                let selectedPay = document.querySelector('input[name="payment_method"]:checked');
                let qty = parseInt(qtyInput.value) || 1;

                if(selectedPay) {
                    summaryPayment.innerText = selectedPay.getAttribute('data-pay');
                }

                if (selectedPaket) {
                    let harga = parseInt(selectedPaket.getAttribute('data-price'));
                    let namaPaket = selectedPaket.getAttribute('data-name');
                    let totalHarga = harga * qty;

                    summaryTarget.innerText = namaPaket;
                    summaryQty.innerText = qty + ' Win';
                    summaryTotal.innerText = 'Rp ' + totalHarga.toLocaleString('id-ID');
                } else {
                    summaryTarget.innerText = '-';
                    summaryQty.innerText = qty + ' Win';
                    summaryTotal.innerText = 'Rp 0';
                }
            }

            radios.forEach(radio => radio.addEventListener('change', hitungTotal));
            payRadios.forEach(radio => radio.addEventListener('change', hitungTotal));

            btnMinus.addEventListener('click', () => {
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                    hitungTotal();
                }
            });

            btnPlus.addEventListener('click', () => {
                qtyInput.value = parseInt(qtyInput.value) + 1;
                hitungTotal();
            });

            if(radios.length > 0) {
                radios[0].checked = true;
                hitungTotal();
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/paket/create_hero.blade.php ENDPATH**/ ?>