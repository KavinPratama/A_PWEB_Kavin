<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketJoki;

class PaketJokiSeeder extends Seeder
{
    public function run()
    {
        PaketJoki::create(['kode' => 'ML-01', 'nama' => 'Epic ke Mythic', 'kategori' => 'Joki Rank', 'stok' => 5, 'harga' => 150000, 'tanggal' => '2026-05-01']);
        PaketJoki::create(['kode' => 'ML-02', 'nama' => 'Push Supreme Ling', 'kategori' => 'Joki Hero', 'stok' => 2, 'harga' => 300000, 'tanggal' => '2026-05-03']);
        PaketJoki::create(['kode' => 'ML-03', 'nama' => 'Mabar 10 Bintang', 'kategori' => 'Joki Gendong', 'stok' => 0, 'harga' => 90000, 'tanggal' => '2026-05-05']);
    }
}