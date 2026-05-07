<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $paketJoki = [
            ['kode' => 'ML-01', 'nama' => 'Epic ke Mythic', 'kategori' => 'Joki Rank', 'slot' => 5, 'harga' => 150000, 'tanggal' => '2026-05-01'],
            ['kode' => 'ML-02', 'nama' => 'Push Supreme Ling', 'kategori' => 'Joki Hero', 'slot' => 2, 'harga' => 300000, 'tanggal' => '2026-05-03'],
            ['kode' => 'ML-03', 'nama' => 'Mabar 10 Bintang', 'kategori' => 'Joki Gendong', 'slot' => 0, 'harga' => 90000, 'tanggal' => '2026-05-05'],
        ];

        return view('dashboard', compact('paketJoki'));
    }

    public function orderRank()
    {
        return view('order');
    }

    public function orderHero()
    {
        return view('order-hero');
    }

    public function orderGendong()
    {
        return view('order-gendong');
    }
}