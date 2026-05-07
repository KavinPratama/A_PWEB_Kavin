<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joki Gendong - Jokss Cihuyy</title>
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
                <img src="https://via.placeholder.com/160/2a2a2a/ffffff?text=Mabar" alt="Ikon Game">
            </div>
            <div class="game-title">
                <h1>JOKI MAIN BARENG</h1>
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
                                <label>Nickname</label>
                                <input type="text" class="dark-input" placeholder="Masukkan Nickname">
                            </div>
                            <div class="input-group">
                                <label>ID</label>
                                <input type="number" class="dark-input" placeholder="Masukkan ID">
                            </div>
                            <div class="input-group">
                                <label>Server</label>
                                <input type="number" class="dark-input" placeholder="Masukkan Server">
                            </div>
                            <div class="input-group">
                                <label>Role (Dapat berubah saat main)</label>
                                <select class="dark-input">
                                    <option>Pilih Role...</option>
                                    <option>Jungler</option>
                                    <option>Roamer</option>
                                    <option>Midlaner</option>
                                    <option>Goldlaner</option>
                                    <option>Explaner</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Tanggal Main</label>
                                <input type="date" class="dark-input">
                            </div>
                            <div class="input-group">
                                <label>Jam Main</label>
                                <input type="time" class="dark-input">
                            </div>
                            <div class="input-group" style="grid-column: span 2;">
                                <label>Catatan untuk Penjoki</label>
                                <input type="text" class="dark-input" placeholder="Contoh: Bang ntar pakai discord ya, jangan toxic.">
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="box-header"><span class="step-num">2</span> Pilih Nominal (Promo Spesial Mabar)</div>
                        <div class="box-body">
                            <div class="grid-options">
                                <label class="option-card">
                                    <input type="radio" name="paket" value="10-epic">
                                    <div style="font-size: 0.85rem; margin-bottom: 5px;">10 Bintang + 2 Bonus Mabar Epic</div>
                                    <span class="price">Rp 90.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="10-legend">
                                    <div style="font-size: 0.85rem; margin-bottom: 5px;">10 Bintang + 2 Bonus Mabar Legend</div>
                                    <span class="price">Rp 100.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="10-mythic">
                                    <div style="font-size: 0.85rem; margin-bottom: 5px;">10 Bintang + 2 Bonus Mabar Mythic</div>
                                    <span class="price">Rp 170.000</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-order">Pesan Sekarang!</button>
                </form>
            </div>

            <div class="right-col">
                <div style="position: sticky; top: 80px; display: flex; flex-direction: column; gap: 20px;">
                    <div class="content-box" style="margin-bottom: 0;">
                        <div class="box-body rating-box">
                            <p style="color: #aaa; font-size: 0.9rem; margin-bottom: 5px;">Ulasan dan rating</p>
                            <h2>4.99</h2>
                            <div class="stars">★★★★★</div>
                            <p style="color: #aaa; font-size: 0.8rem; margin-top: 5px;">Berdasarkan total 3.69rb rating</p>
                        </div>
                    </div>
                    
                    <div class="content-box" style="margin-bottom: 0;">
                        <div class="box-body" style="display: flex; align-items: center; gap: 15px;">
                            <span style="font-size: 1.5rem;">🎧</span>
                            <div>
                                <strong style="font-size: 0.9rem;">Butuh Bantuan?</strong>
                                <p style="font-size: 0.8rem; color: #aaa;">Kamu bisa hubungi admin disini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>