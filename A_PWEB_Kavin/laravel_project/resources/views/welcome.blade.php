<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokss Cihuyy - Pilih Layanan</title>
    
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Jokss Cihuyy</div>
        <div>Masuk / Daftar</div>
    </nav>

    <div class="category-container">
        <h1>Pilih Layanan Joki Mobile Legends</h1>
        <div class="card-grid">
            
            <div class="joki-card">
                <img src="{{ asset('images/roaster.png') }}" alt="Joki Rank">
                    <h3>Joki Rank</h3>
                <p>Terima beres, rank auto naik kenceng!</p>
                <a href="/order-rank">Pilih Layanan</a>
            </div>
            
            <div class="joki-card">
                <img src="{{ asset('images/globalhero.png') }}" alt="Joki Hero">
                <h3>Joki Hero</h3>
                <p>Naikin MMR/Supreme hero favoritmu.</p>
                <a href="/order-hero">Pilih Layanan</a>
            </div>
            
            <div class="joki-card">
                <img src="{{ asset ('images/epic.png') }}" alt="Joki Gendong">
                <h3>Joki Gendong</h3>
                <p>Mabar bareng pro player, win streak bareng.</p>
                <a href="/order-gendong">Pilih Layanan</a>
            </div>
        </div>
    </div>
</body>
</html>