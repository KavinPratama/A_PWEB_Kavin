@extends('layouts.app')

@section('title', 'Jokss Santuy Cihuyy - Manajemen Joki MLBB')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Joki Mobile Legends Terpercaya</h1>
            <p>Push rank MLBB lebih santuy, biar kami yang urus sisanya!</p>
        </div>
    </section>

    <div class="container layout-wrapper">
        
        <aside class="sidebar">
            <h3>Kategori Joki</h3>
            <label class="custom-checkbox">
                <input type="checkbox" class="filter-chk" value="Joki Rank">
                <span class="checkmark"></span>
                Joki Rank
            </label>
            <label class="custom-checkbox">
                <input type="checkbox" class="filter-chk" value="Joki Hero">
                <span class="checkmark"></span>
                Joki Hero
            </label>
            <label class="custom-checkbox">
                <input type="checkbox" class="filter-chk" value="Joki Gendong">
                <span class="checkmark"></span>
                Joki Gendong
            </label>
        </aside>

        <select id="kategori-filter" class="search-input">
            <option value="">Pilih Kategori...</option>
            <option value="Joki Rank">Joki Rank</option>
            <option value="Joki Hero">Joki Hero</option>
            <option value="Joki Gendong">Joki Gendong</option>
        </select>

        <main class="main-content">
            
            <form class="search-form" onsubmit="event.preventDefault()">
                <input type="text" id="search-input" placeholder="Cari paket joki (misal: Mythic atau ML-01)..." class="search-input">
            </form>

            <div class="card form-card">
                <h3 style="margin-bottom: 15px; color: #e94560;">⚙️ Kelola Paket Joki MLBB (Admin)</h3>
                
                <form id="form-joki" class="form-grid" method="POST" action="/simpan-paket">
                    @csrf
                    
                    <input type="text" id="kode" name="kode" placeholder="Kode (cth: ML-01)" class="search-input">
                    <input type="text" id="nama" name="nama" placeholder="Nama Paket (cth: Epic-Mythic)" class="search-input">
                    <select id="kategori" name="kategori" class="search-input">
                        <option value="Mobile Legends" selected>Mobile Legends</option>
                    </select>
                    <input type="number" id="stok" name="stok" placeholder="Sisa Slot Pengerjaan" class="search-input">
                    <input type="number" id="harga" name="harga" placeholder="Harga (Rp)" class="search-input">
                    <input type="date" id="tanggal" name="tanggal" class="search-input">
                    
                    <div style="grid-column: 1 / -1;">
                        <span id="error-msg" class="error-msg">Semua kolom wajib diisi ya jir!</span>
                    </div>
                    <button type="submit" id="btn-submit" class="btn-order" style="grid-column: 1 / -1;">Simpan Paket Baru</button>
                </form>
            </div>

            <div class="stats-container">
                <div class="stat-box">Total Paket: <br><span id="stat-total" class="stat-value">0</span></div>
                <div class="stat-box">Potensi Pendapatan: <br><span class="stat-value">Rp <span id="stat-nilai">0</span></span></div>
                <div class="stat-box">Slot Menipis (<5): <br><span id="stat-menipis" class="stat-value" style="color: red;">0</span></div>
            </div>

            <h3 class="table-title">Daftar Harga & Slot Tersedia</h3>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Paket Joki</th>
                            <th>Kategori Game</th>
                            <th>Slot</th>
                            <th>Harga</th>
                            <th>Tgl Update</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                    </tbody>
                </table>
            </div>

        </main>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush