<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaketJokiController extends Controller
{
    /**
     * Nampilin Form Order Sesuai Tipe (Rank, Hero, Gendong)
     */
    public function create(Request $request)
    {
        // Cek tipe joki dari URL (?type=...)
        $tipe = $request->query('type');

        if ($tipe === 'hero') {
            return view('paket.create_hero');
        } elseif ($tipe === 'gendong') {
            return view('paket.create_gendong');
        }

        // Kalau nggak ada tipe (atau type=rank), balikin ke form Joki Rank biasa
        return view('paket.create');
    }

    /**
     * Fungsi Simpan Data Pesanan ke Database
     */
    public function store(Request $request)
    {
        // 1. Validasi form dasar
        $request->validate([
            'login_via' => 'required|string',
            'nickname' => 'required|string',
            'paket' => 'required|string',
            'jumlah_bintang' => 'required|integer|min:1',
        ]);

        // 2. Tangkap data yang beda nama atribut antara form Rank, Hero, dan Gendong
        // Pakai ?? biar fleksibel nangkap nama inputan yang beda-beda dari form
        $email = $request->email ?? $request->email_game;
        $password = $request->password ?? $request->password_game;
        $payment = $request->payment ?? $request->payment_method;

        // 3. Kalkulator Keamanan (Daftar Harga Lengkap di Backend)
        $daftar_harga = [
            // Harga Joki Rank Eceran
            'grandmaster' => 3000,
            'epic' => 4000,
            'legend' => 5000,
            'mythic' => 8000,
            'mythical_honor' => 12000,
            'mythical_glory' => 15000,

            // Harga Joki Hero / MMR
            'classic_wr' => 4000,
            'ranked_mmr' => 7000,

            // Harga Joki Gendong / Mabar VIP
            'gendong_epic' => 5000,
            'gendong_legend' => 7000,
            'gendong_mythic' => 10000,
        ];

        // Ambil harga satuan, kalikan dengan jumlah bintang/win yang diinput
        $harga_satuan = $daftar_harga[$request->paket] ?? 0;
        $total_harga_asli = $harga_satuan * $request->jumlah_bintang;

        // 4. Proses Simpan ke Database
        Order::create([
            'invoice_number' => 'JOKSS-' . strtoupper(Str::random(6)),
            'customer_id' => Auth::id(),
            'worker_id' => null, // Dikosongin dulu karena nunggu diambil penjoki

            'email_game' => $email,
            'password_game' => $password, // Disimpan mentah agar penjoki bisa login ke akun pelanggan
            'login_via' => $request->login_via,
            'nickname' => $request->nickname,
            'request_hero' => $request->request_hero,
            'catatan' => $request->catatan,

            'paket' => $request->paket,
            'jumlah_bintang' => $request->jumlah_bintang,
            'payment_method' => $payment,
            'total_harga' => $total_harga_asli,
            'status' => 'Pending',
        ]);

        // 5. Lempar kembali ke Dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Pesanan joki berhasil dibuat! Menunggu konfirmasi admin.');
    }

    public function showOrderAdmin($id)
    {
    // Pastikan yang akses beneran admin
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Anda bukan bos admin!');
    }

    $order = Order::findOrFail($id);

    // ✨ PAKSA AMBIL DARI TABEL 'workers' LANSUNG ✨
    $workers = \Illuminate\Support\Facades\DB::table('workers')->get();

    return view('paket.show_admin', compact('order', 'workers'));
    }

    public function transaksi()
    {
        // Ambil semua data orderan milik akun yang lagi login, urutkan dari yang paling baru
        $orders = Order::where('customer_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->get();

        return view('paket.transaksi', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
    $order = Order::findOrFail($id);

    $order->update([
            'worker_id' => $request->worker_id,
            'worker_2_id' => $request->worker_2_id,
            'worker_3_id' => $request->worker_3_id,
            'worker_4_id' => $request->worker_4_id,
            'backup_worker_id' => $request->backup_worker_id, // backup mmr
            'status' => $request->status,
            'estimasi_hari' => $request->estimasi_hari,
            'target_detail' => $request->target_detail,     // simpen jam mabar
        ]);

    return redirect()->back()->with('success', 'Penugasan Joki berhasil disimpan!');
    }

    public function cekNickname(Request $request)
    {
        // 1. Validasi inputan dari form
        $request->validate([
            'user_id' => 'required',
            'zone_id' => 'required',
        ]);

        try {
            $response = Http::get("https://api.isan.eu.org/nickname/ml?id=1114917746&zone=13486", [
                'id' => $request->user_id,
                'zone' => $request->zone_id
            ]);

            // 3. Kalau API berhasil jawab
            if ($response->successful()) {
                $data = $response->json();

                // Cek apakah di JSON jawabannya ada key 'name' atau 'nickname'
                // Tergantung respon API-nya, biasanya 'name'
                if (isset($data['success']) && $data['success'] == true) {
                    return response()->json([
                        'success' => true,
                        'name' => $data['name'] // Ini dikirim balik ke JavaScript
                    ]);
                }
            }

            // Kalau API respon tapi datanya nggak ketemu
            return response()->json(['success' => false, 'message' => 'ID tidak ditemukan!'], 404);

        } catch (\Exception $e) {
            // Kalau API down/koneksi putus
            return response()->json(['success' => false, 'message' => 'API sedang gangguan'], 500);
        }
    }
}
