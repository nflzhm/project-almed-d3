<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan'; // ← ini yang kurang

    protected $fillable = [
        'poli',
        'kategori',
        'deskripsi',
        'no_hp',
        'no_wa',
        'gambar',
        'status',
    ];
}