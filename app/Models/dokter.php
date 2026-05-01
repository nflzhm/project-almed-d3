<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'spesialis',
        'foto'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dokter_id', 'id');
    }
}