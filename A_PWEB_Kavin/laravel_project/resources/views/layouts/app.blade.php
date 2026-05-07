<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jokss Cihuyy')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    @include('partials.navbar')

    @if(session('success'))
        <div class="alert-success" style="padding: 15px; background: #d4af37; color: #000; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-col">
            <h4>Jokss Santuy Cihuyy</h4>
            <p>Layanan joki MLBB paling aman, cepat, dan terpercaya sejak 2026.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>