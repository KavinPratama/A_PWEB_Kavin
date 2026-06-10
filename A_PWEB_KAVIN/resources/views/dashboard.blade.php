<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="bg-gray-900 border border-purple-500 rounded-lg p-6 mt-6 shadow-lg text-white">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
                            <div>
                                <h3 class="text-xl font-bold text-purple-400">📊 Top Leaderboard MMR Player</h3>
                                <p class="text-sm text-gray-400">Lihat penjoki dengan rating tertinggi di kotamu</p>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Pilih Wilayah</label>
                                <select id="city-selector" onchange="fetchMmrByCity()" class="bg-gray-800 border border-gray-700 text-purple-300 rounded-md px-3 py-2 focus:outline-none focus:border-purple-500 w-full md:w-48">
                                    <option value="Jember">Jember</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Malang">Malang</option>
                                    <option value="Jakarta">Jakarta</option>
                                </select>
                            </div>
                        </div>

                        <div id="mmr-loading" class="flex items-center justify-center py-8 text-purple-400">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="font-medium">Sinkronisasi database MMR kota...</span>
                        </div>

                        <div id="mmr-content" style="display: none;" class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-800 text-gray-400 text-sm">
                                        <th class="py-2 px-4 text-center">Rank</th>
                                        <th class="py-2 px-4">Nickname (Game ID)</th>
                                        <th class="py-2 px-4">Hero Andalan</th>
                                        <th class="py-2 px-4 text-right">MMR / Power</th>
                                    </tr>
                                </thead>
                                <tbody id="mmr-table-body" class="divide-y divide-gray-800 text-sm">
                                </tbody>
                            </table>
                            <p class="text-xs text-gray-500 mt-4 text-right italic">Data live-update berdasarkan server regional.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-6 mt-6 shadow-sm">
                        <h3 class="text-xl font-bold mb-2 text-indigo-600 dark:text-indigo-400">⚙️ Pengaturan Preferensi Interface</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300 mb-4">Atur skema tema dan kenyamanan ukuran font aplikasi</p>

                        <form id="preferences-form" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-200">Pilih Tema Aplikasi</label>
                                    <select id="pref-theme" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 w-full text-black dark:text-white">
                                        <option value="light">Light Mode</option>
                                        <option value="dark">Dark Mode</option>
                                        <option value="system">System Default</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-200">Ukuran Font Catatan</label>
                                    <select id="pref-fontsize" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 w-full text-black dark:text-white">
                                        <option value="text-sm">Kecil (Small)</option>
                                        <option value="text-base" selected>Normal (Medium)</option>
                                        <option value="text-lg">Besar (Large)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center mt-4">
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow transition-colors">
                                    Simpan Konfigurasi
                                </button>
                                <span id="pref-status" class="ml-3 text-sm font-medium text-green-500 hidden">✓ Preferensi disimpan via Server!</span>
                            </div>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/mmr.js') }}"></script>
    <script src="{{ asset('js/preferences.js') }}"></script>
</x-app-layout>