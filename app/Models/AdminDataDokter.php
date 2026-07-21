<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDataDokter extends Model
{
    use HasFactory;

    protected $table = 'admin_data_dokters';

    protected $fillable = [
        'nama',
        'spesialis',
        'foto',
        'deskripsi',
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
    
}