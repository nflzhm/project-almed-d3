<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaans';

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'periode'
    ];
}