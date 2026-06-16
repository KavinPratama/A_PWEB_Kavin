document.addEventListener("DOMContentLoaded", function() {
    const prefForm = document.getElementById('preferences-form');
    const statusText = document.getElementById('pref-status');

    prefForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah halaman refresh

        const theme = document.getElementById('pref-theme').value;
        const fontSize = document.getElementById('pref-fontsize').value;

        // Simulasi proses menyimpan ke server
        statusText.classList.remove('hidden');
        statusText.textContent = 'Menyimpan...';
        statusText.classList.replace('text-green-500', 'text-yellow-500');

        setTimeout(() => {
            // Ubah pesan sukses
            statusText.textContent = '✓ Preferensi disimpan via Server!';
            statusText.classList.replace('text-yellow-500', 'text-green-500');

            // Logika ganti tema HTML (Opsional buat efek visual)
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (theme === 'light') {
                document.documentElement.classList.remove('dark');
            }

            // Sembunyikan pesan setelah 3 detik
            setTimeout(() => {
                statusText.classList.add('hidden');
            }, 3000);

        }, 1000);
    });
});
