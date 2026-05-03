<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerAdmin extends Model
{
    use HasFactory;

    protected $table = 'banners'; // nama tabel di database

    protected $fillable = [
        'judul',
        'caption',
        'gambar',
        'link',
        'urutan',
        'status',
        'tanggal_mulai',
        'tanggal_selesai'
    ];
}