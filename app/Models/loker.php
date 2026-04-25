<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar'
    ];
}