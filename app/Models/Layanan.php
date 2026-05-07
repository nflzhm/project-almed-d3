<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'poli',
        'deskripsi',
        'no_hp',
        'no_wa',
        'gambar',
        'status',
    ];
}