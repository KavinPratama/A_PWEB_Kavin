<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaketJokiController;
use App\Http\Controllers\WorkerController; // ✨ TAMBAHAN: Import WorkerController
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route Transaksi
Route::get('/transaksi', [PaketJokiController::class, 'transaksi'])->name('transaksi.index');

// ✨ RUTE DASHBOARD ✨
Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $session = $request->session();
    $now = now()->timezone('Asia/Jakarta')->format('d M Y, H:i:s');
    $visitCount = $session->get('visit_count', 0) + 1;
    $session->put('visit_count', $visitCount);

    if (!$session->has('first_visit')) {
        $session->put('first_visit', $now);
    }

    $lastVisit = $session->get('last_visit', 'Ini kunjungan pertama');
    $session->put('last_visit', $now);

    // ✨ WAJIB PAKAI collect() BIAR BISA DI-COUNT() DI BLADE ✨
    $semua_order = collect();

    // ✨ LOGIKA CEK ROLE ADMIN ✨
    if (Auth::user()->role === 'admin') {
        $semua_order = \App\Models\Order::orderBy('created_at', 'desc')->get();
    }

    return view('dashboard', [
        'visitCount' => $visitCount,
        'firstVisit' => $session->get('first_visit'),
        'lastVisit'  => $lastVisit,
        'semua_order'=> $semua_order // Lempar datanya ke tampilan
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// ✨ Rute Buka Halaman Detail Admin ✨
Route::get('/admin/order/{id}', [PaketJokiController::class, 'showOrderAdmin'])
    ->middleware('auth')
    ->name('admin.order.show');

// Rute Update Status Admin
Route::post('/admin/order/{id}/update', [PaketJokiController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('admin.order.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/paket/add-to-cart/{id}', [PaketJokiController::class, 'addToCart'])->name('paket.cart');
    Route::post('/paket/reset-session', [PaketJokiController::class, 'resetSession'])->name('paket.reset');

    Route::resource('paket', PaketJokiController::class);

    // kelola worker
    Route::resource('worker', WorkerController::class);
});

Route::post('/api/cek-nickname', [\App\Http\Controllers\PaketJokiController::class, 'cekNickname'])->name('api.cek_nickname');

Route::get('/paket/search', [PaketJokiController::class, 'search'])->name('paket.search');
Route::post('/user/preferences', [PaketJokiController::class, 'savePreferences']);

require __DIR__.'/auth.php';
