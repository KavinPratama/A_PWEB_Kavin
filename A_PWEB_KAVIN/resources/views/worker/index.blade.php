<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Roster Penjoki - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#121316] text-gray-200 min-h-screen font-sans pb-12">
    <header class="bg-red-900 py-4 border-b border-red-700 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-300 font-bold flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <span class="text-yellow-400 font-bold"><i class="fa-solid fa-users-gear"></i> Divisi Rekrutmen</span>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 pt-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-black text-white">Daftar Roster Penjoki</h1>
                <p class="text-gray-400 text-sm">Kelola data pro-player dan penjoki andalan Jokss Cihuyy.</p>
            </div>
            <a href="{{ route('worker.create') }}" class="bg-[#cda06b] hover:bg-[#b58856] text-black font-bold py-2 px-4 rounded-lg transition shadow-lg flex items-center gap-2">
                <i class="fa-solid fa-user-plus"></i> Rekrut Penjoki Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-900/50 border border-green-600 text-green-300 p-4 rounded-xl mb-6 font-bold text-sm">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#1f2125] rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-[#2d2f36] text-gray-400 border-b border-gray-700">
                    <tr>
                        <th class="p-4">Nama Penjoki</th>
                        <th class="p-4">Role Power</th>
                        <th class="p-4">Statistik Akun</th>
                        <th class="p-4 text-center">Pencapaian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($workers as $worker)
                        <tr class="hover:bg-gray-800/50 transition">
                            <td class="p-4 font-bold text-[#cda06b]">{{ $worker->nama }}</td>
                            <td class="p-4"><span class="bg-purple-900/50 text-purple-300 px-2 py-1 rounded text-xs font-bold">{{ $worker->role_power }}</span></td>
                            <td class="p-4 space-y-1">
                                <p class="text-xs text-gray-400">Lama Main: <span class="text-white font-bold">{{ $worker->lama_main }}</span></p>
                                <p class="text-xs text-gray-400">WR Ranked: <span class="text-green-400 font-bold">{{ $worker->wr_ranked }}</span></p>
                            </td>
                            <td class="p-4 text-center">
                                <span class="text-pink-500 font-black"><i class="fa-solid fa-crown mr-1"></i> {{ $worker->jumlah_immortal }}x Immortal</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-6 text-center text-gray-500 italic">Belum ada penjoki yang direkrut.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
