<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'lama_main', 'wr_ranked', 'jumlah_immortal', 'role_power'];
}
