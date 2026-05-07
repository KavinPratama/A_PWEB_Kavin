<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_jokis', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->enum('kategori', ['Joki Rank', 'Joki Hero', 'Joki Gendong']);
            $table->integer('stok');
            $table->integer('harga');
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }
};
