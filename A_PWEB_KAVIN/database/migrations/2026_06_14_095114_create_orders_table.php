<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Kode Unik Orderan (Misal: JOKSS-A1B2C)
            $table->string('invoice_number')->unique();

            // Relasi ke Pelanggan & Penjoki
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('worker_id')->nullable()->constrained('users')->onDelete('set null');

            // Data Akun Game
            $table->string('email_game');
            $table->string('password_game');
            $table->string('login_via');
            $table->string('nickname');
            $table->string('request_hero')->nullable();
            $table->text('catatan')->nullable();

            // Data Pesanan & Pembayaran
            $table->string('paket');
            $table->integer('jumlah_bintang');
            $table->string('payment_method');
            $table->integer('total_harga');

            // Sistem Tracking
            $table->string('status')->default('Pending');
            $table->integer('estimasi_hari')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
