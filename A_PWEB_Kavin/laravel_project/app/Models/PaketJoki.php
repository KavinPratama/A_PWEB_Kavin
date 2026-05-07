<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketJoki extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'kategori', 'stok', 'harga', 'tanggal'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function scopeTersedia($query)
    {
        return $query->where('stok', '>', 0);
    }

    public function metodePembayaran()
    {
        return $this->belongsToMany(MetodePembayaran::class, 'metode_paket');
    }
}