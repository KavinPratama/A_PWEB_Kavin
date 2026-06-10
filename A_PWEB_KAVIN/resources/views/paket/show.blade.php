@extends('layouts.app')
@section('title', 'Detail Paket')
@section('content')
<div class="container" style="margin-top: 80px; min-height: 50vh;">
    <div class="content-box">
        <div class="box-header">Detail Paket: {{ $paket->nama }}</div>
        <div class="box-body">
            <ul style="list-style: none; color: #ccc; line-height: 1.8;">
                <li><strong>Kode:</strong> {{ $paket->kode }}</li>
                <li><strong>Kategori:</strong> {{ $paket->kategori }}</li>
                <li><strong>Stok / Slot:</strong> {{ $paket->stok }}</li>
                <li><strong>Harga:</strong> Rp {{ number_format($paket->harga, 0, ',', '.') }}</li>
                <li><strong>Tanggal Update:</strong> {{ $paket->tanggal ? $paket->tanggal->format('d M Y') : '-' }}</li>
            </ul>
            <a href="{{ route('paket.index') }}" class="btn-search" style="display: inline-block; margin-top: 15px;">Kembali</a>
        </div>
    </div>
</div>
@endsection