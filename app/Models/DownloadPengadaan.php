<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadPengadaan extends Model
{
    use HasFactory;

    protected $table = 'download_pengadaan';

    protected $fillable = [
        'judul',
        'kategori',
        'periode',
        'deskripsi',
        'file',
        'ukuran',
        'download_count',
        'tanggal_upload'
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
    ];
}