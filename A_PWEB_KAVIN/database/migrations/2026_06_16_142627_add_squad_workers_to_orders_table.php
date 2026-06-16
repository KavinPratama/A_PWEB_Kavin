<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('worker_2_id')->nullable()->after('worker_id');
            $table->unsignedBigInteger('worker_3_id')->nullable()->after('worker_2_id');
            $table->unsignedBigInteger('worker_4_id')->nullable()->after('worker_3_id');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['worker_2_id', 'worker_3_id', 'worker_4_id']);
        });
    }
};
