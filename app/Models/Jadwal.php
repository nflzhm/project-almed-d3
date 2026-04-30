<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'dokter_id',
        'hari',
        'klinik',
        'jam',
        'note'
    ];
}