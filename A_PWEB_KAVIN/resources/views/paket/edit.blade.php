@extends('layouts.app')
@section('title', 'Edit Paket Joki')
@section('content')
<div class="container layout-wrapper" style="margin-top: 80px;">
    <div class="card form-card" style="width: 100%; max-width: 600px; margin: 0 auto;">
        <h3 style="margin-bottom: 15px; color: #e94560;">✏️ Edit Paket Joki</h3>
        
        <form action="{{ route('paket.update', $paket->id) }}" method="POST" class="form-grid" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <input type="text" name="kode" value="{{ old('kode', $paket->kode) }}" class="search-input">
            <input type="text" name="nama" value="{{ old('nama', $paket->nama) }}" class="search-input">
            
            <select name="kategori" class="search-input">
                <option value="Joki Rank" {{ $paket->kategori == 'Joki Rank' ? 'selected' : '' }}>Joki Rank</option>
                <option value="Joki Hero" {{ $paket->kategori == 'Joki Hero' ? 'selected' : '' }}>Joki Hero</option>
                <option value="Joki Gendong" {{ $paket->kategori == 'Joki Gendong' ? 'selected' : '' }}>Joki Gendong</option>
            </select>
            
            <input type="number" name="stok" value="{{ old('stok', $paket->stok) }}" class="search-input">
            <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" class="search-input">
            <input type="date" name="tanggal" value="{{ old('tanggal', $paket->tanggal ? $paket->tanggal->format('Y-m-d') : '') }}" class="search-input">
            
            <div style="grid-column: 1 / -1; margin-top: 10px;">
                <label style="color: #ccc; display: block; margin-bottom: 5px;">Foto Saat Ini:</label>
                @if($paket->foto)
                    <img src="{{ asset('storage/' . $paket->foto) }}" alt="Foto Paket" style="width: 100px; border-radius: 8px; margin-bottom: 10px; display: block;">
                @else
                    <p style="color: #666; font-size: 0.9em; margin-bottom: 10px;">Belum ada foto.</p>
                @endif
                
                <label style="color: #ccc; display: block; margin-bottom: 5px;">Ganti Foto (Kosongkan jika tidak ingin mengubah):</label>
                <input type="file" name="foto" class="search-input" style="padding-top: 10px;">
            </div>

            <button type="submit" class="btn-order" style="grid-column: 1 / -1; margin-top: 20px;">Update Data Paket</button>
        </form>
    </div>
</div>
@endsection