<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'deskripsi',
        'isi',
        'gambar',
        'kategori',
        'views'
    ];
}