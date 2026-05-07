<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/order-rank', [DashboardController::class, 'orderRank'])->name('order.rank');
Route::get('/order-hero', [DashboardController::class, 'orderHero'])->name('order.hero');
Route::get('/order-gendong', [DashboardController::class, 'orderGendong'])->name('order.gendong');