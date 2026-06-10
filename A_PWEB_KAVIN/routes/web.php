<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaketJokiController;   
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

    return view('dashboard', [
        'visitCount' => $visitCount,
        'firstVisit' => $session->get('first_visit'),
        'lastVisit'  => $lastVisit,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard/reset-visit', function (\Illuminate\Http\Request $request) {
    $request->session()->forget(['visit_count', 'first_visit', 'last_visit']);
    return redirect()->route('dashboard')->with('success', 'Statistik aktivitas berhasil direset!');
})->middleware(['auth'])->name('dashboard.reset');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/paket/add-to-cart/{id}', [PaketJokiController::class, 'addToCart'])->name('paket.cart');
    Route::post('/paket/reset-session', [PaketJokiController::class, 'resetSession'])->name('paket.reset');

    Route::resource('paket', PaketJokiController::class);
});

Route::get('/paket/search', [PaketJokiController::class, 'search'])->name('paket.search');
Route::post('/user/preferences', [PaketJokiController::class, 'savePreferences']);

require __DIR__.'/auth.php';