document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('preferences-form');
    const prefTheme = document.getElementById('pref-theme');
    const prefFontSize = document.getElementById('pref-fontsize');
    const statusText = document.getElementById('pref-status');

    if (getCookie('theme')) prefTheme.value = getCookie('theme');
    if (getCookie('font_size')) prefFontSize.value = getCookie('font_size');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch('/user/preferences', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    theme: prefTheme.value,
                    font_size: prefFontSize.value
                })
            });

            const result = await response.json();

            if (result.status === 'success') {
                setCookie('theme', prefTheme.value, 7);
                setCookie('font_size', prefFontSize.value, 7);

                if (prefTheme.value === 'dark') {
                    document.documentElement.classList.add('dark');
                } else if (prefTheme.value === 'light') {
                    document.documentElement.classList.remove('dark');
                }

                statusText.classList.remove('hidden');
                setTimeout(() => statusText.classList.add('hidden'), 3000);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
});