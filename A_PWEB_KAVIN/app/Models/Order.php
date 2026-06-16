<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Buka gerbang biar data dari form bisa masuk semua
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'worker_id',
        'email_game',
        'password_game',
        'login_via',
        'nickname',
        'request_hero',
        'catatan',
        'paket',
        'jumlah_bintang',
        'payment_method',
        'total_harga',
        'status',
        'estimasi_hari'
    ];

    // Relasi ke tabel User (Pelanggan)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relasi ke tabel User (Penjoki)
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
