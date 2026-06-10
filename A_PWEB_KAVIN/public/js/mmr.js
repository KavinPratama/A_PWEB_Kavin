const listHero = ['Ling', 'Fanny', 'Gusion', 'Chou', 'Nolan', 'Claude', 'Harith', 'Valentina'];

async function fetchMmrByCity() {
    const city = document.getElementById('city-selector').value;
    const loading = document.getElementById('mmr-loading');
    const content = document.getElementById('mmr-content');
    const tableBody = document.getElementById('mmr-table-body');

    loading.style.display = 'flex';
    content.style.display = 'none';

    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/users');
        
        if (!response.ok) {
            throw new Error('Koneksi server gagal');
        }

        const users = await response.json();
        const topPlayers = users.slice(0, 5); 

        tableBody.innerHTML = ''; 

        topPlayers.forEach((player, index) => {
            const rank = index + 1;
            const fakeGameId = `(${player.id * 143}92)`; 
            const baseMmr = 4000 - (index * 250) + Math.floor(Math.random() * 50);
            const hero = listHero[(index + player.id) % listHero.length];

            let rankBadge = `<span class="text-gray-400 font-bold">${rank}</span>`;
            if(rank === 1) rankBadge = `<span class="px-2 py-1 bg-yellow-500 text-gray-900 rounded-full font-bold text-xs">🥇 1</span>`;
            if(rank === 2) rankBadge = `<span class="px-2 py-1 bg-gray-400 text-gray-900 rounded-full font-bold text-xs">🥈 2</span>`;
            if(rank === 3) rankBadge = `<span class="px-2 py-1 bg-amber-600 text-white rounded-full font-bold text-xs">🥉 3</span>`;

            const row = `
                <tr class="hover:bg-gray-800/50 transition-colors">
                    <td class="py-3 px-4 text-center">${rankBadge}</td>
                    <td class="py-3 px-4">
                        <span class="font-bold text-white block">${player.username}</span>
                        <span class="text-xs text-gray-500">${fakeGameId}</span>
                    </td>
                    <td class="py-3 px-4 text-purple-300 font-medium">⚔️ ${hero}</td>
                    <td class="py-3 px-4 text-right font-bold text-yellow-400">${baseMmr.toLocaleString('id-ID')} Pts</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });

        setTimeout(() => {
            loading.style.display = 'none';
            content.style.display = 'block';
        }, 500);

    } catch (error) {
        loading.innerHTML = '<span class="text-red-500 font-semibold">❌ Gagal melakukan sinkronisasi server MMR.</span>';
        console.error('Error fetching MMR:', error);
    }
}

document.addEventListener('DOMContentLoaded', fetchMmrByCity);