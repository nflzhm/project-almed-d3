<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'judul',
        'deskripsi',
        'youtube_url',
        'youtube_id',
        'kategori',
        'durasi',
        'featured',
        'views'
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}