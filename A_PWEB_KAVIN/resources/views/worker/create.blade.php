<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekrut Penjoki Baru - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#121316] text-gray-200 min-h-screen font-sans pb-12">
    <header class="bg-red-900 py-4 border-b border-red-700 sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('worker.index') }}" class="text-white hover:text-gray-300 font-bold flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <span class="text-yellow-400 font-bold">Form Rekrutmen</span>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 pt-8">
        <div class="bg-[#1f2125] rounded-2xl border border-gray-700 shadow-2xl p-6 md:p-8">
            <h2 class="text-2xl font-black text-white mb-6 border-b border-gray-700 pb-4"><i class="fa-solid fa-user-shield text-[#cda06b] mr-2"></i> Input Data Penjoki Baru</h2>

            <form action="{{ route('worker.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-1">Nama/Nickname Penjoki <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" placeholder="Cth: Jess No Limit" required class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-1">Lama Bermain ML <span class="text-red-500">*</span></label>
                        <input type="text" name="lama_main" placeholder="Cth: 5 Tahun (Sejak S3)" required class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-1">Win Rate Ranked (%) <span class="text-red-500">*</span></label>
                        <input type="text" name="wr_ranked" placeholder="Cth: 85.5%" required class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-1">Total Tembus Mythic Immortal <span class="text-red-500">*</span></label>
                        <input type="number" name="jumlah_immortal" placeholder="Cth: 4" required class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-1">Role Power Utama <span class="text-red-500">*</span></label>
                        <select name="role_power" required class="w-full bg-[#121316] border border-gray-600 rounded-xl px-4 py-3 text-white focus:border-[#cda06b] outline-none">
                            <option value="">-- Pilih Role --</option>
                            <option value="Jungler">Jungler</option>
                            <option value="Roamer">Roamer</option>
                            <option value="Mid Laner">Mid Laner</option>
                            <option value="Gold Laner">Gold Laner</option>
                            <option value="EXP Laner">EXP Laner</option>
                            <option value="All Role">All Role</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#cda06b] hover:bg-[#b58856] text-black font-extrabold py-3.5 rounded-xl transition shadow-lg mt-4">
                    <i class="fa-solid fa-plus mr-1"></i> Daftarkan Penjoki
                </button>
            </form>
        </div>
    </main>
</body>
</html>
