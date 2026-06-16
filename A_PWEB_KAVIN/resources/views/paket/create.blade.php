<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Joki - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1f2125] text-gray-200 min-h-screen pb-12 font-sans">

    <!-- NAVBAR SIMPLE -->
    <header class="bg-[#18191c] py-4 border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-moon text-yellow-500"></i>
                Jokss Cihuyy
            </div>
            <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition text-sm font-semibold">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 pt-8">

        <!-- BUNGKUS DENGAN FORM BIAR BISA DIKIRIM KE BACKEND NANTINYA -->
        <form action="{{ route('paket.store') }}" method="POST" id="order-form">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- KOLOM KIRI (Form Data, Paket & Pembayaran) -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- SECTION 1: DATA AKUN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#3a3d46] py-3 px-4 flex items-center gap-4">
                            <span class="bg-[#cda06b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">1</span>
                            <h2 class="text-lg font-semibold text-white">Masukkan Data Akun</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Email</label>
                                    <input type="text" name="email" placeholder="Masukkan Email" required class="w-full bg-[#40444b] text-white border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none placeholder-gray-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Password</label>
                                    <input type="password" name="password" placeholder="Masukkan Password" required class="w-full bg-[#40444b] text-white border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none placeholder-gray-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Login Via</label>
                                    <select name="login_via" required class="w-full bg-[#40444b] text-gray-400 border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none">
                                        <option value="">Pilih Login Via</option>
                                        <option value="moonton">Moonton</option>
                                        <option value="vk">VK</option>
                                        <option value="tiktok">TikTok</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Nickname</label>
                                    <input type="text" name="nickname" placeholder="Masukkan Nickname" required class="w-full bg-[#40444b] text-white border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none placeholder-gray-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Request Hero</label>
                                    <input type="text" name="request_hero" placeholder="Minimal 3 Hero" class="w-full bg-[#40444b] text-white border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none placeholder-gray-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-gray-300">Catatan Penjoki</label>
                                    <input type="text" name="catatan" placeholder="Contoh: Jangan main malam" class="w-full bg-[#40444b] text-white border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#cda06b] focus:outline-none placeholder-gray-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: PILIH NOMINAL -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#3a3d46] py-3 px-4 flex items-center gap-4">
                            <span class="bg-[#cda06b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">2</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Nominal</h2>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-md mb-4 text-white">Joki Rank Eceran (Harga Per 1 Bintang)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                                <!-- Tambah data-price dan data-name di tiap input radio -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="grandmaster" data-price="3000" data-name="Grandmaster" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Grandmaster</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 3.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="epic" data-price="4000" data-name="Epic" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Epic</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 4.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="legend" data-price="5000" data-name="Legend" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Legend</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 5.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="mythic" data-price="8000" data-name="Mythic" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Mythic (0 - 24)</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 8.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="mythical_honor" data-price="12000" data-name="Mythical Honor" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Mythical Honor</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 12.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="mythical_glory" data-price="15000" data-name="Mythical Glory" class="peer sr-only">
                                    <div class="bg-[#3a3d46] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition h-full">
                                        <div class="text-sm font-bold text-white mb-3">Mythical Glory</div>
                                        <div class="text-[#cda06b] font-extrabold text-lg">Rp 15.000 <span class="text-xs text-gray-400 font-normal">/ Bintang</span></div>
                                    </div>
                                </label>
                            </div>

                            <!-- Input Jumlah Bintang (Tambah ID star-qty) -->
                            <div class="mt-6 bg-[#40444b] p-5 rounded-xl border border-gray-600 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-white">Jumlah Bintang</label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button type="button" id="btn-minus" class="bg-[#2d2f36] hover:bg-[#cda06b] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" id="star-qty" name="jumlah_bintang" min="1" max="100" value="1" class="w-20 bg-[#1f2125] text-white border border-[#cda06b] rounded-lg px-2 py-2 text-center font-bold focus:outline-none pointer-events-none">
                                    <button type="button" id="btn-plus" class="bg-[#2d2f36] hover:bg-[#cda06b] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: PILIH PEMBAYARAN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#3a3d46] py-3 px-4 flex items-center gap-4">
                            <span class="bg-[#cda06b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">3</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Pembayaran</h2>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment" value="qris" data-pay="QRIS" class="peer sr-only" checked>
                                <div class="bg-[#40444b] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition font-bold text-white">
                                    QRIS (All Payment)
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment" value="bca" data-pay="BCA Virtual Account" class="peer sr-only">
                                <div class="bg-[#40444b] border border-gray-600 rounded-xl p-4 peer-checked:border-[#cda06b] peer-checked:bg-[#cda06b]/10 hover:border-gray-400 transition font-bold text-white">
                                    BCA Virtual Account
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN (Sidebar Detail & Checkout) -->
                <div class="space-y-4">
                    <div class="bg-[#3a3d46] rounded-xl shadow-lg border border-gray-700 p-6 sticky top-24">
                        <h3 class="text-sm font-bold text-white mb-4 border-b border-gray-600 pb-2">Ringkasan Pesanan</h3>
                        <div class="space-y-2 text-sm text-gray-300 mb-4">
                            <div class="flex justify-between">
                                <span>Layanan:</span>
                                <span class="font-semibold text-white">Joki Rank Eceran</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Target:</span>
                                <!-- Tambah ID summary-target -->
                                <span id="summary-target" class="font-semibold text-white text-right">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Pembayaran:</span>
                                <!-- Tambah ID summary-payment -->
                                <span id="summary-payment" class="font-semibold text-white">QRIS</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-600 pt-4 flex justify-between items-center mb-6">
                            <span class="text-sm font-bold text-white">Total Bayar:</span>
                            <!-- Tambah ID summary-total -->
                            <span id="summary-total" class="text-xl font-extrabold text-[#cda06b]">Rp 0</span>
                        </div>

                        <!-- Tombol Submit Form -->
                        <button type="submit" class="w-full bg-[#cda06b] hover:bg-[#b58856] text-black font-extrabold py-3 rounded-lg shadow-lg transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bag-shopping"></i> Pesan Sekarang!
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </main>

    <!-- SCRIPT OTAK KALKULATOR -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="paket"]');
            const payRadios = document.querySelectorAll('input[name="payment"]');
            const qtyInput = document.getElementById('star-qty');
            const btnMinus = document.getElementById('btn-minus');
            const btnPlus = document.getElementById('btn-plus');

            const summaryTarget = document.getElementById('summary-target');
            const summaryTotal = document.getElementById('summary-total');
            const summaryPayment = document.getElementById('summary-payment');

            // Fungsi buat ngitung harga
            function hitungTotal() {
                let selectedPaket = document.querySelector('input[name="paket"]:checked');
                let selectedPay = document.querySelector('input[name="payment"]:checked');
                let qty = parseInt(qtyInput.value) || 1;

                // Update Pembayaran
                if(selectedPay) {
                    summaryPayment.innerText = selectedPay.getAttribute('data-pay');
                }

                // Update Harga & Target
                if (selectedPaket) {
                    let harga = parseInt(selectedPaket.getAttribute('data-price'));
                    let namaPaket = selectedPaket.getAttribute('data-name');
                    let totalHarga = harga * qty;

                    summaryTarget.innerText = namaPaket + ' (' + qty + ' Bintang)';
                    summaryTotal.innerText = 'Rp ' + totalHarga.toLocaleString('id-ID');
                } else {
                    summaryTarget.innerText = '-';
                    summaryTotal.innerText = 'Rp 0';
                }
            }

            // Pasang kuping pendengar ke semua tombol klik
            radios.forEach(radio => radio.addEventListener('change', hitungTotal));
            payRadios.forEach(radio => radio.addEventListener('change', hitungTotal));

            // Tombol Plus Minus Bintang
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
        });
    </script>
</body>
</html>
