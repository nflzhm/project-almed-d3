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

    public function getFotoUrlAttribute(): ?string
    {
        if (!$this->foto) {
            return null;
        }

        return asset('uploads/dokter/' . $this->foto);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dokter_id', 'id');
    }

    public function artikels()
    {
        return $this->belongsToMany(
            Artikel::class,
            'artikel_dokter',
            'dokter_id',
            'artikel_id'
        );
    }
}