<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Invoice {{ $order->invoice_number }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#121316] text-gray-200 min-h-screen font-sans pb-12">

    <header class="bg-red-900 py-4 border-b border-red-700 sticky top-0 z-50 shadow-md">
        <div class="max-w-5xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white transition text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <span class="text-sm font-mono text-gray-400">Panel Penugasan Admin</span>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 pt-8">

        @if(session('success'))
            <div class="bg-green-900/50 border border-green-600 text-green-300 p-4 rounded-xl mb-6 font-bold text-sm">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ========================================================= --}}
            {{-- KOLOM KIRI: FORM PENUGASAN DINAMIS --}}
            {{-- ========================================================= --}}
            <div class="lg:col-span-2 bg-[#1f2125] rounded-2xl border border-gray-700 shadow-2xl p-6 lg:p-8">
                <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
                    <h2 class="text-xl font-black text-white"><i class="fa-solid fa-clipboard-user text-[#cda06b] mr-2"></i> Form Penugasan Joki</h2>
                    <span class="bg-[#2d2f36] px-3 py-1 rounded-md text-xs font-mono text-[#cda06b] border border-gray-600">
                        {{ $order->invoice_number }}
                    </span>
                </div>

                <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="space-y-6">
                    @csrf

                    @php
                        // Cek ini jenis joki apa biar formnya nyesuaikan
                        $isGendong = str_contains($order->paket, 'gendong');
                        $isHero = in_array($order->paket, ['classic_wr', 'ranked_mmr']);
                        $isRank = !$isGendong && !$isHero;
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- 1. TAMPILAN JIKA JOKI RANK BIASA --}}
                        @if($isRank)
                            <div>
                                <label class="block text-sm font-bold text-gray-300 mb-2">Pilih Penjoki Utama <span class="text-red-500">*</span></label>
                                <select name="worker_id" class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none" required>
                                    <option value="" disabled {{ is_null($order->worker_id) ? 'selected' : '' }}>-- Tugaskan ke siapa? --</option>
                                    @foreach($workers as $worker)
                                        <option value="{{ $worker->id }}" {{ $order->worker_id == $worker->id ? 'selected' : '' }}>
                                            {{ $worker->nama }} - Spesialis {{ $worker->role_power }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-300 mb-2">Target Finish Bintang</label>
                                <input type="text" name="target_detail" placeholder="Cth: Mythic 25 Bintang" class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none placeholder-gray-600">
                            </div>

                        {{-- 2. TAMPILAN JIKA JOKI HERO / MMR --}}
                        @elseif($isHero)
                            <div>
                                <label class="block text-sm font-bold text-[#5bcfe6] mb-2">Pro Player Utama <span class="text-red-500">*</span></label>
                                <select name="worker_id" class="w-full bg-[#121316] border border-[#5bcfe6]/50 rounded-xl px-4 py-3 text-white focus:border-[#5bcfe6] outline-none" required>
                                    <option value="" disabled {{ is_null($order->worker_id) ? 'selected' : '' }}>-- Pilih Top Global / Spesialis --</option>
                                    @foreach($workers as $worker)
                                        <option value="{{ $worker->id }}" {{ $order->worker_id == $worker->id ? 'selected' : '' }}>
                                            {{ $worker->nama }} - Spesialis {{ $worker->role_power }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- ✨ INI TAMBAHAN PEMAIN CADANGAN ✨ --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-400 mb-2">Pemain Cadangan (Opsional)</label>
                                <select name="backup_worker_id" class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-gray-300 focus:border-[#5bcfe6] outline-none">
                                    <option value="">-- Pilih Pemain Cadangan --</option>
                                    @foreach($workers as $worker)
                                        <option value="{{ $worker->id }}" {{ ($order->backup_worker_id ?? '') == $worker->id ? 'selected' : '' }}>
                                            {{ $worker->nama }} - Spesialis {{ $worker->role_power }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-[#5bcfe6] mb-2">Target Kemenangan Hero</label>
                                <input type="text" name="target_detail" value="{{ $order->jumlah_bintang }} Win (Sesuai Order)" class="w-full bg-[#2d2f36] border border-gray-600 rounded-xl px-4 py-3 text-gray-300 font-bold focus:outline-none cursor-not-allowed" readonly>
                                <p class="text-xs text-gray-400 mt-1 italic">* Joki MMR dihitung berdasarkan total Win, bukan jumlah poin MMR.</p>
                            </div>
                        {{-- 3. TAMPILAN JIKA JOKI GENDONG (MABAR) --}}
                        @elseif($isGendong)
                            <div class="md:col-span-2 bg-amber-900/20 border border-amber-600/50 p-4 rounded-xl flex gap-3 items-start">
                                <i class="fa-solid fa-triangle-exclamation text-amber-500 text-xl mt-1"></i>
                                <div>
                                    <h4 class="text-amber-500 font-bold">Peraturan Mabar Gendong</h4>
                                    <p class="text-sm text-amber-200/70">Maksimal mabar untuk tier <span class="font-bold text-white">Mythic Immortal Bintang 400</span>. Di atas itu wajib order paket khusus turnamen/pro-scene.</p>
                                </div>
                            </div>

                            {{-- ✨ FORMASI 4 PLAYER SQUAD ✨ --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-[#f59e0b] mb-2">Formasi 4 Roster Mabar (Squad) <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <!-- Player 1 -->
                                    <select name="worker_id" class="w-full bg-[#121316] border border-[#f59e0b]/50 rounded-xl px-4 py-3 text-white focus:border-[#f59e0b] outline-none" required>
                                        <option value="" disabled {{ is_null($order->worker_id) ? 'selected' : '' }}>-- Player 1 (Host/Kapten) --</option>
                                        @foreach($workers as $worker)
                                            <option value="{{ $worker->id }}" {{ $order->worker_id == $worker->id ? 'selected' : '' }}>{{ $worker->nama }} ({{ $worker->role_power }})</option>
                                        @endforeach
                                    </select>

                                    <!-- Player 2 -->
                                    <select name="worker_2_id" class="w-full bg-[#121316] border border-[#f59e0b]/50 rounded-xl px-4 py-3 text-white focus:border-[#f59e0b] outline-none" required>
                                        <option value="" disabled {{ is_null($order->worker_2_id) ? 'selected' : '' }}>-- Player 2 --</option>
                                        @foreach($workers as $worker)
                                            <option value="{{ $worker->id }}" {{ ($order->worker_2_id ?? '') == $worker->id ? 'selected' : '' }}>{{ $worker->nama }} ({{ $worker->role_power }})</option>
                                        @endforeach
                                    </select>

                                    <!-- Player 3 -->
                                    <select name="worker_3_id" class="w-full bg-[#121316] border border-[#f59e0b]/50 rounded-xl px-4 py-3 text-white focus:border-[#f59e0b] outline-none" required>
                                        <option value="" disabled {{ is_null($order->worker_3_id) ? 'selected' : '' }}>-- Player 3 --</option>
                                        @foreach($workers as $worker)
                                            <option value="{{ $worker->id }}" {{ ($order->worker_3_id ?? '') == $worker->id ? 'selected' : '' }}>{{ $worker->nama }} ({{ $worker->role_power }})</option>
                                        @endforeach
                                    </select>

                                    <!-- Player 4 -->
                                    <select name="worker_4_id" class="w-full bg-[#121316] border border-[#f59e0b]/50 rounded-xl px-4 py-3 text-white focus:border-[#f59e0b] outline-none" required>
                                        <option value="" disabled {{ is_null($order->worker_4_id) ? 'selected' : '' }}>-- Player 4 --</option>
                                        @foreach($workers as $worker)
                                            <option value="{{ $worker->id }}" {{ ($order->worker_4_id ?? '') == $worker->id ? 'selected' : '' }}>{{ $worker->nama }} ({{ $worker->role_power }})</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-[#f59e0b] mb-2">Jadwal Mabar Fix <span class="text-red-500">*</span></label>
                                <input type="text" name="target_detail" value="{{ $order->target_detail }}" placeholder="Cth: Malam ini jam 20:00 WIB" class="w-full bg-[#121316] border border-[#f59e0b]/50 rounded-xl px-4 py-3 text-white focus:border-[#f59e0b] outline-none placeholder-gray-600" required>
                            </div>
                        @endif

                    </div>

                    <div class="border-t border-gray-700 pt-6 mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-300 mb-2">Status Pengerjaan Saat Ini</label>
                            <select name="status" class="w-full bg-[#2d2f36] border border-gray-600 rounded-xl px-4 py-3 text-white font-bold focus:border-[#cda06b] outline-none">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>⏳ Pending (Belum Diambil)</option>
                                <option value="Proses Joki" {{ $order->status == 'Proses Joki' ? 'selected' : '' }}>🔥 Proses Joki (Sedang Main)</option>
                                <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>✅ Selesai (Done)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-300 mb-2">Update Estimasi (Hari)</label>
                            <input type="number" name="estimasi_hari" value="{{ $order->estimasi_hari }}" placeholder="Cth: 2" class="w-full bg-[#2d2f36] border border-gray-600 rounded-xl px-4 py-3 text-white font-bold focus:border-[#cda06b] outline-none">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#cda06b] hover:bg-[#b58856] text-black font-extrabold py-4 rounded-xl transition shadow-[0_0_15px_rgba(205,160,107,0.3)] hover:-translate-y-1 mt-4 text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> SIMPAN PENUGASAN
                    </button>
                </form>
            </div>

            {{-- ========================================================= --}}
            {{-- KOLOM KANAN: RINGKASAN DATA PELANGGAN --}}
            {{-- ========================================================= --}}
            <div class="space-y-6">
                <div class="bg-[#1f2125] p-6 rounded-2xl border border-gray-700 shadow-xl">
                    <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4 border-b border-gray-700 pb-2">Nilai Transaksi</h3>
                    <div class="text-3xl font-black text-green-400 mb-1">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</div>
                    <div class="text-sm font-bold text-gray-300 uppercase bg-[#2d2f36] inline-block px-3 py-1 rounded-md mt-2">{{ $order->payment_method }}</div>

                    <div class="mt-4 pt-4 border-t border-gray-800 space-y-2 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Layanan:</span><span class="font-bold text-white uppercase">{{ str_replace('_', ' ', $order->paket) }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Order:</span><span class="font-bold text-yellow-500">{{ $order->jumlah_bintang }} Win/Bintang</span></div>
                    </div>
                </div>

                <div class="bg-[#1f2125] p-6 rounded-2xl border border-gray-700 shadow-xl">
                    <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4 border-b border-gray-700 pb-2">Kredensial Login</h3>

                    <div class="space-y-4">
                        <div>
                            <span class="text-xs text-gray-500 block">Nickname Game</span>
                            <span class="font-bold text-lg text-white">{{ $order->nickname }}</span>
                            <span class="text-xs bg-purple-900/50 text-purple-300 px-2 py-0.5 rounded ml-2 uppercase">{{ $order->login_via }}</span>
                        </div>

                        @if(!$isGendong)
                            <div class="bg-[#121316] p-3 rounded-xl border border-gray-800 space-y-2">
                                <div>
                                    <span class="text-xs text-gray-500 block">Email / ID Server</span>
                                    <span class="text-sm text-gray-200 select-all font-mono">{{ $order->email_game }}</span>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-500 block">Password</span>
                                    <span class="text-sm text-red-400 select-all font-mono bg-red-900/20 px-2 py-1 rounded block mt-1">{{ $order->password_game }}</span>
                                </div>
                            </div>
                        @else
                            <div class="bg-amber-900/20 border border-amber-700/50 text-amber-400 p-3 rounded-xl text-xs font-medium">
                                <i class="fa-solid fa-shield-cat mr-1"></i> Mode Gendong Mabar. Tidak butuh password pelanggan.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-[#2d2f36]/40 p-6 rounded-2xl border border-gray-800">
                    <div class="mb-4">
                        {{-- SESUAIKAN: Nampilin game_id kalau Gendong, Nampilin request_hero kalau biasa --}}
                        @if($isGendong)
                            <span class="text-xs text-gray-500 block font-bold uppercase mb-1">ID Game (Player)</span>
                            <p class="text-sm font-bold text-[#5bcfe6]">{{ $order->game_id ?? '-' }}</p>
                        @else
                            <span class="text-xs text-gray-500 block font-bold uppercase mb-1">Target Hero / Info Tambahan</span>
                            <p class="text-sm font-bold text-[#5bcfe6]">{{ $order->request_hero ?? '-' }}</p>
                        @endif
                    </div>
                    <div class="border-t border-gray-800 pt-4">
                        <span class="text-xs text-gray-500 block font-bold uppercase mb-1">Pesan dari Pelanggan</span>
                        <p class="text-sm italic text-yellow-300">"{{ $order->catatan ?? 'Tidak ada pesan khusus.' }}"</p>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
