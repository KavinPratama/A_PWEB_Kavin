<?php

namespace App\Http\Controllers;

use App\Models\PaketJoki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketJokiController extends Controller
{
    public function index()
    {
        $paketJoki = PaketJoki::where('user_id', auth()->id())->paginate(10);
        return view('paket.index', compact('paketJoki'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode'      => 'required|unique:paket_jokis,kode',
            'nama'      => 'required',
            'kategori'  => 'required',
            'stok'      => 'required|numeric',
            'harga'     => 'required|numeric',
            'tanggal'   => 'nullable|date',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('paket-foto', 'public');
        }
        
        PaketJoki::create($validatedData);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function show(PaketJoki $paket)
    {
        return view('paket.show', compact('paket'));
    }

    public function edit(PaketJoki $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, PaketJoki $paket)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:paket_jokis,kode,' . $paket->id,
            'nama' => 'required|min:3',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($paket->foto) {
                Storage::disk('public')->delete($paket->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('paket-foto', 'public');
        }

        $paket->update($validatedData);

        return redirect()->route('paket.index')->with('success', 'Data Paket berhasil diupdate!');
    }

    public function destroy(PaketJoki $paket)
    {
        if ($paket->foto) {
            Storage::disk('public')->delete($paket->foto);
        }
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket Joki berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $paketJoki = PaketJoki::where('user_id', auth()->id())
            ->where(function($query) use ($keyword) {
                $query->where('nama', 'LIKE', "%$keyword%")
                      ->orWhere('kategori', 'LIKE', "%$keyword%")
                      ->orWhere('kode', 'LIKE', "%$keyword%");
            })
            ->get();

        return response()->json($paketJoki);
    }

    public function savePreferences(Request $request)
    {
        $theme = $request->input('theme');
        $fontSize = $request->input('font_size');

        return response()->json([
            'status' => 'success',
            'message' => 'Preferensi berhasil disimpan!',
        ])
        ->cookie('theme', $theme, 10080, '/', null, false, false)
        ->cookie('font_size', $fontSize, 10080, '/', null, false, false);
    }
}