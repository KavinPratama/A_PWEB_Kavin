<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('metode_paket', function (Blueprint $table) {
        $table->id();
        $table->foreignId('paket_joki_id')->constrained()->onDelete('cascade');
        $table->foreignId('metode_pembayaran_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
};
