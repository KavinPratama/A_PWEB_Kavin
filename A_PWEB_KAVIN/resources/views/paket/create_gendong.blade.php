<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Order Joki Gendong VIP - Jokss Cihuyy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1f2125] text-gray-200 min-h-screen pb-12 font-sans">

    <!-- NAVBAR SIMPLE -->
    <header class="bg-[#18191c] py-4 border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-bold text-[#f59e0b] flex items-center gap-2">
                <i class="fa-solid fa-people-group"></i>
                Jokss Cihuyy - Divisi Gendong VIP
            </div>
            <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition text-sm font-semibold">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 pt-8">

        <div class="mb-6">
            <h1 class="text-2xl font-black text-white">🏆 Form Joki Gendong (Mabar)</h1>
            <p class="text-gray-400 text-sm">Main bareng pro player kita, dijamin win streak tanpa perlu kasih password!</p>
        </div>

        <form action="{{ route('paket.store') }}" method="POST" id="order-form">
            @csrf

            <!-- ✨ HIDDEN INPUT: Biar sistem ga error karena butuh email & pass ✨ -->
            <input type="hidden" name="email_game" value="MABAR-GENDONG">
            <input type="hidden" name="password_game" value="TIDAK-PERLU">
            <input type="hidden" name="login_via" value="MABAR">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- KOLOM KIRI -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- SECTION 1: DATA AKUN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#f59e0b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">1</span>
                            <h2 class="text-lg font-semibold text-white">Data Player & Jadwal</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nickname -->
                            <div>
                                <label class="block text-sm font-bold mb-1 text-gray-300">Nickname Game</label>
                                <input type="text" id="nickname_result" name="nickname" placeholder="Klik tombol Cek..." readonly required class="w-full bg-[#121316] text-green-400 font-bold border border-gray-700 rounded-lg px-4 py-3 focus:outline-none">
                            </div>

                            <!-- ID Game (Server) + TOMBOL CEK -->
                            <div>
                                <label class="block text-sm font-bold mb-1 text-[#f59e0b]">ID Game (Server) <i class="fa-solid fa-star text-xs"></i></label>
                                <div class="flex items-center gap-2">
                                    <input type="number" id="user_id" placeholder="ID" class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-2 py-3 focus:border-[#f59e0b] outline-none">
                                    <input type="number" id="zone_id" placeholder="Zone" class="w-20 bg-[#121316] text-white border border-gray-700 rounded-lg px-2 py-3 focus:border-[#f59e0b] outline-none">
                                    <!-- INI TOMBOLNYA CIK -->
                                    <button type="button" onclick="cekNickname()" class="bg-[#f59e0b] hover:bg-yellow-600 px-4 py-3 rounded-lg font-bold text-black transition whitespace-nowrap">
                                        Cek
                                    </button>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1 text-gray-300">Role Andalan & Jadwal Main</label>
                                <input type="text" name="catatan" placeholder="Contoh: Aku main Mage, bisa mulai jam 8 malam ini." required class="w-full bg-[#121316] text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-[#f59e0b] outline-none placeholder-gray-600">
                            </div>
                            <input type="hidden" name="request_hero" id="request_hero">
                        </div>
                        </div>
                    </div>

                    <!-- SECTION 2: PILIH LAYANAN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#f59e0b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">2</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Tier Gendong</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="gendong_epic" data-price="5000" data-name="Gendong Mabar (Epic)" class="peer sr-only" checked>
                                    <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#f59e0b] peer-checked:bg-[#f59e0b]/10 hover:border-gray-400 transition h-full flex flex-col justify-between">
                                        <div class="text-md font-bold text-white mb-2"><i class="fa-solid fa-dragon text-green-500 mr-1"></i> Tier Epic</div>
                                        <div class="text-[#f59e0b] font-extrabold text-lg">Rp 5k <span class="text-xs text-gray-400 font-normal">/ Win</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="gendong_legend" data-price="7000" data-name="Gendong Mabar (Legend)" class="peer sr-only">
                                    <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#f59e0b] peer-checked:bg-[#f59e0b]/10 hover:border-gray-400 transition h-full flex flex-col justify-between">
                                        <div class="text-md font-bold text-white mb-2"><i class="fa-solid fa-khanda text-yellow-300 mr-1"></i> Tier Legend</div>
                                        <div class="text-[#f59e0b] font-extrabold text-lg">Rp 7k <span class="text-xs text-gray-400 font-normal">/ Win</span></div>
                                    </div>
                                </label>

                                <label class="cursor-pointer relative">
                                    <input type="radio" name="paket" value="gendong_mythic" data-price="10000" data-name="Gendong Mabar (Mythic)" class="peer sr-only">
                                    <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#f59e0b] peer-checked:bg-[#f59e0b]/10 hover:border-gray-400 transition h-full flex flex-col justify-between">
                                        <div class="text-md font-bold text-white mb-2"><i class="fa-solid fa-crown text-pink-500 mr-1"></i> Tier Mythic</div>
                                        <div class="text-[#f59e0b] font-extrabold text-lg">Rp 10k <span class="text-xs text-gray-400 font-normal">/ Win</span></div>
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
                                    <button type="button" id="btn-minus" class="bg-[#2d2f36] hover:bg-[#f59e0b] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-minus"></i></button>

                                    <input type="number" id="star-qty" name="jumlah_bintang" min="1" max="20" value="3" class="w-20 bg-[#121316] text-white border border-[#f59e0b] rounded-lg px-2 py-2 text-center font-bold focus:outline-none pointer-events-none">

                                    <button type="button" id="btn-plus" class="bg-[#2d2f36] hover:bg-[#f59e0b] text-white hover:text-black w-10 h-10 rounded-lg font-bold transition"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: PILIH PEMBAYARAN -->
                    <div class="bg-[#2d2f36] rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <div class="bg-[#212328] py-3 px-4 flex items-center gap-4 border-b border-gray-700">
                            <span class="bg-[#f59e0b] text-black font-bold w-8 h-8 flex items-center justify-center rounded-md">3</span>
                            <h2 class="text-lg font-semibold text-white">Pilih Pembayaran</h2>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment_method" value="qris" data-pay="QRIS" class="peer sr-only" checked>
                                <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#f59e0b] peer-checked:bg-[#f59e0b]/10 hover:border-gray-400 transition font-bold text-white text-center">
                                    <i class="fa-solid fa-qrcode text-[#f59e0b] mr-2"></i> QRIS
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="payment_method" value="bca" data-pay="BCA Virtual Account" class="peer sr-only">
                                <div class="bg-[#121316] border border-gray-600 rounded-xl p-4 peer-checked:border-[#f59e0b] peer-checked:bg-[#f59e0b]/10 hover:border-gray-400 transition font-bold text-white text-center">
                                    <i class="fa-solid fa-building-columns text-[#f59e0b] mr-2"></i> Bank Transfer
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN (Sidebar Detail) -->
                <div class="space-y-4">
                    <div class="bg-[#212328] rounded-xl shadow-lg border border-gray-700 p-6 sticky top-24">
                        <h3 class="text-sm font-bold text-white mb-4 border-b border-gray-700 pb-2">Ringkasan Pesanan Gendong</h3>
                        <div class="space-y-3 text-sm text-gray-300 mb-6">
                            <div class="flex justify-between">
                                <span>Layanan:</span>
                                <span class="font-bold text-[#f59e0b]">Mabar VIP</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span>Target Tier:</span>
                                <span id="summary-target" class="font-bold text-white text-right max-w-[150px] leading-tight">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total Win:</span>
                                <span id="summary-qty" class="font-bold text-yellow-500">3 Win</span>
                            </div>
                            <div class="flex justify-between border-t border-gray-700 pt-3">
                                <span>Pembayaran:</span>
                                <span id="summary-payment" class="font-bold text-white">QRIS</span>
                            </div>
                        </div>
                        <div class="bg-[#121316] p-4 rounded-lg border border-[#f59e0b]/30 mb-6">
                            <span class="text-xs font-bold text-gray-400 block mb-1">Total Bayar:</span>
                            <span id="summary-total" class="text-2xl font-black text-[#f59e0b]">Rp 0</span>
                        </div>

                        <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#d97706] text-black font-extrabold py-3 rounded-lg shadow-[0_0_15px_rgba(245,158,11,0.4)] transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-crown"></i> Gaskan Mabar VIP!
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
    <script>
        function cekNickname() {
    let uid = document.getElementById('user_id').value;
    let zid = document.getElementById('zone_id').value;
    let btn = document.querySelector('button[onclick="cekNickname()"]');

    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';

    fetch(`https://api.isan.eu.org/nickname/ml?id=${uid}&zone=${zid}`)
    .then(res => res.json())
    .then(data => {
        btn.innerHTML = 'Cek';
        if(data.success) {
            document.getElementById('nickname_result').value = data.name;
            document.getElementById('request_hero').value = uid + ' (' + zid + ')';
        } else {
            alert("ID tidak ditemukan!");
        }
    });
}
    </script>
</body>
</html>
fetch
