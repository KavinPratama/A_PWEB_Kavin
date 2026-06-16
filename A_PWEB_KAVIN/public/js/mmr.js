document.addEventListener("DOMContentLoaded", function() {
    // Panggil data pertama kali saat halaman dimuat
    fetchMmrByCity();
});

function fetchMmrByCity() {
    const city = document.getElementById('city-selector').value;
    const loading = document.getElementById('mmr-loading');
    const content = document.getElementById('mmr-content');
    const tbody = document.getElementById('mmr-table-body');

    // Tampilkan loading, sembunyikan tabel
    loading.style.display = 'flex';
    content.style.display = 'none';

    // Simulasi ambil data dari server (delay 1.5 detik)
    setTimeout(() => {
        let data = [];

        // Data dummy berdasarkan kota
        if (city === 'Jember') {
            data = [
                { rank: 1, name: 'KepoGaming (88219)', hero: 'Ling', mmr: '4,250' },
                { rank: 2, name: 'KangJoki_UNEJ (11234)', hero: 'Fanny', mmr: '3,980' },
                { rank: 3, name: 'SantuyCihuyy (99821)', hero: 'Chou', mmr: '3,850' }
            ];
        } else if (city === 'Surabaya') {
            data = [
                { rank: 1, name: 'SuroBoy (55412)', hero: 'Lancelot', mmr: '4,500' },
                { rank: 2, name: 'BonekSavage (33211)', hero: 'Gusion', mmr: '4,100' }
            ];
        } else {
            data = [
                { rank: 1, name: 'PlayerUnknown (00000)', hero: 'Nana', mmr: '3,500' }
            ];
        }

        // Susun HTML untuk tabel
        let html = '';
        data.forEach(player => {
            html += `
                <tr class="hover:bg-gray-800 transition-colors">
                    <td class="py-3 px-4 text-center font-bold text-purple-400">#${player.rank}</td>
                    <td class="py-3 px-4 text-white">${player.name}</td>
                    <td class="py-3 px-4 text-gray-300">${player.hero}</td>
                    <td class="py-3 px-4 text-right font-semibold text-green-400">${player.mmr}</td>
                </tr>
            `;
        });

        // Masukkan ke tabel, sembunyikan loading, tampilkan tabel
        tbody.innerHTML = html;
        loading.style.display = 'none';
        content.style.display = 'block';

    }, 1500); // 1.5 detik
}
