<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lama_main'); // Cth: 4 Tahun
            $table->string('wr_ranked'); // Cth: 85%
            $table->integer('jumlah_immortal'); // Cth: 5
            $table->string('role_power'); // Cth: Jungler, Roamer
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
