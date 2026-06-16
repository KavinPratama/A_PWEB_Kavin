<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    // Nampilin daftar penjoki
    public function index()
    {
        if (Auth::user()->role !== 'admin') abort(403);
        $workers = Worker::orderBy('created_at', 'desc')->get();
        return view('worker.index', compact('workers'));
    }

    // Nampilin form tambah penjoki
    public function create()
    {
        if (Auth::user()->role !== 'admin') abort(403);
        return view('worker.create');
    }

    // Simpan data penjoki baru
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $request->validate([
            'nama' => 'required|string',
            'lama_main' => 'required|string',
            'wr_ranked' => 'required|string',
            'jumlah_immortal' => 'required|integer',
            'role_power' => 'required|string',
        ]);

        Worker::create($request->all());

        return redirect()->route('worker.index')->with('success', 'Data Penjoki berhasil direkrut!');
    }
}
