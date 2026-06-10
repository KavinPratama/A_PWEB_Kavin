<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joki Hero - Jokss Cihuyy</title>
    
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Jokss Cihuyy</div>
        <div>Masuk / Daftar</div>
    </nav>

    <div class="hero-banner"></div>

    <div class="container">
        <div class="header-info">
            <div class="game-card">
                <img src="{{ asset('images/Mobile legend ling pfp.jpeg') }}" alt="Ikon Joki Hero">
            </div>
            <div class="game-title">
                <h1>JOKI HERO / POWER</h1>
                <p>Jokss Santuy Cihuyy</p>
                <div class="badges">
                    <span>⚡ Proses Cepat</span>
                    <span>💬 Layanan 24/7</span>
                    <span>✔️ Pembayaran Aman!</span>
                </div>
            </div>
        </div>

        <div class="main-layout">
            <div class="left-col">
                <form action="#" method="POST">
                    
                    <div class="content-box">
                        <div class="box-header"><span class="step-num">1</span> Masukkan Data Akun</div>
                        <div class="box-body form-grid">
                            <div class="input-group">
                                <label>Email</label>
                                <input type="text" class="dark-input" placeholder="Masukkan Email">
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <input type="password" class="dark-input" placeholder="Masukkan Password">
                            </div>
                            <div class="input-group">
                                <label>Login Via</label>
                                <select class="dark-input">
                                    <option value="">Pilih Login Via</option>
                                    <option>Moonton</option>
                                    <option>VK</option>
                                    <option>Tiktok</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Nickname</label>
                                <input type="text" class="dark-input" placeholder="Masukkan Nickname">
                            </div>
                            <div class="input-group">
                                <label>Request Hero Minimal 3</label>
                                <input type="text" class="dark-input" placeholder="Contoh: Ling, Gusion, Hayabusa">
                            </div>
                            <div class="input-group">
                                <label>Catatan untuk Penjoki</label>
                                <input type="text" class="dark-input" placeholder="Masukkan Catatan">
                            </div>
                            
                            <div style="grid-column: span 2; font-size: 0.8rem; color: #aaa; background: #1a1a1a; padding: 10px; border-radius: 4px; border-left: 3px solid #d4af37;">
                                ⓘ Please make sure you fill the correct account data
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="box-header"><span class="step-num">2</span> Pilih Nominal</div>
                        <div class="box-body">
                            <div class="grid-options">
                                <label class="option-card">
                                    <input type="radio" name="paket" value="hero-100">
                                    <div>+100 Power Hero</div>
                                    <span class="price">Rp 25.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="hero-500">
                                    <div>+500 Power Hero</div>
                                    <span class="price">Rp 120.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="hero-supreme">
                                    <div>Push Supreme Hero</div>
                                    <span class="price">Cek Harga</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-order">Pesan Sekarang!</button>
                </form>
            </div>

            <div class="right-col">
                <div class="content-box" style="position: sticky; top: 80px;">
                    <div class="box-header">Ulasan dan rating</div>
                    <div class="box-body rating-box">
                        <h2>4.99</h2>
                        <div class="stars">★★★★★</div>
                        <p style="color: #aaa; font-size: 0.8rem; margin-top: 10px;">Berdasarkan total 10.76rb rating</p>
                        
                        <div style="margin-top: 20px; background: #333; padding: 15px; border-radius: 8px; display: flex; align-items: center; gap: 15px;">
                            <span style="font-size: 1.5rem;">🎧</span>
                            <div>
                                <strong style="font-size: 0.9rem;">Butuh Bantuan?</strong>
                                <p style="font-size: 0.75rem; color: #ccc;">Kamu bisa hubungi admin disini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>