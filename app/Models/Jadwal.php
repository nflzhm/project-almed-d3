<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dokter;

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

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
}