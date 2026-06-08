<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'poli',
        'kategori',
        'deskripsi',
        'no_hp',
        'no_wa',
        'status',
        'gambar',
        'dokter',
        'jadwal',
        'kontak',
        'judul',
    ];
}