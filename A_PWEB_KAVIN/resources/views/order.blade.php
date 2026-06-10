<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Joki - Jokss Cihuyy</title>
    
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
                <img src="{{ asset('images/Mobile legend ling pfp.jpeg') }}" alt="Ikon Game">
            </div>
            <div class="game-title">
                <h1>JOKI RANK ECERAN</h1>
                <p>Jokss Santuy Cihuyy</p>
                <div class="badges">
                    <span>⚡ Proses Cepat</span>
                    <span>💬 Layanan 24/7</span>
                    <span>✔️ Anti Banned</span>
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
                                <label>Email / No. HP (Moonton/VK/Tiktok)</label>
                                <input type="text" class="dark-input" placeholder="Masukkan Email">
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <input type="password" class="dark-input" placeholder="Masukkan Password">
                            </div>
                            <div class="input-group">
                                <label>Login Via</label>
                                <select class="dark-input">
                                    <option>Moonton</option>
                                    <option>VK</option>
                                    <option>Tiktok</option>
                                    <option>Facebook</option>
                                    <option>Google</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Request Hero (Opsional)</label>
                                <input type="text" class="dark-input" placeholder="Contoh: Fanny, Lancelot">
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="box-header"><span class="step-num">2</span> Pilih Layanan</div>
                        <div class="box-body">
                            <div class="grid-options">
                                <label class="option-card">
                                    <input type="radio" name="paket" value="epic-legend">
                                    <div>Epic ke Legend</div>
                                    <span class="price">Rp 50.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="legend-mythic">
                                    <div>Legend ke Mythic</div>
                                    <span class="price">Rp 100.000</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="paket" value="mythic-honor">
                                    <div>Mythic ke Honor</div>
                                    <span class="price">Rp 150.000</span>
                                </label>
                                 <label class="option-card">
                                    <input type="radio" name="paket" value="eceran-bintang">
                                    <div>Eceran per Bintang</div>
                                    <span class="price">Rp 5.000</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="box-header"><span class="step-num">3</span> Pilih Pembayaran</div>
                        <div class="box-body">
                            <div class="grid-options">
                                <label class="option-card">
                                    <input type="radio" name="pembayaran" value="qris">
                                    <div style="font-weight: bold;">QRIS</div>
                                    <span style="font-size: 0.8rem; color: #aaa;">Otomatis</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="pembayaran" value="dana">
                                    <div style="font-weight: bold;">DANA</div>
                                    <span style="font-size: 0.8rem; color: #aaa;">Otomatis</span>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="pembayaran" value="bca">
                                    <div style="font-weight: bold;">Transfer BCA</div>
                                    <span style="font-size: 0.8rem; color: #aaa;">Manual</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <div class="box-header"><span class="step-num">4</span> Nomor WhatsApp</div>
                        <div class="box-body">
                            <div class="input-group">
                                <label>Nomor WA (Untuk konfirmasi & laporan progress joki)</label>
                                <input type="number" class="dark-input" placeholder="08xxxxxxxxxx">
                            </div>
                            <button type="submit" class="btn-order">Order Sekarang</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="right-col">
                <div class="content-box" style="position: sticky; top: 80px;">
                    <div class="box-header">Ulasan Layanan</div>
                    <div class="box-body rating-box">
                        <h2>4.99</h2>
                        <div class="stars">★★★★★</div>
                        <p style="color: #aaa; font-size: 0.85rem; margin-top: 10px;">Berdasarkan 500+ ulasan pelanggan joki.</p>
                        <hr style="border: 0; border-top: 1px solid #333; margin: 15px 0;">
                        <p style="font-size: 0.9rem; color: #ccc;">"Proses cepet banget, admin ramah, winrate hero aman. Mantap Jokss Cihuyy!" <br><br><i>- Player Solo Tersakiti</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>